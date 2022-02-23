<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
if (isset($email)) {
    $error = "";
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host = "mail.atc.com.ng";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Username = $from;
    if($from ==="academy@atc.com.ng"){
         $mail->Password = "academy";   
    }
    elseif($from ==="stem@atc.com.ng"){
         $mail->Password = "stemstem";   
    }
    elseif($from ==="workstation@atc.com.ng"){
         $mail->Password = "workstation";   
    }
    else{
         $mail->Password = "infoinfo";   
    }
    $mail->Port = "465";
    
    $type=strtoupper($type);
    $support = 'support@atc.com.ng';
    try {
        $mail->setFrom($from, "ATC ${type}");
        $mail->addAddress($email);
        $mail->addReplyTo($from, "ATC ${type}");
        foreach($CcEmail as $key=>$value){
       $mail->addCC($value);            
        }
        $mail->addCC($support);

        $mail->addAttachment($filename, 'Payment Invoice');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $mailSubject;
        $variables = ['${header}', '${payer}']; // placeholder in template
        $values = [
            "Thank you for paying for {$mailSubject}!",
           $payer
        ];
        $mailMessage = file_get_contents("InvoiceMessageTemplate.html");
        $mailMessage = str_ireplace($variables, $values, $mailMessage);

        $mail->Body    = $mailMessage;
        $mail->AltBody = 'Kindly find your payment invoice attached';

        $mail->send();
        $message = ['message' => "successfully sent"];
      } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the login details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
}
?>