$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        dots: true,
        margin: 1,
        //center: true,
        rewind: false,
        autoplay: true,
        autoplaySpeed: 1000,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            500: {
                items: 2
            },
            900: {
                items: 3
            }
        }
    })
});
