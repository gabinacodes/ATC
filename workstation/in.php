<?php include "../shead1.php";

//at reload unset variables
if(isset($_SESSION["workstationpaymentchain"]) && isset(getallheaders()["Referer"]) && (preg_match("/workstation\/login/i", getallheaders()["Referer"]) || preg_match("/workstation\/register/i", getallheaders()["Referer"]))){ // coming from getstarted and has registered
    unset($_SESSION["workstationpaymentchain"]);
}

else{
    unset($_SESSION["amount"]);
    unset($_SESSION["productName"]);
    unset($_SESSION["productType"]);
}


?>

<title>Workstation</title>

<body>
    <?php include "../header1.php"?>
    <?php include "../wmodal.php"?>

    <section class="workstation">
        <div class="workstationnote">
            <div class="workstationnoteworking animate__animated animate__slideInLeft"> WORK
                <br>
                <span class="workstationnoteimgdiv">
                    ING
                    <img src="pics/rectangle.svg">
                </span>
                <div class="workstationmadeeasy">
                    Made easy
                </div>

                <span class="atcbutton">
                    <a href="workstation/#workstationpackages" class="button">BOOK NOW</a>
                </span>
            </div>
        </div>

    </section>

    <section class="workstationinfo">
        <section class="workstationhead">
            <div>
                ATCHub
            </div>
            <div>coworking station</div>
            <div>
                <div>
                    Africa Trainovation Consulting (ATCHub) off&shy;ers co-working space services for free&shy;lancers, entre&shy;preneurs, and profes&shy;sionals. ATC func&shy;tions from a suitable environment in Abeokuta, Ogun State. <wbr>
                    Whether you are a freelancer, student, entre&shy;preneur, profess&shy;ional or a team; our co&shy;working space is perfect for your growing business.
                </div>
                <div>
                    With us you don’t have to worry about basic amen&shy;ities such as fast internet, uninter&shy;rupted electricity, and other freebies.
                </div>
                <div>
                    Our plans are designed for freelancers, private One-Man office, shared desk 5-Men office, and 6-Men meeting room for hang&shy;outs, seminars etc. Each of these packages are charged based on daily, monthly or yearly basis.
                </div>
                <div>
                    We also have a well furnished Digitized Training Room for conducting trainings seminars and pres&shy;entations etc.
                </div>


            </div>
        </section>
        <section id="workstationpackages">
            <section class="workstationbody1">
                <div>
                    <div>Freelancer?</div>
                    <div>
                        Whether you are a freelancer, creative artist, student or entre&shy;preneur our co-working space provides necessary business support and basic amenities needed to carry out your job/ assignment conven&shy;iently. You will have access to an economic shared desk from 9a.m – 4pm, as well as uninterrupted power supply and fast internet. All at<b>:</b>
                        <div class="workstationprice1">
                            <div class="workstationpricechange1">
                                <span>
                                    <div>N1000/day. </div>
                                    <div>N1,500/day.</div>
                                </span>
                                <span>
                                    <div> N18,000/Month.</div>
                                    <div>N39,000/Month.</div>
                                </span>
                            </div>

                            <div class="atcbutton">
                                <button type="button" value="WBF" id="WBF"> book now</button>
                            </div>
                        </div>

                    </div>

                </div>

                <img src="pics/workstationimg2.svg" />
            </section>


            <img class="imgb4workstationbody2 animate__animated animate__slideInLeft" src="pics/workstationimg3.png" />

            <section class="workstationbody2">

                <div>
                    One-man
                    Executive
                    Office
                </div>

                <div>
                    <div> Do you need a relaxed and serene en&shy;viron&shy;ment suit&shy;able for work and study? This plan offers you a well-<wbr>fur&shy;nished, func&shy;tional office space excl&shy;usive to you. You will have access to 7hrs (9am – 4pm) of un-<wbr>interrupted elect&shy;ricity, fast in&shy;ternet and free coffee with this package.
                    </div>
                    <div class="workstationprice2">

                        <span>
                            <div>N3,000/day. </div>
                            <div>N5,000/day.</div>
                        </span>
                        <span>
                            <div> N60,000/Month.</div>
                            <div>N90,000/Month.</div>
                        </span>

                        <span class="atcbutton">
                            <button type="button" value="WBO" id="WBO"> book now</button>
                        </span>
                    </div>

                </div>

            </section>
<style>

.workstationpricechange1{
    justify-content:center;
}
    .workstationpricechange1 span,  .workstationprice2 span {
        margin:15px;
    }
    .workstationprice2{
        justify-content: flex-start;
    }
</style>
            <section class="workstationbody3">

                <div>
                    Six Capacity Meeting Room for
                    Seminars/Hangouts(with projector)
                </div>
                <img src="pics/workstationimg4.svg" />
                <div>
                    This package offers well-furnished meeting room for a team of six. A projector for semi&shy;nar/<wbr>pre&shy;sentation for your team and other am&shy;en&shy;ities such as; unint&shy;errupted power sup&shy;ply, fast int&shy;ernet and free coffee. This pack&shy;age go&shy;es for:
                     <div class="workstationpricechange1">

                        <span>
                            <div>N2,500/hr. </div>
                            <div>N4,000/hr.</div>
                        </span>
                        <span>
                            <div> N15,000/day.</div>
                            <div>N24,000/day.</div>
                        </span>
                    </div>
                    <div class="atcbutton">
                        <button type="button" value="WHS" id="WHS"> book now</button>
                    </div>
                </div>

            </section>

            <section class="workstationbody3">

                <div>
                    Eight Capacity Meeting Room for
                    Seminars/Hangouts(with projector)
                </div>
                <img src="pics/workstationimg4.svg" />
                <div>
                    This package offers well-furnished meeting room for a team of eight. A projector for semi&shy;nar/<wbr>pre&shy;sentation for your team and other am&shy;en&shy;ities such as; unint&shy;errupted power sup&shy;ply, fast int&shy;ernet and free coffee. This pack&shy;age go&shy;es for:
                   <div class="workstationpricechange1">

                        <span>
                            <div>N3,000/hr. </div>
                            <div>N5,000/hr.</div>
                        </span>
                        <span>
                            <div> N18,000/day.</div>
                            <div>N30,000/day.</div>
                        </span>
                    </div>
                    <div class="atcbutton">
                        <button type="button" value="WHE" id="WHE"> book now</button>
                    </div>
                </div>

            </section>


            <section class="workstationbody4">
                <img class="animate__animated animate__slideInLeft" src="pics/workstationimg5.png" />

                <div class="workstationbody4digitalroom">
                    <div>
                        Digital training Room
                    </div>
                    <div>
                        Atc's Digital training room is a modern well-fur&shy;nished digital<wbr> cl&shy;ass with pro&shy;jector and a res&shy;pon&shy;sive int&shy;eractive board. This is sui&shy;table for trai&shy;nin&shy;gs/<wbr>semi&shy;nars of<wbr> pa&shy;rt&shy;icipants not more th&shy;an <wbr>20 <wbr>pe&shy;ople.
                         <div class="workstationprice2">

                        <span>
                            <div>N8,000/hr. </div>
                            <div>N10,000/hr.</div>
                        </span>
                        <span>
                            <div> N48,000/day.</div>
                            <div>N60,000/day.</div>
                        </span>
                   </div>
                    <div class="atcbutton">
                        <button type="button" value="WHD" id="WHD" title=5000 > book now</button>
                    </div>
                </div> 
                    </div>
            </section>

        </section>
    </section>


    <section class="workspace">

        <div class="workspaceoffice">

            ATC Virtual Office
        </div>

        <div class="workspacenote">
            Are you looking for a place to use for your mai&shy;ling address? This package off&shy;ers mail hand&shy;ling, office ass&shy;ist&shy;an&shy;ce <wbr>and ot&shy;her basic amen&shy;it&shy;ies<wbr> ass&shy;o&shy;c&shy;iated with run&shy;ning an office for<wbr> in&shy;di&shy;vi&shy;duals that do&shy;esn’t have a phy&shy;sical<wbr> off&shy;ice.
            <div>
                N10,000/Month and access is from 9am – 4pm daily
            </div>
        </div>

        <div class="atcbutton">
            <button type="button" value="WMV" id="WMV" title=10000 style="background:#fff;color:#1207AB"> book now</button>

        </div>

    </section>
<script src="https://paylink.ng/cdn/paylink.checkout.js"></script>
    <!--script src="https://js.paystack.co/v1/inline.js"></script-->
    <script src="assets/payment.js"></script>
    <?php include "../footer1.php"?>
