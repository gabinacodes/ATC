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
    $type = strtolower(filter_var(trim($_POST["paymentType"]), FILTER_SANITIZE_STRING));
    $message = ['message' => ''];
    $email = strtolower(filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL));
    $payer = filter_var(trim($_POST["payer"]), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST["address"]), FILTER_SANITIZE_STRING);
    $paymentDate = filter_var(trim($_POST["paymentDate"]), FILTER_SANITIZE_STRING);
    $paymentTime = filter_var(trim($_POST["paymentTime"]), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST["adminPassword"]), FILTER_SANITIZE_STRING);
    $from = "${type}@atc.com.ng"; // info shud be sent as type if not SAW
    $details = $_POST["details"]; //sanitizing makes it incompatible with json_decode
    /* For upfrontPayment */
    $upfrontPayment = filter_var(trim($_POST["upfrontPayment"]), FILTER_SANITIZE_STRING);
    $unclearedBalance = filter_var(trim($_POST["unclearedBalance"]), FILTER_SANITIZE_STRING);
    $dueDate = filter_var(trim($_POST["dueDate"]), FILTER_SANITIZE_STRING);
    $dueTime = filter_var(trim($_POST["dueTime"]), FILTER_SANITIZE_STRING);
    $mailSubject = filter_var(trim($_POST["mailSubject"]), FILTER_SANITIZE_STRING);
    $CcEmail = filter_var(trim($_POST["CcEmail"]), FILTER_SANITIZE_STRING);
    $CcEmail = explode(",", $CcEmail); //emails to be copied
    $descriptions = $details;
    $details = json_decode($details, true);
    //$amount = array();
    //$description = [];
    $GrandTotal = 0.00;
    $tableRowsHTML = "";
    function clean($variable,$format=0){
        $variable = preg_replace("/[^0-9:.]/", "",$variable);
        $variable = str_replace(':', '.', $variable);
        if($format==0){// not amt
        $variable = number_format($variable, 2, ':', ',');
        }
        return $variable;
    }
    
    $upfrontPayment = $upfrontPayment!==""?clean($upfrontPayment):"";
    $unclearedBalance = $unclearedBalance!==""?clean($unclearedBalance):"";


    /* Make an array to loop through the payment description */
    foreach ($details as $key => $value) {
        $amt = $value['amount']!==""?clean($value['amount'],1):"";
        $GrandTotal += $amt;
        $amt= number_format($amt, 2, ':', ',');
        $desc = $value['description'];
        $tableRowsHTML .= "<tr>
        <td style='width:75%'>${desc} </td>
        <td style='text-align:right;'> ${amt} </td>
        </tr>";
    }
    

    // Validate email
    if (empty($email)) {
        $message = ['message' => "Please enter an email."];
    } elseif (!is_numeric($GrandTotal)) {
        $message = ['message' => "Only digits are allowed as amount"];
    } elseif ($password !== "Accounting2004") {
        $message = ['message' => "Please check your password."];
    } else {
        $GrandTotal= number_format($GrandTotal, 2, ':', ',');
    $tableRowsHTML .= "
<tr id='tfoot'>
<td id='grand' style='width:75%'>
  <strong>
    Grand Total
  </strong>
</td>
<td class='total' style='text-align:right;'>
  <strong>${GrandTotal}</strong>
</td>
</tr>
";
        // Prepare a select statement
        $sql = "INSERT INTO atcinvoice (email,payer,amount,address,paymentDate,paymentTime,description,type,upfrontPayment,unclearedBalance,dueDate,dueTime) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssssssss",
                $email,
                $payer,
                $GrandTotal,
                $address,
                $paymentDate,
                $paymentTime,
                $descriptions,
                $type,
                $upfrontPayment,
                $unclearedBalance,
                $dueDate,
                $dueTime
            );

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $query = "SELECT `invoiceID`,`timeOfCreation` FROM `atcinvoice` WHERE (`email`,`paymentDate`,`paymentTime`) = (?,?,?) Order By `invoiceID` DESC";
                // $results = mysqli_query($con, $query);
                if ($stmt = mysqli_prepare($con, $query)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sss", $email, $paymentDate, $paymentTime);
                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $ID,$timeOfCreation);
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) >= 1) {
                            mysqli_stmt_fetch($stmt);
                            $invoiceID = $ID;
                            $timeOfCreation=$timeOfCreation;
                            switch ($type) {
                                case 'academy':
                                    $invoice = 'CHT';
                                    break;
                                case 'stem':
                                    $invoice = 'STM';
                                    break;
                                case 'workstation':
                                    $invoice = 'WSN';
                                    break;
                                default:
                                    $invoice = 'INF';
                                    break;
                            }
                            $invoiceID = str_pad($invoiceID, 6, "0", STR_PAD_LEFT);
                            $invoiceID = "${invoice}${invoiceID}"; // make it show
                            mysqli_stmt_close($stmt);
                            $paymentDateSplit = explode("-", $paymentDate); //2021-07-25
        $paymentDate = $paymentDateSplit[2] . "/" . $paymentDateSplit[1] . "/" . $paymentDateSplit[0];
        $paymentMonth = DateTime::createFromFormat('!m', $paymentDateSplit[1])->format('F');
        $paymentDateSplit = explode("-", $dueDate); //2021-07-25
        $dueDate = isset($paymentDateSplit[2]) ? $paymentDateSplit[2] . "/" . $paymentDateSplit[1] . "/" . $paymentDateSplit[0] : '';

                             $upfrontPayment = $upfrontPayment !== '' ? " Upfront payment:<span style='text-align: right;'>&nbsp; N{$upfrontPayment}&nbsp;</span> " : '';
        $unclearedBalance = $unclearedBalance !== '' ? "Amount to be balanced:<span>&nbsp; N{$unclearedBalance}&nbsp;</span>" : '';
        $dueDate = $dueDate !== '//' ? "Due date: <span>&nbsp; {$dueDate}&nbsp;</span>" : '';

                            include "makepdf.php";
                            include "sendInvoiceMail.php";
                        }
                    }
                }
                $message = ['message' => "Successfully sent"];
            } else {
                $message = ['message' => "Something went wrong"];
            }
            // Close statement and connection
           mysqli_close($con);
        }
    }
} else {
    header("Location: /");
}
echo json_encode($message);
exit();
