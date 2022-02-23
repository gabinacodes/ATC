<?php


session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // transfers all mysql error to PHP for easy debugging

$host = "localhost"; /* Host name */
$user = "africde5_admin"; /* User*/
$password = "bb@ATC_HuB"; /* Password */
$dbname = "africde5_studentCourseInfo";

date_default_timezone_set('Europe/Paris');

// Processing form data when form is submitted
// invoice generation made independent of platforms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type='A';
    $_POST = json_decode(file_get_contents('php://input'), true);
    $fullName = filter_var(trim($_POST["Name"]), FILTER_SANITIZE_STRING);
    $course = filter_var(trim($_POST["Course"]), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST["Address"]), FILTER_SANITIZE_STRING);
    $email = $_POST["Email"];
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $phone = $_POST["Phone_number"];
    $phone = filter_var(trim($phone), FILTER_SANITIZE_STRING);
    $fullName= explode(" ",$fullName);
    $firstName=$fullName[0];
    $middleName="";
    
     $message=['message'=>'Sucessful'];
        include 'afterwaecMail.php';
    
           // echo json_encode($message);
          //  header("Location: /");
          //  exit();
}
echo (json_encode($message));
exit();
