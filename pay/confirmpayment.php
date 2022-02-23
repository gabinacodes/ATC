<?php
include "../config.php";
// add a function to get the url trying to access or send in info
//handle duplicate key error for reference i.e nobody should be able to just duplicate info sent
// get details of someone trying to enter through backdoor

$amount= $productName= $productType= $reference= $email= "";
if($_SERVER["REQUEST_METHOD"] === "POST"){    
    $_POST = json_decode(file_get_contents('php://input'), true);
    $email = $_POST["email"];
        $amount = $_POST["amount"];
        $email = $_POST["payerEmail"];
        $productName = $_POST["paymentReference"];
        $productType = $_POST["paymentReference"];
        $reference = $_POST["transactionReference"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $amount = filter_var( $amount, FILTER_SANITIZE_NUMBER_FLOAT);
        $productName = filter_var($productName, FILTER_SANITIZE_STRING);
        $productType = filter_var($productType, FILTER_SANITIZE_STRING);
        $reference = filter_var($reference, FILTER_SANITIZE_STRING);

        // Check input errors before inserting in database
        if(!empty($amount) && !empty($productType) && !empty($productName)&& !empty($reference)){
            // Prepare an insert statement
            if ($productType=="online" || $productType=="offline"){ // i.e. academy payment
            $us = "academy@atc.com.ng";
            $subject="ATC Academy - Payment for $productName";
                $sql = "INSERT Into academypaymentinfo (amount, productType, email, productName, reference) values(?, ?, ?, ?, ?)";
                if($stmt = mysqli_prepare($con, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt,"sssss", $param_amount, $param_productType, $param_email, $param_productName, $param_reference);
                }    
            }
            else{
//define validity  here
$units = "1"; //$_POST["productMultiple"] ;
$validity = "1d";
//$validity = $units . (strtolower($productType[0]) == "h" ? "d" : strtolower($productType[0])); // gives the duration of the password to be given

                include "loginmessage.php";// sends login details to customer
                            $subject="ATC Workstation - Payment for $productName";
                            $us = "workstation@atc.com.ng";

                $sql = "INSERT Into workstationpaymentinfo (amount, productType, email, productName, paymentMethod, units, reference) values(?, ?, ?, ?, ?, ?, ?)";
            if($stmt = mysqli_prepare($con, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt,"sssssss", $param_amount, $param_productType, $param_email, $param_productName, $param_pMethod, $param_units, $param_reference);
           $param_units = $units;           
            $param_pMethod = $_POST["paymentMethod"];        //paystack or direct transfer              

            }
        }
                // Set parameters
                $param_amount = $amount;
                $param_email = strtolower($email);
                $param_productType = strtoupper($productType);
                $param_productName = strtoupper($productName);
                $param_reference = $reference;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    include "paymentmessage.php";
                }
                else{
                    echo "Something went wrong. Please try again later.";
                }
            }        
    }
   
// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($con);
exit();
?>
