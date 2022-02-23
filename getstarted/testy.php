<?php
require "../config.php";
if (isset($_SESSION['username'])) {
    header('Location: ../academy');
    exit();
}
if(isset(getallheaders()["Referer"])){
    $previousUrl = getallheaders()["Referer"];
}
else{
    $previousUrl = "";
}
if(preg_match("/workstation/i", $previousUrl)){
    header('Location: ../workstation/login');
    exit();
}


if(preg_match("/select/i", $previousUrl)){
    $_SESSION["academypaymentchain"] = 1;// if coming from payment page
}
if(preg_match("/getstarted/i", $previousUrl)){
}
else{ //saves url trying to access login
    $_SESSION["tryingToLoginUrl"] = $previousUrl;//getting the previous location b4 login is attempted
}

unset($_SESSION['access_token']);
//$_SESSION = array();

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty($_POST["password"])){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password"];
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT type, email, firstName,lastName, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $type, $email, $firstName,$lastName, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, Store data in session variables
                            //$_SESSION["loggedin"] = true;
                            session_start();
                            $_SESSION["type"] = $type;
                            $_SESSION["email"] = $email;
                            $_SESSION["username"] = $firstName;
                            $_SESSION["lastName"] = $lastName;

                            // Close statement & connection
                            mysqli_stmt_close($stmt);
                            mysqli_close($con);
                            // Redirect user to page before login
                            if(!isset($_SESSION["tryingToLoginUrl"] )){ $_SESSION["tryingToLoginUrl"] = "../academy";}
                            header("location: " . $_SESSION["tryingToLoginUrl"]);
                            exit();
                        }
                        else{
                            // Display an error message if password is not valid
                            $password_err = "invalid password";
                        }
                    }
                }
                else{
                    // Display an error message if email doesn't exist
                    $email_err = " &nbsp <i><small  style='color:red';> No account found with that email. </small></i>";
                }
            }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement & connection
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($con);
}


include "../head.php";
include "fbconfig.php";
include "gconfig.php";
?>

<title>Login</title>
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
        padding: 0;
    }
</style>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=3700232813344627&autoLogAppEvents=1" nonce="bs7Xcanh"></script>
    <section id="loginpage">
        <section id="signuppagelogoandswitch">    <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>
            <br><br>
            <a href="getstarted/"> Sign in </a> or <a href="getstarted/signup">Create account
            </a>
        </section>

        <section class="login">
            <div id="signupheader">
                For your protection, please verify your identity.
            </div>
            <div id="signupbody">
                <div class= "font22">
                    SIGN IN
                </div>
                <div class="font16">
                    NEW USER?

                    <a href="getstarted/signup">
                        CREATE AN ACCOUNT
                    </a>
                </div>
                <form class="font14" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="on">
                    <div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
                        Email address *
                        <input type="email" name="email" value="<?php echo $email; ?>" class="block ninethwidth" size="10" maxlength="50" required />
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div>
                    <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                        Password *
                        <input id="password" type="password" name="password" class="block ninethwidth" required />
                        <i class="far fa-eye" id="togglePassword"></i>
                        <?php echo '<span class="help-block" style="color:red;">' . $password_err . '</span>';?>
                        <span id="text">WARNING! Caps lock is ON.</span>
                    </div>
                    <div>
                        <div class="seventhwidth inlineblock" style="font-size:14px;">
                        <a href="getstarted/forgotpassword">
                        Forgot password?
                        </a>
                        </div>
                        <div class="inlineblock ">
                            <button value="submit">
                                Login
                            </button>

                        </div>
                    </div>
                </form>
                <div style="text-align:center;">Or</div>
                
<div id="credential_picker_container" style="position: fixed; z-index: 1001; height: 183px;">
<iframe src="https://accounts.google.com/gsi/iframe/select?client_id=853422892167-resi3p5lna0gd2s117mh6m5umfj9fjk6.apps.googleusercontent.com&amp;ux_mode=popup&amp;ui_mode=card&amp;context=signup&amp;channel_id=09d94e0e1139c93836369e745ddaff7479f968b25e978946d651ba460f50fecf&amp;origin=https%3A%2F%2Fwww.africatrainovationconsulting.com&amp;as=7oH9GA9GA20hrpnEosp4OA" style="height: 183px; width: 201px; overflow: visible;"></iframe>  
                </div>
                <!--div class="fb-login-button" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="true" data-width=""></div-->

                <div id="signupstatement" style="display:none">
                    Protected by recaptcha and subject to the google privacy policy
                    and terms of service.
                </div>

            </div>
        </section>

        
    </section>
</body>

</html>
