<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-24
 * Time: 5:32 PM
 */
?>
<header class="blog">
	<div class="centered-header">
		<a href="<?php echo get_bloginfo('wpurl');?>"><img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-white.png" class="logo"></a>
		<div class="app-links">
			<a href="<?php echo $signInLink; ?>">Sign In</a> / <a href="<?php echo $signUpLink; ?>">Sign Up</a>
		</div>
	</div>
	<div class="chevron-divider"></div>
	<h1>ascribe blog</h1>
</header>
<nav class="blog-categories">
	<div class="centered-categories">
		<ul>
			<?php
			$args = array(
				'hide_empty' => 0
			);
			foreach((get_categories($args)) as $category) {
				if ($category->cat_name != 'Uncategorized') {
					echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';
				}
			}
			?>
		</ul>
	</div>
</nav>
