<?php
$email = $_SESSION['email'];
$sql1 = "SELECT productName, amount, productType, units, reference FROM workstationpaymentinfo WHERE email = ? ORDER BY paymentOrderID DESC LIMIT 1";
  $sql2 = "SELECT username, password, `usedTime`, userEmail, used FROM internetaccess WHERE userEmail = ? ORDER BY ID DESC LIMIT 1";
  //macAddress is the last used macAddress
  $sql3 = "SELECT timeLeft, `logintime`, macAddress, ip, username  FROM workstationloginlog WHERE username = ? ORDER BY ID DESC LIMIT 1";
  $sql4 = "SELECT regOrderID, firstName,lastName, phone,imageUrl FROM users WHERE email = ?";
//intentionally chose five each to make it easier. NB important ones are 1st listed.

function selectDB($con, $sql, $param_sql){
if($stmt = mysqli_prepare($con, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_sql);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);
       
        // Check if email exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) > 0){

            // Bind result variables
            mysqli_stmt_bind_result($stmt, $info1, $info2, $info3,$info4, $info5);
            if(mysqli_stmt_fetch($stmt)){
                return [$info1, $info2, $info3,$info4, $info5];
            }                 
        }
        else{
            // to identify those that registered but yet to make payment
        }
    }
}
mysqli_stmt_close($stmt); // Close statement
}

$productInfo = selectDB($con, $sql1, $email);
$internetAccessInfo = selectDB($con, $sql2, $email);
$loginLogInfo = selectDB($con, $sql3, $internetAccessInfo[0]);
$userInfo = selectDB($con, $sql4, $email);
$userInfo[5] =$_SESSION['email'];
$username = $internetAccessInfo[0];
$password = $internetAccessInfo[1];
$timeLeft = $loginLogInfo[0];
$firstLogin = 1;
$units = $internetAccessInfo[0][0];
$valid = "hour"; //ticket validity
$daysUsed = $daysLeft = $time =  "";

$query = "SELECT * FROM workstationloginlog
            WHERE (`username`, `password`, `firstLogin`)  = (?, ?, ?) ";
            //review just in case a username later gets the password again for another batch generation
            if($stmt = mysqli_prepare($con, $query)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $username, $password, $firstLogin);
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                  // Store result
        mysqli_stmt_store_result($stmt);
       
        // Check if email exists, if yes then verify password
        $numberOfDaysUsed = mysqli_stmt_num_rows($stmt);
        $daysUsed = ($numberOfDaysUsed > 1) ? $numberOfDaysUsed . " days" : $numberOfDaysUsed . " day"; 


        // get first day customer logged in  to start counting display the number of rollover
        //use this when next customer wants to get ticket
                }
            }
        
// Close connection
mysqli_close($con);

switch ($internetAccessInfo[0][1]){ // convert uptimelimit to seconds    
    case "d":
        $valid = "day";        
        $uptimeLimit = $units * (8 * 3600) ; // 1 day is 8h
        $numberOfDaysLeft = $units - $numberOfDaysUsed;
        break;
    case "w":
        $valid = "week";        
        $uptimeLimit = $units * (2 * 24* 3600); //1 week is 2 days
        $numberOfDaysLeft = ($units * 6) - $numberOfDaysUsed;
        break;
    case "m":
        $valid = "month";        
        $uptimeLimit = $units * ((8 *24 +16) * 3600); // 1 day is 1w1d16h
        $numberOfDaysLeft = (($units * 26) - $numberOfDaysUsed);        
        break;
}
$daysLeft = $numberOfDaysLeft . " day";
$daysLeft = ($numberOfDaysLeft > 1) ? $daysLeft . "s" : $daysLeft;

function timeToSeconds($time){ // 1w3d23h12m21s
    $newDatetime = preg_replace('/[s]/','',$time);
$newDatetime = preg_replace('/[d-w]/',':',$newDatetime);
     $timeExploded = explode(':', $time);
     if (isset($timeExploded[4]) || count($timeExploded) == 5) { // 1w3d23h12m21s
         return ($timeExploded[0] * (7*24*3600) + $timeExploded[1] * (24*3600) + $timeExploded[2]* 3600
          + $timeExploded[3]* 60 + $timeExploded[4]);
     }
     elseif (count($timeExploded) == 4) { // 3d23h12m21s
        return ($timeExploded[0] * (24*3600) + $timeExploded[1]* 3600
        + $timeExploded[2]* 60 + $timeExploded[3]);
    }
     else{ // 23h12m21s
        $sec = 0;
        foreach (array_reverse($timeExploded) as $k => $v){
         $sec += pow(60, (int)$k) * (int)$v;
        }
        return $sec;
    }
}

$timeUsed = round($uptimeLimit - timeToSeconds($timeLeft));
$timeUsed = sprintf('%02dh%02dm%02ds', ($timeUsed/ 3600),($timeUsed/ 60 % 60), $timeUsed% 60);

// get the plan subscribed too
$valid .= $internetAccessInfo[0][0] > 1 ? "s" : ""; 
$validity = $internetAccessInfo[0][0] . " " . $valid;

//username, password, `usedTime`, userEmail, => access <=>  timeLeft, `logintime` =>log
// calc the number of days for ticket validity NB packages under a day has a day validity
// calc the number of days for ticket used
// calc uptime limit for ticket validity
// calc uptime used for ticket

// calculate plan subscribed from Db
switch ($productInfo[0]){ // convert uptimelimit to seconds    
    case "WBF":        
        switch ($productInfo[2]){ // convert uptimelimit to seconds    
            case "HOURLY":                
            case "DAILY":
                $plan = "BASIC";        
                break; 
            case "WEEKLY":
            case "MONTHLY":
                $plan = "BASIC +";        
                break;                         
        }
        break;
    case "WBO":
        $plan ="DIAMOND";
        break;
    case "WHD":
        $plan ="DIGITAL ROOM";
        break;
    case "WHE":
    case "WHS":
        $plan ="GOLDEN PLAN";
        break;
    case "WMV":
        $plan ="VIRTUAL";
        break;

}

$clientInfo['productInfo'] = [$plan, $productInfo[1], $productInfo[3], $internetAccessInfo[0],
$internetAccessInfo[1], $validity, $internetAccessInfo[2]];
$clientInfo['loginLogInfo'] = [ $daysUsed, $daysLeft, $timeUsed, $timeLeft, $loginLogInfo[1]];
$clientInfo['userInfo'] = $userInfo;
echo ("<script> dashboard = ".json_encode($clientInfo) . "</script>");
?>