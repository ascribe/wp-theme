<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-24
 * Time: 5:32 PM
 */

require 'controller/init.php';
?>

<header class="header">
    <div class="sticky">
        <div class="row">
            <a href="<?php echo get_bloginfo('wpurl');?>">
                <img
                    src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-black.png"
                    srcset="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-black.png 1x, <?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-black@2x.png 2x"  
                    alt="ascribe logo"
                    class="logo phone-and-up">
            </a>
            <a href="<?php echo get_bloginfo('wpurl');?>">
                <img
                    src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/ascribeicon-black.svg"
                    alt="ascribe logo"
                    class="logo phone-only">
            </a>
            <div class="app-links">
                <a href="<?php echo $signInLink; ?>">Log In</a> / <a href="<?php echo $signUpLink; ?>">Sign Up</a>

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
        <div class="mobile-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
        </div>
    </div>
</header>
<div class="chevron-divider"></div>
