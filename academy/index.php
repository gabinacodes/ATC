<?php include "../shead.php"; ?>
<title>ATC</title>

<body>
    <?php include "../header.php"?>

    <section id="welcomesegmentbg">
        <div id="welcomehead">

            EMPOWERING
            <br>
            ALL WITH
            <br>
            ON DEMAND
            <br>
            SKILLS

        </div>
        <div id="welcomebody">

            An incredible opportunity awaits anyone<br>
            who participate in any of our digital and<br>
            occupational trainings.
        </div>
        <?php
    if(isset($_SESSION["email"]) && $_SESSION["email"]!=""){
        echo
            '' ;
    }
    else{
        echo
            '
<div class="atcbutton" style="text-align:left;margin-top:2vh">
<a href="getstarted" class="button">GET STARTED</a>
</div>
';
    }
        ?>

        <?php # include "../search.php"?>
    </section>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <section id="homeai">
        <img src="pics/homeai.svg">
        <div id="homeaipartnership">
            <img src="pics/google.png">


            <img class="homeaiimgshrink" src="pics/ibm.png">


            <img class="homeaiimgshrink" src="pics/cisco.png">


            <img src="pics/microsoft.png">



            <img src="pics/python.png">


            <img class="homeaiimgshrink" src="pics/java.png">
        </div>
        <div id="atcai">
            <div>

                ARTIFICIAL<br>
                INTELLIGENCE

                <div>
                    Build contextual AI assistants
                </div>
            </div>
            <span>
                Explore areas of AI, Data Science, Automation,
                Robotics, Big data and get certified by reputable
                tech Industries.
            </span>
        </div>
        <div class="atcbutton">
            <a href="getstarted" class="button">ENROLL</a>
        </div>

    </section>
    <section id="homepartnership">
        <?php include "../partnership.php"?>
    </section>
    <div id="homedivider1">

    </div>

    <section style="position:relative;">
        <div id="hse">
            <img src="pics/homehse.svg">
            <div id="homehsenote">
                <div> Become an</div>


                <div> HSE</div>

                <div>Professional</div>

                <div id="homehsebody">
                    ATC is a training centre for professional and occupational courses. We are certified by NEBOSH and IOSH.
                    Each of our HSE courses prepare you to become a professional in Health and Safety.
                </div>
                <div>
                    <img id="arrow" src="pics/arrow.svg">
                </div>
            </div>
        </div>
        <div id="homedivider2">

        </div>

    </section>
    <div id="homeaccred">ACCREDITATION</div>
    <?php include "../certify.php"?>
    <?php
    if(isset($_SESSION["email"]) && $_SESSION["email"]!=""){
        echo
            '' ;
    }
        else{
            echo
                '
<div class="atcbutton" >
<a href="getstarted" class="button">GET STARTED</a>
</div>
';
        }
    ?>
    <br style="margin:0.25vh 0">


    <div class="alumni response owl-carousel owl-theme">

        <div class="alumnus" style="display: inline-flex;        flex-direction: column;">

            <img class="testimonial" src="pics/testimonial/testimonial1.jpg">

            <div class="description">
I experienced the power of systematic coding, test-driven development, and Team work. The constant support and push from mentors were marvelous. I honed my skills in software development, problem-solving, and debugging.
<div><b>Olamide Osobu</b></div>
            </div>
        </div>
      
        <div class="alumnus" style="display: inline-flex;        flex-direction: column;">

            <img class="testimonial" src="pics/testimonial/testimonial3.jpg">
            <div class="description">
It was a wonderful journey with several practical learning experiences. ATC Academy made me realize that the best way to learn which is the hallmark of earning is by doing. Now i am a fulfillment of that practice
<div><b>Aina Wuraola </b></div>
            </div>
        </div>
        <div class="alumnus" style="display: inline-flex;        flex-direction: column;">

            <img class="testimonial" src="pics/testimonial/testimonial4.jpg">
            <div class="description">
My experience at ATC Academy has been really challenging and at the same time refreshing because I get to learn new problem-solving concepts and techniques everyday. It's a six months of dedication and sacrifice which will definitely be rewarding, you can do it.
<div><b>Atobaale Yusuf</b></div>
            </div>
        </div>
    </div>

    <div class="alumnilistbase">
        <h1>Got What You're Looking For?</h1>
        <?php # include "../search.php"?>
    </div>

    <section id="atcview">
        <div>
            CONDUCIVE LEARNING SOLUTIONS
        </div>
        <div class="alumni owl-carousel owl-theme">

            <div class="alumnus" style="display: inline-flex;        flex-direction: column;">

                <img class="testimonial" src="pics/atc1.png" alt="main hall">

                <div class="description">
                    ATC is a training centre for professional and
                    occupational courses. We are certified by
                    professional in Health and Safety
                </div>
                <a href="workstation" class="fas fa-arrow-right"></a>
            </div>

            <div class="alumnus" style="display: inline-flex;        flex-direction: column;">

                <img class="testimonial" src="pics/atcviewhse.jpg" alt="hse">

                <div class="description">
                    ISO 45001 – Occupational Health Management System (OHMS)
                    ISO 45001 enables candidate to be able to function as a lead auditor in an
                    occupational health management system. learners will learn to plan, conduct,
                    report, and follow up on audit of an occupational health management system in
                    conformity with ISO 4500.
                </div>
                <a href="academy/courses/hse" class="fas fa-arrow-right"></a>
            </div>


            <div class="alumnus" style="display: inline-flex;        flex-direction: column;">
                <img class="testimonial" src="pics/design2.svg" alt="hse">
                <div class="description">
                    Explore areas of Layout design, Branding, Logo design,
                    product design, Animation, Packaging design and
                    get certified by reputable tech Industries.
                </div>
                <a href="academy/courses/design" class="fas fa-arrow-right"></a>
            </div>
        </div>

    </section>
    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="contactus">
        <div style="text-align:center;">
            <h1> Enroll today - it's easy.
            </h1>

            <div>If you need help there's 24/7 email, chat, and phone call support
            </div>


            <div class="atcbutton" style="padding-bottom: 50px;">
                <a href="support/contact" class="button">CONTACT US</a>
            </div>

            <h1> DO you need a work space?</h1>

            <div>Our hub provides fast internet, uninterrupted electricity and
                <br>
                a conducive working environment for you and your team.
            </div>


            <div class="atcbutton">
                <a href="workstation#workstationpackages" class="button">BOOK NOW</a>
            </div>

        </div>
    </div>
    <!--++++++++++++++++++++++++++++-->

    <script src="assets/carouselAdjust.js"></script>
    <?php include "../footer.php"?>

</body>
