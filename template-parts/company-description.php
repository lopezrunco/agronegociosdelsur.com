<section class="company-description">
    <article class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <img 
                    width="100%" 
                    class="border-radius box-shadow" 
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/ans-nosotros.jpg" 
                    alt="Nosotros" 
                />
                <div class="quote border-radius mb-4">
                    <i class="fa-solid fa-quote-left quotes-icon"></i>
                    <h5>
                        <?php echo get_bloginfo('description'); ?>
                    </h5>
                </div>
            </div>
            <div class="col-12 mt-lg-5">
                <?php get_template_part('template-parts/our-values'); ?>
            </div>
        </div>
    </article>
</section>