<?php get_header(); ?>

<section class="search-results">
    <article class="container fade-in delay-level2">
        <div class="row">
            <?php
            if (class_exists('WooCommerce') && is_search()) {
                // Check if the search query is empty or less than 3 characters
                $search_query = get_search_query();
                if (empty($search_query) || strlen($search_query) < 3) {
                    echo '<p>Por favor, ingrese al menos tres caracteres para iniciar una búsqueda.</p>';
                } else {
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    // Query for WooCommerce products matching the search query
                    $product_query = new WP_Query(array(
                        'post_type' => 'product',
                        's' => $search_query,
                        'posts_per_page' => -1, // Retrieve all posts that match the query
                        'paged' => $paged,
                    ));

                    if ($product_query->have_posts()) {
                        while ($product_query->have_posts()) {
                            $product_query->the_post();
                            ?>
                            <div class="col-sm-6 col-xl-3 mb-5">
                                <div class="product-wrapper text-center box-shadow border-radius">
                                    <?php wc_get_template_part('content', 'product'); ?>
                                </div>
                            </div>
                            <?php
                        }

                        wp_reset_postdata();
                    } else {
                        echo '<p>No se encontraron resultados.</p>';
                    }
                }
            } else {
                echo '<p>No se encontraron resultados.</p>';
            }
            ?>
        </div>
    </article>
</section>

<?php get_footer(); ?>
