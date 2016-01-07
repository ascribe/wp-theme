<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-17
 * Time: 4:48 PM
 */

//<editor-fold desc="Init">
global $passInTitle;
$description    = '';
$image          = '';
$title          = '';
$url            = get_bloginfo('wpurl');
$permalink      = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$twitter        = '@ascribeio';

if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
    $shareimage = $large_image_url[0];
} else if ( get_field('header_background_image') != '' ) {
    $shareimage = get_field('header_background_image')['url'];
} else {
    $shareimage = WPTHEME_TEMPLATE_URL . '/images/ico/apple-touch-icon-180x180.png';
}
//</editor-fold>

//<editor-fold desc="Get Title">
if(isset($passInTitle)) {
    $title = $passInTitle;
}
else {
    $title = get_the_title();
}



if (strpos($title, 'Home') !== false)
{
    $title = '';
}
else {
    $title .= ' | ';
}
$title .= get_bloginfo();
//</editor-fold>

//<editor-fold desc="Get Description">

// Heads Up! This doesn't work cause it's outside of loop.
// But the following functions should handle all other use cases.
$description = get_the_excerpt();

if ( get_field('header_tagline') != '' ) {
    $description = strip_tags(get_field('header_tagline'));
}

if (empty($description)) {

    $content = get_field('subtemplate')[0]['content'];
    if (!empty($content)) {
        $description = substr(strip_tags($content),0,140)."...";

    }
}
if (empty($description)) {
    $description = get_bloginfo('description');
}
//</editor-fold>

//<editor-fold desc="Get Image">
$image  = get_field('header_image')['url'];
if (empty($image)) {
    $image = WPTHEME_TEMPLATE_URL.'/images/ico/apple-touch-icon-152x152.png';
}
//</editor-fold>

//<editor-fold desc="Get Links">
$signInLink = get_field('sign_in_link','option');
$signUpLink = get_field('sign_up_link','option');
//</editor-fold>
