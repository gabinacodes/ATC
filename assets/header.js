let smallScreen = 1024;
let atcsearch = document.getElementsByClassName("atcsearch")[0];
        let logo = document.getElementById("logo");
        let home = document.getElementById("icon");
        let nav = document.getElementById("navoptions");
        let searchbutton = document.getElementsByClassName("searchbutton")[0];
        let search = $("searchAtc");

        function atcSearchBar(event) {
            if ($('.atcsearch').value == "") {
                $('.atcsearch').hide();
            }
            if (screen.width <= smallScreen) {
                if (searchbutton.classList.contains("fa-search")) {
                    searchbutton.style.borderRadius = "30px";
                    atcsearch.style.display = "block";
                    searchbutton.classList.remove("fa-search");
                    searchbutton.classList.add("fa-times");
                    logo.style.display = "none";
                    home.style.display = "none";
                } else if (searchbutton.classList.contains("fa-times")) {
                    searchbutton.style.borderRadius = "40px";
                    atcsearch.style.display = "none";
                    searchbutton.classList.remove("fa-times");
                    searchbutton.classList.add("fa-search");
                    logo.style.display = "flex";
                    home.style.display = "block";
                }
            }
        }

        function navoptions() {
            if (screen.width <= smallScreen) { //helps restrict to mobile only
                if (home.classList.contains("fa-times")) {
                    if (atcsearch.style.display == "block") {
                        atcsearch.style.display = "none";
                        logo.style.display = "flex";
                        home.classList.remove("fa-times");
                        home.classList.add("fa-bars");
                    } else if (nav.style.display == "flex") {
                        nav.style.display = "none";
                        home.classList.remove("fa-times");
                        home.classList.add("fa-bars");
                        search.css({
                            'display': 'inline'
                        });
                    }
                } else { // would run on desktop if screen.width is removed above
                    if (nav.style.display === "flex") {
                        nav.style.display = "none";
                        search.css({
                            'display': 'inline'
                        });
                        home.remove("fa-times");
                        home.add("fa-bars");
                    } else {
                        nav.style.display = "flex";
                        search.css({
                            'display': 'none'
                        });
                        home.classList.remove("fa-bars");
                        home.classList.add("fa-times");
                    }
                }
            }
            event.cancelBubble = true;
        }

        $(document).ready(function () {
        window.onclick = function (event) {
            try{
            if (home.classList.contains("fa-times")) {
                home.classList.remove("fa-times");
                home.classList.add("fa-bars");
                search.css({
                    'display': 'inline'
                });
                nav.style.display = "none";
            }
            }
            catch(err){}
            try {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            } catch (err) { //do nothing
            }
            $('.atcsearchresult').hide();

            try{
                avatarOptions.style.display = "none";
                hideSideBar();
            }
            catch(err){
                //do nothing
            }
        }

            function loadData(query, result) {
                $.post("atcsearch.php", {
                    query: query
                }, function (data, status) {
                    //alert(data);
                    if (data == "") {
                        data = "<div style='flex-direction:column;text-align:center;'><span>no course found, please check your input </span><br><br><span> <a href='academy/courses'>click me to view our courses</a></span></div>";
                    }
                    result.html(data);
                    result.show();
                });
            }

            $('.atcsearch').keyup(function () {
                let search = $(this).val();
                let atcsearchresult = $(this).parent().next('.atcsearchresult');
                if (search != '') {
                    loadData(search, atcsearchresult);
                } else {
                    $('.atcsearchresult').hide();
                }
            });

            $('header .progdown:first').click(function () {
                if(screen.width <= smallScreen){
                $('header .progdown-content:first').toggle();
                event.cancelBubble = true;
                }
            });
        });
