<?php
include "../config.php";

if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("location: /");
    exit();
}

// Define variables and initialize with empty values
$username = $password = $ip = $macAddress = $timeLeft = $hostname = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //if(isset($_POST['submit'])){

        $password = $_POST['password'];
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $ip = filter_var(trim($_POST['ip']), FILTER_SANITIZE_STRING);
        $macAddress = filter_var(trim($_POST['macAddress']), FILTER_SANITIZE_STRING);
        $timeLeft = filter_var(trim($_POST['timeLeft']), FILTER_SANITIZE_STRING);
        $type = "I"; // I for login or O for logout or S for status
        $hostname = filter_var(trim($_POST['hostname']), FILTER_SANITIZE_STRING);
           // Validate email
        if(empty($username)){
            $username_err = "email username";
        }
        else{

            //$firstLogin = 1;            
            $search = trim(mysqli_real_escape_string($con, $_POST["query"]));
            $query = "
        SELECT * FROM workstationloginlog
        WHERE username LIKE '%".$username."%' AND
        password LIKE '%".$password."%' AND
     logintime LIKE '%". date("Y-m-d") ."%' ";        
        
            $result = mysqli_query($con, $query);
            $firstLogin = (mysqli_num_rows($result) == 0) ? 1 : 0;            

        // Set parameters
        $param_username = $username;
        $param_password = $password;    
        $param_timeLeft = $timeLeft;
        $param_firstLogin = $firstLogin;    
        $param_type = $type;    
        $param_ip = $ip;
        $param_macAddress = $macAddress;
        $param_hostname = $hostname;
        $param_logintime = date("Y-m-d H:i:s");

        $sql = "INSERT Into workstationloginlog (username, password, timeLeft, firstLogin, type, ip, macAddress, hostname, logintime) values(?, ?, ?, ?, ?, ?, ?, ?,?)";

                if($stmt = mysqli_prepare($con, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt,"sssssssss", $param_username, $param_password, $param_timeLeft, $param_firstLogin, $param_type, $param_ip, $param_macAddress,
                    $param_hostname,$param_logintime);

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Close statement & connection
                        mysqli_stmt_close($stmt);
                        mysqli_close($con);
                        //go to dashboard if not accessible then go to workstation page
                        //header("location: dashboard");
                        header("location: ../workstation");
                        exit();
                    }
                    else{
                        echo "Something went wrong. Please try again later.";
                    }            
                    mysqli_stmt_close($stmt);
                }
}

   // }
    // Close statement and connection
    mysqli_close($con);

}
header("location: /"); //go to dashboard if not accessible then go to workstation page
exit();

?>