<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-18
 * Time: 4:33 PM
 */
get_header();
$controller = new Controller();
?>

	<header>
		<div class="centered">
			<?php echo $logo; ?>
			<nav>
				<span class="icon-menu mobile-only"></span>
				<?php wp_nav_menu( array( 'theme_location' => 'general-menu', 'container' => false ) ); ?>
			</nav>
		</div>
	</header>

<?php get_template_part( 'content', 'main' ); ?>

<?php get_footer(); ?>