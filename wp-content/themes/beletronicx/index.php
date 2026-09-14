<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Beletronicx
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            
            // Se for a página inicial e tiver front-page.php, usa ele
            if (is_home() && !is_front_page()) :
                ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            // Loop principal
            while (have_posts()) :
                the_post();

                // Usa o template part apropriado
                get_template_part('template-parts/content', get_post_type());

            endwhile;

            // Navegação de posts
            the_posts_navigation();

        else :

            // Se não tiver posts
            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>