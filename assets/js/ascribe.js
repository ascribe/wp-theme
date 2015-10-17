/*! ascribe - v0.0.1
 * http://wordpress.org/themes
 * Copyright (c) 2015; * Licensed GPLv2+ */
$(document).ready(function(){

    slider();
    socialAsSvg();
    featuredFAQ();
    marketplaces();
    tourNav();
    mobileNav();
    stickyNav();
    colourHover();

    function tourNav() {
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
    function socialAsSvg() {
        /*
         * Replace all social icon images with inline SVG
         */
        jQuery('img.social-icon').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

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

});


