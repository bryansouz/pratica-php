​<?php

use PHPMailer\PHPMailer\PHPMailer;

function email($destinatario, $assunto, $mesagemHTML){
require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp-mail.outlook.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'nolzard@hotmail.com';
$mail->Password = 'minecodcdzanime2';
$mail->SMTPSecure = false;
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->setFrom('nolzard@hotmail.com​', "Bryan Souza");
$mail->addAddress($destinatario);
$mail->Subject = $assunto;
$mail->Body = $mesagemHTML;

if($mail->send())
    echo " <h1 width='100px'>E-mail enviado com sucesso!!</h1>";
else
    echo "Falha ao enviar e-mail.";

}

?>

