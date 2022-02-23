<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// transfers all mysql error to PHP for easy debugging
/*
if (isset($_GET['LOGOUT']) ||
    $_SERVER['REMOTE_ADDR'] !== $_SESSION['PREV_REMOTEADDR'] ||
    $_SERVER['HTTP_USER_AGENT'] !== $_SESSION['PREV_USERAGENT']) {
    session_destroy();
}

session_regenerate_id(); // Generate a new session identifier

$_SESSION['PREV_USERAGENT'] = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['PREV_REMOTEADDR'] = $_SERVER['REMOTE_ADDR'];

*/

$host = "localhost"; /* Host name */
$user = "africde5_admin"; /* User*/
$password = "bb@ATC_HuB"; /* Password */
$dbname = "africde5_studentCourseInfo"; /* Database name, tables: courseInfo, studentLoginInfo */
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
date_default_timezone_set('Europe/Paris');
?>
