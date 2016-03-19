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
            <a href="<?php echo $signInLink; ?>">Log In</a> / <a href="<?php echo $signUpLink; ?>">Sign Up</a>
            <img src="<?php echo WPTHEME_TEMPLATE_URL; ?>/images/svg/hamburger.svg" class="phone-only hamburger">
        </div>
        <nav class="tour-switcher"><?php wp_nav_menu( array(
                'theme_location' => 'landing-menu',
                'container'      => false
            )); ?>
        </nav>
        <div class="mobile-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'main-footer-menu', 'container' => false ) ); ?>
        </div>
    </div>
    <div class="chevron-divider"></div>

    <?php
        $blogPage       = get_page_by_title('Blog');
        $blogUrl        = get_permalink($blogPage->ID);
    ?>

    <h1><a href="<?php echo $blogUrl; ?>">ascribe blog</a></h1>
</header>
<nav class="blog-categories">
    <div class="row">
        <ul>
            <?php
            $args = array(
                'hide_empty' => 0
            );
            echo "<li><a href='{$blogUrl}'>All</a></li>";

            foreach((get_categories($args)) as $category) {
                if ($category->cat_name != 'Uncategorized') {
                    echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '><span>' . $category->name.'</span></a></li> ';
                }
            }
            ?>
        </ul>
    </div>
</nav>
