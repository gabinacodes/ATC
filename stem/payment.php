<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal</title>
    <link rel="stylesheet" href="css/payment.css">
 <!-- Facebook Pixel Code -->
 <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1134397743663351');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1134397743663351&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    <style>
        .modal{
            display: flex;
        }
        input[type='email']{
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="modal">
        <div class="container-fluid Payment-Portal">
            <div class="container">
                <p class="lead">You are welcome to ATC</p>
                <h1>Payment Portal</h1>
                <form class="form-group" name="studentForm" onsubmit="return getKids()">
                    <label for="email" id="labelVerify">Verify your email</label>
                    <input type="email" name="email" placeholder=" Guardian Email" data-form-field="email" class="form-control" value="" id="email-form7-t" required>
                    <i style="color: red;" id="notRegistered"></i>
                    <div class="select">
                        <ul id="verified"></ul>
                    </div>
                    <input id="validateBtn" class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <script src="https://paylink.ng/cdn/paylink.checkout.js"></script>
    <script src="js/fetch.js"></script>
</body>

</html>