
(function($) {
    'use strict';

    // Testimonial Slider
    var swiper = new Swiper('.testimonial-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        effect: 'fade',
        speed: 800,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });

})(jQuery);
