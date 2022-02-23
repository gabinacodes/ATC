<?php include "../../AWdashboard/dashboardhead.php" ?>
<title>My Profile</title>
<?php include "../../AWdashboard/dashboardSidebar.php" ?>

<section class="maincontent">
    <?php include "../../AWdashboard/dashboardHeader.php" ?>
    <section class="profile">
        <label for="myphoto">
            <div id="photo">
                <input type="file" accept="image/*" name="myphoto" id="myphoto" />
                <img id="output" />
                <div id="upload">
                    Upload here
                </div>

            </div>
        </label>
        <div class="profileInfo">
            <div>Your Profile</div>
            <div id="fullName"></div>
            <div>Email address: <span id="email"></span></div>
            <div>Reg ID: <span id="regId"></span></div>
            <div>Phone No:<span id="phoneNumber"></span></div>
        </div>
    </section>
    <section class="myDashboardCourseDetail">

        <section class="currentCourses">
            <div>CURRENT COURSES</div>
            <hr>
            <div class="enrolledcourses">


            </div>
        </section>
    </section>
</section>

<style>
    #search{
        display: none
    }
</style>
<script src="assets/academydashboard.js"></script>
<?php include "../../AWdashboard/dashboardFooter.php" ?>

