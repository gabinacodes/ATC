<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 100; /* Sit on top */
        padding-top: 200px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100vw; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.8); /* Black w/ opacity */

    }

    /* Modal Content */
    .paymentinfo {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 60vw;
        height: 50vh;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.7),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }


    .modalbody {
        padding: 2px 16px;
    }

    .modalfooter {
        padding: 2px 16px;
        background-color: #fff;
    }
    .select{
        width:100%;
    }

</style>

<!-- The Modal -->
<div id="modal" class="modal">

    <!-- Modal content -->
    <div class="paymentinfo">

        <div class="modalbody">
            <div class="atcdropbutn">
                <div class="select">
                    <select name="workstationpackagemode" id="wpackagemode">
                    </select>
                </div>

            </div>

            <div id="multiple" class="atcdropbutn">
                <div class="select">
                    <input id="inputMultiple" value=1 list="multiple" name="multiple" placeholder="enter multiple">
                    <datalist id="multiple">
                        <option value=1>
                        <option value=2>
                        <option value=5>
                        <option value=8>
                    </datalist>
                </div>

            </div>
            <a class="modalfooter"  style="text-align:center;" onclick="goToPayment()"> click here to continue
            </a>
        </div>
    </div>

</div>
