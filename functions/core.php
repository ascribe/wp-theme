<?php

/*
 *
 * Theme setup
 *
 */
function ascribe_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['caption']);

    // Full column content images for blog, 720px wide, auto height
    add_image_size( 'blog-full-column', 720 );

    // Blog teaser images, cropped to 720px x 420px
    add_image_size( 'blog-teaser', 720, 420, true );

    add_image_size( 'blog-feature-crop', 400, 230, true ); //(cropped)

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
}
add_action('after_setup_theme', 'ascribe_setup');


/*
 *
 * Theme Assets
 *
 */
function ascribe_assets() {

    // Styles
    wp_enqueue_style(
        'wptheme',
        WPTHEME_URL . "/assets/dist/css/ascribe.min.css",
        array(),
        WPTHEME_VERSION
    );

    // Scripts
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', false, '2.2.0', true);
        wp_enqueue_script('jquery');
    }

    wp_enqueue_script(
        'wptheme',
        WPTHEME_TEMPLATE_URL . "/assets/dist/js/ascribe.min.js",
        array('jquery'),
        WPTHEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'ascribe_assets' );

?>
