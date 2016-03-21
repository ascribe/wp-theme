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
function ascribe_move_excerpt_meta_box( $post ) {
    if ( in_array( $post->post_type, array( 'post' ) ) ) {
        remove_meta_box( 'postexcerpt', $post->post_type, 'normal' );
        echo "<h2 style='padding: 10px 0 0;'>Excerpt</h2>";
        post_excerpt_meta_box( $post );

        echo "<style>
                #excerpt { min-height: 90px }
                #excerpt + p { display: none }

              </style>";
    }
}
add_action( 'edit_form_after_title', 'ascribe_move_excerpt_meta_box' );

?>
