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
                <img
                    width="100%" 
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_white.svg" 
                    alt="Nosotros"
                />
                <?php if (!empty($company_data['description']) && is_array($company_data['description'])) : ?>
                    <p><?php echo esc_html($company_data['description'][0]); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 mb-5 mb-lg-0 bottom-column">
                <h3>Categorías</h3>
                <nav>
                    <?php
                        // Get the parent category by slug.
                        $parent_category = get_term_by('slug', 'maquinaria-usada','product_cat');
                        // Check if parent category exists.
                        if ( $parent_category ) {
                            // Get subcategories from the parent category.
                            $subcategories = get_terms( array(
                                'taxonomy' => 'product_cat',
                                'parent' => $parent_category->term_id,
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => false
                            ) );

                            // Check if sub categories exist.
                            if (! empty( $subcategories ) && ! is_wp_error( $subcategories )) {
                                // Generate list with sub categories.
                                    foreach ($subcategories as $subcategory) {
                                        echo '<p><a href="' . get_term_link( $subcategory ) . '"> - ' . $subcategory->name  .'</a></p>';
                                    }
                            } else {
                                echo '<p>No se encontraron categorías.</p>';
                            }
                        } else {
                            echo '<p>No se encontró la categoria padre.</p>';
                        }
                    ?>
                </nav>
            </div>
            <div class="col-lg-5 mb-5 mb-lg-0 bottom-column">
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
            </div>
        </div>
    </article>
</section>