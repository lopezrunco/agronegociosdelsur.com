<?php
require_once get_template_directory() . '/functions.php';
if (file_exists(COMPANY_DATA_PATH)) {
    $json_data = file_get_contents(COMPANY_DATA_PATH);
    $company_data = json_decode($json_data, true);
}
?>

<h3>Contáctenos</h3>
<a><i class="me-3 fas fa-map-marker"></i> <?php echo $company_data['location'] ?></a>
<a><i class="me-3 fa-solid fa-envelope"></i> <?php echo $company_data['email'] ?></a>
<?php
    foreach ($company_data['phones'] as $phone) {
    ?>
        <a>
            <i class="me-3 fas fa-phone"></i>
            <?php echo esc_html($phone); ?>
        </a>
    <?php
    }
?>