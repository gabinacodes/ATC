<?php
require_once "../config.php";
if (isset($_SESSION['username'])) {
    header('Location: ../workstation');
    exit();
}

if(isset(getallheaders()["Referer"])){
    $previousUrl = getallheaders()["Referer"];
}
else{
    $previousUrl = "";
}
if(preg_match("/workstation\//i", $previousUrl)){
    $_SESSION["workstationpaymentchain"] = 1;// if coming from payment page
}
if(preg_match("/getstarted/i", $previousUrl)){//coming from getstarted so tryingToLoginUrl is set
}
else{ //saves url trying to access login
    $_SESSION["tryingToLoginUrl"] = $previousUrl;//getting the previous location b4 login is attempted
}

unset($_SESSION['access_token']);
//$_SESSION = array(); it will flush session
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST["email"]);
    // Check if email is empty
    if(empty($email)){
        $email_err = "Please enter email.";
    }
    else{
        // Check if password is empty
        if(empty($_POST["password"])){
            $password_err = "Please enter your password.";
        }
        else{
            $password = $_POST["password"];

            // Validate credentials
            if(empty($email_err) && empty($password_err)){
                // Prepare a select statement
                $sql = "SELECT type, email, firstName, lastName, password FROM users WHERE email = ?";

                if($stmt = mysqli_prepare($con, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_email);

                    // Set parameters
                    $param_email = $email;

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                            /* store result */
                            mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            mysqli_stmt_bind_result($stmt, $type, $email, $firstName, $lastName, $hashed_password);// $changed $typee to $type in this section for consistency
                            /* fetch values */
                            if(mysqli_stmt_fetch($stmt)) {
                                if($type == "A"){
                                    $email_err = "'" . $email . "' please Create an Account for workstation";
                                }
                                elseif($type == "W"){
                                    if(password_verify($password, $hashed_password)){
                                        // Password is correct, Store data in session variables
                                        //$_SESSION["loggedin"] = true;
                                        $_SESSION["type"] = $type;
                                        $_SESSION["email"] = $email;
                                        $_SESSION["username"] = $firstName;
                                        $_SESSION["lastName"] = $lastName;
                                        // Close statement & connection
                                        mysqli_stmt_close($stmt);
                                        mysqli_close($con);
                                        // Redirect user to page before login
                                        // Redirect user to page before login
                                        if(!isset($_SESSION["tryingToLoginUrl"] )){ $_SESSION["tryingToLoginUrl"] = "../workstation";}
                                        header("location: " . $_SESSION["tryingToLoginUrl"]);
                                        exit();
                                    }
                                    else {
                                        $password_err = "invalid password";
                                    }
                                }
                            }
                        }
                        elseif(mysqli_stmt_num_rows($stmt) == 0){
                            // Display an error message if email doesn't exist
                            $email_err = " &nbsp <i><small  style='color:red';> No account found with that email. </small></i>";
                        }
                    }
                    else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
}
// Close statement & connection
mysqli_close($con);

include "../head.php";
?>

<title>Login</title>

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

<body>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=3700232813344627&autoLogAppEvents=1" nonce="bs7Xcanh"></script>
    <section id="loginpage">
        <section id="signuppagelogoandswitch">    <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>
            <br><br>
            <a href="workstation/login"> Sign in </a> or <a href="workstation/register">Create account
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

                    <a href="workstation/register">
                        CREATE AN ACCOUNT
                    </a>
                </div>
                <form class="font14" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="on">
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
