<?php
session_start();
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("location: /");
    exit();
}

$_SESSION["amount"] = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){ //getting values into session b4 going paystack
    if(!isset($_POST["amount"])){ //amount is not posted so do the ffg
        if($_POST["productName"] =="WBF"){
            if($_POST["productType"] =="daily"){
                $_SESSION["amount"] = 1000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="weekly"){
                $_SESSION["amount"] = 5000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="monthly"){
                $_SESSION["amount"] = 18000 * $_POST["productMultiple"];
            }
        }
        else if($_POST["productName"] == "WBO"){
            if($_POST["productType"] =="daily"){
                $_SESSION["amount"] = 3000 * $_POST["productMultiple"];

            }
            else if($_POST["productType"] =="weekly"){
                $_SESSION["amount"] = 15000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="monthly"){
                $_SESSION["amount"] = 60000 * $_POST["productMultiple"];
            }

        }
        else if($_POST["productName"] =="WHS" && isset($_POST["productMultiple"])){
            if($_POST["productType"] =="hourly"){
            $_SESSION["amount"] = 2500 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="daily"){
                $_SESSION["amount"] = 15000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="weekly"){
                $_SESSION["amount"] = 75000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="monthly"){
                $_SESSION["amount"] = 280000 * $_POST["productMultiple"];
            }
        }
        else if($_POST["productName"] =="WHE" && isset($_POST["productMultiple"])){
            if($_POST["productType"] =="hourly"){
            $_SESSION["amount"] = 3000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="daily"){
                $_SESSION["amount"] = 18000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="weekly"){
                $_SESSION["amount"] = 90000 * $_POST["productMultiple"];
            }
            else if($_POST["productType"] =="monthly"){
                $_SESSION["amount"] = 250000 * $_POST["productMultiple"];
            }
        }
        else if($_POST["productName"] =="WHD" && isset($_POST["productMultiple"])){
            $_SESSION["amount"] = 5000 * $_POST["productMultiple"];
        }
        else if($_POST["productName"] == "WMV"){
            $_SESSION["amount"] = 10000 * $_POST["productMultiple"];

        }
    }

    $_SESSION["productName"] = $_POST["productName"] ;
    $_SESSION["productType"] = $_POST["productType"] ;

}
echo $_SESSION["amount"];
?>

