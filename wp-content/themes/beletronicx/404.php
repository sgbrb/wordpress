<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Beletronicx
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Página não encontrada', 'beletronicx'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e('A página que você está procurando não existe ou foi movida.', 'beletronicx'); ?></p>
                
                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        Voltar para Home
                    </a>
                    <a href="<?php echo esc_url(home_url('/produtos')); ?>" class="btn btn-outline">
                        Ver Produtos
                    </a>
                </div>

                <?php get_search_form(); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>