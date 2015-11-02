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

	add_action( 'wp_enqueue_scripts', $n( 'scripts' )     );

	add_action( 'wp_enqueue_scripts', $n( 'styles' )      );

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

	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.3.2',true);
	wp_enqueue_script('jquery');

	wp_enqueue_script(
		'wptheme',
		WPTHEME_TEMPLATE_URL . "/assets/js/ascribe.min.js",
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