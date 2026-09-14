<?php
/**
 * Template part for displaying categories grid
 *
 * @package Beletronicx
 */

// Obter categorias de produtos WooCommerce
$categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => true,
    'number' => 4,
    'orderby' => 'count',
    'order' => 'DESC'
));

if (!$categories || is_wp_error($categories)) {
    // Fallback categories se WooCommerce não estiver ativo
    $categories = array(
        (object) array('name' => 'Smartphones', 'slug' => 'smartphones', 'description' => 'Os melhores modelos com as últimas tecnologias'),
        (object) array('name' => 'Notebooks', 'slug' => 'notebooks', 'description' => 'Para trabalho, estudo e entretenimento'),
        (object) array('name' => 'Áudio', 'slug' => 'audio', 'description' => 'Fones, caixas de som e acessórios'),
        (object) array('name' => 'TV & Vídeo', 'slug' => 'tv-video', 'description' => 'Smart TVs, monitores e projetores')
    );
}
?>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Categorias em Destaque</h2>
        </div>
        
        <div class="categories-grid">
            <?php foreach ($categories as $category): ?>
                <div class="category-card">
                    <div class="category-image">
                        <?php
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        if ($thumbnail_id) {
                            echo wp_get_attachment_image($thumbnail_id, 'medium');
                        } else {
                            echo '<i class="fas fa-mobile-alt"></i>';
                        }
                        ?>
                    </div>
                    <div class="category-content">
                        <h3><?php echo $category->name; ?></h3>
                        <p><?php echo $category->description; ?></p>
                        <a href="<?php echo get_term_link($category); ?>" class="btn btn-outline">Ver Produtos</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>