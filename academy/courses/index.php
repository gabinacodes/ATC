<?php
include "../../config.php";
include "../../head.php";

//at reload unset variables
if(isset($_SESSION["academypaymentchain"]) && isset(getallheaders()["Referer"]) && (preg_match("/getstarted/i", getallheaders()["Referer"]))){ // coming from getstarted and has registered
    unset($_SESSION["academypaymentchain"]);
}

else{
    unset($_SESSION["amount"]);
    unset($_SESSION["productName"]);
    unset($_SESSION["productType"]);
}

?>
<title>Courses</title>
<?php include "../../header.php"?>

<section class="filter">
    <div class="filterdown">
        <button id="filtercourse" class="dropcourse">Filter(Courses)</button>
        <!--i class="fas fa-angle-down"></i-->
        <div class="filterdown-content">
            <a href ="academy/courses?filter=dwd">DIGITAL WEB DESIGN</a>
            <a href ="academy/courses?filter=dsn">DATA COURSES</a>
            <a href ="academy/courses?filter=fmc">FACILITIES MANAGEMENT COURSES</a>
            <a href ="academy/courses?filter=ppm">PROGRAM/PROJECT MANAGEMENT AND FINANCING</a>
            <a href ="academy/courses?filter=hse">QHSE OCCUPATIONAL COURSES</a>
            <a href ="academy/courses?filter=Qmc">QUALITY MANAGEMENT COURSES</a>
            <a href ="academy/courses?filter=sce">SPECIAL COURSES AND EXAMS</a>
            <a href ="academy/courses?filter=stm">STEM COURSES</a>
        </div>
    </div>
</section>

<section id="courseselection">

    <?php

    $output = $query = $result = $total_record = $selectedpage = '';
$selectcategory = $selectedcourse = "";

if($_SERVER["REQUEST_METHOD"] === "GET"){

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 05;
    $start_from = ($page-1)*05;

    if(isset($_GET["filter"])){
        $selectcategory = $_GET["filter"];
        $selectcategory = strtolower($selectcategory);

        $search = mysqli_real_escape_string($con, $selectcategory);
        $query = "
SELECT * FROM atcacademycourses
WHERE courseID LIKE '%".$search."%' limit $start_from,$num_per_page
";
    }
    else{
        $query = "
SELECT * FROM atcacademycourses ORDER BY courseId limit $start_from,$num_per_page";
    }
    $result = mysqli_query($con, $query);
    $total_record = mysqli_num_rows($result);

    if($total_record > 0)
    {
        $output .= ' <section class="productlist" id="dwd"> ' ;

        while($row = mysqli_fetch_array($result))
        {
            $output .=
                '
    <div class="item">
    <div class="itemimagecontainer">
        <img src="' .$row["imgSrc"]. '">
    </div>
    <div class="itemnote">
        <div class="itemnotehead">'
                .$row["courseCategory"].
                '</div>
        <div class="itemnotetitle">'
                .$row["title"].
                '</div>
        <div class="itemnoteoptions"> Offline: ' .$row["offline"]. 
        #' Online: ' .$row["online"]. 
        '</div>
        <div class="itemnotedescription">'
                .$row["duration"].
                '</div>
    </div>

    <div class="itemselectbuttons">
        <button type="button" value="' .$row["courseId"]. '" id="' .$row["courseId"]. '" title="' .$row["offline"]. '"> offline</button>'.
        #'<button type="button" value="' .$row["courseId"]. '" id="' .$row["courseId"]. '" title="' .$row["online"]. '"> online</button>
   ' </div>
</div>
'
                ;
        }
        $output .= "</section>";
        echo $output;
    }
}
    ?>
    <div class="pagination">
        <?php
        if(isset($_GET["filter"])){
            $pr_query = "SELECT * FROM atcacademycourses
WHERE courseID LIKE '%".$search."%'";
        }
        else{
            $pr_query = "SELECT * FROM atcacademycourses ORDER BY courseId ";
        }
        $pr_result = mysqli_query($con,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        $total_page = ceil($total_record/$num_per_page);
        $url = "<a href='academy/courses?";
        if(isset($_GET["filter"])){
            $url .="filter=" . $selectcategory . "&";
        }
        $url .= "page=";
        if($page>1)
        {
            echo $url .($page-1)."' class='fas fa-arrow-left'></a>";
        }
        for($i=1;$i<$total_page;$i++)
        {
            if($i == $page){$selectedpage = "class='selected'" ;}
            else{$selectedpage = "";}

            echo $url .$i."'$selectedpage>$i</a>";
        }
        if($i == $page){$selectedpage = "class='selected'" ;}
        else{$selectedpage = "";}

        echo $url .$i."' $selectedpage>$i</a>";
        if($i>$page)
        {
            echo $url .($page+1)."' class='fas fa-arrow-right'></a>";
        }

        ?>

    </div>
</section>
<script src="https://paylink.ng/cdn/paylink.checkout.js"></script>
<!--script src="https://js.paystack.co/v1/inline.js"></script-->
<script src="assets/payment.js"></script>

<?php    include "../../footer.php" ?>
