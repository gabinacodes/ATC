<?php
include "config.php";
/*
if(!isset($_SESSION['email']) || $_SESSION['email'] != 'wuraayotunde@gmail.com'){
#header('location: /');
 #   exit();
}
*/
include "head.php";
?>

<title>Internet</title>
<body>

<style>
body{
background-image: url("pics/loginpage.svg");
background-color: #1207AB;
background-position: center center;
width: 100vw;
height: 100vh;
color: white;
overflow: hidden;
}
    .atcdropbutn .select{
        width: 100%;
    }
</style>

<section id="loginpage">
<section id="signuppagelogoandswitch">    <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>
</section>

<section class="login">
<div id="signupheader">
Please enter customer's email, select payment duration then admin password.
</div>
<div id="signupbody">
    <form class="font14" action="loginmessage.php" method="post" autocomplete="on">
<div>
<label for="email">
Email address *
<input type="email" name="email" value="" id="email" class="block ninethwidth" size="10" maxlength="50" required />
    </label>
</div>
<div>
<label for="type">

    type *    <div class="atcdropbutn">
        <div class="select">
            <select name="workstationpackagemode" id="wpackagemode">
     <option value="1d">1 day</option>
     <option value="2d">2 days</option>
     <option value="3d">3 days</option>
     <option value="4d">4 days</option>
     <option value="5d">5 days</option>
     <option value="1w">1 week</option>
     <option value="2w">2 weeks</option>
     <option value="3w">3 weeks</option>
     <option value="1m">1 month</option>
                   </select>
        </div>
    </div>
        </label>
</div>
<div>
<label for="password">
Password *
<input type="password" name="password" value="" id="password" class="block ninethwidth" size="10" maxlength="50" required />
    </label>
</div>

<div>
<div class="inlineblock ">
<button value="submit">
Send
</button>

</div>
</div>
</form>

<div id="signupstatement" style="display:none">
Protected by recaptcha and subject to the google privacy policy
and terms of service.
</div>

</div>
</section>

<section id="signuppageaboutatc">
<a href="support/about"> About ATC
</a>
</section>
</section>
</body>

</html>
