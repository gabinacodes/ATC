<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // transfers all mysql error to PHP for easy debugging

$host = "localhost"; /* Host name */
$user = "africde5_admin"; /* User*/
$password = "bb@ATC_HuB"; /* Password */
$dbname = "africde5_stem";

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
date_default_timezone_set('Europe/Paris');

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = '';
    $_POST = json_decode(file_get_contents('php://input'), true);
    // invoice generation made independent of platforms
    $email = strtolower(filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL));
    $payer = filter_var(trim($_POST["payer"]), FILTER_SANITIZE_STRING);
    $amount = filter_var(trim($_POST["amount"]), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST["address"]), FILTER_SANITIZE_STRING);
    $paymentDate = filter_var(trim($_POST["date"]), FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);
    $type = filter_var(trim($_POST["type"]), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

    // Validate email
    if (empty($email)) {
        $message = ['message' => "Please enter an email."];
    } else {
        // Prepare a select statement
        $sql = "INSERT INTO atcinvoice (email, payer,amount,address,paymentDate,description,type) VALUES (?,?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "sssssss",
                $email,
                $payer,
                $amount,
                $address,
                $paymentDate,
                $description,
                $type
            );

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $query = "SELECT `invoiceID`,`paymentDate` FROM `atcinvoice` WHERE (`email`,`paymentDate`) = (?,?) Order By `invoiceID` DESC";
                // $results = mysqli_query($con, $query);
                if ($stmt = mysqli_prepare($con, $query)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ss", $email, $paymentDate);
                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $ID, $payDate);
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) >= 1) {
                            mysqli_stmt_fetch($stmt);
                            $invoiceID = $ID;
                            $paymentDate = $payDate;
                            mysqli_stmt_close($stmt);
                            //get course category of students connected to the email
                            $query = "SELECT `fullName`,`course`,`guardName`,`guardAddress`,`guardTel` FROM `users` WHERE `guardEmail` = ?";
                            if ($stmt = mysqli_prepare($con, $query)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $email);
                                if (mysqli_stmt_execute($stmt)) {
                                    mysqli_stmt_bind_result($stmt, $fullName, $course, $guardName, $guardAddress, $guardTel);
                                    mysqli_stmt_store_result($stmt);
                                    //fetch all into array

                                    $payerEmail = $email; // $email defined from sendinvoice
                                    $paymentDateSplit = explode(" ", $paymentDate); //2021-07-25 19:30:00
                                    $date = str_replace('-', '/', $paymentDateSplit[0]);
                                    $time = $paymentDateSplit[1];
                                    $paymentDateSplit = explode("-", $paymentDate); //2021-07-25 19:30:00
                                    $paymentMonth = DateTime::createFromFormat('!m', $paymentDateSplit[1])->format('F');
                                    $tableRowsHTML = "";

                                    if (mysqli_stmt_num_rows($stmt) >= 1) { // exists as normal stem parent     
                                        $descriptionCleaned = explode(":", $description); //remove stem payment from
                                        $descriptionCleaned = explode(",", $descriptionCleaned[1]); //split into student names                                                                       
                                        while (mysqli_stmt_fetch($stmt)) {
                                            foreach ($descriptionCleaned as $kidName) {
                                                if (stripos($fullName, $kidName)) {
                                                    $kidCourseCost =
                                                        (($course === "discovery") ? "#5,000" : (($course === "discovery-lite") ? "#7,5000" : (($course === "Innovators") ? "#10,000" : "")));

                                                    $tableRowsHTML = "${tableRowsHTML} 
                                                <tr>
                                                <td>Payment for ${fullName}'s month of ${paymentMonth} stem Class</td>
                                                <td class='total'>#${kidCourseCost} : 00</td>
                                                </tr>";
                                                }
                                            }
                                        }
                                        if ($tableRowsHTML === "") {
                                            $tableRowsHTML = "
                                            <tr>
                                            <td>${description}</td>
                                            <td class='total'>#${amount} : 00</td>
                                            </tr>";
                                        }
                                    } else {
                                        $tableRowsHTML = "
                                        <tr>
                                        <td>${description}</td>
                                        <td class='total'>#${amount} : 00</td>
                                        </tr>";
                                    }
                                    include "makepdf.php";
                                    include "sendMail.php";
                                }
                            }
                        }
                    }
                }
                $message = ['message' => "successfully sent"];
            } else {
                $message = ['message' => "Something went wrong"];
            }
            // Close statement and connection

            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }
} else {
    header("Location: /");
}
echo json_encode($message);
exit();
