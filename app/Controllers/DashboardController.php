<?php
namespace App\Controllers;

use App\Models\Corretora;
use App\Models\CorretoraUsuario;
use App\Models\CorretoraTentativaLogin;
use App\Models\CorretoraSessao;
use App\Models\CorretoraUsuarioAceite;
use App\Models\Log;
use App\Models\Slide;
use App\Models\Video;
use App\Models\Arte;
use App\Models\View;
use UAParser\Parser;
 
class DashboardController{
    
    public function index(){
        $ativa = 'Início';
        $subativo = '';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $slides = Slide::paginate(0, 3, "status = 'Ativo'");
        $artes = Arte::paginate(0, 8, "status = 'Ativo'", "id DESC");
        $videos = Video::paginate(0, 2, "status = 'Ativo'");
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        Log::grava('Acesso Início');
        $this->view('index', compact(
            'ativa', 'subativo', 'corretoraNome',
            'slides', 'artes', 'videos', 'usuario'
        ));
    }
    
    public function perfil(){
        $ativa = 'Início';
        $subativo = '';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        Log::grava('Acesso Perfil');
        $this->view('perfil', compact(
            'ativa', 'subativo', 'corretoraNome', 'usuario'
        ));
    }
    public function atualizaDados(){
        extract($_POST);
        if(isset($_POST['email']) || !empty($email)){
            if(isset($_POST['nome']) || !empty($nome)){
                $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
                $usuario->email = $email;
                $usuario->nome = $nome;
                $usuario->telefone = $telefone;
                if(!password_verify(SENHA_PADRAO, $usuario->senha)){
                    $usuario->primeiro_acesso = 'n';
                    $data['redirect'] = 'dashboard/aceite-termos';
                }
                if($usuario->save()){
                    $data['sucesso'] = true;
                } else {
                    $data['erro'] = "Ocorreu um erro ao Salvar.";
                    $data['sucesso'] = false;
                }
            } else {
                $data['erro'] = "O nome não pode estar vazio";
                $data['sucesso'] = false;
            }
        } else {
            $data['erro'] = "O e-mail não pode estar vazio";
            $data['sucesso'] = false;
        }
        echo json_encode($data);
    }
    public function atualizaSenha(){
        extract($_POST);
        if(isset($_POST['senha_atual']) || !empty($senha_atual)){
            if(isset($_POST['nova_senha']) || !empty($nova_senha)){
                $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
                if (password_verify($senha_atual, $usuario->senha)) {
                    if(CorretoraUsuario::senhaValida($nova_senha)){
                        $usuario->senha = password_hash($nova_senha, PASSWORD_DEFAULT);
                        if(!empty($usuario->email)){
                            $usuario->primeiro_acesso = 'n';
                            $data['redirect'] = 'dashboard/aceite-termos';
                        }
                        if($usuario->save()){
                            $data['sucesso'] = true;
                        } else {
                            $data['erro'] = "Ocorreu um erro ao Salvar.";
                            $data['sucesso'] = false;
                        }
                    } else {
                        $data['erro'] = "A Nova Senha precisa ter pelo menos 8 caracteres e uma mistura de letras (maiúsculas e minúsculas), números e símbolos.";
                        $data['sucesso'] = false;
                    }
                } else {
                    $data['erro'] = "A Senha digitada não coincide com a Senha atual da conta.";
                    $data['sucesso'] = false;
                }
            } else {
                $data['erro'] = "A Nova Senha não pode estar vazia.";
                $data['sucesso'] = false;
            }
        } else {
            $data['erro'] = "A Senha Atual não pode estar vazia.";
            $data['sucesso'] = false;
        }
        echo json_encode($data);
    }
    public function aceitarTermos(){
        
        if(isset($_SESSION['corretora_usuario_id']) && !empty($_SESSION['corretora_usuario_id'])){
            $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
            $aceites = CorretoraUsuarioAceite::find(0, ["usuario_id = '".$usuario->id."'"]);
            if(count($aceites) ==0){
                $ip = getUserIP();
                
                $parser = Parser::create();
                $result = $parser->parse($_SERVER['HTTP_USER_AGENT']);
                // Salvar na sessão a hora exata de expiração
                
                $a = new CorretoraUsuarioAceite();
                $a->corretora_id = $usuario->corretora_id;
                $a->usuario_id = $usuario->id;
                $a->ip_address = $ip;
                $a->navegador = $result->ua->toString(); 
                $a->sistema = $result->os->toString();   
                $a->user_agent = $result->device->family;
                $a->save();
                if($a->save()){
                    
                    $usuario->validado = 's';
                    if($usuario->save()){
                        $data['redirect'] = 'dashboard';
                        $data['sucesso'] = true;
                    } else {
                        $a->destroy();
                        $data['erro'] = "Ocorreu um erro ao Validar";
                        $data['sucesso'] = false;
                    }
                } else {
                    $data['erro'] = "Ocorreu um erro ao Salvar o aceite.";
                    $data['sucesso'] = false;
                }
            } else {
                $data['erro'] = "Você já aceitou os Termos.";
                $data['sucesso'] = false;
            }
        } else {
            $data['erro'] = "Ocorreu um erro.";
            $data['sucesso'] = false;
        }
        echo json_encode($data);
        exit;
    }
    public function aceiteTermos(){
        $ativa = 'Início';
        $subativo = 'Aceite';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        if($usuario->validado == 'n'){
        Log::grava('Acesso Aceite Termos');
            $this->view('aceite-termos', compact(
                'ativa', 'subativo', 'corretoraNome', 'usuario'
            ));
        } else {
            $this->view('termos-de-uso', compact(
                'ativa', 'subativo', 'corretoraNome', 'usuario'
            ));
        }
    }
    
    private function view(string $path, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../Views/dashboard/{$path}.php";
    }
    
    public function logout(){
        session_destroy();
        header("Location: /login");
    }
}
