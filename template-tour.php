<?php
/*
Template Name: Landing Page / Product Tour
*/
get_header();
$controller = new Controller();
?>

<header>
	<div class="centered">
		<?php echo $logo; ?>
		<nav>
			<span class="icon-menu mobile-only"></span>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) ); ?>
		</nav>
	</div>
</header>

<?php get_template_part( 'content', 'main' ); ?>

<?php get_footer(); ?>