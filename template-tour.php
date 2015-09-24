<?php
/*
Template Name: Landing Page / Product Tour
*/
require 'controller/init.php';

get_header();

$bgImage        = get_field('header_background_image')['url'];
$headerTagline  = get_field('header_tagline');
$buttonText     = get_field('create_account_button_text');

?>

<header style="background-image:url(<?php echo $bgImage; ?>)">
	<div class="centered-header">
		<img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-white.png" class="logo">
		<div class="app-links">
			<a href="<?php echo $signInLink; ?>">Sign In</a> / <a href="<?php echo $signUpLink; ?>">Sign Up</a>
		</div>
		<nav>
			for Artists & Creators
			<?php //wp_nav_menu( array( 'theme_location' => 'landing-menu', 'container' => false ) ); ?>
		</nav>
		<section class="description">
			<h1><?php echo $headerTagline; ?></h1>
			<a href="<?php echo $signUpLink; ?>" class="button blue-overPic"><?php echo $buttonText; ?></a>
		</section>
	</div>
	<div class="chevron-divider"></div>
</header>

<?php require 'content-main.php'; ?>

<?php get_footer(); ?>