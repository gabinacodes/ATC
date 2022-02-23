<?php


session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // transfers all mysql error to PHP for easy debugging

$host = "localhost"; /* Host name */
$user = "africde5_admin"; /* User*/
$password = "bb@ATC_HuB"; /* Password */
$dbname = "africde5_studentCourseInfo";

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
date_default_timezone_set('Europe/Paris');
// Processing form data when form is submitted
// invoice generation made independent of platforms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type='A';
    $_POST = json_decode(file_get_contents('php://input'), true);
    $fullName = filter_var(trim($_POST["Full_Name"]), FILTER_SANITIZE_STRING);
    $email = $_POST["Email"];
    $course = filter_var(trim($_POST["Learning_Tracks"]), FILTER_SANITIZE_STRING);
    $cohortType = filter_var(trim($_POST["Cohort_Type"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $phone = $_POST["Phone_Number"];
    $phone = filter_var(trim($phone), FILTER_SANITIZE_STRING);
    $fullName= explode(" ",$fullName);
    $firstName=$fullName[0];
    $middleName="";
    if(count($fullName)>2){
        $middleName=$fullName[1];
        $lastName=$fullName[2];
    }
    else{
        $lastName=$fullName[1];
    }
    $price = $duration = '';
    $PRICES =[
// course chosen, amount, duration, category        
["Frontend Web Development (Development)", "70,000", "3 months",1],
["Frontend Web Development (Engineering)", "70,000", "3 months",1],
["Backend Web Development (Python)", "80,000", "3 months",1],
["Backend Web Development (PHP)", "80,000", "3 months",1],
["Backend Web Development (Nodejs)", "90,000", "3 months",1],
["Full stack Web Development", "200,000", "8-9 months",1],
["Full frontend web development course", "130,000",  "5-6 months",1],
["Mobile App Development (Cross-Platform)", "250,000", "6 months",1],
["Product design (UX/UI)", "70,000", "3 months",3],
["Graphics design", "50,000",  "2 months",3],
["Digital Marketing 1", "50,000", "2 months",4],
["Digital marketing 2",  "50,000", "2 months",4],
["Digital marketing 3",  "50,000", "2 months",4],
["Digital marketing  full course", "130,000", "4-6 months",4],
["AutoCAD", "70,000", "2 months",3],
["Advance AutoCAD", "90,000", "3 months",3],
["Data Analytics (Power Bi, Tableau, MySQL)", "60,000", "2 months",2],
["Data Analytics (Python, Git)", "60,000", "2 months",2],
["Full Data Analytics course", "110,000", "3-4 months",2],
["Data Science Machine learning (1 - Data classification, python programming etc...)", "80,000", "3 months",2],
["Data Science Machine learning (2 - Algorithms, SVM etc...)", "80,000", "3 months",2],
["Data Science Machine learning (3 - ML 1 and ML 2)", "150,000", "6 months",2],
["Digital Literacy", "30,000", "2 months",5],
        ];
$category=[
    1=>['Software development','a software developer'],
    2=>['Data Science','a data scientist'],
    3=>['Product Design','a product designer'],
    4=>['Digital marketing','a digital marketer'],
    5=>['Digital literacy','a digital literate']
];
        
foreach($PRICES as $detail){
    if($detail[0]==$course){
        $duration = $detail[2];
        $price=$detail[1];
        $courseCategory = $category[$detail[3]][0];
        $title = $category[$detail[3]][1];// this gives the professional name of the course
        break;
    }
}
if($price==""){
    $duration = "3 months";
    $price = "80,000";
    $courseCategory = "Software development";
    $title = "a software developer";
}
$price= 'N'.$price;

        // Prepare a select statement
        
        $sql = "INSERT INTO users (type,email,firstName,middleName,lastName,phone) VALUES (?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"ssssss",$type,$email,$firstName,$middleName,$lastName,$phone);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                //if failed send mail to student informing them abt d failure
            // Send email
            include 'sendAcademyMail.php';
            
            $message=['message'=>'Sucessful'];
            // Close statement and connection
           mysqli_close($con);
        }
    }
} else {
    header("Location: /");
}
echo json_encode($message);
exit();
