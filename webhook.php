<?php

use Mpdf\Tag\Details;

session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // transfers all mysql error to PHP for easy debugging

$host = "localhost"; /* Host name */
$user = "africde5_admin"; /* User*/
$password = "bb@ATC_HuB"; /* Password */
$dbname = "africde5_studentCourseInfo";

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
date_default_timezone_set('Europe/Paris');

// Processing form data when form is submitted
// invoice generation made independent of platforms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST = json_decode(file_get_contents('php://input'), true);
    $payer = filter_var(trim($_POST["Full_Name"]), FILTER_SANITIZE_STRING);
        // Prepare a select statement
        $sql = "INSERT INTO webhook (email) VALUES (?)";
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"s",$payer);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
            
            // Close statement and connection
           mysqli_close($con);
        }
    }
} else {
    header("Location: /");
}
echo json_encode($message);
exit();
