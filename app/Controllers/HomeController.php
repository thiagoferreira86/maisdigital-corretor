<?php
namespace App\Controllers;

use App\Models\Corretora;
use App\Models\CorretoraUsuario;
use App\Models\CorretoraTentativaLogin;
use App\Models\CorretoraSessao;
use App\Models\Log;
use App\Models\Slide;
use App\Models\Video;
use App\Models\Arte;
use App\Models\View;
use UAParser\Parser;


class HomeController{
    public function index(){
        $ativa = 'Home';
        $subativo = 'Dashboard';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $slides = Slide::paginate(0, 3, "status = 'Ativo'");
        $artes = Arte::paginate(0, 8, "status = 'Ativo'", "id DESC");
        $videos = Video::paginate(0, 2, "status = 'Ativo'");
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        Log::grava('Acesso Home');
        require_once __DIR__ . '/../Views/home.php';
    }
    public function logout(){
        session_destroy();
        header("Location: /login");
    }
}
