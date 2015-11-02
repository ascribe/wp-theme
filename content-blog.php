<?php
global $post;

$title = get_the_title();

$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
$full_name = '';

if( empty($fname)){
	$full_name = $lname;
} elseif( empty( $lname )){
	$full_name = $fname;
} else {
	//both first name and last name are present
	$full_name = "{$fname} {$lname}";
}

if (strlen($full_name) <= 0) {
	$full_name = 'ascribe';
}

$url = get_the_permalink();

?>

<article <?php post_class(); ?>>
	<h2><?php echo get_the_category_list(); ?></h2>
	<?php echo "<h1><a href='{$url}'>{$title}</a></h1>"  ?>

	<div class="image">
		<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-crop');
			echo "<img src='{$thumb[0]}' alt='{$title} image'>";

		}
		?>
	</div>
	<div class="meta">
		<?php echo get_avatar( get_the_author_email(), 'size here' ); ?>
		<span class="author">by <?php echo $full_name; ?></span>
		on <date><?php the_time( get_option( 'date_format' ) ); ?></date>
	</div>

	<main class="entry">
		<?php
		if ( ! is_singular() ) {
			the_excerpt();
			echo "<a href='{$url}'>Read More</a>";
		} else {
			the_content();
		}
		?>
	</main>
</article>