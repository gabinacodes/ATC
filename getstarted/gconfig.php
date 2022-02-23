<?php
require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
$gClient->setClientId("853422892167-resi3p5lna0gd2s117mh6m5umfj9fjk6.apps.googleusercontent.com");
$gClient->setClientSecret("UYkJ0K9HLr1qgDQ65g6k3ZuZ");
$gClient->setApplicationName("Africa Trainovation Consulting");
    $gClient->setRedirectUri("https://atc.com.ng/getstarted/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$gloginURL = $gClient->createAuthUrl();

?>
