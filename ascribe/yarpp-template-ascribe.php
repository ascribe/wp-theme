<?php
/*
YARPP Template: ascribe Blog
*/

if ( have_posts() ): ?>

    <section class="related">
        <h1 class="related__title">Related</h1>
        <div class="grid grid--gutters grid--full grid-mini--half grid-small--third">

    	<?php while ( have_posts()) : the_post(); ?>
    		<?php if (has_post_thumbnail()):?>
                <div class="grid__col">
                    <a href="<?php the_permalink() ?>">
                        <article class="featured">
                            <?php the_post_thumbnail('blog-feature-crop'); ?>
                            <h1 class="featured__title"><?php the_title() ?></h1>
                        </article>
                    </a>
                </div>
    		<?php endif; ?>
    	<?php endwhile; ?>
        </div>
    </section>

<?php endif; ?>
