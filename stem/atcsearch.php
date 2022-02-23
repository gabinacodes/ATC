<?php
include "config.php";
$output = $query = $result = '';
if(isset($_POST["query"]))
{
    $search = trim(mysqli_real_escape_string($con, $_POST["query"]));
    $query = "
SELECT * FROM atcacademycourses
WHERE courseId LIKE '%".$search."%'
OR courseCategory LIKE '%".$search."%'
OR title LIKE '%".$search."%' limit 7";

    /*
OR offline LIKE '%".$search."%'
OR online LIKE '%".$search."%'
OR duration LIKE '%".$search."%'
*/
    /*
else
{
$query = "
SELECT * FROM atcacademycourses ORDER BY courseID";
}
*/

    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
<div>
<a href="academy/courses?filter='.$row["courseId"].'">'.$row["title"].'</a>
</div>
';
        }
        echo $output;
    }
}
?>
