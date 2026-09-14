<?php
/**
 * Beletronicx functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Configuração do tema
function beletronicx_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Registrar menus
    register_nav_menus(array(
        'primary' => 'Menu Principal',
        'footer' => 'Menu Rodapé'
    ));
    
    // Tamanhos de imagem personalizados
    add_image_size('beletronicx-slider', 1200, 500, true);
    add_image_size('beletronicx-product', 300, 300, true);
}
add_action('after_setup_theme', 'beletronicx_setup');

// Menu fallback
function beletronicx_fallback_menu() {
    ?>
    <ul class="primary-menu">
        <li><a href="<?php echo home_url('/smartphones'); ?>">Smartphones</a></li>
        <li><a href="<?php echo home_url('/computadores'); ?>">Computadores</a></li>
        <li><a href="<?php echo home_url('/audio-video'); ?>">Áudio & Vídeo</a></li>
        <li><a href="<?php echo home_url('/promocoes'); ?>">Promoções</a></li>
        <li><a href="<?php echo home_url('/novidades'); ?>">Novidades</a></li>
    </ul>
    <?php
}

// Enfileirar scripts e styles
function beletronicx_scripts() {
    // CSS
    wp_enqueue_style('beletronicx-style', get_stylesheet_uri());
    wp_enqueue_style('beletronicx-main', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // JavaScript
    wp_enqueue_script('beletronicx-script', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0', true);
    
    // Localize script para AJAX
    wp_localize_script('beletronicx-script', 'beletronicx_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url()
    ));
}
add_action('wp_enqueue_scripts', 'beletronicx_scripts');

// Widgets
function beletronicx_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar Loja',
        'id' => 'sidebar-shop',
        'description' => 'Sidebar para páginas da loja',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'description' => 'Primeira área do footer',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'beletronicx_widgets_init');

// Customizer settings
function beletronicx_customize_register($wp_customize) {
    // Seção de cores
    $wp_customize->add_section('beletronicx_colors', array(
        'title' => __('Cores do Tema', 'beletronicx'),
        'priority' => 30,
    ));
    
    // Cor primária
    $wp_customize->add_setting('primary_color', array(
        'default' => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Cor Primária', 'beletronicx'),
        'section' => 'beletronicx_colors',
        'settings' => 'primary_color',
    )));
    
    // Email de contato
    $wp_customize->add_setting('contact_email', array(
        'default' => 'contato@beletronicx.com.br',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email de Contato', 'beletronicx'),
        'section' => 'beletronicx_colors',
        'type' => 'email',
    ));
    
    // Telefone
    $wp_customize->add_setting('contact_phone', array(
        'default' => '(11) 9999-9999',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Telefone', 'beletronicx'),
        'section' => 'beletronicx_colors',
        'type' => 'text',
    ));
}
add_action('customize_register', 'beletronicx_customize_register');

// Shortcode para informações de contato
function beletronicx_contact_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => 'phone'
    ), $atts);
    
    if ($atts['type'] === 'phone') {
        return get_theme_mod('contact_phone', '(11) 9999-9999');
    } elseif ($atts['type'] === 'email') {
        return get_theme_mod('contact_email', 'contato@beletronicx.com.br');
    }
    
    return '';
}
add_shortcode('contato', 'beletronicx_contact_shortcode');