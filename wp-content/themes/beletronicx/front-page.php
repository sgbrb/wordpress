<?php
/**
 * The front page template file
 *
 * @package Beletronicx
 */

get_header(); ?>

<main class="site-main">
    <?php
    // Slider
    get_template_part('template-parts/content', 'slider');
    
    // Categorias
    get_template_part('template-parts/content', 'categories');
    
    // Produtos em Destaque
    get_template_part('template-parts/content', 'products');
    
    // Destaques
    get_template_part('template-parts/content', 'features');
    ?>
</main>

<?php get_footer(); ?>