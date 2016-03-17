<?php
/*
 *
 * All the blog related custom functions
 *
 */

/*
 *
 * Add some custom image sizes to editor
 *
 */
function ascribe_blog_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'blog-full-column' => __( 'Blog Full Column' ),
    ) );
}
add_filter('image_size_names_choose', 'ascribe_blog_image_sizes');


/*
 *
 * Put excerpt meta-box before editor
 *
 */
add_action(
    'admin_menu', function () {
        remove_meta_box('postexcerpt', 'post', 'normal');
    }, 999
);
add_action('edit_form_after_title', 'post_excerpt_meta_box');

?>
