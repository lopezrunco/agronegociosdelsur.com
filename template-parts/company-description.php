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
                    <h2>Empresa</h2>
                </div>    
            
                <?php if (!empty($company_data['description']) && is_array($company_data['description'])) : ?>
                    <?php foreach($company_data['description'] as $pharagraph) : ?>
                        <p><?php echo esc_html($pharagraph); ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="section-title">
                    <h2>Objetivo</h2>
                </div>    
            
                <?php if (!empty($company_data['objective']) && is_array($company_data['objective'])) : ?>
                    <?php foreach($company_data['objective'] as $pharagraph) : ?>
                        <p><?php echo esc_html($pharagraph); ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </article>
</section>