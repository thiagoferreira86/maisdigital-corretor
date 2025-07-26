<?php
declare(strict_types=1);

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mensagem extends ActiveRecord {

    public static function disparaEmail($titulo, $html, $email, $nome): bool
    {
        $subject = '[ ' . EMAIL_FROM . ' ] ' . $titulo;
    
        try {
            $mail = new PHPMailer(true); // Ativa exceções
    
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPDebug = 0;
            $mail->Host = EMAIL_HOST;
            $mail->Port = EMAIL_PORT;
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;
    
            $mail->setFrom(EMAIL_USERNAME, EMAIL_FROM);
            $mail->addAddress($email, $nome);
            //$mail->addBCC('thiagoaf1406@gmail.com', 'Thiago');
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $subject;
            $mail->Body = $html;
            $mail->AltBody = strip_tags($html); // versão de fallback
    
            $mail->send();
            $mail->clearAllRecipients();
            $mail->clearAttachments();
    
            return true;
    
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail: {$mail->ErrorInfo}");
            return false;
        }
    }
    
    public static function renderTemplate(string $path, array $variaveis): string {
        if (!file_exists($path)) {
            error_log("Template não encontrado: $path");
            return '';
        }
        $template = file_get_contents($path);
        if (empty($template)) {
            error_log("Template está vazio: $path");
            return '';
        }
        foreach ($variaveis as $chave => $valor) {
            $template = str_replace('{{' . $chave . '}}', $valor, $template);
        }
        return $template;
    }
    
    public static function disparaCampanha($titulo, $corretora, $remetente_nome, $mensagem, $email, $nome, $corretora_id){
        
        $mail = new PHPMailer();
        $mail->IsMail(true);
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 0;
        $mail->Mailer = "smtp";
        $mail->Host = EMAIL_HOST_CAMPAIGN;
        $mail->Port = EMAIL_PORT_CAMPAIGN;
        $mail->Username = EMAIL_USERNAME_CAMPAIGN;
        $mail->Password = EMAIL_PASSWORD_CAMPAIGN;
        //$mail->addReplyTo('contato@segbox.com', 'CorretorPRO');
        $mail->SetFrom(EMAIL_USERNAME_CAMPAIGN, EMAIL_FROM_CAMPAIGN);
        $mail->AddAddress($email, $nome);
        //$mail->addBCC('thiagoaf1406@gmail.com', 'Thiago');
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