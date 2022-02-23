<?php
require_once "../../config.php";
/**
 * Used to generate filename column for graduants
 * print_r(str_replace(["/","+","="],"",base64_encode(random_bytes(120)))); 
 */

// Define variables and initialize with empty values
$cert = $cert_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cert = trim($_POST["cert"]);
    // Check if email is empty
    if(empty($cert)){
        $cert_err = "Please enter certificate ID.";
    }
    else{
            // Validate credentials
            if(empty($cert_err)){
                // Prepare a select statement
                $sql = "SELECT regOrderID,issuedId, filename FROM certificate WHERE cert = ?";

                if($stmt = mysqli_prepare($con, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_cert);

                    // Set parameters
                    $param_cert = $cert;

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                            /* store result */
                            mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            mysqli_stmt_bind_result($stmt,$regOrderID, $issuedId,$filename);
                            mysqli_stmt_fetch($stmt);
                            $myCertificate =($regOrderID<6)?"${filename}${issuedId}":"${filename}";                                
                            header("Location: ../certificate/$myCertificate");
                            exit();
                            }
                        elseif(mysqli_stmt_num_rows($stmt) == 0){
                            // Display an error message if email doesn't exist
                            $cert_err = " &nbsp <i><small  style='color:red';> No certificate with that ID found. </small></i>";
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
// Close statement & connection
mysqli_close($con);

include "../../head.php";
?>

<title>Certificate</title>

<style>
    body{
        background-image: url("pics/loginpage.svg");
        background-color: #1207AB;
        background-position: center center;
        width: 100vw;
        padding-bottom:8vh;
        height: 100vh;
        color: white;
        overflow: hidden;
    }
</style>

<body>
<section id="loginpage">
        <section id="signuppagelogoandswitch" style="top:1vh;>    <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>
            <br><br>
            
        </section>

        <section class="login">
            <div id="signupheader">
                Please enter ID to view certificate.
            </div>
            <div id="signupbody">
                <form class="font14" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="on">
                    <div>
                        Certificate ID*
                        <input type="text" name="cert" value="" class="block ninethwidth" size="10" maxlength="50" required />
                        <span class="help-block"><?php echo $cert_err; ?></span>
                    </div>
                    
                    <div>
                        <div class="inlineblock ">
                            <button value="submit">
                                Submit
                            </button>

                        </div>
                    </div>
                </form>

            </div>
        </section>

        <section id="signuppageaboutatc" style="bottom:19vh;">
            <a href="support/about"> About ATC
            </a>
        </section>
    </section>
</body>
</html>
