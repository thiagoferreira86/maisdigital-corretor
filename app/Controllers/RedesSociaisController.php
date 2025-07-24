<?php
namespace App\Controllers;

use App\Models\{Corretora, CorretoraUsuario, Slide, Arte, Video, ArteTema, Log};

class RedesSociaisController{
    public function index(): void
    {
        $ativa = 'Redes Sociais';
        $subativo = '';
        $corretoraNome = explode(' ', $_SESSION['corretora_nome']);
    
        $slides = Slide::paginate(0, 3, "status = 'Ativo'");
        $artes = Arte::paginate(0, 8, "status = 'Ativo'", "id DESC");
        $videos = Video::paginate(0, 2, "status = 'Ativo'");
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        $temas = ArteTema::find(0);
    
        Log::grava('Acesso Redes Sociais');
    
        $this->view('redes-sociais/index', compact(
            'ativa', 'subativo', 'corretoraNome',
            'slides', 'artes', 'videos', 'usuario', 'temas'
        ));
    }
    
    public function listaArtes() {
        extract($_POST);
        if(isset($_POST['page']) && !empty($_POST['page'])){
            $page = $_POST['page'] - 1;
        } else {
            $page = 0;
        }
        if($page < 0){
        	$page = 0;
        }
        $quantity = 18;
        $max_pages = 5;
        
        $query = "status = 'Ativo'";
        if(!empty($tipo)){
            $query .= " AND tipo = '".$tipo."'";
        }
        if(!empty($formato)){
            $query .= " AND formato = '".$formato."'";
        }
        if(!empty($tema)){
            $query .= " AND tema = '".$tema."'";
        }
        $data['artes'] = '';
        $data['query'] = $query;
        $artes = Arte::paginate($page,$quantity, $query, "id DESC");
        $count = Arte::count($query,"MDM_artes");
        $pages = ceil($count/$quantity);
        
        if(count($artes) >0){
            foreach($artes as $a){
                $data['artes'] .= '<div class="col-md-2 lancamento-item"><form action="estrategias/arte" method="post"><input type="hidden" id="id" name="id" value="'.$a->id.'"><button class="btn-lancamento" type="submit"><img src="'.BASE.'imagens/artes/'.$a->imagem.'"></button></form></div>';
            }
        }
        
        $quant_pg = $pages;
        $quant_pg++;
        if($pages < $page) {
            $pg = 0;
        } else {
            $pg = $page;
        }
        $data['paginacao'] = '';
        if($pg > 0){ 
            $data['paginacao'] .= '<a href="javascript:void(0)" onclick="mudaPage('.$pg.')" class="btn-page btn btn-icon btn-sm btn-light-danger mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>';
        } else { 
        
        }
        for ($i_pg = $pg+1; $i_pg < $pg+$max_pages+1; $i_pg++) {
            if($pg == ($i_pg-1)){ 
                if($i_pg != 1){ 
                    $data['paginacao'] .= '<a href="javascript:void(0)" onclick="mudaPage('.($i_pg-1).')" data-page="'.($i_pg-1).'" class="btn-page btn btn-icon btn-sm border-0 btn-hover-danger mr-2 my-1">'.($i_pg-1).'</a>';
                } 
                $data['paginacao'] .= '<a href="javascript:void(0)" class="btn-page btn btn-icon btn-sm border-0 btn-hover-danger active mr-2 my-1">'.$i_pg.'</a>';
            } else if($i_pg-1 < $pages){
                $i_pg2 = $i_pg-1;
                $data['paginacao'] .= '<a href="javascript:void(0)" onclick="mudaPage('.($i_pg2+1).')" data-page="'.($i_pg2+1).'" class="btn-page btn btn-icon btn-sm border-0 btn-hover-danger mr-2 my-1">'.$i_pg.'</a>';
            }
        }
        if(($pg+2) < $quant_pg){
            $data['paginacao'] .= '<a href="javascript:void(0)" onclick="mudaPage('.($pg+2).')" class="btn-page btn btn-icon btn-sm btn-light-danger mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>';
        } else { 
        
        } 
        
        $data['sucesso'] = true;
        
        echo json_encode($data);
    }
    
    
     private function view(string $path, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../Views/{$path}.php";
    }
}

