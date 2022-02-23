<?php
//check that it's workstation before processing
// write to deferentiate daily from weekly or monthly
//if($_SERVER["REQUEST_METHOD"]){// == "POST"){
   // $firstName = $_SESSION['username'];

if(preg_match("/internet/i", getallheaders()["Referer"]) && isset($_POST['email']) && $_POST['password'] == "Accounting2004"){
include "config.php";
    $email = $_POST['email'];
    $validity = $_POST['workstationpackagemode'];
}
elseif(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
else {
    header('location: /');
}

if(isset($email)){ 
// Recipient email address
    $error = "";
    $to = $email;
    $us = "workstation@atc.com.ng";

    // Create email headers
    $headers = 'From: '. $us . "\r\n" .
        "CC: support@atc.com.ng\r\n" .
        "MIME-Version: 1.0\r\n" .
        //'Reply-To: '. $us . "\r\n" .
        "Content-Type: text/html; charset=utf-8;\r\n" . 
        'X-Mailer: PHP/' . phpversion();

    $sql = "SELECT id, username, password FROM internetaccess WHERE 
    username LIKE '".$validity."%' AND used = 0 limit 1";
    if($result = mysqli_query($con, $sql)){
        $row = mysqli_fetch_array($result);
        $id= $row['id'];
        $password = $row['password'];
        $username = $row['username'];
        $loginDetails = "\n username: " . $username . "\n password: " . $password;
        $sql = "UPDATE internetaccess SET used= 1, userEmail='$email' where id=" . $id;
        if(mysqli_query($con, $sql)){//update
        
$sql ="SELECT firstName FROM users WHERE email ='${email}'";
if($result = mysqli_query($con, $sql)){
        $row = mysqli_fetch_array($result);
        $name=$row['firstName'];
}
$html = file_get_contents("./workstation/workstationMessage.html");
$variables = ['${name}', ' ${username}', '${password}'];
$values = [$name, $username, $password];
$message = str_ireplace($variables, $values, $html);
            $subject="ATC Hub Workstation";
            // Sending email
            if(!mail($to, $subject, $message, $headers)){
                $error= "Sorry for the trouble. we are presently unable to send the login details, the details are stated below: \n";
            }
        }
        else{
            #fetch error
        }
    }
    var_dump($error . "\n" . $message);
}
else{
    header("Location: /workstation");
}
?>
<style>
    body{
        background-image: url("pics/loginpage.svg");
        background-color: #1207AB;
        background-position: center center;
        width: 100vw;
        height: 100vh;
        color: white;
        font-size: 18px;
        overflow-x: hidden;
    }

    a{
        color: #fff;

    }
</style>
