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

<header class="hero" style="background-image:url(<?php echo $bgImage; ?>)">
    <div class="sticky">
        <div class="row">

            <a href="<?php echo get_bloginfo('wpurl');?>">
                <img
                    src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-white.png"
                    srcset="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-white.png 1x, <?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-white@2x.png 2x"
                    alt="ascribe logo"
                    class="logo phone-and-up">
            </a>
            <a href="<?php echo get_bloginfo('wpurl');?>">
                <img
                    src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/ascribeicon-white.svg"
                    alt="ascribe logo"
                    class="logo phone-only">
            </a>

            <div class="app-links">
                <a href="<?php echo $signInLink; ?>">Log In</a>

                <button class="hamburger phone-only">
                    <span></span>
                </button>

            </div>
            <nav class="tour-switcher"><?php wp_nav_menu( array(
                    'theme_location' => 'landing-menu',
                    'container'      => false
                    )); ?>
            </nav>
        </div>
    </div>
    <div class="row">
        <section class="description">
            <h1><?php echo $headerTagline; ?></h1>
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
