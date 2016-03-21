<?php

/**
 * ascribe functions and definitions
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
define( 'WPTHEME_INC',          WPTHEME_PATH . 'functions/' );

// Include compartmentalized functions
require_once WPTHEME_INC . 'core.php';
require_once WPTHEME_INC . 'blog.php';
require_once WPTHEME_INC . 'cpt-team.php';
require_once WPTHEME_INC . 'cpt-career.php';
require_once WPTHEME_INC . 'cpt-presscoverage.php';
require_once WPTHEME_INC . 'cpt-event.php';
require_once WPTHEME_INC . 'cpt-testimonial.php';

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

//Register Navigation
function register_primary_nav_menu() {
    register_nav_menu('landing-menu',__( 'Product Tour Navigation Menu' ));
    register_nav_menu('main-footer-menu',__( 'Main Footer Navigation Menu' ));
    register_nav_menu('lower-footer-menu',__( 'Lower Footer Navigation Menu' ));
}
add_action( 'init', 'register_primary_nav_menu');

// ADD QUERY VAR FOR EVENT PAGINATION
add_filter('query_vars', 'add_my_var');
function add_my_var($public_query_vars) {
    $public_query_vars[] = 'date';
    return $public_query_vars;
}
