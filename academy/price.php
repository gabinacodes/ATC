<?php
session_start();
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("location: /");
    exit();
}

$_SESSION["amount"] = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){ //getting values into session b4 going paystack
    if(isset($_POST["amount"])){
        $_SESSION["amount"] = $_POST["amount"];
    $_SESSION["productName"] = $_POST["productName"] ;
    $_SESSION["productType"] = $_POST["productType"] ;
    }

}
echo $_SESSION["amount"];
?>

