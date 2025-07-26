<?php
include '../../classes/config.php';
include '../includes/sessao.php';
$ativa = 'Landing';

$lps = Landing::find(0, array("id = '".$_GET['id']."' AND corretora = '".$_SESSION['corretora_id']."'"));
//print_r($lps);
if(count($lps) >=1){
    $site = Landing::find($lps[0]->id);
    Log::grava('Acesso Landing Preview - '.$site->titulo);
    $templateLanding = TemplateLandingpage::find($lps[0]->template);
    $html = file_get_contents(BASE."templates/".$templateLanding->pasta."/".$templateLanding->referencia."/index.html");
    $html = preg_replace('/{{dominio}}/', BASE.'templates/'.$templateLanding->pasta.'/'.$templateLanding->referencia.'/', $html);
    $html = populaVariaveisLP($html, $lps[0]->id);
    print $html;
}


function redireciona(){
    //return header("Location: 405.html");
}
function populaVariaveisLP($html, $lp_id){
    $landing = Landing::find($lp_id);
    $whatsapp = str_replace(array(" ", "(", ")", "-", ".", "[", "]", "_"), "", $landing->whatsapp);
    $variaveis = LandingVariaveis::find(0, array("landing = '".$lp_id."'"));
    $html = preg_replace('/{{tagHead}}/', $landing->tagsHead, $html);
    $html = preg_replace('/{{tagFooter}}/', $landing->tagsBody, $html);
    $html = preg_replace('/{{cor_primaria}}/', $landing->cor_primaria, $html);
    $html = preg_replace('/{{cor_secundaria}}/', $landing->cor_secundaria, $html);
    $html = preg_replace('/{{cor_terciaria}}/', $landing->cor_terciaria, $html);
    $html = preg_replace('/{{cor_quaternaria}}/', $landing->cor_quaternaria, $html);
    $html = preg_replace('/{{cor_quinaria}}/', $landing->cor_quinaria, $html);
    $html = preg_replace('/{{cor_senaria}}/', $landing->cor_senaria, $html);
    $html = preg_replace('/{{telefone}}/', $landing->telefone, $html);
    $html = preg_replace('/{{lp_id}}/', $lp_id, $html);
    $html = preg_replace('/{{endereco}}/', $landing->endereco, $html);
    $html = preg_replace('/{{whatsapp}}/', $whatsapp, $html);
    $html = preg_replace('/{{titulo}}/', $landing->titulo, $html);
    $html = preg_replace('/{{logotipo}}/', $landing->logotipo, $html);
    
    if(empty($landing->logotipo_footer)){
        $html = preg_replace('/{{logotipo_footer}}/', $landing->logotipo, $html);
    } else {
        $html = preg_replace('/{{logotipo_footer}}/', $landing->logotipo_footer, $html);
    }
    
    $html = preg_replace('/{{favicon}}/', $landing->favicon, $html);
    $html = preg_replace('/{{email}}/', $landing->email, $html);
    $html = preg_replace('/{{facebook}}/', $landing->facebook, $html);
    $html = preg_replace('/{{instagram}}/', $landing->instagram, $html);
    $html = preg_replace('/{{linkedin}}/', $landing->linkedin, $html);
    $html = preg_replace('/{{twitter}}/', $landing->twitter, $html);
    if(empty($landing->redirecionamento)){
        $redirect = 'setTimeout(function(){ location.reload(); }, 1000);';
    } else {
        $redirect = 'setTimeout(function(){ location.href="'.$landing->redirecionamento.'"); }, 1000);';
    }
    $html = preg_replace('/{{redirecionamento}}/', $redirect, $html);
    foreach($variaveis as $v){
        if(!empty($v->conteudo)){
            $html = preg_replace('/'.$v->referencia.'/', $v->conteudo, $html);
        } else {
            $html = preg_replace('/'.$v->referencia.'/', $v->imagem, $html);
        }
    }
    return $html;
}  
?>