<?php
if (!preg_match("/register/i", getallheaders()["Referer"])) {
    header("Location: /");
    exit();
}

include "head.php";
?>

<title>Registration Successful</title>

<body oncontextmenu="return true;">
    <style>
        body {
            background-image: url("pics/signuppage.svg");
            background-color: #1207AB;
            background-position: center center;
            width: 100vw;
            height: 100vh;
            color: white;
            overflow: hidden;
            padding: 0;
        }

        .signup {
            width: 50vw;
            height: auto;
            margin: 30vh auto;
            position: static;

        }

        #signupbody {
            font-size: 16px;

        }

        #signupheader {
            text-align: center;
            font-size: 22px;
        }

        @media only screen and (max-width:500px) {
            .signup {
                width: 90vw;
                margin: 20vh auto;
            }
        }
    </style>

    <section id="signuppage">
        <section id="signuppagelogoandswitch"> <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>

        </section>

        <section class="signup">
            <div id="signupheader">
                Registration Successful!
                <br>
                <a href="//stem.atc.com.ng/payment" class="modalfooter" style="color:#fff;font-size:13px;">
                    Please kindly click to make payment
                </a>
            </div>
        </section>

        <section id="signuppageaboutatc">
            <a href="support/about"> About ATC
            </a>
        </section>
    </section>
</body>

</html>