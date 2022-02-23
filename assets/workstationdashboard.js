
$(function(){        
    $("#initials").text(dashboard.userInfo[1][0] + dashboard.userInfo[2][0]);    
    $("#amount").text("#" + numeral(dashboard.productInfo[1]).format('0,0'));
    $("#output").attr({"src": "workstation/" + dashboard.userInfo[4]});
    $("#fullName").text(dashboard.userInfo[1] + " " + dashboard.userInfo[2]); 
        $("#email").text(dashboard.userInfo[5]); 
        $("#regId").text("atc/ws2020/" + dashboard.userInfo[0]); 
        $("#phoneNumber").text(dashboard.userInfo[3]); 
        $("#loginId").text(dashboard.productInfo[3]); 
        $("#password").text(dashboard.productInfo[4]); 
        $("#plan").text(dashboard.productInfo[0]); 
        $("#duration").text(dashboard.productInfo[5]); 
        $("#used").text(dashboard.loginLogInfo[2]); 
        $("#left").text(dashboard.loginLogInfo[3]);
        $("#daysUsed").text(dashboard.loginLogInfo[0]); 
        $("#daysLeft").text(dashboard.loginLogInfo[1]);         
        $('a[href="academy/dashboard/"]').attr({"href": "workstation/dashboard"});
        $('a[href="academy/courses"]').hide();
        $('#checkResult').hide();
        $('a[href="academy/dashboard/profile"]').hide();                
        });