$(document).ready(function(){
    new WOW().init();
    //about slider
    $('.hero_slider').owlCarousel({
        loop:true,
        nav:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsiveClass:true,
        animateOut: 'fadeOut',
        smartSpeed:450,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            1000:{
                items:1,
            }
        }
    });

});