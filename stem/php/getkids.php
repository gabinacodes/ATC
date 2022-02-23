<?php
include "config.php";
$response = $query = $result = '';
$_POST = json_decode(file_get_contents('php://input'), true);
$email = $_POST["email"];
$response = $email;
if (isset($email)) {
    $search = trim(mysqli_real_escape_string($con, $email));
    $query = "SELECT `fullName`, `course`, `guardName`,`guardTel` FROM `users` WHERE `guardEmail` = ?";
    // $results = mysqli_query($con, $query);
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $search);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $fullName, $course, $guardName, $guardTel);
            /* store result */
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) >= 1) {
                $i = 0;
                $response = array();
                while (mysqli_stmt_fetch($stmt)) {
                    $line = ['id' => $i, 'fullName' => $fullName, 'guardName' => $guardName,
                        'guardTel' => $guardTel, 'course' => $course];
                    array_push($response, $line);
                    ++$i;
                }

            } elseif (mysqli_stmt_num_rows($stmt) == 0) {
                $response = 'Email not found, please details';
            }
        }
    }
}
header("Content-Type: application/json; charset=UTF-8");
echo json_encode($response);
