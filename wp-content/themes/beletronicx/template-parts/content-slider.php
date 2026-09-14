<?php
// Slider personalizado para Beletronicx
$slider_items = array(
    array(
        'image' => get_template_directory_uri() . '/assets/images/slide1.jpg',
        'title' => 'Tecnologia de Ponta na Beletronicx',
        'description' => 'Encontre os melhores eletrônicos com preços imbatíveis. Qualidade e garantia em todos os produtos.',
        'link' => home_url('/produtos'),
        'button_text' => 'Ver Produtos'
    ),
    array(
        'image' => get_template_directory_uri() . '/assets/images/slide2.jpg',
        'title' => 'Smartphones com Descontos Especiais',
        'description' => 'As melhores marcas com condições exclusivas. Android, iOS e muito mais!',
        'link' => home_url('/categoria/smartphones'),
        'button_text' => 'Comprar Agora'
    ),
    array(
        'image' => get_template_directory_uri() . '/assets/images/slide3.jpg',
        'title' => 'Setup Gamer Completo',
        'description' => 'Monte seu setup dos sonhos com nossos produtos gamer. Performance e qualidade garantida.',
        'link' => home_url('/categoria/gamer'),
        'button_text' => 'Montar Setup'
    )
);
?>

<section class="hero-slider">
    <?php foreach ($slider_items as $index => $slide): ?>
        <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>" 
             style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo $slide['image']; ?>');">
            <div class="slide-content">
                <h2><?php echo $slide['title']; ?></h2>
                <p><?php echo $slide['description']; ?></p>
                <a href="<?php echo $slide['link']; ?>" class="btn btn-accent"><?php echo $slide['button_text']; ?></a>
            </div>
        </div>
    <?php endforeach; ?>
    
    <div class="slider-dots">
        <?php foreach ($slider_items as $index => $slide): ?>
            <span class="dot <?php echo $index === 0 ? 'active' : ''; ?>"></span>
        <?php endforeach; ?>
    </div>
</section>