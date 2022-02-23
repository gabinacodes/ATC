<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


date_default_timezone_set('Europe/Paris');
//Load Composer's autoloader
require '../vendor/autoload.php';
    $error = "";
    $from = "info@atc.com.ng";
    $support = "support@atc.com.ng";
   
    $details = [// name, email
    ["Faruq",	"lawalfrq@gmail.com"],
["AbdulBateen",	"bataino.ronaldo@gmail.com"],
["Oluwatosin",	"brainnbox@gmail.com"],
["Rafiu",	"rodshele@gmail.com"],
["Ayinla",	"aniyikaiye.ayinla@gmail.com"],
["Abdulgafar",	"horlarbicy@gmail.com"],
["Kayode",	"ayodelekayode700@gmail.com"],
["Sadique",	"isadique0@gmail.com"],
["Ibrahim",	"kandekpuibrahim@gmail.com"],
["Tolulope",	"akinrinolaelijah@gmail.com"],
["olatunde",	"darkxerxers29@gmail.com"],
["Ismail",	"vermogen96@gmail.com"],
["Temitayo",	"akinlotanmutiat04@gmail.com"],
["simeon",	"simeonolawale69@gmail.com"],
["Abdurraheem",	"purehomie@gmail.com"],
["Ajayi",	"info.skyroute.travels@gmail.com"],
["Abayomi",	"abayomiogunnusi@gmail.com"],
["Oladimeji",	"tiamiyuoladimeji3@gmail.com"],
["Kazeem",	"kazeemadekunle029@gmail.com"],
["Oluwakolamide",	"idowuoluwakolamide@gmail.com"],
["faith",	"akinsolafaith0@gmail.com"],
["Ayomide",	"ayomidetejuoso81@gmail.com"],
["Peter",	"seyipeter@gmail.com"]
    ];
    
    $counter=0;
    foreach($details as $detail ){
    try {
         $mail = new PHPMailer(true);
         $mail->IsSMTP();
         $mail->Host = "mail.atc.com.ng";
         $mail->SMTPAuth = true;
         $mail->SMTPSecure = "ssl";
         $mail->Username = $from;
         $mail->Password = "infoinfo";
         $mail->Port = "465";
         $mail->setFrom($from, 'ATC HUB');
         $mail->addAddress($detail[1]);
         $mail->addReplyTo($from, 'ATC HUB');
         $mail->addCC($support);
         $mail->addCC("john.adebayo@atc.com.ng");
         $mail->addCC("bbm@atc.com.ng");
         $mail->addCC("solihadio@atc.com.ng");
        
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = "Yaaay! It's today - Tech Career Meetup with Ope Bukola";
        $variables = ['${firstName}']; // placeholder in template
        $values = [ $detail[0]];
        $mailMessage = str_ireplace($variables, $values, file_get_contents("invite.html"));

        $mail->Body    = $mailMessage;
        $mail->AltBody = $mail->Subject;
        $mail->send();
        $counter++;
        $message = "{$counter} messages successfully sent";
    } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
    }
    var_dump($message);
?>