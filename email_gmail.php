<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(empty($_POST['form-email']) || empty($_POST['form-mensagem'])){
    header('Location:index.php?p=contacto&res=invalido');
    exit();
}

$email = $_POST['form-email'];
$mensagem = $_POST['form-mensagem'];

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cesae20221@gmail.com';                     //SMTP username
    $mail->Password   = 'P4ssw0rd+';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('cesae20221@gmail.com', $email);
    $mail->addAddress('cesae20221@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Assunto da mensagem';
    $mail->Body    = $mensagem;
    $mail->AltBody = $mensagem;

    $mail->send();
    //echo 'Message has been sent';
    header('Location:index.php?p=contacto&res=ok');
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header('Location:index.php?p=contacto&res=erro');
}