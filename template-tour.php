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
			<?php wp_nav_menu( array( 'theme_location' => 'landing-menu', 'container' => false ) ); ?>
		</nav>
	</div>
</header>

<?php require 'content-main.php'; ?>

<?php get_footer(); ?>