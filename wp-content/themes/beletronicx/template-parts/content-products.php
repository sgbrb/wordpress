<?php
/**
 * Template part for displaying featured products
 *
 * @package Beletronicx
 */

// Verificar se WooCommerce está ativo
if (class_exists('WooCommerce')) {
    $featured_products = wc_get_products(array(
        'status' => 'publish',
        'limit' => 8,
        'visibility' => 'visible',
        'meta_key' => '_featured',
        'meta_value' => 'yes'
    ));
} else {
    $featured_products = array();
}
?>

<section class="section" style="background-color: white;">
    <div class="container">
        <div class="section-title">
            <h2>Produtos em Destaque</h2>
        </div>
        
        <?php if ($featured_products): ?>
            <div class="products-grid">
                <?php foreach ($featured_products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php if ($product->is_on_sale()): ?>
                                <span class="product-badge">Oferta</span>
                            <?php endif; ?>
                            <a href="<?php echo $product->get_permalink(); ?>">
                                <?php echo $product->get_image(); ?>
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-category">
                                <?php
                                $categories = $product->get_category_ids();
                                if (!empty($categories)) {
                                    $category = get_term($categories[0]);
                                    echo $category->name;
                                }
                                ?>
                            </div>
                            <h3 class="product-title">
                                <a href="<?php echo $product->get_permalink(); ?>">
                                    <?php echo $product->get_name(); ?>
                                </a>
                            </h3>
                            <div class="product-price">
                                <span class="current-price"><?php echo $product->get_price_html(); ?></span>
                            </div>
                            <div class="product-rating">
                                <?php
                                $rating = $product->get_average_rating();
                                if ($rating > 0) {
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($i - 0.5 <= $rating) {
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                    echo '<span>(' . $product->get_rating_count() . ')</span>';
                                }
                                ?>
                            </div>
                            <div class="product-actions">
                                <a href="?add-to-cart=<?php echo $product->get_id(); ?>" class="btn add_to_cart_button">
                                    Adicionar ao Carrinho
                                </a>
                                <a href="<?php echo $product->get_permalink(); ?>" class="btn btn-outline">
                                    Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-products">
                <p>Instale o WooCommerce para exibir produtos ou adicione alguns produtos marcados como "Destaque".</p>
            </div>
        <?php endif; ?>
    </div>
</section>