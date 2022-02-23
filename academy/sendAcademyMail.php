<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
    $from="academy@atc.com.ng";
    $password="academy"; //stemstem,academy,infoinfo,workstation
    $support = 'support@atc.com.ng';
    $mailSubject ='COHORT 4';
    $type=explode('@',$from)[0];
    $type=strtoupper($type);
    
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
        $mail->Subject ='ATC '. $mailSubject;
        
        $variables = ['${mailSubject}','${firstName}', '${course}','${price}','${duration}', '${courseCategory}','${title}']; // placeholder in template
        $values = ["{$mailSubject}!",$firstName,$course,$price,$duration,$courseCategory,$title];
        $mailMessage = file_get_contents("cohort.html");
        $mailMessage = str_ireplace($variables, $values, $mailMessage);

        $mail->Body    = $mailMessage;
        $filename = '../ATC_ACADEMY_POLICY.pdf';
        $mail->addAttachment($filename, 'ATC Academy Policy');    //Optional name
        $mail->AltBody = 'Kindly find your payment invoice attached';

        $mail->send();
        $message = ['message' => "successfully sent"];
      } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the login details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
}
var_dump($message['message']);
?>