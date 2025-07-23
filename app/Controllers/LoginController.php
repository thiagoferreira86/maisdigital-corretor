<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Corretor;
use UAParser\Parser;

class LoginController{
    public function index(){
        require_once __DIR__ . '/../Views/login.php';
    }

    public function auth(){
        
        $parser = Parser::create();
        $result = $parser->parse($_SERVER['HTTP_USER_AGENT']);
        
        $recaptcha_secret = RECAPTCHA_SECRET;
        $token = $_POST['recaptcha_token'] ?? '';
        
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$token}"
        );
        $responseData = json_decode($response);
        $data['response'] = $responseData;
        if($responseData->success && $responseData->score >= 0.5) {
        
            $email = isset($_POST["loginEmail"]) ? addslashes(trim($_POST["loginEmail"])) : '';
            $senha = isset($_POST["loginSenha"]) ? trim($_POST["loginSenha"]) : '';
            if(TentativaLogin::estaBloqueado($email)) {
                $tempoRestante = TentativaLogin::tempoRestante($email);
                $minutos = ceil($tempoRestante / 60);
                $data['mensagem'] = "Senha Incorreta! ⚠️ Você excedeu o número de tentativas de login. Aguarde {$minutos} minuto(s) para tentar novamente."; 
        	    $data['sucesso'] = false;
            } else {
                $corretoras = Corretora::find(0, ["email = '".addslashes($email)."' AND excluido != 's'"]);
                if (count($corretoras) == 0){
                    $data['mensagem'] = 'O E-mail informado não está cadastrado!'; 
            	    $data['sucesso'] = false;
                } else {
                    $corretora = $corretoras[0];
                    if(password_verify($senha, $corretora->senha)) {
                        TentativaLogin::limparTentativas($email);
                        if($corretora->status == 'Suspenso' || $corretora->status == 'Bloqueado' || $corretora->status == 'Excluído' || $corretora->status == 'Inativo'){
                	        $data['mensagem'] = 'Acesso não permitido! Sua conta encontra-se com o Status de <b>'.$corretora->status.'. Entre em contato com o suporte.</b>'; 
                	        $data['sucesso'] = false;
                    	} else {
                    	    $token = bin2hex(random_bytes(32));
                            $ip = getUserIP();
                            
                            $duracaoSessao = 172800; // 48 horas em segundos
                            $agora = time();
                            $session_expire = $agora + $duracaoSessao;
                            // Salvar na sessão a hora exata de expiração
                            
                            $sessao = new Sessao();
                            $sessao->corretora = $corretora->id;
                            $sessao->session_token = $token;
                            $sessao->ip_address = $ip;
                            $sessao->navegador = $result->ua->toString(); 
                            $sessao->sistema = $result->os->toString();   
                            $sessao->user_agent = $result->device->family;
                            $sessao->session_expire = $session_expire;
                            $sessao->save();
                            
                            $_SESSION['session_token'] = $token;
                    	    $_SESSION['corretora_id'] = $corretora->id;
                    	    $_SESSION['corretora_status'] = $corretora->status;
                    	    $_SESSION['corretora_nome'] = $corretora->nome;
                    	    $_SESSION['session_expire'] = $session_expire;
                    	    
                    		$data['sucesso'] = true;
                    	}
                    } else {
                        TentativaLogin::registrarTentativa($email);
                        $data['mensagem'] = 'Senha Incorreta!'; 
            	        $data['sucesso'] = false;
                    }
            	}
            }
        } else {
            $data['mensagem'] = 'Erro na validação do reCAPTCHA.';
            $data['sucesso'] = false;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}
