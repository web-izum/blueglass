<main id="site-content" class="page-content">
    <?php
    if (!is_front_page() && !is_home()) : ?>
        <header class="page-content__header">
            <div class="container">
                <h1 class="page-content__title">
		            <?php the_title(); ?>
                </h1>
            </div>
        </header>
    <?php
    endif; ?>

    <?php the_content(); ?>
</main>