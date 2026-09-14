<?php
/**
 * Template part for displaying single posts
 *
 * @package Beletronicx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    <header class="post-header">
        <h1 class="post-title"><?php the_title(); ?></h1>
        
        <div class="post-meta">
            <time datetime="<?php echo get_the_date('c'); ?>">
                <?php echo get_the_date(); ?>
            </time>
            <span class="post-author">
                Por <?php the_author(); ?>
            </span>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <?php the_content(); ?>
        
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'beletronicx'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <footer class="post-footer">
        <div class="post-categories">
            <?php the_category(', '); ?>
        </div>
        
        <div class="post-tags">
            <?php the_tags('', ', ', ''); ?>
        </div>
    </footer>
</article>