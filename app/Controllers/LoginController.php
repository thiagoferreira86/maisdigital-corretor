<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Corretora;
use App\Models\CorretoraUsuario;
use App\Models\CorretoraTentativaLogin;
use App\Models\CorretoraSessao;
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
        
            $cpf = isset($_POST["loginCPF"]) ? intval(trim($_POST["loginCPF"])) : '';
            $senha = isset($_POST["loginSenha"]) ? trim($_POST["loginSenha"]) : '';
            if(CorretoraTentativaLogin::estaBloqueado($cpf)) {
                $tempoRestante = CorretoraTentativaLogin::tempoRestante($cpf);
                $minutos = ceil($tempoRestante / 60);
                $data['mensagem'] = "Senha Incorreta! ⚠️ Você excedeu o número de tentativas de login. Aguarde {$minutos} minuto(s) para tentar novamente."; 
        	    $data['sucesso'] = false;
            } else {
                $usuarios = CorretoraUsuario::find(0, ["cpf = '".intval($cpf)."' AND excluido != 's'"]);
                if (count($usuarios) == 0){
                    $data['mensagem'] = 'O CPF informado não está cadastrado!'; 
            	    $data['sucesso'] = false;
                } else {
                    $usuario = $usuarios[0];
                    $corretora = Corretora::find($usuario->corretora_id);
                    if($corretora->status == 'Ativo'){
                        if(password_verify($senha, $usuario->senha)) {
                            CorretoraTentativaLogin::limparTentativas($usuario->cpf);
                            if($usuario->status == 'Suspenso' || $usuario->status == 'Bloqueado' || $usuario->status == 'Excluído' || $usuario->status == 'Inativo'){
                    	        $data['mensagem'] = 'Acesso não permitido! Sua conta encontra-se com o Status de <b>'.$usuario->status.'. Entre em contato com o suporte.</b>'; 
                    	        $data['sucesso'] = false;
                        	} else {
                        	    $token = bin2hex(random_bytes(32));
                                $ip = getUserIP();
                                
                                $duracaoSessao = 172800; // 48 horas em segundos
                                $agora = time();
                                $session_expire = $agora + $duracaoSessao;
                                // Salvar na sessão a hora exata de expiração
                                
                                $sessao = new CorretoraSessao();
                                $sessao->corretora_id = $corretora->id;
                                $sessao->usuario_id = $usuario->id;
                                $sessao->session_token = $token;
                                $sessao->ip_address = $ip;
                                $sessao->navegador = $result->ua->toString(); 
                                $sessao->sistema = $result->os->toString();   
                                $sessao->user_agent = $result->device->family;
                                $sessao->session_expire = $session_expire;
                                $sessao->save();
                                
                                $_SESSION['session_token'] = $token;
                        	    $_SESSION['corretora_id'] = $corretora->id;
                        	    $_SESSION['corretora_categoria'] = $corretora->categoria_id;
                        	    $_SESSION['corretora_usuario_id'] = $usuario->id;
                        	    $_SESSION['corretora_status'] = $corretora->status;
                        	    $_SESSION['corretora_nome'] = $corretora->nome;
                        	    $_SESSION['session_expire'] = $session_expire;
                        	    
                        		$data['sucesso'] = true;
                        	}
                        } else {
                            CorretoraTentativaLogin::registrarTentativa($cpf);
                            $data['mensagem'] = 'Senha Incorreta!'; 
                	        $data['sucesso'] = false;
                        }
                    } else {
                        $data['mensagem'] = 'Seu cadastro está bloqueado temporariamente! Entre em contato com a MAPFRE'; 
            	        $data['sucesso'] = false;
                    }
            	}
            }
        } else {
            $data['mensagem'] = 'Erro na validação do reCAPTCHA.';
            $data['sucesso'] = false;
        }
        echo json_encode($data);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}
