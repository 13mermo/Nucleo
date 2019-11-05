+function ($) {

    $(document).ready(function() {
        $('.js-header-search-toggle').on('click', function() {
            $('.search-bar').slideToggle();
        });
    });

}(jQuery);

$('.slide-trabalho').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    prevArrow: ".slider-btn .prev",
    nextArrow: ".slider-btn .next",
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});
 
jQuery(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 50) {
     $("#menu").addClass("menu-diferente");
    } else {
     $("#menu").removeClass("menu-diferente");
    }
  });
});

/*jQuery(function(){
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() >50) {
            $("#img").addClass("img-shadow");
        }else{
            $("#img").removeClass("img-shadow");
        }
    });
});*/