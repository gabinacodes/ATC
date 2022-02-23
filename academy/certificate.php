<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
    $from="academy@atc.com.ng";
    $password="academy"; //stemstem,academy,infoinfo,workstation
    $support = 'support@atc.com.ng';
    $mailSubject ='Congratulations, Your Certificate is Ready!';
    $type=explode('@',$from)[0];
    $type=strtoupper($type);
    $details = [
["Asieghwu Edith", "0003ATCPDC", "edithasieghwu@gmail.com"],
["Oluwafemi Israel Pelumi", "0005ATCF-EWDC(I)", "olufemiisraelpelumi@gmail.com"],
["Odeniyi Ifeoluwa Raphael", "0006ATCF-EWDC(I)", "iraph94@gmail.com"],
["Alarape Aishat Adebola", "0002ATCDAVC", "aheeshaalarape2@gmail.com"],
["Obadimu Grace Oyinlola", "0003ATCDAVC", "obadimugrace@gmail.com"]

        ];
    
foreach($details as $detail ){
        $email = $detail[2];
        $firstName = $detail[0];
        $certID = $detail[1];
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
        
        $variables = ['${mailSubject}','${firstName}','${certID}']; // placeholder in template
        $values = ["{$mailSubject}!",$firstName,$certID];
        $mailMessage = file_get_contents("certificate.html");
        $mailMessage = str_ireplace($variables, $values, $mailMessage);

        $mail->Body    = $mailMessage;
        $mail->AltBody = "Certificate link : //atc.com.ng/cert/validate, certificate ID : ${certID}";
        $mail->send();
        $message = ['message' => "successfully sent"];
      } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the login details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
}
}
var_dump($message['message']);
?>