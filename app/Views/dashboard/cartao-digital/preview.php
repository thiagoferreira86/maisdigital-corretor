<?php
include '../../classes/config.php';
include '../includes/sessao.php';
Log::grava('Acesso Preview Cart達o');
$ativa = 'Cart達o';

$lps = Cartao::find(0, array("id = '".$_GET['id']."' AND corretora = '".$_SESSION['corretora_id']."'"));
if(count($lps) >=1){
    $site = Cartao::find($_GET['id']);
    $templateLanding = TemplateCartoes::find($lps[0]->template);
    
    $html = file_get_contents(BASE.'templates/'.$templateLanding->pasta."/".$templateLanding->referencia."/index.html");
    $html = preg_replace('/{{dominio}}/', BASE, $html);
    $html = preg_replace('/{{cor_primaria}}/', $site->cor_primaria, $html);
    $html = preg_replace('/{{cor_secundaria}}/', $site->cor_secundaria, $html);
    $html = preg_replace('/{{descricao}}/', $site->descricao, $html);
    $html = preg_replace('/{{telefone}}/', $site->telefone, $html);
    $html = preg_replace('/{{endereco}}/', $site->endereco, $html);
    $html = preg_replace('/{{whatsapp}}/', $site->whatsapp, $html);
    $html = preg_replace('/{{titulo}}/', $site->titulo, $html);
    $html = preg_replace('/{{logotipo}}/', BASE.'imagens/'.$site->logotipo, $html);
    $html = preg_replace('/{{favicon}}/', $site->favicon, $html);
    $html = preg_replace('/{{email}}/', $site->email, $html);
    if(!empty($site->facebook)){
            $facebook = '<a href="'.$site->facebook.'" target="_blank" class="social-link w-inline-block" style="opacity:1 !important;">';
            $facebook .= '<img src="'.BASE.'templates/cartao1/images/facebook.png" alt="" class="social-icon">';
            $facebook .= '</a>';
            $html = preg_replace('/{{facebook}}/', $facebook, $html);
    } else {
         $html = preg_replace('/{{facebook}}/', '', $html);
    }
    if(!empty($site->twitter)){
            $twitter = '<a href="'.$site->twitter.'" target="_blank" class="social-link w-inline-block">';
            $twitter .= '<img src="'.BASE.'templates/cartao1/images/Twitter.svg" alt="" class="social-icon">';
            $twitter .= '</a>';
            $html = preg_replace('/{{twitter}}/', $twitter, $html);
    } else {
         $html = preg_replace('/{{twitter}}/', '', $html);
    }
    if(!empty($site->instagram)){
          $instagram = '<a href="'.$site->instagram.'" target="_blank" class="social-link w-inline-block">';
          $instagram .= '<img src="'.BASE.'templates/cartao1/images/Instagram.svg" alt="" class="social-icon">';
          $instagram .= '</a>';
          $html = preg_replace('/{{instagram}}/', $instagram, $html);
    } else {
         $html = preg_replace('/{{instagram}}/', '', $html);
    }
    if(!empty($site->linkedin)){
          $linkedin = '<a href="'.$site->linkedin.'" target="_blank" class="social-link w-inline-block">';
          $linkedin .= '<img src="'.BASE.'templates/cartao1/images/linkedin.svg" alt="" class="social-icon">';
          $linkedin .= '</a>';
          $html = preg_replace('/{{linkedin}}/', $linkedin, $html);
    } else {
         $html = preg_replace('/{{linkedin}}/', '', $html);
    }
    print $html;
}
?>