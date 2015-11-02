$(document).ready(function(){

    imgAttrRemover();
    slider();
    featuredFAQ();
    marketplaces();
    tourNav();
    mobileNav();
    stickyNav();
    colourHover();

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
    function mobileNav() {
        $('.hamburger').click(function(){
            console.log('hi');
             $('.mobile-nav').toggleClass('active');
        });
    }
    function stickyNav() {
        var didScroll = false;
        var sticky = $('.sticky');

        $(window).scroll(function () {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                didScroll = false;

                if ($(window).scrollTop() > 100) {
                    sticky.addClass('stuck');
                }
                else {
                    sticky.removeClass('stuck');
                }
            }
        }, 250);
    }
    function colourHover() {
        $('.team-member img').hover(
            function(){
                var hover = $(this).data('hover');
                $(this).attr('src',hover);
            },
            function(){
                var normal = $(this).data('regular');
                $(this).attr('src',normal);
            });
    }
    function imgAttrRemover() {
        $('img').each(function(){
            $(this).removeAttr('width');
            $(this).removeAttr('height');
        });
    }

});


