<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
$url ="/"; // redirects anyone trying to access this url using url input
if(isset(getallheaders()["Referer"])){
    $url = getallheaders()["Referer"];
}
//echo "<script>window.open('index.php','_self')</script>";
header("location: " .$url);
exit;
?>
