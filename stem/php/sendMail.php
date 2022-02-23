<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
if (isset($email)) {
    $error = "";
    $mail = new PHPMailer(true);
    $from = "stem@atc.com.ng";
    $support = "support@atc.com.ng";
    try {
        $mail->setFrom($from, 'ATC STEM');
        $mail->addAddress($email);
        $mail->addReplyTo($from, 'ATC STEM');
        $mail->addCC($support);
        $mail->addAttachment($filename, 'Payment Invoice');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'ATC STEM Payment Invoice';
        $variables = ['${header}', '${pdf}']; // placeholder in template
        $values = [
            'Thank you for paying for ATC STEM Club Training!',
            "" // pdf content and structure
        ];
        $mailMessage = file_get_contents("InvoiceCustomizedMessageTemplate.html");
        $mailMessage = str_ireplace($variables, $values, $mailMessage);

        $mail->Body    = $mailMessage;
        $mail->AltBody = 'Kindly find your payment invoice attached';

        $mail->send();
        $message = ["message" => "Successfully sent"];
    } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the login details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
}
?>