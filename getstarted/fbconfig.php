<?php
require_once "Facebook/autoload.php";

    $FB = new \Facebook\Facebook([
        'app_id' => '2803526699971549',
        'app_secret' => 'b2c68b62bcf2b089652152a4ebab0519',
        'default_graph_version' => 'v2.10'
    ]);

    $helper = $FB->getRedirectLoginHelper();
//$redirectURL = "http://localhost/africatrainovationconsulting.com/getstarted/fb-callback.php";
$redirectURL = "https://atc.com.ng.com/getstarted/fb-callback.php";
$permissions = ['email'];
$loginURL = $helper->getLoginUrl($redirectURL, $permissions);

?>
