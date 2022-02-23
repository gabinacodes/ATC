<?php include "../shead.php"?>
<?php
    // Functions to filter user inputs
    function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);

    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);

    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}

// Define variables and initialize with empty values
$firstName = $lastName = $emailErr = $messageErr = "";
$firstName = $lastName = $email = $subject = $message = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate user name
    if(empty($_POST["firstName"])){
        $nameErr = "Please enter your firstname.";
    } else{
        $name = filterName($_POST["firstName"]);
        if($name == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }
    if(empty($_POST["lastName"])){
        $nameErr = "Please enter your lastname.";
    } else{
        $name = filterName($_POST["lastName"]);
        if($name == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }

    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
    }

    // Validate message subject
    if(empty($_POST["subject"])){
        $subject = "contacting ATC";
    } else{
        $subject = filterString($_POST["subject"]);
    }

    // Validate user comment
    if(empty($_POST["message"])){
        $messageErr = "Please enter your comment.";
    } else{
        $message = filterString($_POST["message"]);
        if($message == FALSE){
            $messageErr = "Please enter a valid comment.";
        }
    }

    // Check input errors before sending email
    if(empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($messageErr)){
        // Recipient email address
        $to = "support@africatrainovationconsulting.com";

        // Create email headers
        $headers = 'From: '. $email . "\r\n" .
            'Reply-To: '. $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Sending email
        if(mail($to, $subject, $message, $headers)){

        } else{
            echo '<p class="error">Unable to send email. Please try again!</p>';
        }
    }
}
?>

<title>Contact</title>
<?php include "../header.php"?>

    <div class="contactatc">
        <img src="pics/contact1.png" alt="contactpage">
        <div>
            <div> How can we help?
            </div>
            <div>
                get in touch with us
            </div>
        </div>
    </div>
    <section id="contactatcbody">
        <div id="contactform">
            <div>
                MESSAGE US
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype=”multipart/form-data” name=”EmailForm”>
                <div>
                    <span>
                        <div>First name <sup> *</sup></div>
                        <input class="contactradius" type="text"
                            value="<?php if(isset($_SESSION["username"]))
                                echo $_SESSION["username"];?>"  name="firstName" required />
                    </span>
                    <span>
                        <div>last name <sup> *</sup></div>
                        <input class="contactradius" type="text" value="" name="lastName" required />
                    </span>

                    <span>
                        <div>Email address <sup> *</sup></div>
                        <input class="contactradius" type="email" size="" maxlength="50" value='<?php echo (isset($_SESSION["email"])) ? $_SESSION["email"] : ""; ?>' name="email" required autocomplete>
                    </span>
                </div>
                <textarea name="message" value="" required>

                </textarea>

                <button>Send</button>
                <?php
                if(!empty($_POST["message"])){
                    if(mail($to, $subject, $message, $headers)){
                        echo '<p class="success">Your message has been sent successfully!</p>'; }
                    else{
                        echo '<p class="error">Unable to send email. Please try again!</p>';}
                }
                ?>
            </form>
        </div>
        <div id="atcmap">
            <div>LOCATE OUR OFFICE</div>
            <span>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15835.421467390252!2d3.3787787!3d7.1427183!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7acce266df150aff!2sAFRICA%20TRAINOVATION%20CONSULTING!5e0!3m2!1sen!2sng!4v1601870871670!5m2!1sen!2sng" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </span>
        </div>
    </section>

    <?php include "../footer.php"?>

