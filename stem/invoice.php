<?php
include "php/config.php";
/*
if(!isset($_SESSION['email']) || $_SESSION['email'] != 'wuraayotunde@gmail.com'){
#header('location: /');
#   exit();
}
 */
include "head.php";
?>
<title>Invoice</title>

<body>

    <style>
        body {
            background-image: url("pics/loginpage.svg");
            background-color: #1207AB;
            background-position: center center;
            width: 100vw;
            height: 100vh;
            padding: 0;
            margin: 0;
            color: white;
        }

        .atcdropbutn .select {
            width: 100%;
        }
    </style>

    <section id="loginpage">
        <section id="signuppagelogoandswitch"> <a href="academy/"> <img src="pics/ATC_logo.png" alt="atc logo"></a>
        </section>

        <section class="login">
            <div id="signupheader">
                Please enter customer's payment details then enter admin password.
            </div>
            <div id="signupbody">
                <form name="invoice" class="font14" autocomplete="on" onsubmit="return sendInvoice()">
                    <div>
                        <label for="email">
                            Email address *
                            <input type="email" name="email" value="" id="email" class="block ninethwidth" size="10" maxlength="50" required />
                        </label>
                    </div>
                    <div>
                        <label for="name">
                            Payer's name
                            <input type="text" name="name" value="" id="name" class="block ninethwidth" size="10" maxlength="50" required />
                        </label>
                    </div>
                    <div>
                        <label for="amount">
                            Amount
                            <input type="text" name="amount" value="" id="amount" class="block ninethwidth" size="10" maxlength="50" required />
                        </label>
                    </div>
                    <div>
                        <label for="address">
                            Payer's address
                            <input type="text" name="address" value="" id="address" class="block ninethwidth" size="10" maxlength="150" required />
                        </label>
                    </div>
                    <div>
                        <label for="date">
                            Payment Date *
                            <input type="datetime-local" name="date" value="2021-07-25T19:30"
       min="2021-07-07T00:00" max="2200-07-07T00:00" id="date" class="block ninethwidth" size="10" maxlength="50" required />
                        </label>
                    </div>
                    <div>
                        <label for="description">
                            Payment Description *
                            <input type="text" name="description" value="" id="description" class="block ninethwidth" size="10" maxlength="50" required />
                        </label>
                    </div>
                    <div>
                        <label for="type">
                            type * <div class="atcdropbutn">
                                <div class="select">
                                    <select name="type" id="type" required>
                                        <option value="cohort">Cohort</option>
                                        <option value="stem" selected>STEM</option>
                                        <option value="workstation">Workstation</option>
                                    </select>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div>
                        <label for="password">
                            Password *
                            <input type="password" name="password" value="" id="password" class="block ninethwidth" size="10" maxlength="50" required />
                        </label>
                    </div>

                    <div>
                        <div class="inlineblock ">
                            <button value="submit">
                                Send
                            </button>

                        </div>
                    </div>
                </form>

                <div id="signupstatement" style="display:none">
                    Protected by recaptcha and subject to the google privacy policy
                    and terms of service.
                </div>
            </div>
        </section>
        <section id="signuppageaboutatc">
            <a href="support/about"> About ATC
            </a>
        </section>
    </section>
    <script>
        /**
         *  var loginForm = document.forms.login; // Or document.forms['login']
  loginForm.elements.email.placeholder = 'test@example.com';
  loginForm.elements.password.placeholder = 'password';

         */
        const sendInvoice = () => {
            let formField = document.forms.invoice
            let body = {
                email: formField.email.value,
                payer: formField.name.value,
                amount: formField.amount.value,
                address: formField.address.value,
                date: formField.date.value,
                description: formField.description.value,
                type: formField.type.value,
                password: formField.password.value
            }
            let URL = `${window.location.protocol}//${window.location.hostname}/php/sendInvoice`
            fetch(URL, {
                    method: "POST",
                    body: JSON.stringify(body),
                    headers: {
                        "Content-Type": "application/json",
                    },
                }).then(res => res.json())
                .then(data => {
                    alert(data.message)
                }).catch((err) => {
                    alert('error occurred, please try again')
                })
            return false
        }
    </script>
</body>

</html>