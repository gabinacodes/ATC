let checkLogin = "getstarted/checkLoginPayment";

$(document).ready(function() {

    $.post(checkLogin, function(data, status){
        try{
            data = JSON.parse(data);
            email = data[0];
            username = data[1];
            signin = data[2];
        }
        catch(err){
            //do nothing
        }
    });

    $.post(checkLogin, function(data, status){
        try{
            data = JSON.parse(data);
            email = data[0];
            username = data[1];
            signin = data[2];
        }
        catch(err){
            //do nothing
        }
    });


});

    var user = {
        firstName: "",
        lastName: "",
        email: "",
        initials: function() {
            return (this.firstName[0] + this.lastName[0]);
        },
        courseDetail: function() {
            let url = "academy/dashboard/regCourses";
            $.post(url, function(data) {
                data = JSON.parse(data);
                user.firstName = data[0][0];
                user.lastName = data[0][1];
                user.email = data[0][2];
                let courseDetails = JSON.parse(data[1]);
                courseDetails.forEach(courseHTML);

                try {
                    document.getElementById("initials").innerHTML = user.initials();
                } catch (err) {}
                try {
                    document.getElementById('fullName').innerHTML = user.firstName + " <b>" + user.lastName + "</b>";
                    document.getElementById('email').innerHTML = user.email;
                    document.getElementById('regId').innerHTML = "atc/12345654/001";
                    document.getElementById('phoneNumber').innerHTML = "+2348 063 3975 13";
                } catch (err) {}
            });
        }
    };

    function courseHTML(item) {
        let div = document.createElement("div");
        let innDiv1 = document.createElement("div");
        let innDiv2 = document.createElement("div");
        let img = document.createElement("img");
        let span = document.createElement("div");
        let spanprogress = document.createElement("div");
        let progressContainer = document.createElement("div");
        let progress = document.createElement("progress");
        img.setAttribute('src', item["imgSrc"]);
        img.setAttribute('alt', "enrolledcourse");
        innDiv1.setAttribute("class", "coursetitle");
        innDiv1.innerHTML = item["title"];
        span.setAttribute('class', "duration");
        span.innerHTML = "60 Hours"; //item["duration"];
        progress.setAttribute("max", 100);
        progress.setAttribute("value", item["progress"]);
        innDiv2.setAttribute('class', "progressmetric");
        if (item["progress"] < 50) {
            innDiv2.classList.add("low");
        } else {

            if (item["progress"] == 100) {
                innDiv2.classList.add("complete");
            } else if (item["progress"] >= 75) {
                innDiv2.classList.add("high");
            } else {
                innDiv2.classList.add("middle");
            }
        }
        spanprogress.innerHTML = item['progress'] + "%";
        progressContainer.setAttribute('class', "progressContainer");
        progressContainer.appendChild(progress);
        progressContainer.appendChild(spanprogress);
        innDiv2.appendChild(progressContainer);
        innDiv2.appendChild(span);
        div.appendChild(img);
        div.appendChild(innDiv1);
        div.appendChild(innDiv2);
        document.getElementsByClassName("enrolledcourses")[0].appendChild(div);
    }

    let myPromise = new Promise(function(myResolve, myReject) {
        user.courseDetail();
    });

    myPromise.then(
        function() {},
        function() {}
    );

