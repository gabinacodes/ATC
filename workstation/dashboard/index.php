<?php include "../../config.php";
include "../../awdashboard/dashboardhead.php";
 ?>
    <title>My Dashboard</title>
    <?php include "checkHubLogin.php" ?>
<<<<<<< HEAD
       
=======
>>>>>>> refs/remotes/origin/test
    <?php include "../../awdashboard/dashboardSidebar.php" ?>

    <section class="maincontent">
    <?php include "../../awdashboard/dashboardHeader.php" ?>        
<div class="WdashboardTitle"> ATC Hub Dashboard</div>

    <section class="profile">
        <label for="myphoto">
            <div id="photo">                
                <img id="output" style="display:block"/>
            </div>
        </label>
        <div class="profileInfo">
        
        
            <div id="fullName"></div>
            <div>Email address: <span id="email"></span></div>
            <div>Reg ID: <span id="regId"></span></div>
            <div>Phone No:<span id="phoneNumber"></span></div>
            <div>login ID:<span id="loginId"></span></div>
            <div>Password:<span id="password"></span></div>
        
            <div class="currentAmount">
    <div>Amount paid</div>
    <div id="amount"></div>
</div>
        </div>

    </section>
    
    <section class="myDashboardCourseDetail">

        <section class="currentCourses">
            <div>Login Metrics</div>
            <hr>
            <div class="metrics">

            <table>
  <tr>
    <th>Plan subscribed </th>
    <th>Uptime used / days used</th>
    <th>Uptime left /days left</th> 
  </tr>
  <tr>
    <td id="plan"></td>
    <td id="used"></td>
    <td id="left"></td>
    
  </tr>
  <tr>    
  <td id="duration" ></td>
    <td id="daysUsed"></td>
    <td id="daysLeft"></td>    
  </tr>
</table>
            </div>
        </section>
    </section>
</section>

<!--div id="piechart"></div-->
<script src="assets/numeral.min.js"></script>
<script src="assets/workstationdashboard.js"></script>
<style>
.WdashboardTitle{
    width: 100%;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    margin: 0 0 -7.05vh;
    
}

#photo{
    box-shadow: -8px -15px #1207AB;
}
 .currentCourses div:first-child{
    text-align: center;
}

#piechart{
        width:400px;
        margin: auto;
    }

    .profileInfo{        
        margin-left: -20vw;                
    }   

.currentAmount{
    text-align: center;    
    position: absolute;
    right: 0;
    top: -5px;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    height: 100%;    
    width: 20%;
    background-color: rgb(18, 7, 171, 0.5);    
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; 
}
.currentAmount div:first-child{
    position: absolute;
    top:15%    
}
#amount{
    font-size: 36px;    
}
.avatar {
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    background-color: #1207AB;
    color: #fff;
    text-align: center;
    font-size: 16px;
    overflow: visible;
    cursor: pointer;
    position: relative;
    z-index: 20000;    
}

.avatar .mydetails {
    overflow: visible;
    position: absolute;
    top: 42px;
    right: 0;
    text-align: right;
    z-index: -1000;
    top: 0;
    right: 0;
    margin-right: 30%;
    padding-right: 40%;    
    
}

.avatar a {
    display: block;
    width: 110px;
    padding-right: 25px;
    color: #fff;
    font-size: 14px;
    
}


.currentAmount div:last-child{
    font-size: 25px;
    font-weight: bold;
    margin: 5px;
}

hr{
    margin-left: auto;
    margin-right: auto;
}
.metrics{
    width: 100%;
    height: 25vh;
    background-color: #e2e2e2;
    border-radius: 15px;
}

th, td {
  border-right: 2.5px solid #d2d2d2;
  border-collapse: collapse;
  text-align: center;
  padding: 1%;
}

th:last-child, td:last-child{
    border-right: none;
}

table{
    width: 100%;    
    height: 100%;
}
 @media only screen and (max-width:786px){
     .profileInfo {
         padding-top: 5vh
     }
    .profileInfo > div {
        font-size: 14px;
        
    }
    #amount{
        font-size: 1.4rem;
    }
 }
 @media only screen and (max-width:478px){
.profile{
    position:static;
}
.maincontent{
    position:relative
}
    .currentAmount{
    top:12vh;
    width:100%;
    border-radius:15px;
    height: 60px
}
#amount{
    margin-top:22px;
}
.profileInfo{
    margin: auto;    

}
.profileInfo > div {
        font-size: 3.5vw;        
    }
 }
</style>   
<?php include "../../awdashboard/dashboardFooter.php" ?>
