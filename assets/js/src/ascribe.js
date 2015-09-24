$(document).ready(function(){

    //Slider

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




});