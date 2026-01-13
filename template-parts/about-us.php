<?php
require_once get_template_directory() . '/functions.php';
if (file_exists(COMPANY_DATA_PATH)) {
    $json_data = file_get_contents(COMPANY_DATA_PATH);
    $company_data = json_decode($json_data, true);
}
?>

<section class="company-description bg-light">
    <article class="container fade-in delay-level2">
        <div class="row">
            <div class="d-none d-md-block col-md-5">
                <img
                    width="100%" 
                    class="border-radius hard-shadow" 
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/ans-nosotros.jpg" 
                    alt="Nosotros"
                />
            </div>
            <div class="col-md-7">
                <div class="section-title">
                    <span class="line"></span>
                    <h6 class="subtitle">Sobre nosotros</h6>
                    <h2>Agronegocios del Sur</h2>
                </div>    
            
                <?php if (!empty($company_data['description']) && is_array($company_data['description'])) : ?>
                    <?php foreach($company_data['description'] as $pharagraph) : ?>
                        <p><?php echo esc_html($pharagraph); ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <a href="<?php echo get_permalink( get_page_by_path('empresa') ); ?>" class="btn btn-primary">
                    Conozca más sobre nosotros <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </article>
</section>