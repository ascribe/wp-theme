<?php
get_header();
get_template_part( 'template', 'blogheader' );
echo '<div class="centered-content-padding">';
echo '<div class="column-container">';
echo '<div class="blog-column">';
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        get_template_part( 'content', 'blog' );

    }
}
else {
    get_template_part( 'content', 'noposts' );
}

echo '</div>';
//get_sidebar('blog');

echo '</div>';
echo '</div>';
get_footer();
?>
