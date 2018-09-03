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
        </div>
    </div>
</header>
<div class="chevron-divider"></div>
