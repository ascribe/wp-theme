<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 * Date: 15-09-18
 * Time: 4:33 PM
 */
get_header();
$controller = new Controller();

?>

<?php get_template_part( 'template', 'header' ); ?>

<?php get_template_part( 'content', 'main' ); ?>

<?php get_footer(); ?>
