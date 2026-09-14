<!-- Newsletter -->
<section class="newsletter">
    <div class="container">
        <h2>Fique por Dentro das Novidades</h2>
        <p>Receba ofertas exclusivas, lançamentos e descontos especiais da Beletronicx no seu e-mail.</p>
        
        <form class="newsletter-form" method="post">
            <input type="email" name="email" placeholder="Seu melhor e-mail" required>
            <button type="submit">Assinar</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="footer-widget">
                <h3>Sobre a Beletronicx</h3>
                <p>Somos uma loja especializada em eletrônicos, oferecendo os melhores produtos com preços competitivos e atendimento de excelência.</p>
                <div class="social-links">
                    <a href="https://facebook.com/beletronicx" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://instagram.com/beletronicx" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/beletronicx" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://youtube.com/beletronicx" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-widget">
                <h3>Categorias</h3>
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'number' => 5
                ));
                
                if ($categories && !is_wp_error($categories)): ?>
                    <ul>
                        <?php foreach ($categories as $category): ?>
                            <li><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li><a href="<?php echo home_url('/smartphones'); ?>">Smartphones</a></li>
                        <li><a href="<?php echo home_url('/computadores'); ?>">Computadores</a></li>
                        <li><a href="<?php echo home_url('/audio-video'); ?>">Áudio & Vídeo</a></li>
                        <li><a href="<?php echo home_url('/tablets'); ?>">Tablets</a></li>
                        <li><a href="<?php echo home_url('/acessorios'); ?>">Acessórios</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            
            <div class="footer-widget">
                <h3>Institucional</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'items_wrap' => '<ul>%3$s</ul>',
                    'fallback_cb' => function() {
                        echo '
                        <ul>
                            <li><a href="' . home_url('/sobre') . '">Sobre Nós</a></li>
                            <li><a href="' . home_url('/contato') . '">Contato</a></li>
                            <li><a href="' . home_url('/politica-privacidade') . '">Política de Privacidade</a></li>
                            <li><a href="' . home_url('/termos-uso') . '">Termos de Uso</a></li>
                            <li><a href="' . home_url('/trocas-devolucoes') . '">Trocas e Devoluções</a></li>
                        </ul>';
                    },
                ));
                ?>
            </div>
            
            <div class="footer-widget">
                <h3>Atendimento</h3>
                <ul class="contact-info">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Av. Paulista, 1000 - São Paulo, SP</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span><?php echo get_theme_mod('contact_phone', '(11) 9999-9999'); ?></span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span><?php echo get_theme_mod('contact_email', 'contato@beletronicx.com.br'); ?></span>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span>Segunda a Sexta: 9h às 18h<br>Sábado: 9h às 13h</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - CNPJ: 12.345.678/0001-90 - Todos os direitos reservados</p>
            <p>www.beletronicx.com.br</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>