$(document).ready(function(){
    $('#more-articles').click(function(e){
        e.preventDefault();
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination'
            },
            success: function( result ) {
                alert( result );
            }
        })
    });
});