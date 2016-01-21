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
            <a href="<?php echo get_bloginfo('wpurl');?>"><img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/logo-black.png" class="logo phone-and-up"></a>
            <a href="<?php echo get_bloginfo('wpurl');?>"><img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/logo/ascribeicon-black.svg" class="logo phone-only"></a>
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
    <div class="row">
        <div class="mobile-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
        </div>
    </div>
</header>
<div class="chevron-divider"></div>
