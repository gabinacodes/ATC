var amount =  amt = 0,
    productType = "",
    productName = "",
    registered = "",
    signin = "",
    email = "",
    username = "",
    checkLogin = "getstarted/checkLoginPayment";

$(document).ready(function() {

    $.post(checkLogin, function(data, status){
        try{
            data = JSON.parse(data);
            email = data[0];
            username = data[1];
            signin = data[2];
            amount = data[3];
            productName= data[4];
            productType= data[5];
            if(amount !==undefined && amount !== 0 && productName !== null){
                //payWithPaystack();// paystack disabled for paylink
               payWithPaylink();

            }
        }
        catch(err){
            //do nothing
        }
    });

    $("button[type='button']").click(function() { // select buttons of button to respond
        var btn = document.getElementById("myBtn");
        var modal = document.getElementById("modal");
        var locale = window.location.href;
        var academy = "/academy/courses";
        var workstation = "/workstation/";
        academy = new RegExp(academy, "i");
        workstation = new RegExp(workstation, "i");
        productType = $(this).attr("value");
        productName = $(this).attr("id");
        amount = $(this).attr("title");//academy amount
        $.post(checkLogin, function(data, status){
            data = JSON.parse(data);
            email = data[0];
            username = data[1];
            signin = data[2];
            if (workstation.test(locale)) {
                //var modalfooter = document.getElementsByClassName("modalfooter");
workstationPayment = true;

                var hourly = '<option id="hourly" value="hourly" selected>hourly</option>';
                var daily = '<option id="daily" value="daily" selected>daily</option>';
                var weekly = '<option id="daily" value="weekly" selected>weekly</option>';
                var monthly = '<option id="monthly" value="monthly" selected>monthly</option>';
                $("#wpackagemode").empty();

                if (productName[1] === "B") {
                    $("#wpackagemode").append(daily);
                    $("#wpackagemode").append(weekly);
                    $("#wpackagemode").append(monthly);
                }
                else if (productName[1] === "H") {
                    $("#wpackagemode").append(hourly);
                     $("#wpackagemode").append(daily);
                    $("#wpackagemode").append(weekly);
                    $("#wpackagemode").append(monthly);
                }
                else if (productName[1] === "M") {
                    $("#wpackagemode").append(monthly);
                }
                modal.style.display = "block";
            }
            else if (academy.test(locale)) {
                amount = Number(amount.replace("#","").replace(",",""));
                //sending details to section
                getamount = "academy/price";
                let productInfo =  {productName:productName, productType:productType, amount:amount};
                $.post(getamount, productInfo, function(data, status){
                    amount= data;
                    if (signin == "A" || signin == "W" || signin == "S") {
                        //payWithPaystack();// paystack disabled for paylink
                        payWithPaylink();
                    }
                    else{
                        try{
                        modal.style.display = "block";
                        }
                        catch(err){}
                    }
                });
            }
        });
    });
});


function goToPayment() { //used by workstation to save info in case not login
    document.getElementById("modal").style.display = "none"; // close modal then head to paystack
    productType = document.getElementById("wpackagemode").value;
    var productMultiple = document.getElementById("inputMultiple").value;
    var url =  "workstation/booking";
    let productInfo =  {productName:productName, productType:productType, productMultiple:productMultiple};
    $.post(url, productInfo, function(data, status){
        amount = data;
        if(signin === "W" || signin === "S"){
            //payWithPaystack(); //paystack disabled for paylink
            payWithPaylink();
            event.stopPropagation();
        }
        else{
            var redirectLocation = "workstation/login";
            window.location.assign(redirectLocation);
        }
    });
}
function payWithPaylink(){
    let paymentPurpose = "Payment for " + productType + (workstationPayment ? ' workstation subscription' : "");
    Paylink.checkout( 'atchub', {
        email: email,
        name: username,
        phone: "",
        amount: amount,
        reference: paymentPurpose

    })
}

function payWithPaystack() {
    var handler = PaystackPop.setup({
        key: 'pk_live_85a2cc5b2ba186950e1a5f1b7598c61235b28eb0',
        email: email,
        amount: amount * 100,
        currency: "NGN",
        // ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        metadata: {
            custom_fields: [{
                display_name: username,
                variable_name: username,
                value: "+2349035228743" // not relevant company line used
            }]
        },
        callback: function(response) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // modal.innerHTML = this.responseText;
                    //modal.style.display = "block";

                    alert(email + ', your payment was successful. transaction ref is ' + response.reference);

                }
            };
            xmlhttp.open("GET", "confirmpayment?amount=" + amount + "&productName=" + productName + "&productType=" + productType + "&reference=" + response.reference, true);
            xmlhttp.send();
        },
        onClose: function() {
            // alert('window closed');
        }
    });
    handler.openIframe();
}
