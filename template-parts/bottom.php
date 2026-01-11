<?php
require_once get_template_directory() . '/functions.php';
if (file_exists(COMPANY_DATA_PATH)) {
    $json_data = file_get_contents(COMPANY_DATA_PATH);
    $company_data = json_decode($json_data, true);
}
?>

<section class="bottom">
    <article class="container fade-in delay-level2">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0 bottom-column">
                <h4>Teléfonos</h4>
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
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0 bottom-column">
                <h4>Dónde estamos </h4>
                <a><i class="me-3 fas fa-map-marker"></i> <?php echo $company_data['location'] ?></a>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0 bottom-column">
                <h4>Email </h4>
                <a><i class="me-3 fa-solid fa-envelope"></i> <?php echo $company_data['email'] ?></a>
            </div>
        </div>
    </article>
</section>