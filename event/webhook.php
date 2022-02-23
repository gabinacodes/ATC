<?php

use Mpdf\Tag\Details;

session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // transfers all mysql error to PHP for easy debugging

date_default_timezone_set('Europe/Paris');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST = json_decode(file_get_contents('php://input'), true);
    $firstName = filter_var(trim($_POST["Full_Name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
        // Prepare a select statement
       include "eventMail.php";
} else {
    header("Location: /");
}
echo json_encode($message);
exit();
