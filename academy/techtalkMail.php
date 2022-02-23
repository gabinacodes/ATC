<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
    $from="info@atc.com.ng";
    $password="infoinfo"; //stemstem,academy,infoinfo,workstation
    $support = 'support@atc.com.ng';
    $mailSubject ='A space is reserved for you - ATCHUB @1';
    $type=explode('@',$from)[0];
    $type=strtoupper($type);
    $type = "HUB";
    
if (isset($email)) {
    $error = "";
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host = "mail.atc.com.ng";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->Port = "465";
    
    try {
        $mail->setFrom($from, "ATC ${type}");
        $mail->addAddress($email);
        $mail->addReplyTo($from, "ATC ${type}");
        $mail->addCC($support);
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $mailSubject;


        $variables = ['${mailSubject}','${firstName}']; // placeholder in template
        $values = ["{$mailSubject}!",$firstName];
        $mailMessage = file_get_contents("techtalk.html");
        $mailMessage = str_ireplace($variables, $values, $mailMessage);

        $mail->Body    = $mailMessage;
        $mail->AltBody = $mailSubject;

        $mail->send();
        $message = ['message' => "successfully sent"];
      } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the login details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
}
var_dump($message['message']);
?>