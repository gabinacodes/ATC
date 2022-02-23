<?php
// Include config file

require "../config.php";
if (isset($_SESSION['username']) && $_SESSION['type'] != "A") {
    header('Location: ../workstation');
    exit();
}

// Define variables and initialize with empty values
$firstName = $lastName = $email = $password = $phone = $homeAddress = $occupation = $convicted= $workstationuser= $workstationusernumber= $purpose = $myphoto = "";
$firstName_err =$lastName_err = $password_err = $phone_err = $email_err = $homeAddress_err = $occupation_err = $convicted_err= $workstationuser_err= $workstationusernumber_err= $purpose_err = $myphoto_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $firstName = ucfirst(strtolower(trim($_POST['firstName'])));
        $lastName = ucfirst(strtolower(trim($_POST['lastName'])));
        $email = strtolower(trim($_POST['email']));
        $password = $_POST['password'];
        $phone = ucfirst(strtolower(trim($_POST['phone'])));
        $homeAddress = $_POST['homeAddress'];
        $occupation = ucfirst(strtolower(trim($_POST['occupation'])));
        $convicted = trim($_POST['convicted']);
        $workstationuser = trim($_POST['workstationuser']);
        $workstationusernumber = trim($_POST['workstationusernumber']);
        $purpose = ucfirst(strtolower(trim($_POST['purpose'])));

        $firstName = filter_var( $firstName, FILTER_SANITIZE_STRING);
        $lastName = filter_var( $lastName, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $homeAddress = filter_var($homeAddress, FILTER_SANITIZE_STRING);
        $occupation = filter_var($occupation, FILTER_SANITIZE_STRING);
        $convicted = filter_var($convicted, FILTER_SANITIZE_STRING);
        $workstationuser = filter_var($workstationuser, FILTER_SANITIZE_STRING);
        $workstationusernumber = filter_var($workstationusernumber, FILTER_SANITIZE_STRING);
        $purpose = filter_var($purpose, FILTER_SANITIZE_STRING);
        $type = "W";


        // Validate email
        if(empty($email)){
            $email_err = "Please enter a email.";
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
                if(isset($_FILES['myphoto'])){
                    // Uploads files
                    // name of the uploaded file
                    $filename = $_FILES['myphoto']['name'];
                    // get the file extension
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $imageUrl = 'uploads/' . $email ."." . $extension;
                    // destination of the file on the server
                    $destination = $imageUrl;
                    // the physical file on a temporary uploads directory on the server
                    $file = $_FILES['myphoto']['tmp_name'];
                    $size = $_FILES['myphoto']['size'];
                    if(empty($_FILES['myphoto']['name'])){
                        $myphoto_err = "Please add your picture";
                    }
                    elseif (!in_array($extension, ['jpeg', 'jpg', 'png'])) {
                        $myphoto_err =  "file extension must be .jpeg, .jpg or .png";
                    }
                    elseif ($_FILES['myphoto']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
                        $myphoto_err = "File too large! must be less than 1MB";
                    }
                    else{
                        // Set parameters
                        $param_firstName = ucfirst(strtolower($firstName));
                        $param_lastName = ucfirst(strtolower($lastName));
                        $param_phone = $phone;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                        $param_email = strtolower($email);
                        $param_homeAddress = ucfirst(strtolower($homeAddress));
                        $param_occupation = ucfirst(strtolower($occupation));
                        $param_convicted = ucfirst(strtolower($convicted));
                        if($param_convicted === "No"){$param_convicted= 0;} else{$param_convicted= 1;} // no conviction
                        $param_workstationuser = ucfirst(strtolower($workstationuser));
                        $param_workstationusernumber = ucfirst(strtolower($workstationusernumber));
                        $param_purpose = ucfirst(strtolower($purpose));
                        $param_imageUrl= strtolower($imageUrl);
                        $param_type = $type;

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
                                    mysqli_stmt_bind_result($stmt, $type);// $changed $typee to $type in this section for consistency
                                    /* fetch values */
                                    if(mysqli_stmt_fetch($stmt)) {
                                        if($type == "A"){    //already created account just update it
                                            $sql = "UPDATE users SET type='" . "S" .
                                                "' phone='" . $param_phone .
                                                "' homeAddress='" . $param_homeAddress .
                                                "' occupation='" . $param_occupation .
                                                "' convicted='" . $param_convicted .
                                                "' workstationuser='" . $param_workstationuser .
                                                "' workstationusernumber='" . $param_workstationusernumber .
                                                "' purpose='" . $param_purpose . "' ";
                                            if (mysqli_query($con, $sql)) {
                                                if (move_uploaded_file($file, $destination)) {
                                                    $success= "successful";
                                                    $_SESSION["type"] = "S"; //meaning customer has put in details for both A & W now.
                                                    $_SESSION["email"] = $param_email;
                                                    $_SESSION["username"] = $param_firstName;// still need to upload the files after == 0
                                                    $_SESSION["lastName"] = $param_lastName;// still need to upload the files after == 0
                                                    // Redirect user to page before login
                                                    if(!isset($_SESSION["tryingToLoginUrl"] )){ $_SESSION["tryingToLoginUrl"] = "../workstation";}
                                                    header("location: " . $_SESSION["tryingToLoginUrl"]);
                                                    exit();
                                                }
                                            }
                                            else {
                                                $success = "Error updating record: " . mysqli_error($conn);
                                            }
                                        }
                                        elseif($type == "W"){
                                            $email_err = $email . " already registered. Please login" ;
                                        }
                                    }
                                }
                                elseif(mysqli_stmt_num_rows($stmt) == 0){ mysqli_stmt_close($stmt);
                                                                         $sql = "INSERT Into users (type, firstName, lastName, email, password, phone, homeAddress, occupation, convicted, workstationuser, workstationusernumber, purpose, imageUrl) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                                                         if($stmt = mysqli_prepare($con, $sql)){
                                                                             // Bind variables to the prepared statement as parameters
                                                                             mysqli_stmt_bind_param($stmt,"sssssssssssss",$param_type, $param_firstName, $param_lastName, $param_email, $param_password, $param_phone, $param_homeAddress, $param_occupation, $param_convicted, $param_workstationuser, $param_workstationusernumber, $param_purpose, $param_imageUrl);
                                                                             // Attempt to execute the prepared statement
                                                                             if(mysqli_stmt_execute($stmt)){
                                                                                 if (move_uploaded_file($file, $destination)) {
                                                                                     $_SESSION['type'] = $type;
                                                                                     $_SESSION['username'] = $firstName;
                                                                                     $_SESSION['lastName'] = $lastName;
                                                                                     $_SESSION['email'] = $email;
                                                                                     header("location: ../workstation");
                                                                                     exit();
                                                                                 }
                                                                                 else{
                                                                                     echo "Something went wrong. Please try again later.";
                                                                                 }
                                                                             }
                                                                         }
                                                                        }
                            }
                            else {
                                $success = "Error updating record: " . mysqli_error($conn);
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
    }
}
mysqli_close($con);

include "../head.php";
?>

<title>Register</title>

<body>

    <section class="workstationsignup">

        <div class="workstationsignuphead">
            <a href=""> <img src="pics/atclogowithoutname.svg" alt="atc logo"></a> ATC HUB REGISTRATION FORM
        </div>

        <div class="workstationsignupbody">

            <form class="workstationsignupform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="on">

                <section>

                    <label for="myphoto">
                        <input type="file" accept="image/*" name="myphoto" id="myphoto" onchange="loadFile(event)" style="display: none;" />
                        <img id="output" />
                        <div id="upload">
                            Click Here To Upload Your Picture
                        </div>
                        <span class="help-block"><?php echo $myphoto_err; ?></span>
                    </label>

                </section>

                <div>
                    <span>
                        <div>First name <sup>*</sup></div>
                        <input type="text" value="" id="firstName" name="firstName" pattern="([a-zA-Z \'\.\-]){3,100}" required>
                    </span>
                    <span>
                        <div>Last name <sup>*</sup></div>
                        <input type="text" value="" id="lastName" name="lastName" pattern="([a-zA-Z \'\.\-]){3,100}" required>
                    </span>
                </div>
                <div>
                    <div>Email address <sup>*</sup></div>
                    <input type="email" value="" id="email" name="email" required>
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div>
                    <div>Password <sup>*</sup></div>
                    <input type="password" value="" id="password" name="password" pattern="([a-zA-Z0-9\u00A3\'\\\:\;\-\+\.\?\!\*\(\)\_\& \,\r\n\x22\$\%\^\=]){8,40}" required>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>

                <div>
                    <div>Phone Number <sup>*</sup></div>
                    <input type="tel" placeholder="+234" value="+234" id="phone" name="phone" required>
                </div>

                <div>
                    <div>Permanent Home Address <sup>*</sup></div>
                    <input type="text" value="" id="homeAddress" name="homeAddress" pattern="([a-zA-Z0-9\u00A3\'\\\:\;\-\+\.\?\!\*\(\)\_\& \,\r\n\x22\$\%\^\=]){10,40}" required>
                </div>

                <div>
                    <div>Occupation <sup>*</sup></div>
                    <input type="text" value="" id="occupation" name="occupation" pattern="([a-zA-Z0-9\u00A3\'\\\:\;\-\+\.\?\!\*\(\)\_\& \,\r\n\x22\$\%\^\=]){5,25}" required>
                </div>
                <div>
                    <span>Have you been convicted for any cyber crime?</span>
                    <span>
                        <div class="conviction">
                            <label>Yes <input type="radio" value="yes" id="convicted" name="convicted" disabled required></label>
                        </div>
                        <div class="conviction">
                            <label>No <input type="radio" value="no" id="notconvicted" name="convicted" required checked></label>
                        </div>
                    </span>
                </div>
                <div class="workstationflex">
                    <div>
                        <div>User</div>
                        <div class="atcdropbutn">
                            <div class="select">
                                <select name="workstationuser" id="slct">
                                    <option value="Team Leader">Team Leader</option>
                                    <option value="Member">Individual / Freelancer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>No of Users</div>
                        <div class="atcdropbutn">
                            <div class="select">
                                <input list="workstationusernumber" name="workstationusernumber" value=1>
                                <datalist id="workstationusernumber">
                                    <option value="1">1</option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4"> 4</option>
                                    <option value="5"> 5</option>
                                    <option value="6">6</option>
                                    <option value="7"> 7</option>
                                    <option value="8"> 8</option>
                                    <option value="9"> 9</option>
                                    <option value="10"> 10</option>
                                    <option value="12"> 12</option>
                                    <option value="15"> 15</option>
                                    <option value="20"> 20</option>
                                    <option value="25"> 25</option>
                                    <option value="30"> 30</option>
                                    <option value="50"> 50</option>
                                </datalist>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="purposeofUsage">
                    <div>Purpose Of Usage</div>
                    <div class="atcdropbutn">
                        <div class="select">
                            <select name="purpose" id="purpose">
                                <option value="Trainning">Trainning</option>
                                <option value="Meeting / Hangout">Meeting / Hangout</option>
                                <option value="Personal Development / Research">Personal Development / Research</option>
                                <option value="Creative Development">Creative Development</option>
                                <option value="Web / Software Development">Web / Software Development</option>
                                <option value="Others">Others</option>


                            </select>
                        </div>
                    </div>

                </div>
                <div style="text-align:center;">
                    By clicking register, I agree that I have read and accepted the
                    <a href="legal/privacy">
                        terms of use of the hub and privacy policy.
                    </a>
                </div>

                <div class="atcbutton" style="text-align:left;margin: 2vh auto;width: 40%;">
                    <button type="submit" name="submit">REGISTER</button>
                </div>

            </form>

        </div>
    </section>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <section style="background-color: #204BBB; width: 100%; padding:2.5vw 0;">
        <a href="support/about" style="font-size: 20px; color:#fff;text-align:center; width:100%; display:block;">About Us</a>
    </section>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <style>
        body {
            background-color: #fff;
            width: 100%;
            height: 100%;
            color: #000;
            overflow: auto;
        }

    </style>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById('output').style.border = "0 solid #000";
            document.getElementById('upload').style.display = "none";
        };

    </script>

</body>

</html>
