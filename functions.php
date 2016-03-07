<?php

/**
 * ascribe functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package ascribe
 * @since 0.1.0
 */

require "controller/controller.inc.php";


// Useful global constants
define( 'WPTHEME_VERSION',      '0.1.0' );
define( 'WPTHEME_URL',          get_stylesheet_directory_uri() );
define( 'WPTHEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'WPTHEME_PATH',         get_template_directory() . '/' );
define( 'WPTHEME_INC',          WPTHEME_PATH . 'includes/' );

// Include compartmentalized functions
require_once WPTHEME_INC . 'core.php';
require_once WPTHEME_INC . 'cpt-team.php';
require_once WPTHEME_INC . 'cpt-career.php';
require_once WPTHEME_INC . 'cpt-presscoverage.php';
require_once WPTHEME_INC . 'cpt-event.php';

// Run the setup functions
TenUp\ascribe\Core\setup();


// REMOVE WIDTH AND HEIGHT ATTRIBUTES ON THUMBNAILS
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//remove emoji script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//
////ACF Collapser temp fix
//add_filter('acf/compatibility/field_wrapper_class', '__return_true');

// TURN ON ACF SETTINGS PAGE
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}

//add excerpt to page
function wpcodex_add_excerpt_support_for_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );


//Register Navigation
function register_primary_nav_menu() {
    register_nav_menu('landing-menu',__( 'Product Tour Navigation Menu' ));
    register_nav_menu('main-footer-menu',__( 'Main Footer Navigation Menu' ));
    register_nav_menu('lower-footer-menu',__( 'Lower Footer Navigation Menu' ));
}
add_action( 'init', 'register_primary_nav_menu');

// ADD THUMBNAILS TO POSTS
add_theme_support( 'post-thumbnails' );


// ENABLE HR IN WSYWIG
function enable_more_buttons($buttons) {
    $buttons[] = 'hr';

    return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");



// THUMBNAIL ADD CUSTOM SIZE
add_action( 'after_setup_theme', 'ttl_image_setup' );
function ttl_image_setup() {
    add_image_size( 'blog-crop', 600, 350, true ); //(cropped)
    add_image_size( 'blog-feature-crop', 300, 175, true ); //(cropped)
}


// ADD QUERY VAR FOR EVENT PAGINATION
add_filter('query_vars', 'add_my_var');
function add_my_var($public_query_vars) {
    $public_query_vars[] = 'date';
    return $public_query_vars;
}
