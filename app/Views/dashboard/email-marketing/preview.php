<?php
include '../../classes/config.php';
include '../includes/sessao.php';
$ativa = 'E-mail Marketing';

$emails = EmailsMarketing::find(0, array("id = '".$_GET['id']."' AND corretora = '".$_SESSION['corretora_id']."'"));
if(count($emails) >=1){
    $em = EmailsMarketing::find($_GET['id']);
    $html = file_get_contents(BASE.'templates/'.$em->pasta.'/'.$em->referencia.'/index.html');
    //print BASE.'templates/'.$em->pasta.'/'.$em->referencia.'/index.html';
    $html = preg_replace('/{{dominio}}/', BASE, $html);
    $html = populaVariaveis($html, $em->id);
    print $html;
}
function populaVariaveis($html, $email_id){
    $em = EmailsMarketing::find($email_id);
    $corretora = Corretora::find($em->corretora);
    if(!empty($corretora->razao)){
        $corretoraNome = $corretora->razao;
    } else {
        $corretoraNome = $corretora->nome;
    }
    $html = preg_replace('/{{titulo}}/', $em->titulo, $html);
    $html = preg_replace('/{{cor_primaria}}/', $em->cor_primaria, $html);
    $html = preg_replace('/{{cor_secundaria}}/', $em->cor_secundaria, $html);
    $html = preg_replace('/{{logotipo}}/', BASE.'imagens/'.$em->logotipo, $html);
    $html = preg_replace('/{{link_logotipo}}/', $em->link_logotipo, $html);
    $html = preg_replace('/{{imagem}}/', BASE.'imagens/'.$em->imagem_principal, $html);
    $html = preg_replace('/{{link_imagem}}/', $em->endereco, $html);
    $html = preg_replace('/{{texto}}/', $em->texto, $html);
    $html = preg_replace('/{{cor_texto}}/', $em->cor_texto, $html);
    
    $html = preg_replace('/{{cor_botao}}/', $em->cor_botao, $html);
    $html = preg_replace('/{{texto_botao}}/', $em->texto_botao, $html);
    $html = preg_replace('/{{cor_texto_botao}}/', $em->cor_texto_botao, $html);
    $html = preg_replace('/{{link_botao}}/', $em->link_botao, $html);
    $html = preg_replace('/{{id}}/', $email_id, $html);
    $html = preg_replace('/{{corretora}}/', $corretora->nome, $html);
    
    $variaveis = EmailsMarketingVariaveis::find(0, array("email = '".$email_id."'"));
    foreach($variaveis as $v){
        if(!empty($v->conteudo)){
            $html = preg_replace('/'.$v->referencia.'/', $v->conteudo, $html);
        } else {
            $html = preg_replace('/'.$v->referencia.'/', BASE.'imagens/'.$v->imagem, $html);
        }
    }
    return $html;
}   
 
?>