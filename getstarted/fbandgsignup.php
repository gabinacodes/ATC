<?php
require_once "../config.php";


//setting up an account for facebook and google signup
$firstName = ucfirst(strtolower($_SESSION['firstName']));
$lastName = ucfirst(strtolower($_SESSION['lastName']));
$email = strtolower($_SESSION['email']);
$contactMe =true;
if($firstName !="" && $email != ""){
$_SESSION['username'] = $firstName; //this is valid or bugless only if google or facebook redirects only successful login to the callback url
$_SESSION["email"] = $param_email;

// Prepare a select statement
$sql = "SELECT type FROM users WHERE email = ?";
// Set parameters
$param_email = trim($email);
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
                if($type == "A"){
                    $_SESSION['type'] = $type; // username has been set up on line 11
                }
                elseif($type == "W"){
                    //already created account just update it
                    $sql = "UPDATE users SET contactMe='" . $param_contactMe . "' WHERE email='" . $param_email . "'" ;
                    if (mysqli_query($con, $sql)) {
                        $success= "successful";
                        $_SESSION["type"] = $type; // $type and not $param_type because of the possible change on line 59
                    }
                    else {
                        $success = "Error updating record: " . mysqli_error($con);
                    }
                }
            }
        }
        elseif(mysqli_stmt_num_rows($stmt) == 0){
            // Close statement & connection
mysqli_stmt_close($stmt);
            // Prepare an insert statement
            $sql = "INSERT Into users (type, firstName, email, lastName, contactMe) values( ?, ?, ?, ?,?)";

            if($stmt = mysqli_prepare($con, $sql)){
      
                // Set parameters
                $param_firstName = ucfirst(strtolower($firstName));
                $param_email = strtolower($email);
                $param_lastName = ucfirst(strtolower($lastName));
                $param_contactMe = ucfirst(strtolower($contactMe));
                $param_type = "A";// set to academy because only academy has google and facebook options for sign in

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt,"sssss", $param_type, $param_firstName, $param_email, $param_lastName, $param_contactMe);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $_SESSION["type"] = $param_type;
                }
                else{
                    echo "Oops! Something went wrong " . $param_email;
                }
            }
        }
    }
    else{
        echo "Oops! Something went wrong " . $email;
    }
// Close statement & connection
mysqli_stmt_close($stmt);
}
}
mysqli_close($con);
header("location: ../academy");
exit();
?>
