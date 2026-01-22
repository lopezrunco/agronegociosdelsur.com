<h3>Categorías</h3>
<nav class="product-category-list">
    <?php
    // Get the parent category by slug.
    $parent_category = get_term_by('slug', 'maquinaria-usada', 'product_cat');

    // Check if parent category exists.
    if ($parent_category) {
        // Get subcategories from the parent category.
        $subcategories = get_terms(array(
            'taxonomy' => 'product_cat',
            'parent' => $parent_category->term_id,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => false
        ));

        // Check if sub categories exist.
        if (!empty($subcategories) && ! is_wp_error($subcategories)) {
            // Generate list with sub categories.
            foreach ($subcategories as $subcategory) {

                // Get the ID of the category thumbnail.
                $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);

                // Get image url and fallback if there's no image.
                $image_url = $thumbnail_id
                    ? wp_get_attachment_image_url($thumbnail_id, 'thumbnail')
                    : wc_placeholder_img_src();

                echo '<div class="product-category-item">';
                    echo '<a href="' . esc_url(get_term_link($subcategory)) . '">';
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($subcategory->name) . '" class="category-thumb" />';
                        echo '<span> ' . esc_html($subcategory->name) . '</span>';
                    echo '</a>';
                echo '</div>';
            }
        } else {
            echo '<p>No se encontraron categorías.</p>';
        }
    } else {
        echo '<p>No se encontró la categoria padre.</p>';
    }
    ?>
</nav>