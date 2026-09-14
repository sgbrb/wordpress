<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
            
            <div class="page-content">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </article>
    </div>
</main>

<?php get_footer(); ?>