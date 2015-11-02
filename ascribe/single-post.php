<?php
get_header();
get_template_part( 'template', 'blogheader' );
echo '<div class="centered-content-padding">';
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
get_footer();
?>