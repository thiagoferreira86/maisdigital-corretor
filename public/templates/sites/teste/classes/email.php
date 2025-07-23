<?php

class email extends ActiveRecord {

    public function novolead($idLead, $idUsuario) {
        
        $lead = Lead::find($idLead);
        $usuario = Usuario::find($idUsuario);
        
		$encoding = 'UTF-8'; 
        $msg = '<!doctype html>
                <html lang="pt-br">
                <head>
                <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->
                <meta charset="UTF-8">
                <style>
                    a, a:visited{ text-decoration: none; }
                    body{ background: #fff; color: #ddd000; }
                    table{
                            background: #323232;
                            overflow: hidden;
                            -webkit-border-radius: 5px;
                            -moz-border-radius: 5px;
                            border-radius: 5px;
                          }
                    .botao {
                            color: #323232;
                            text-transform: uppercase;
                            background: #fff;
                            padding: 5px;
                            margin-left: 0px;
                           }
                </style>
                </head>
                <body>
                    <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="250" rowspan="4" align="center" style="padding-top: 25px">
                                    <a href="https://www.seguro.digital/" target="_blank" style="padding-left: 30px"><img width="179" height="70" src="https://static.wixstatic.com/media/3693e9_40433b40231c427db946b151eb14d8b9~mv2.png/v1/fill/w_197,h_26,al_c,q_80,usm_0.66_1.00_0.01/New%20Logo%20segurodigital%20horizontal%20colore.webp" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 18px; color: #fff; height: 25px; text-align: center; font-family: Arial, Helvetica, sans-serif;"><strong>Novo Lead cadastrado</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 17px; color: #fff; padding: 20px 20px 0px 20px;">Olá, recebemos o cadastro de novo Lead através do nosso site:</td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px; color: #fff; padding: 0px 20px 0px 20px;"><strong style="color: #fff; font-weight: bold;">Nome:</strong> "' .$lead->nome. '"</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px; color: #fff; padding: 0px 20px 0px 20px;"><strong style="color: #fff; font-weight: bold;">E-mail:</strong> "' .$lead->email. '"</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px; color: #fff; padding: 0px 20px 0px 20px;"><strong style="color: #fff; font-weight: bold;">Telefone:</strong> "' .$lead->telefone. '"</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 20px; color: #fff; padding: 0px 20px 0px 20px;"><strong style="color: #fff; font-weight: bold;">Categoria:</strong> "' .$lead->categoria. '"</td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 11px; color: #fff; text-align: center; padding: 15px 0px; font-family: Arial, Helvetica, sans-serif; background: #1d1d1d;">© Copyright 2019. Todos os direitos reservados.</td>
                            </tr>
                        </tbody>
                    </table>
                </body>
                </html>';

        $subject = '[ LeadsClue ] Novo Lead';

        $mail = new PHPMailer();

        $mail->IsMail(true);
        $mail->SetFrom(EMAIL, EMAIL_NOME);
        $mail->AddAddress($usuario->email, $usuario->nome);
        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';

        $mail->Subject = $subject;

        $mail->MsgHTML($msg);

        $enviado = $mail->Send();

        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
    }



}
?>