<?php
namespace App\Controllers;

use App\Models\Corretora;
use App\Models\CorretoraUsuario;
use App\Models\CorretoraSessao;
use App\Models\TemplateLandingpage;
use App\Models\Landing;
use App\Models\LandingVariaveis;
use App\Models\View;
/**
 * PaginaDeVendasController
 * 
 * Controller for managing sales pages in the application.
 */

class PaginaDeVendasController{
    
    public function suasPaginas(){
        $ativa = 'Página de Vendas';
        $subativo = 'Suas Páginas';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        $this->view('suas-paginas', compact(
            'ativa', 'subativo', 'corretoraNome', 'usuario', 'templates'
        ));
    }
    public function modelosProntos(){
        $ativa = 'Página de Vendas';
        $subativo = 'Modelos Prontos';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        $templates = TemplateLandingpage::find(0, array("status = 'Ativo'"));
        $this->view('modelos-prontos', compact(
            'ativa', 'subativo', 'corretoraNome', 'usuario', 'templates'
        ));
    }
    
    public function pagina(){
        $ativa = 'Página de Vendas';
        $subativo = 'Página';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        $template = TemplateLandingpage::find($site->template);
        $variaveis = LandingVariaveis::find(0, array("landing = '".$site->id."' AND imagem != ''"));
        $this->view('pagina', compact(
            'ativa', 'subativo', 'corretoraNome', 'usuario', 'templates'
        ));
    }
    
    public function paginaPreview(){
        $ativa = 'Página de Vendas';
        $subativo = 'Página pré-visualização';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        $this->view('pagina-preview', compact(
            'ativa', 'subativo', 'corretoraNome', 'usuario'
        ));
    }
    
    private function view(string $path, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../Views/dashboard/pagina-de-vendas/{$path}.php";
    }
    
}
