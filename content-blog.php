<?php
global $post;

$title = get_the_title();

$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
$full_name = '';

if( empty($fname)){
    $full_name = $lname;
} elseif( empty( $lname )){
    $full_name = $fname;
} else {
    //both first name and last name are present
    $full_name = "{$fname} {$lname}";
}

if (strlen($full_name) <= 0) {
    $full_name = 'ascribe';
}

$url    = get_the_permalink();
$avatar = get_avatar( get_the_author_meta('ID'), 96 );

?>

<article <?php post_class( '', $post->ID ); ?>>

    <header>
        <?php echo get_the_category_list(); ?>
        <?php echo "<h1 class='entry-title'><a href='{$url}'>{$title}</a></h1>"  ?>
    </header>

    <div class="entry-image">
        <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-crop');
            echo "<img src='{$thumb[0]}' alt='{$title} image'>";

        }
        ?>
    </div>

    <div class="entry-meta">
        <?php echo $avatar; ?>
        <span class="author">by <?php echo $full_name; ?></span>
        on <date><?php the_time( get_option( 'date_format' ) ); ?></date>
    </div>

    <main class="entry-content">
        <?php
        if ( ! is_singular() ) {
            the_excerpt();
            echo "<a class='button small' href='{$url}'>Read More</a>";
        } else {
            the_content();
        }
        ?>
    </main>
</article>
