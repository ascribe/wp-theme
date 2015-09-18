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
require_once WPTHEME_INC . 'functions/core.php';

// Run the setup functions
TenUp\ascribe\Core\setup();


// REMOVE WIDTH AND HEIGHT ATTRIBUTES ON THUMBNAILS
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

//remove emoji script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//ACF Collapser temp fix
add_filter('acf/compatibility/field_wrapper_class', '__return_true');

// TURN ON ACF SETTINGS PAGE
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

//add excerpt to page
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );


//Register Navigation
function register_primary_nav_menu() {
	register_nav_menu('header-menu',__( 'Primary Navigation Menu' ));
	register_nav_menu('research-menu',__( 'Research Areas Menu' ));
}
add_action( 'init', 'register_primary_nav_menu');