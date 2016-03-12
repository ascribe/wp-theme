<?php $controller = new Controller(); ?>

<main class="main above-chevron">

    <?php if ( is_page('faq') ) { ?>
        <div class="subtemplate row subtemplate--faq">

            <h1 class="page-title"><?php the_title(); ?></h1>

            <div class="grid grid--gutters grid--full grid-small--fit">
                <div class="grid__col grid__col--toc">
                    <div id="toc"></div>
                </div>

                <div class="grid__col">
                    <?php echo $controller->loopSubtemplates(); ?>
                </div>

        </div>
    <?php } else {
        echo $controller->loopSubtemplates();
    } ?>

</main>
