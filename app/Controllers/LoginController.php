<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Corretora;
use App\Models\CorretoraUsuario;
use App\Models\CorretoraTentativaLogin;
use App\Models\CorretoraSessao;
use App\Models\Mensagem;
use UAParser\Parser;
use App\Helpers\Session;
use PHPMailer\PHPMailer;

class LoginController{
    
    public function index(){
        require_once __DIR__ . '/../Views/login.php';
    }

    public function auth(){
        //UA Parser utilizado para filtrar os dados do dispositivo do usuário
        $parser = Parser::create();
        $result = $parser->parse($_SERVER['HTTP_USER_AGENT']);
        
        //////////// Recaptcha
        $recaptcha_secret = RECAPTCHA_SECRET;
        $token = $_POST['recaptcha_token'] ?? '';
        
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$token}"
        );
        $responseData = json_decode($response);
        if($responseData->success && $responseData->score >= 0.5) {
        ////////// ---------------------------------------------------
        
            $cpf = isset($_POST["loginCPF"]) ? intval(trim($_POST["loginCPF"])) : '';
            $senha = isset($_POST["loginSenha"]) ? trim($_POST["loginSenha"]) : '';
            
            // Verifica se houve bloqueio por diversas tentativas de login 
            
            if(CorretoraTentativaLogin::estaBloqueado($cpf)) {  //// Se houve, retorna mensagem com o tempo de espera
                $tempoRestante = CorretoraTentativaLogin::tempoRestante($cpf);
                $minutos = ceil($tempoRestante / 60);
                $data['erro'] = "Senha Incorreta! ⚠️ Você excedeu o número de tentativas de login. Aguarde {$minutos} minuto(s) para tentar novamente."; 
        	    $data['sucesso'] = false;
            } else { //// Se NÃO houve, continua a verificação
                $usuarios = CorretoraUsuario::find(0, ["cpf = '".intval($cpf)."' AND excluido != 's'"]); //verificar se o usuário está cadastrado e não foi excluído
                if (count($usuarios) == 0){ // Se não está cadastrado ou foi excluído, retorna mensagem
                    $data['erro'] = 'O CPF informado não está cadastrado!'; 
            	    $data['sucesso'] = false;
                } else { // Se está cadastrado parte para verificar se a Corretora está ativa na plataforma
                    $usuario = $usuarios[0];
                    $corretora = Corretora::find($usuario->corretora_id);
                    if($corretora->status == 'Ativo'){ // se está ativa, parte para verificar a senha do usuário
                        if(password_verify($senha, $usuario->senha)) { // se a senha corresponde, limpa tentativas de login e vai para verificação do status do usuário
                            CorretoraTentativaLogin::limparTentativas($usuario->cpf);
                            if($usuario->status == 'Suspenso' || $usuario->status == 'Bloqueado' || $usuario->status == 'Excluído' || $usuario->status == 'Inativo'){  // se o usuário não está com status ATIVO, retorna erro
                    	        $data['erro'] = 'Acesso não permitido! Sua conta encontra-se com o Status de <b>'.$usuario->status.'. Entre em contato com o suporte.</b>'; 
                    	        $data['sucesso'] = false;
                        	} else { // se o usuário está com status ATIVO, vai para verificação de primeiro acesso
                        	    if($usuario->primeiro_acesso == 's'){  // se é o primeiro acesso, inicia a sessão e envia para a tela de cadastro do e-mail
                        	    
                                    $token = bin2hex(random_bytes(32)); // gera o token da sessão
                                    $ip = getUserIP(); // pega o IP do usuário
                                    
                                    $duracaoSessao = TEMPO_DE_SESSION; // 48 horas em segundos
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
                                    
                                    Session::start();
                                    $_SESSION['session_token'] = $token;
                            	    $_SESSION['corretora_id'] = $corretora->id;
                            	    $_SESSION['corretora_categoria'] = $corretora->categoria_id;
                            	    $_SESSION['corretora_usuario_id'] = $usuario->id;
                            	    $_SESSION['corretora_status'] = $corretora->status;
                            	    $_SESSION['corretora_nome'] = $corretora->nome;
                            	    $_SESSION['session_expire'] = $session_expire;
                            	    
                            	    $data['redirect'] = 'dashboard';
                            		$data['mensagem'] = 'Login realizado com sucesso';
                            		$data['sucesso'] = true;
                        	    } else {
                                    // Implementa 2FA por e-mail
                                    $codigo = $this->gerarCodigo2FA();
                                    $_SESSION['codigo_2fa'] = $codigo;
                                    $_SESSION['codigo_2fa_expira'] = time() + (TEMPO_DE_VERIFICACAO*60); 
                                    $_SESSION['2fa_user_id'] = $usuario->id;
                                    $_SESSION['2fa_user_nome'] = $usuario->nome;
                                    $this->enviarCodigoPorEmail($usuario->email, $codigo, $usuario->nome);
                                    $data['redirect'] = 'verificar-codigo';
                                    $data['mensagem'] = 'Login realizado com sucesso';
                                    $data['sucesso'] = true;
                        	    }
                        	}
                        } else {
                            CorretoraTentativaLogin::registrarTentativa($cpf);
                            $data['erro'] = 'Senha Incorreta!'; 
                	        $data['sucesso'] = false;
                        }
                    } else {
                        $data['erro'] = 'Seu cadastro está bloqueado temporariamente! Entre em contato com a MAPFRE'; 
            	        $data['sucesso'] = false;
                    }
            	}
            }
        } else {
            $data['erro'] = 'Erro na validação do reCAPTCHA.';
            $data['sucesso'] = false;
        }
        echo json_encode($data);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
    
    private function gerarCodigo2FA(): string {
        return str_pad(strval(rand(0, 999999)), 6, '0', STR_PAD_LEFT);
    }

    private function enviarCodigoPorEmail(string $email, string $codigo, string $nome): void {
        $titulo = 'Autenticação de 2 fatores';
        $url = BASE.'verificar-codigo';
        $mensagem = "<h3 style='color:#000000; width:100%; text-align:center;'><b>Código de Verificação</b></h3><br>";
        $mensagem .= "<p style='color:#000000; width:100%; text-align:center;'>Seu código de verificação é:</p>";
        $mensagem .= "<p style='color:#be0f0f; font-size:2em; width:100%; text-align:center; margin:20px 0;'><b>{$codigo}</b></p>";
        $mensagem .= "<p style='color:#000000; width:100%; text-align:center;'>Ele irá expirar em 5 minutos.</p>";
        
        $html = Mensagem::renderTemplate(__DIR__ . '/../../public/emails/email.html', [
            'titulo' => $titulo,
            'url' => $url,
            'logotipo' => LOGOTIPO_VERMELHO,
            'texto' => $mensagem,
            'app_name' => TITULO
        ]);
        $assunto = "Seu código de verificação ".TITULO;
        Mensagem::disparaEmail($assunto, $html, $email, $nome);
    }

    public function verificarCodigo() {
        require_once __DIR__ . '/../Views/verificar-codigo.php';
    }

    public function validarCodigo() {
        //////////// Recaptcha
        $recaptcha_secret = RECAPTCHA_SECRET;
        $token = $_POST['recaptcha_token'] ?? '';
        
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$token}"
        );
        $responseData = json_decode($response);
        if($responseData->success && $responseData->score >= 0.5) {
        ////////// ---------------------------------------------------
            session_start();
            $codigoDigitado = $_POST['codigo_2fa'] ?? '';
            $codigoGerado = $_SESSION['codigo_2fa'] ?? '';
            $expira = $_SESSION['codigo_2fa_expira'] ?? 0;
    
            if ($codigoDigitado === $codigoGerado && time() <= $expira) {
                
                $parser = Parser::create();
                $result = $parser->parse($_SERVER['HTTP_USER_AGENT']);
                $usuario = CorretoraUsuario::find($_SESSION['2fa_user_id']);
                $corretora = Corretora::find($usuario->corretora_id);
                $token = bin2hex(random_bytes(32)); // gera o token da sessão
                $ip = getUserIP(); // pega o IP do usuário
                
                $duracaoSessao = TEMPO_DE_SESSION; // 48 horas em segundos
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
                
                Session::start();
                
                $_SESSION['session_token'] = $token;
        	    $_SESSION['corretora_id'] = $corretora->id;
        	    $_SESSION['corretora_categoria'] = $corretora->categoria_id;
        	    $_SESSION['corretora_usuario_id'] = $usuario->id;
        	    $_SESSION['corretora_status'] = $corretora->status;
        	    $_SESSION['corretora_nome'] = $corretora->nome;
        	    $_SESSION['session_expire'] = $session_expire;
                $_SESSION['corretora_usuario_id'] = $_SESSION['2fa_user_id'];
                $_SESSION['corretora_nome'] = $_SESSION['2fa_user_nome'];
                
                unset($_SESSION['codigo_2fa'], $_SESSION['codigo_2fa_expira'], $_SESSION['2fa_user_id'], $_SESSION['2fa_user_nome']);
                
                $data['mensagem'] = 'Verificação realizada com sucesso';
                $data['sucesso'] = true;
                $data['redirect'] = 'dashboard';
                echo json_encode($data);
                exit;
            } else {
                $data['sucesso'] = false;
                $data['erro'] = "Código inválido ou expirado.";
                echo json_encode($data);
                exit;
            }
        } else {
            $data['erro'] = 'Erro na validação do reCAPTCHA.';
            $data['sucesso'] = false;
            echo json_encode($data);
            exit;
        }
        
    }

}
