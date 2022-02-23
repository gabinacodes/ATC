<?php
// Include config file
require "../config.php";
if (isset($_SESSION['username'])) {
    header('Location: ../');
    exit();
}
// Define variables and initialize with empty values
$success = $firstName = $password = $confirmPassword = $email = $lastName = $contactMe = "";
$firstName_err = $password_err = $confirmPassword_err = $email_err = $lastName_err = $contactMe_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = trim($_POST['email']);
       if ($_POST['contactMe'] != 'agreed') {$contactMe = "no";} else{$contactMe ="yes";}

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $firstName = filter_var( $firstName, FILTER_SANITIZE_STRING);
        $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $confirmPassword = filter_var($confirmPassword, FILTER_SANITIZE_STRING);
        $type = "A";// academy registration
        // Validate email
        if(empty($email)){
            $email_err = "Please enter an email.";
        }
        else{
        // Validate password
        if(empty($password)){
            $password_err = "Please enter a password.";
        }
        elseif(strlen($password) < 8){
            $password_err = "Password must have atleast 8 characters.";
        }
        else{
        // Validate confirm password
        if(empty($confirmPassword)){
            $confirmPassword_err = "Please confirm password.";
        }
        elseif(empty($password_err) && ($password != $confirmPassword)){
            $confirmPassword_err = "Password did not match.";
        }

        elseif(!empty($email) && (empty($confirmPassword_err))) {

        // Set parameters
        $param_firstName = ucfirst(strtolower($firstName));
        $param_email = strtolower($email);
        $param_lastName = ucfirst(strtolower($lastName));
        $param_contactMe = $contactMe;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        $param_type=$type;

            // Prepare a select statement
            $sql = "SELECT type FROM users WHERE email = ?";

            if($stmt = mysqli_prepare($con, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        /* fetch values */
                    mysqli_stmt_bind_result($stmt, $type);// $changed $typee to $type in this section for consistency
                        if(mysqli_stmt_fetch($stmt)) {
                            if($type == "A"){
                                $email_err = "'" . $email . "' has been registered with us. Please login";
                            }
                            elseif($type == "W" || $type == "S"){
                                //already created account just update it
                                $sql = "UPDATE users SET contactMe='" . $param_contactMe . "' password='" . $param_password . "' WHERE email='" . $param_email . "' " ;
                                if (mysqli_query($con, $sql)) {
                                    $success= "successful";
                                    $_SESSION["type"] = "S"; // $type=S shows yes for both A &W
                                    $_SESSION["email"] = $param_email;
                                    $_SESSION["username"] = $param_firstName;
                                    // Close statement & connection
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($con);
                                    // Redirect user to page before login
                                    if(!isset($_SESSION["tryingToLoginUrl"] )){ $_SESSION["tryingToLoginUrl"] = "../academy";}
                                    header("location: " . $_SESSION["tryingToLoginUrl"]);
                                    exit();
                                }
                                else {
                                    $success = "Error updating record: " . mysqli_error($conn);
                                }
                            }
                        }
                    }
                    elseif(mysqli_stmt_num_rows($stmt) == 0) {
                        //new user insert data
                        // Check input errors before inserting in database
                        if(empty($email_err) && empty($confirmPassword_err)){
                            // Prepare an insert statement
                            $sql = "INSERT Into users (type, email, firstName, lastName, password, contactMe) values(?, ?, ?, ?, ?, ?)";

                            if($stmt = mysqli_prepare($con, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt,"ssssss", $param_type, $param_email, $param_firstName, $param_lastName, $param_password, $param_contactMe);

                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    // Redirect to login page or homepage
                                    $_SESSION["type"] = $param_type;
                                    $_SESSION["email"] = $param_email;
                                    $_SESSION["username"] = $param_firstName;
                                    // Close statement & connection
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($con);
                                    if(!isset($_SESSION["tryingToLoginUrl"] )){ $_SESSION["tryingToLoginUrl"] = "../academy";}
                                    header("location: " . $_SESSION["tryingToLoginUrl"]);
                                    exit();
                                }
                                else{
                                    echo "Something went wrong. Please try again later.";
                                }
                            }

                            }
                        }
                    }
                mysqli_stmt_close($stmt);
            }
            else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

            }

        }
        }
    }
}
// Close statement and connection
mysqli_close($con);

include "../head.php";
include "fbconfig.php";
include "gconfig.php";
?>

<title>Signup</title>

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

</style>

    <section id="signuppage">
        <section id="signuppagelogoandswitch"> <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>
            <br><br>
            <a href="getstarted/"> Sign in </a> or <a href="getstarted/signup">Create account
            </a>
        </section>

        <section class="signup">
            <div id="signupheader">
                For your protection, please verify your identity.
            </div>
            <div id="signupbody">
                <div class="font22">
                    CREATE AN ACCOUNT
                </div>
                <div class="font16">
                    Already have an account?

                    <a href="getstarted/">LOG IN
                    </a>
                </div>
                <form class="font14" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" validate autocomplete="on">
                    <div>
                        Email address *
                        <input type="email" class="block fullwidth" size="10" maxlength="50" value="<?php echo $email; ?>" name="email" required>
                        <?php echo (!empty($email_err) && !empty($email)) ? '&nbsp <b><small  style="color:red";>'. $email_err .' </small></b>' : ''; ?>
                    </div>
                    <div class="signupbodycontactnames">
                        <span>
                            <div>First name <sup>*</sup></div>
                            <input type="text" value="" name="firstName" pattern="([a-zA-Z \'\.\-]){3,100}" required />
                        </span>
                        <span>
                            <div>last name <sup>*</sup></div>
                            <input type="text" value="" name="lastName" pattern="([a-zA-Z \'\.\-]){3,100}" required />
                        </span>
                    </div>
                    <div>
                        <div>Password <sup>*</sup></div>
                        <input id="password" type="password" name="password" class="fullwidth" required />
                        <?php echo (!empty($password_err) && !empty($password)) ? '&nbsp <b><small  style="color:red";>'. $password_err .' </small></b>' : ''; ?>
                        <span id="text">WARNING! Caps lock is ON.</span>
                    </div>
                    <div>
                        <div>Confirm Password <sup>*</sup></div>
                        <input id="confirmPassword" type="password" name="confirmPassword" class="fullwidth" required />
                        <?php echo (!empty($confirmPassword_err) && !empty($confirmPassword)) ? '&nbsp <b><small  style="color:red";>'. $confirmPassword_err .' </small></b>' : ''; ?>
                        <span id="text">WARNING! Caps lock is ON.</span>
                    </div>

                    <div id="signupstatement">
                        By clicking create account, I agree that I have read and accepted the
                        <a href="legal/terms">
                            terms of use and privacy policy.
                        </a>
                    </div>
                    <div>
                        <input name="contactMe" id="contact" type="checkbox" value="agreed">
                        <label for="contact">
                            Pls contact me via email</label>

                    </div>
                    <button name="submit" value="submit" style="margin:1vh auto 2.5vh;display:block; padding:10px;">
                        Create Account
                    </button>
                </form>
                <div style="text-align:center;">Or</div>
                <div id="continuewith">

                    <a id="continuewithgoogle" onclick="window.location = '<?php echo $gloginURL ?>';">
                        Continue With Google
                    </a>

                    <a id="continuewithfacebook" onclick="window.location = '<?php echo $loginURL ?>';">
                        Continue With Facebook
                    </a>
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
