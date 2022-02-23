<?php include "../../shead.php"?>
<title>Stem Education</title><!-- include title for everypage in their respective file-->
    <?php include "../../header.php"?>

    <section id="programminghead">
        <img src="pics/programming.jpg">

        <div id="programmingheadcareer">
            Start your career in

            <div id="programmingheadsoftware">
                Software development
                <br> and Artificial intelligence
            </div>
        </div>
    </section>
    <section id="programmingai">
        <div id="programmingaitextwrapper" class="animate__animated animate__slideInLeft">
            <div id="programmingaiai">

                ARTIFICIAL<br>
                INTELLIGENCE

            </div>
            <div id="programmingaiassist">
                Build contextual AI assistants
            </div>
            <div id="programmingaiexplore">
                Explore areas of AI, Data Science, Automation,
                Robotics, Big data and get certified by reputable
                tech Industries.
            </div>
        </div>

        <img src="pics/ai.svg" alt="ai">

    </section>

    <section id="course">
        <div style="color:#09008F;"> CHOOSE A COURSE</div>
        <div class="atcdropbutn">
            <div class="select">
                <select name="course" id="scourse">
                    <option value="STM104">Drone application and development</option>
                    <option value="STM105">Internet of things (IoT/ Embedded computing)</option>
                    <option value="STM101">Kids can code programme I</option>
                    <option value="STM102">Kids can code programme II</option>
                    <option value="STM103">Robotics</option>
                </select>
            </div>
        </div>

        <div class="atcbutton">
            <button type="button" value="submit" class="button"style="text-align:center;margin-top:1vh;padding: 0.5vh 1vw" onclick="return courses()">ENROL</button>
        </div>

    </section>

    <?php include "../prometric.php"?>
    <?php include "../../accreditation.php"?>

    <?php include "../../footer.php"?>
