<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Beletronicx
 */

?>

<section class="no-results">
    <div class="page-content">
        <h2>Nenhum conteúdo encontrado</h2>
        
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    __('Ready to publish your first post? <a href="%s">Get started here</a>.', 'beletronicx'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        elseif (is_search()) :
            ?>
            <p>Desculpe, mas nada foi encontrado para os seus termos de busca. Tente novamente com palavras diferentes.</p>
            <?php
            get_search_form();
        else :
            ?>
            <p>Parece que não conseguimos encontrar o que você procura. Talvez uma busca possa ajudar.</p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>
</section>