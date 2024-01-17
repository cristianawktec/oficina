<?php
require("/home/usuario/diretoriodeinstalação/PHPMailer-master/src/PHPMailer.php");
require("/home/usuario/diretoriodeinstalação/PHPMailer-master/src/SMTP.php");
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "br540.hostgator.com.br";
 $mail->Port = 587; // or 587
 $mail->IsHTML(true);
 $mail->Username = "cristian@consultoriawk.com";
 $mail->Password = "WKcons2#";
 $mail->SetFrom("cristian@consultoriawk.com");
 $mail->Subject = "Mensagem enviado pelo site da Oficina";
 $mail->Body = "";
 $mail->AddAddress("contato@consultoriawk.com");
    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       echo "Mensagem enviada com sucesso";
    }
?>