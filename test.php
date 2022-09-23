<?php
// Hotmail SMTP server name: smtp.live.com
// Hotmail SMTP user name: your Hotmail account
// Hotmail SMTP password: your Hotmail password
// Hotmail SMTP port: 25 or 465
date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "bryan.soares19@hotmail.com";
$mail->Password = "4985672130a";
$mail->setFrom('bryan.soares19@hotmail.com', 'Bryan Programador');
$mail->addAddress('cidoro3755@bongcs.com', 'Exemplo2');
$mail->Subject = 'Titulo do Texto';
$mail->Body = 'Mensagem de texto';

if (!$mail->send()) {
   echo "Mailer Error: " . $mail->ErrorInfo;
} else {
   echo "Message sent!";
}