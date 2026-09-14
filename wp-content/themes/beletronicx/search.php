<?php
/**
 * The template for displaying search results pages
 *
 * @package Beletronicx
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(esc_html__('Resultados para: %s', 'beletronicx'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
        </header>

        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'search');
            endwhile;

            the_posts_navigation();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>