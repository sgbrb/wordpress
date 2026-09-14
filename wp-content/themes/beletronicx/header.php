<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header -->
<header class="site-header">
    <div class="header-top">
        <div class="container">
            <div class="header-contact">
                <span><i class="fas fa-phone"></i> (11) 9999-9999</span>
                <span><i class="fas fa-envelope"></i> contato@beletronicx.com.br</span>
            </div>
            <div class="header-links">
                <?php if (is_user_logged_in()): ?>
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">Minha Conta</a> | 
                <?php else: ?>
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">Login/Cadastro</a> | 
                <?php endif; ?>
                <a href="<?php echo wc_get_cart_url(); ?>">Carrinho</a> | 
                <a href="<?php echo home_url('/contato'); ?>">Ajuda</a>
            </div>
        </div>
    </div>
    
    <div class="header-main">
        <div class="container">
            <div class="logo">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a href="<?php echo home_url(); ?>">
                        <span class="logo-bele">Bele</span><span class="logo-tronicx">tronicx</span>
                    </a>
                <?php endif; ?>
            </div>
            
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="search" placeholder="O que você está procurando?" value="<?php echo get_search_query(); ?>" name="s">
                <button type="submit"><i class="fas fa-search"></i></button>
                <?php if (class_exists('WooCommerce')): ?>
                    <input type="hidden" name="post_type" value="product">
                <?php endif; ?>
            </form>
            
            <div class="header-actions">
                <div class="header-action">
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <i class="far fa-user"></i>
                        <span>
                            <?php if (is_user_logged_in()): ?>
                                Minha Conta
                            <?php else: ?>
                                Entrar
                            <?php endif; ?>
                        </span>
                    </a>
                </div>
                <div class="header-action">
                    <a href="<?php echo home_url('/favoritos'); ?>">
                        <i class="far fa-heart"></i>
                        <span>Favoritos</span>
                    </a>
                </div>
                <div class="header-action" style="position: relative;">
                    <a href="<?php echo wc_get_cart_url(); ?>">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Carrinho</span>
                        <?php if (function_exists('WC')): ?>
                            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        <?php else: ?>
                            <span class="cart-count">0</span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <nav class="main-navigation">
        <div class="container">
            <button class="menu-toggle" aria-label="Abrir menu">
                <i class="fas fa-bars"></i>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'primary-menu',
                'container' => false,
                'fallback_cb' => 'beletronicx_fallback_menu'
            ));
            ?>
        </div>
    </nav>
</header>

<!-- Banner Principal -->
<?php get_template_part('template-parts/content', 'slider'); ?>