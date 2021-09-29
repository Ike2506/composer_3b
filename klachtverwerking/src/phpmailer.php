<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$phpmailer = new PHPMailer();

require '../vendor/autoload.php';

//POST variabelen
$cc = $_POST["CC"];
$onderwerp = $_POST["Onderwerp"];
$bericht = $_POST["Bericht"];

try {
    //server settings
    $this->isSMTP();    
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '42671324857598';
    $phpmailer->Password = '1cdd0c735287be';

    //Recipients
    $phpmailer->addCC($cc);

    //content
    $phpmailer->isHTML(true);
    $phpmailer->Subject = $onderwerp;
    $phpmailer->Body = $bericht;

    $phpmailer->send();
    echo 'Message has been sent';
} catch (Exception $e) {
        echo "Message could not be send. Mailer Error: {$mail->ErrorInfo}";
}