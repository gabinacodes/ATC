<?php
session_start();
require_once "fbconfig.php";

    try {
        $accessToken = $helper->getAccessToken();
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo "Response Exception: " . $e->getMessage();
        exit();
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        echo "SDK Exception: " . $e->getMessage();
        exit();
    }

    if (!$accessToken) {
        header('Location: login.php');
        exit();
    }

    $oAuth2Client = $FB->getOAuth2Client();
    if (!$accessToken->isLongLived())
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

    $response = $FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
    $userData = $response->getGraphNode()->asArray();
    $_SESSION['userData'] = $userData;
    $_SESSION['access_token'] = (string) $accessToken;
    $_SESSION['email'] = $_SESSION['userData']['email'];
$_SESSION['lastName'] = $_SESSION['userData']['last_name'];
$_SESSION['firstName'] = $_SESSION['userData']['first_name'];
$_SESSION['username']=$_SESSION['firstName'];



header('Location: fbandgsignup.php');
exit();
?>
