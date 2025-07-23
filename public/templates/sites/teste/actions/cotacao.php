<?php 

require_once '../classes/config.php';
require '../classes/class.phpmailer.php';
require '../classes/class.smtp.php';

$corretor = Corretor::find($_POST['corretor']);
$sites = Site::find(0, array("corretor = '".$corretor->id."'"));
$site = $sites[0];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];
$pagina = $_POST['pagina'];

$seguros = Seguro::find(0, array("nome LIKE '".$pagina."'"));
$seguro = $seguros[0];

$c_s = Corretorseguro::find(0, array("corretor = '".$corretor->id."' AND seguro = '".$seguro->id."'"));
$cs = $c_s[0];

$Lead = new Lead();
$Lead->nome = $nome;
$Lead->corretor = $_POST['corretor'];
$Lead->email = $email;
$Lead->telefone = $telefone;
$Lead->mensagem = $mensagem;
$Lead->data_cadastro = date("Y-m-d H:i:s");
$Lead->status = 'Aberto';
$Lead->pagina = $pagina;
$resultado = $Lead->save();
notificaCorretor('Lead', $_POST['corretor']);

$encoding = 'UTF-8'; 
$msg = '<!doctype html>
<html lang="pt-br">
<head>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<meta charset="UTF-8">
<style>
a, a:visited { text-decoration:none; }
body { background: white; color: #ddd000; padding: 20px 20%; overflow:hidden; font-family: sans-serif; }
table {
        overflow: hidden;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        color:gray;
        width:100%;
    }
.botao {
        color: #323232;
        text-transform: uppercase;
        background: #fff;
        padding: 5px;
        margin-left: 0px;
}
p{ color:gray; }
</style>
</head>
<body>
<div style="background: rgba(33, 140, 235, 1); padding: 30px 20px 20px; overflow:hidden;">
    <div style="text-align:left; width:40%; float:left;">
        <a href="https://app.corretorpro.online/" target="_blank" style="padding-left: 10px"><img width="179" height="auto" src="https://app.corretorpro.online/imagens/logotipo.png" /></a>
    </div>
    <div style="width:60%; float:left">
        <p style="color:white; margin: 10px; font-weight:bold; text-align:right;">Novo Lead Corretor PRO</p>
    </div>
</div>
<div style="padding: 30px 20px;">
    <p>Olá, '.$corretor->nome.'</p>
    <p>você acaba de receber um novo Lead através de sua página no Corretor PRO.</p>
    <br>
    <p><b>Nome: </b>'.$nome.'</p>
    <p><b>Telefone: </b>'.$telefone.'</p>
    <p><b>E-mail: </b>'.$email.'</p>
    <p><b>Mensagem(Somente vindo do form de contato): </b>'.$mensagem.'</p>
    <br>
    <p><b>Através do formulário de: </b>'.$pagina.'</p>
</div>

<p style="text-align:center; font-size: 11px; margin: 50px 0 20px; color:gray;">Enviado por <a href="https://app.corretorpro.online/"><strong>Corretor PRO</strong></a></p>
</html>';

        $subject = '[ Corretor PRO ] Novo Lead.';
        $mail = new PHPMailer();
        $mail->IsMail(true);
        $mail->SetFrom('contato@corretorpro.online', EMAIL_NOME);
        $mail->Host = "vps.corretorpro.online";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Username = "contato@corretorpro.online";
        $mail->Password = "baeta2020@";
        $mail->Port = "465";
        $mail->AddAddress($site->email, $corretor->nome);
        $mail->addBCC('contato@segbox.com', 'Baeta');
        $mail->addBCC('thiagoaf1406@gmail.com', 'Thiago');
        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $subject;
        $mail->MsgHTML($msg);
        $mail->Send();
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

if($resultado){
        if(count($c_s) >=1){
            $data['href'] = $cs->link;
        }
        $data['sucesso'] = true;
} else {
        $data['sucesso'] = false;
}

echo json_encode($data);
?>