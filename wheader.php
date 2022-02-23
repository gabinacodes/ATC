<header>

    <nav>
        <!-- Links -->
        <div id="logo">
            <a href="workstation/">
                <img src="pics/ATC_logo.svg" alt="ATC">
            </a>
        </div>
        <div id="search">
            <form>
                <input type="text" placeholder="what would you like to learn?">
                <button id="searchbutton" type="button" value="submit" class="fa fa-search"></button>
            </form>
        </div>


        <ul id="navoptions" class="nav">
            <?php
            if(isset($_SESSION["wusername"]) && $_SESSION["wusername"]!=""){
                echo

                    '
<li>
<div class="progdown">
    <div class="droprog">
        Hi, '
                    .  $_SESSION["wusername"] .'
    </div>
<div class="progdown-content">
        <a href="getstarted/wlogout">logout</a>
    </div>

    </div>
</li>' ;
            }
            else{
                echo
                    '
            <li><a href="workstation/register">
                REGISTER
                </a></li>
';
            }
            ?>

            <li>

                <div class="progdown">
                    <div class="droprog">PROGRAMS</div>
                    <div class="progdown-content">
                        <a><!-- href="academy/courses/stem"-->STEM ACADEMY</a>
                        <a href="academy/courses/programming">PROGRAMMING</a>
                        <a href="academy/courses/design">CREATIVE DESIGN</a>
                        <a href="academy/courses/hse">QHSE PROGRAMS</a>
                    </div>
                </div>
            </li>
            <li><a href="support/about">
                ABOUT
                </a></li>
            <li><a href="workstation">
                WORKSTATION
                </a></li>

            <?php
    /*
    if(isset($_SESSION["username"]) && $_SESSION["username"]!=""){
        echo
            '' ;
    }
            else{
                echo
                    '
<li><a style="background-color:#fff;color: var(--atccolor); border-radius:40px;padding:1vh 1vw" href="getstarted">
GET STARTED
</a></li>

';
            }
      */      ?>

        </ul>



        <div class="icon" >
            <a href="javascript:void(0);" onclick="navoptions()">&#9776;</a>
        </div>
    </nav>
</header>
<br>
<br>

