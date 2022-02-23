<?php
// Include config file
require "config.php";

// Define variables and initialize with empty values
$success = $fullName = $email = $lastName = $contactMe =
	$fullName_err =  $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!isset($_POST['submit'])) {
		$fullName = filter_var(trim($_POST['fName']), FILTER_SANITIZE_STRING);
		$age = filter_var(trim($_POST['age']), FILTER_SANITIZE_STRING);
		$sex = filter_var(trim($_POST['sex']), FILTER_SANITIZE_STRING);
		$guardName = filter_var(trim($_POST['guardianName']), FILTER_SANITIZE_STRING);
		$guardTel = filter_var(trim($_POST['guardianTel']), FILTER_SANITIZE_STRING);
		$guardEmail = filter_var(trim($_POST['guardianEmail']), FILTER_SANITIZE_EMAIL);
		$guardAddress = filter_var(trim($_POST['guardianAddress']), FILTER_SANITIZE_STRING);
		$course = filter_var(trim($_POST['course']), FILTER_SANITIZE_STRING);
		$price = "";
		/*
    if($course === "discovery"){
            $price = "#5,000";
        }
        elseif($course === "discovery-lite"){
            $price = "#7,500";
        }
        elseif($course === "Innovators"){
            $price = "#10,000";
        }
    */

		$price =
			(($course === "discovery") ? "#5,000" : (($course === "discovery-lite") ? "#7,5000" : (($course === "Innovators") ? "#10,000" : "")));


		// Validate email
		if (empty($guardEmail)) {
			$email_err = "Please enter an email.";
		} else {


			// Set parameters
			$param_type = "STEM CLUB";
			$param_fullName = $fullName;
			$param_age = $age;
			$param_sex = $sex;
			$param_guardName = $guardName;
			$param_guardTel = $guardTel;
			$param_guardEmail = strtolower($guardEmail);
			$param_guardAddress = $guardAddress;
			$param_course = $course;

			// Prepare a select statement
			$sql = "SELECT type FROM users WHERE (fullName, guardEmail) = (?,?)";

			if ($stmt = mysqli_prepare($con, $sql)) {
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ss", $param_fullName, $param_guardEmail);

				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					/* store result */
					mysqli_stmt_store_result($stmt);
					if (mysqli_stmt_num_rows($stmt) >= 1) {
						$email_err = "'" . $email . "' has been registered with us. Please login";
					} elseif (mysqli_stmt_num_rows($stmt) == 0) {
						//new user insert data
						// Prepare an insert statement
						$sql = "INSERT Into users (type, fullName, age, sex, guardName,
                            guardTel, guardEmail, guardAddress, course) 
                            values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

						if ($stmt = mysqli_prepare($con, $sql)) {
							// Bind variables to the prepared statement as parameters
							mysqli_stmt_bind_param(
								$stmt,
								"sssssssss",
								$param_type,
								$param_fullName,
								$param_age,
								$param_sex,
								$param_guardName,
								$param_guardTel,
								$param_guardEmail,
								$param_guardAddress,
								$param_course
							);

							// Attempt to execute the prepared statement
							if (mysqli_stmt_execute($stmt)) {
								// Redirect to login page or homepage
								$_SESSION["type"] = $param_type;
								$_SESSION["username"] = $param_fullName;


								$subject = "ATC STEM CLUB";
								$html = file_get_contents("stemRegistration.html");
								$preheader = "CONFIRMATION: Thank you for registering ATC STEM Club Weekends Training!";
								$guardName= explode(' ',$param_guardName)[0];
								$name= explode(' ',$param_fullName)[0];
								$variables = ['${name}','${guardName}', '${preheader}', '${course}', ' ${price}'];
								$values = [$name,$guardName, $preheader, $course, $price];
								$msg = str_ireplace($variables, $values, $html);

								// Create email headers
								$to = $param_guardEmail;
								$us = "stem@atc.com.ng";
								$headers = 'From: ' . $us . "\r\n" .
									"CC: support@atc.com.ng\r\n" .
									"MIME-Version: 1.0\r\n" .
									"Content-Type: text/html; charset=utf-8;\r\n" .
									'X-Mailer: PHP/' . phpversion();
								mail($to, $subject, $msg, $headers);









								/*
    $to = "stem@atc.com.ng";
    $subject = "ATC STEM CLUB REGISTRATION";
    $msg = "$fullName has been registered for stem club
    \n Guardian details \nName: $param_guardName\nTel: $param_guardTel\nEmail: $param_guardEmail\n Address: $param_guardAddress";
    mail($to, $subject, $msg, $headers);
    */
								// Close statement & connection   
								header("Location: ../success");
								exit();
							}
						}
					}
				}
				// Close statement and connection

				mysqli_stmt_close($stmt);
				mysqli_close($con);
			}
		}
	}
} else {
	header("Location: /register.html");
	exit();
}
