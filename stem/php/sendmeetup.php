<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


date_default_timezone_set('Europe/Paris');
$stephen="
 <tr><td><p style='margin-top: 10px; line-height: 1.5em;'>
Your skill in talking about different angles of the subject ‘Tech Space: The Journey thus far inline with your experience from starting from the grassroot to a global personnel’ was highly appreciated by our participants.
</p></td></tr>         ";
$hamzat = "
         <tr><td><p style='margin-top: 10px; line-height: 1.5em;'>Your skill in talking about different angles of the subject ‘Tech Space: Opportunities flows inline with the ecosystem and startup speech’ was highly appreciated by our participants.</p></td></tr>";
$extra='          <tr>
            <td>
              <p id="p_last" style=" margin-top: 10px; line-height: 1.5em; margin-bottom: 20px;">
 We see what you are doing for the ecosystem and we are proud to be in service today!  </p>
            </td>
          </tr>
';
//Load Composer's autoloader
require '../vendor/autoload.php';
    $error = "";
    $from = "info@atc.com.ng";
    $support = "support@atc.com.ng";
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host = "mail.atc.com.ng";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Username = $from;
    $mail->Password = "infoinfo";
    $mail->Port = "465";
    $details = [// email, name, message
    ['kolawolesteven99@gmail.com','Kolawole Steven',$stephen,' with the After WAEC Students..',''],//
    ['hamzyemmerx@gmail.com','Hamzat Oluwaseun',$hamzat,'',$extra],//
    ];
    
    $counter=0;
    foreach($details as $detail ){
    try {
        $mail->setFrom($from, 'ATC HUB');
        $mail->addAddress($detail[0]);
        $mail->addReplyTo($from, 'ATC HUB');
        $mail->addCC($support);
        $mail->addCC("john.adebayo@atc.com.ng");
        $mail->addCC("bbm@atc.com.ng");
        $mail->addCC("solihadio@atc.com.ng");
        
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Letter of Appreciation - ATC is ONE!';
        $variables = ['${speakerName}', '${invited}','${afterwaec}','${extra}']; // placeholder in template
        $values = [ $detail[1],$detail[2],$detail[3],$detail[4]];
        $mailMessage = file_get_contents("invite.html");
        $mailMessage = str_ireplace($variables, $values, $mailMessage);

        $mail->Body    = $mailMessage;
        $mail->AltBody = $mail->Subject;
        $mail->send();
        $counter++;
        $message = "{$counter} messages successfully sent";
    } catch (Exception $e) {
        $message = ["message" => "Sorry, we are presently unable to send the login details \n
    Mailer Error: {$mail->ErrorInfo}"];
    }
    }
    var_dump($message);
?>