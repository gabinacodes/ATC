<footer>
    <div class="footerservice">

        <div class="rights">© <span id="year"></span> Africa trainovation Consulting. <span>All rights reserved.</span></div>
    </div>

    <div class="followicons">

    <div class="follow">
                    <a href="https://www.instagram.com/atchub_/" target="_blank">
                        <img class="followus" src="pics/instagram.svg">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=+2349035807050" target="_blank">
                        <img class="followus" src="pics/whatsapp.svg">
                    </a>
                    <a href="https://www.facebook.com/ATChubb" target="_blank">
                        <img class="followus" src="pics/facebook.svg">
                    </a>
                    <a href="https://twitter.com/atchub_" target="_blank">
                        <img class="followus" src="pics/twitter.svg">
                    </a>
                    <a href="https://www.linkedin.com/company/africa-trainovation-consulting/" target="_blank">
                        <img class="followus" src="pics/linkedin.svg">
                    </a>
                </div>
        <div>Join Our social media conversations
            <div>@trainovation</div>
        </div>
    </div>
</footer>
</body>


<script src="assets/header.js"></script>
<script src="assets/carouselAdjust.js"></script>

   <script>
    document.getElementById("year").innerText = (new Date()).getFullYear();
    var sidebar = document.getElementsByClassName("sidebar")[0],
        fas = document.getElementsByClassName("fas")[0],
        dashboardlogo = document.getElementById("dashboardAtcLogo");

    document.getElementsByClassName('fas')[0].addEventListener('click', function(event) {
        sidebar.style.display = "flex";
        fas.style.visibility = "hidden";
        try {
            dashboardlogo.style.visibility = "hidden";
        } catch (err) {}
        event.cancelBubble = true;
    });

    hideSideBar = function() {
        try {
            sidebar.style.display = "none";
            fas.style.visibility = "visible";
            dashboardlogo.style.visibility = "visible";
        } catch (err) {}
    }

</script>

<script>
    try {
        document.getElementById('myphoto').addEventListener('change',
            function(event) {
                let image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
                document.getElementById('output').style.border = "0 solid #000";
                document.getElementById('output').style.display = "block";
                document.getElementById('photo').style.boxShadow = "-8px -15px #1207AB";
                document.getElementById('upload').style.display = "none";
                let avatar = document.getElementsByClassName('avatar')[0];
                image = document.getElementById('image');
                image.src = URL.createObjectURL(event.target.files[0]);

            });
    } catch (err) {}

    let avatarOptions = document.getElementsByClassName("mydetails")[0];
    let showMydetails = () => {
        event.cancelBubble = true;
        if(avatarOptions.style.display == "block"){
            avatarOptions.style.display = "none";
        }
        else{
            avatarOptions.style.display = "block";
}
    }
    document.getElementsByClassName("avatar")[0].addEventListener("click", showMydetails);

</script>

</html>
