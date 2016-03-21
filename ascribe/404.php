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

    <main class="above-chevron">
        <section class='subtemplate four-oh-four'>
            <div class='centered-content-padding'>
                <div class='centered-footer'>
                    <h1>This page doesn't exist!</h1>
                    <div>Don't worry. You can either go to our <a href="/">homepage</a> or read our <a href="/blog">blog</a>.</div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
