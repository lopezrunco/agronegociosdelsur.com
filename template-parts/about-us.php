<section class="company-description bg-light">
    <article class="container fade-in delay-level2">
        <div class="row">
            <div class="col-8 offset-2 d-flex flex-column justify-content-center align-items-center text-center gap-3">
                <h4>Acerca de Nosotros</h4>
                <p><?php echo get_bloginfo('description'); ?></p>
                <a 
                    href="<?php echo get_permalink( get_page_by_path('contacto') ); ?>"
                    class="btn btn-primary"
                >
                    Consúltenos <i class="far fa-comment"></i>
                </a>
            </div>
        </div>
    </article>
</section>