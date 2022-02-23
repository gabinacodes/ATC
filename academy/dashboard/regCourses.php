<?php
//add code to prevent student from registering multiple times 4 a course
include "../../config.php";

$firstName = $_SESSION['username']; //username is set as firstName
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];
$personal = (array($firstName,$lastName,$email));
$sql = "SELECT `CourseCode`, `progress` FROM `registeredcourses` WHERE `EMAIL` = ?"; // registeredcourses has columns of email and courses registered by student

if($stmt = mysqli_prepare($con,$sql)){
    mysqli_stmt_bind_param($stmt, 's', $email);
    if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt,$coursecode,$progress);
        $i=0;$mycourses=[];$mycoursesporgress=[];

        while(mysqli_stmt_fetch($stmt)){
            $mycourses[$i] = $coursecode;
            $mycoursesporgress[$i] = $progress;
            $i++;
        }
    }
}
mysqli_stmt_close($stmt);
$result = []; $i=0;
foreach($mycourses as $courseID){
    $sql = "SELECT courseCategory, title, courseId, imgSrc, duration FROM atcacademycourses WHERE courseID = '$courseID'";
    $result[$i] = mysqli_fetch_assoc(mysqli_query($con, $sql));
    $result[$i]['progress'] = $mycoursesporgress[$i];
    $i++;
    //write to remove null in case value doesnt exist like FMC202
}

mysqli_close($con);

$result = json_encode($result);
$details =json_encode(array($personal,$result));
echo($details);
?>
