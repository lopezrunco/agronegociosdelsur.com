<?php
require_once get_template_directory() . '/functions.php';
if (file_exists(COMPANY_DATA_PATH)) {
    $json_data = file_get_contents(COMPANY_DATA_PATH);
    $company_data = json_decode($json_data, true);
}
?>

<h3>Empresas</h3>
<p class="my-4">Pueden contactarnos a través de Whatsapp o por e-mail.</p>
<div class="contact-info">
    <a><i class="me-3 fa-solid fa-envelope"></i> <?php echo $company_data['email'] ?></a>
    <a><i class="me-3 fa-solid fa-location-dot"></i> <?php echo $company_data['location'] ?></a>
    <a 
        href="tel:+598<?php echo $company_data['mobile'] ?>">
        <i class="me-3 fa-solid fa-mobile"></i> 
        <?php echo $company_data['mobile'] ?>
    </a>
</div>
<div class="social-icons">
    <?php 
    foreach ($company_data['social'] as $social_item) {
        ?>
        <a 
            href="<?php echo esc_url($social_item['link']); ?>" 
            target="_blank">
                <i class="<?php echo esc_attr($social_item['icon']) ?>"></i> 
        </a>
        <?php
    }
    ?>
</div>