
$(document).ready(function(){

    slider();
    featuredFAQ();
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
    function featuredFAQ() {
        $('.featured-faqs dt').click(function() {
            $(this).next('dd').toggleClass('open');
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
    $('.hamburger').click(function(e) {
        e.preventDefault();

        var popup = $('.mobile-nav');

        // toggle popup
        popup.toggleClass('active');

        // bind the hide controls
        $(document).bind('click.hidepopup', function() {
            // hide popup
            popup.removeClass('active');
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
