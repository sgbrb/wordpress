<?php
/**
 * Template part for displaying posts
 *
 * @package Beletronicx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('beletronicx-product'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <header class="post-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title">', '</h1>');
            else :
                the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
            endif;
            ?>

            <div class="post-meta">
                <time datetime="<?php echo get_the_date('c'); ?>">
                    <?php echo get_the_date(); ?>
                </time>
            </div>
        </header>

        <div class="post-excerpt">
            <?php
            if (is_singular()) :
                the_content();
            else :
                the_excerpt();
            endif;
            ?>
        </div>

        <?php if (!is_singular()) : ?>
            <footer class="post-footer">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                    Ler Mais
                </a>
            </footer>
        <?php endif; ?>
    </div>
</article>