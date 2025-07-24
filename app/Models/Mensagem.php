<?php
declare(strict_types=1);

namespace App\Models;


class Mensagem extends ActiveRecord {
    
    public static function disparaEmail($titulo, $mensagem, $email, $nome){
        
        $subject = '[ Mapfre ] '.$titulo;

		$mail = new PHPMailer();
        $mail->IsMail(true);
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 0;
        $mail->Mailer = "smtp";
        $mail->Host = 'mail.otimize.online';
        $mail->Port = 465;
        $mail->Username = 'mapfre@otimize.online';
        $mail->Password = 'Baeta2025@';
        //$mail->addReplyTo('contato@segbox.com', 'CorretorPRO');
        $mail->SetFrom('mapfre@otimize.online', 'Otimize');
        $mail->AddAddress($email, $nome);
        $mail->addBCC('thiagoaf1406@gmail.com', 'Thiago');
        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $subject;
        $mail->MsgHTML($mensagem);
        $enviado = $mail->Send();
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        if($enviado){
            return $enviado;
        } else {
            return $enviado;
        }
    }
    
    public static function disparaCampanha($titulo, $corretora, $remetente_nome, $mensagem, $email, $nome, $corretora_id){
        
        $mail = new PHPMailer();
        $mail->IsMail(true);
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 0;
        $mail->Mailer = "smtp";
        //$mail->Host = 'mail.corretoradeseguros.online';
        //$mail->Port = 465;
        //$mail->Username = 'noreply@corretoradeseguros.online';
        //$mail->Password = 'Baeta2023@';
        $mail->Host = 'mail.otimize.online';
        $mail->Port = 465;
        $mail->Username = 'mapfre@otimize.online';
        $mail->Password = 'Baeta2025@';
        //$mail->addReplyTo('contato@segbox.com', 'CorretorPRO');
        //$mail->SetFrom('noreply@corretoradeseguros.online', $remetente_nome);
        $mail->SetFrom('mapfre@otimize.online', 'Otimize');
        $mail->AddAddress($email, $nome);
        $mail->addBCC('thiagoaf1406@gmail.com', 'Thiago');
        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $titulo;
        $mail->MsgHTML($mensagem);
        $enviado = $mail->Send();
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
    
        if($enviado){
            return true;
        } else {
            return false;
        }
    }
    

}