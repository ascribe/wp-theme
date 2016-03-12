
//=include _faq.js

$(document).ready(function(){

    Faq.init();

    slider();
    marketplaces();
    tourNav();
    mobileNav();
    stickyNav();

    function tourNav() {

        if ($('body').hasClass('page-template-template-tour')) {
            $('.tour-switcher .menu').prepend($('.tour-switcher .current-menu-item'));
        }

        $('.current-menu-item a').click(function(e){
            e.preventDefault();
            $('#menu-landing-page-menu').toggleClass('active');
        });
    }
    function slider() {
        $('.case-study:gt(0)').addClass('hidden');

        $('.slider-action').click(function(){

            var direction = $(this).attr('id');

            if (direction === 'back') {
                $('.case-study').addClass('hidden');
                $('.case-study').last().prependTo('.slide-container').removeClass('hidden');
            }
            else {
                displayed = $('.case-study').first();
                displayed.addClass('hidden');
                $('.case-study').eq(1).removeClass('hidden');
                displayed.appendTo('.slide-container');
            }

        });
    }

    function marketplaces() {
        $('.top-tab').click(function(){
            $('.top-tab').removeClass('active');
            $(this).addClass('active');
            var contentToShow = $(this).data('tab');
            $('.marketplace-info').removeClass('active');
            $('#'+contentToShow).addClass('active');

        });
    }

});



function stickyNav() {
    var sticky = $('.sticky');

    $(window).on('load resize scroll', function() {
        if ( $(window).width() > 768 ) {
            if ( $(window).scrollTop() > 100 ) {
                sticky.addClass('stuck');
            } else {
                sticky.removeClass('stuck');
            }
        }
    });
}


function mobileNav() {

    var hamburger = $('.hamburger'),
        popup = $('.mobile-nav');

    hamburger.click(function(e) {
        e.preventDefault();

        // toggle popup
        popup.toggleClass('active');
        hamburger.toggleClass('open');

        // bind the hide controls
        $(document).bind('click.hidepopup', function() {
            // hide popup
            popup.removeClass('active');
            hamburger.removeClass('open');
            // unbind the hide controls
            $(document).unbind('click.hidepopup');
        });

        // dont close thepop when you click on thepop
        popup.on('click', function(e) {
            e.stopPropagation();
        });

        // and dont close thepop now
        e.stopPropagation();
    });
}
