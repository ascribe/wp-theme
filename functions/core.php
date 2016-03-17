<?php

/*
 *
 * Theme setup
 *
 */
function ascribe_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['caption']);

    add_image_size( 'blog-crop', 600, 350, true ); //(cropped)
    add_image_size( 'blog-feature-crop', 300, 175, true ); //(cropped)

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
