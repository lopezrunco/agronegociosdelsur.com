<?php

/**
 * Template Name: Contact
 * 
 * @package ANS WP Theme
 */

get_header();
?>

<section>
    <article class="container fade-in delay-level2">
        <div class="row">
            <div class="col-lg-5 mb-5">
                <?php get_template_part('template-parts/contact-info'); ?>
            </div>
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="section-title">
                    <h2>Envíenos un mensaje</h2>
                    <div class="separator"></div>
                </div>
                <?php
                // Dev form
                // echo do_shortcode('[contact-form-7 id="5f9fe5f" title="Formulario de contacto"]');

                // Prod form
                echo do_shortcode('[contact-form-7 id="c25c7a8" title="Formulario de contacto"]'); 
                ?>
            </div>
            <div class="col-12">
                <?php get_template_part('template-parts/social-icons'); ?> 
            </div>
        </div>
    </article>
</section>

<?php 
get_template_part('template-parts/map');
get_footer();