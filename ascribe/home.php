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
?>
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
<?php
echo '</div>';
//get_sidebar('blog');

echo '</div>';
echo '</div>';
get_footer();
?>
