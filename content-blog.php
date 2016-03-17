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

$url     = get_the_permalink();
$avatar  = get_avatar( get_the_author_meta('ID'), 96 );
$excerpt = get_the_excerpt();
$teaser  = get_the_post_thumbnail($post->ID, 'blog-teaser');

?>

<article <?php post_class( '', $post->ID ); ?>>

    <header class="entry-header">
        <?php
            echo get_the_category_list();
            echo "<h1 class='entry-title'><a href='{$url}'>{$title}</a></h1>";

            // Show custom post excerpt when set
            if ( is_singular() && has_excerpt() ) {
                echo "<div class='entry-lead'>{$excerpt}</div>";
            }
        ?>
    </header>

    <?php if ( has_post_thumbnail() ) { ?>
        <div class="entry-teaser">
            <?php if ( is_singular() ) {
                echo $teaser;
            } else {
                echo "<a href='{$url}'>{$teaser}</a>";
            }
            ?>
        </div>
    <?php } ?>

    <div class="entry-meta">
        <?php echo $avatar; ?>
        <span class="author">by <?php echo $full_name; ?></span>
        on <date><?php the_time( get_option( 'date_format' ) ); ?></date>
    </div>

    <main class="entry-content">
        <?php
        if ( ! is_singular() ) {
            echo "<p>{$excerpt}</p>";
            echo "<a class='button small' href='{$url}'>Read More</a>";
        } else {
            the_content();
        }
        ?>
    </main>

    <?php if ( is_singular() ) {
        get_template_part( 'partials/share' );
    } ?>

</article>
