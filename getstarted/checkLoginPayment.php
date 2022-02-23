<?php
session_start();
if($_SERVER["REQUEST_METHOD"] != "POST"){
   header("location: /");
   exit();
}

$clientInfo = [];

if (isset($_SESSION["username"])){
    $clientInfo[0] = $_SESSION["email"];
    $clientInfo[1] = $_SESSION["username"];
    $clientInfo[2] = $_SESSION["type"];
}
if (isset($_SESSION["amount"])){
    $clientInfo[3] = $_SESSION["amount"];
    $clientInfo[4] = $_SESSION["productName"];
    $clientInfo[5] = $_SESSION["productType"];
    unset($_SESSION["amount"]);
    unset($_SESSION["productName"]);
    unset($_SESSION["productType"]);
}
echo json_encode($clientInfo);

?>
