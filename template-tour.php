<?php
/*
Template Name: Landing Page / Product Tour
*/
require 'controller/init.php';

get_header();

$bgImage        = get_field('header_background_image')['url'];
$headerTagline  = get_field('header_tagline');
$buttonText     = get_field('create_account_button_text');
$buttonColour   = get_field('header_button_colour');
$controller     = new Controller();
?>

<header style="background-image:url(<?php echo $bgImage; ?>)">
	<div class="sticky">
		<div class="centered-header">

		<a href="<?php echo get_bloginfo('wpurl');?>"><img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-white.png" class="logo phone-and-up"></a>
		<a href="<?php echo get_bloginfo('wpurl');?>"><img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/ascribeicon-white.svg" class="logo phone-only"></a>
		<div class="app-links">
			<a href="<?php echo $signInLink; ?>">Log In</a> / <a href="<?php echo $signUpLink; ?>">Sign Up</a>
			<img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/svg/hamburger.svg" class="phone-only hamburger">
		</div>
		<nav class="tour-switcher"><?php wp_nav_menu( array(
				'theme_location' => 'landing-menu',
				'container'      => false
				)); ?>
		</nav>
		</div>
	</div>
	<div class="centered-header">
		<section class="description">
			<h1><?php echo $headerTagline; ?></h1>
			<a href="<?php echo $signUpLink; ?>" class="button <?php echo $buttonColour; ?>-overPic"><?php echo $buttonText; ?></a>
		</section>
		<div class="mobile-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
		</div>
	</div>
	<div class="chevron-divider"></div>
</header>

	<main>
		<?php echo $controller->loopSubtemplates(); ?>
	</main>

<?php get_footer(); ?>
