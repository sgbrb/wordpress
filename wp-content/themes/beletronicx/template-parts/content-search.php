<?php
/**
 * Template part for displaying search results
 *
 * @package Beletronicx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-result'); ?>>
    <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    
    <div class="entry-meta">
        <a href="<?php the_permalink(); ?>" class="read-more">
            Ver Mais
        </a>
    </div>
</article>