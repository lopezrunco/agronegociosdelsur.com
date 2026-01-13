<?php
require_once get_template_directory() . '/functions.php';
if (file_exists(COMPANY_DATA_PATH)) {
    $json_data = file_get_contents(COMPANY_DATA_PATH);
    $company_data = json_decode($json_data, true);
}
?>


<div class="section-title">
    <h2><h2>Datos de contacto</h2></h2>
    <div class="separator"></div>
</div>
<p class="my-4">Ante cualquier duda o consulta, use los medios aquí detallados para ponerse en contacto con nosotros.</p>
<div class="contact-info">
    <a><i class="me-3 fa-solid fa-location-dot"></i> <?php echo $company_data['location'] ?></a>
    <a><i class="me-3 fa-solid fa-envelope"></i> <?php echo $company_data['email'] ?></a>
    <?php foreach ($company_data['phones'] as $phone) { ?>
        <a>
            <i class="me-3 fas fa-phone"></i><?php echo esc_html($phone); ?>
        </a>
    <?php } ?>
</div>
<div class="social-icons">
    <?php foreach ($company_data['social'] as $social_item) { ?>
        <a href="<?php echo esc_url($social_item['link']); ?>" target="_blank">
            <i class="<?php echo esc_attr($social_item['icon']) ?>"></i> 
        </a>
    <?php } ?>
</div>