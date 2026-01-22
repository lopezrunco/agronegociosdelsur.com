<?php
require_once get_template_directory() . '/functions.php';
if (file_exists(COMPANY_DATA_PATH)) {
    $json_data = file_get_contents(COMPANY_DATA_PATH);
    $company_data = json_decode($json_data, true);
}
?>

<img
    width="100%" 
    src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_white.svg" 
    alt="Nosotros"
/>
<?php if (!empty($company_data['description']) && is_array($company_data['description'])) : ?>
    <p><?php echo esc_html($company_data['description'][0]); ?></p>
<?php endif; ?>