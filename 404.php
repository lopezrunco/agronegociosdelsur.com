<?php
get_header();
?>

<section>
    <article class="container fade-in delay-level2">
        <div class="row text-center">
            <div class="col-lg-6">
                <h1 class="text-center not-found-title">404!</h1>
                <h2 class="text-center mb-5">Página no encontrada</h2>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-center"><i class="fa-solid fa-house"></i> Volver a inicio</a>
            </div>
            <div class="col-lg-6">
                <div class="mb-5">
                    <p>
                        La página que busca ha sido movida o eliminada.
                    </p>
                    <p>
                        Es posible que haya sido reubicada o que ya no esté disponible en este sitio web.
                    </p>
                    <p>
                        Regrese a la página de inicio para explorar más contenido interesante, o utilize la caja de búsqueda para encontrar información específica que esté buscando.
                    </p>
                </div>
                <?php get_search_form(); ?>
            </div>
        </div>
    </article>
</section>

<?php
get_footer();
?>