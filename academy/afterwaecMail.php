<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
    $from="academy@atc.com.ng";
    $password="academy"; //stemstem,academy,infoinfo,workstation
    $support = 'support@atc.com.ng';
    $mailSubject ='Congratulations - You have 10% Percent upon your registration';
    $type=explode('@',$from)[0];
    $type=strtoupper($type);
    $type = "HUB";
    
if (isset($email)) {
    $duration='3 months';
    if(stristr($course,'Analytics')){$price = 'N54,000';}
    else if(stristr($course,'Science 1')){$price = 'N72,000';}
    else if(stristr($course,'Frontend full')){$price = 'N117,000';$duration='6 months';}
    else if(stristr($course,'stack')){$price = 'N180,000';$duration='9 months';}
    else{$price = 'N63,000';}
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


        $variables = ['${mailSubject}','${firstName}','${course}', '${price}','${duration}']; // placeholder in template
        $values = ["{$mailSubject}!",$firstName, $course,$price,$duration];
        $mailMessage = file_get_contents("afterwaec.html");
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