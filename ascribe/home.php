<?php
    get_header();
    get_template_part( 'template', 'blogheader' );

    echo '<div class="blog-column row row--content">';

    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();

            get_template_part( 'content', 'blog' );

        }
    }
    else {
        get_template_part( 'content', 'noposts' );
    }
    ?>

    <nav class="pagination grid grid--gutters grid--half">
        <div class="grid__col pagination__previous"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="grid__col pagination__next"><?php previous_posts_link( 'Newer posts' ); ?></div>
    </nav>

    <?php
    echo '</div>';

    get_footer();
?>
