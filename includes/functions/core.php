<?php
namespace TenUp\ascribe\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action()
 *
 * @return void.
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',  $n( 'i18n' )        );
	add_action( 'wp_head',            $n( 'header_meta' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' )     );
	add_action( 'wp_enqueue_scripts', $n( 'styles' )      );
}

/**
 * Makes WP Theme available for translation.
 *
 * Translations can be added to the /lang directory.
 * If you're building a theme based on WP Theme, use a find and replace
 * to change 'wptheme' to the name of your theme in all template files.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 *
 * @return void.
 */
function i18n() {
	load_theme_textdomain( 'wptheme', WPTHEME_PATH . '/languages' );
 }

/**
 * Enqueue scripts for front-end.
 *
 * @uses wp_enqueue_script() to load front end scripts.
 *
 * @since 0.1.0
 *
 * @return void.
 */
function scripts( $debug = false ) {
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'wptheme',
		WPTHEME_TEMPLATE_URL . "/assets/js/ascribe{$min}.js",
		array(),
		WPTHEME_VERSION,
		true
	);
}

/**
 * Enqueue styles for front-end.
 *
 * @uses wp_enqueue_style() to load front end styles.
 *
 * @since 0.1.0
 *
 * @return void.
 */
function styles( $debug = false ) {
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'wptheme',
		WPTHEME_URL . "/assets/css/ascribe{$min}.css",
		array(),
		WPTHEME_VERSION
	);
}

/**
 * Add humans.txt to the <head> element.
 *
 * @uses apply_filters()
 *
 * @since 0.1.0
 *
 * @return void.
 */
function header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . WPTHEME_TEMPLATE_URL . '/humans.txt" />';

	echo apply_filters( 'wptheme_humans', $humans );
}
