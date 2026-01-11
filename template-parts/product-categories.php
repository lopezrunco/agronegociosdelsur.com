<section class="product-categories bg-light">
	<article class="container">
		<?php
		$parent_category = get_term_by('name', 'Especie', 'product_cat');

		if ($parent_category && !is_wp_error($parent_category)) {
			$product_categories = get_terms(array(
				'taxonomy' => 'product_cat', // WooCommerce product category taxonomy
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => true, // Hide empty categories
				'child_of' => $parent_category->term_id // Fetch subcategories of parent category
			));
			echo '
                <div class="section-title">
                    <h2>¿A quién vas a mimar hoy?</h2>
                </div>
            ';

			// Check if there are subcategories found.
			if (!empty($product_categories) && !is_wp_error($product_categories)) {
				echo '<div class="d-none d-lg-flex justify-content-between product-categories-container">';
				foreach ($product_categories as $category) {
					$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
					$image_url = wp_get_attachment_url($thumbnail_id);

					echo '<div class="product-category-item-wrapper">';
					if ($image_url) {
						echo '
                            <div class="image-wrapper">
                                <a href="' . get_term_link($category) . '">
                                    <img src="' . esc_url($image_url) . '" alt="' . esc_attr($category->name) . '" />
                                </a>
                            </div>';
					} else {
						// If no image is found, output a default placeholder image.
						echo '
                            <div class="image-wrapper">
                                <a href="' . get_term_link($category) . '">
                                    <img src="' . get_template_directory_uri() . '/assets/images/no-image-placeholder.png" alt="' . esc_attr($category->name) . '" />
                                </a>
                            </div>';
					}
					echo '<h5><a href="' . get_term_link($category) . '">' . $category->name . '</a><h5>';
					echo '</div>';
				}
				echo '</div>';

				// Mobile version with Bootstrap slider
				echo '<div id="productCategoriesCarousel" class="carousel slide d-block d-lg-none" data-ride="carousel">';
				echo '<div class="carousel-inner">';
				$active_class = 'active';
				foreach ($product_categories as $category) {
					$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
					$image_url = wp_get_attachment_url($thumbnail_id);

					echo '<div class="carousel-item ' . $active_class . '">';
					$active_class = ''; // Remove active class after the first item

					if ($image_url) {
						echo '
                            <div class="image-wrapper">
                                <a href="' . get_term_link($category) . '">
                                    <img src="' . esc_url($image_url) . '" class="d-block w-100" alt="' . esc_attr($category->name) . '" />
                                </a>
                            </div>';
					} else {
						// If no image is found, output a default placeholder image.
						echo '
                            <div class="image-wrapper">
                                <a href="' . get_term_link($category) . '">
                                    <img src="' . get_template_directory_uri() . '/assets/images/no-image-placeholder.png" class="d-block w-100" alt="' . esc_attr($category->name) . '" />
                                </a>
                            </div>';
					}
					echo '<h5 class="text-center"><a href="' . get_term_link($category) . '">' . $category->name . '</a><h5>';
					echo '</div>';
				}
				echo '</div>';
				echo '<a class="carousel-control-prev" href="#productCategoriesCarousel" role="button" data-slide="prev">
						<i class="fa-solid fa-chevron-left position-arrow"></i>
                      </a>';
				echo '<a class="carousel-control-next" href="#productCategoriesCarousel" role="button" data-slide="next">
						<i class="fa-solid fa-chevron-right position-arrow"></i>
                      </a>';
				echo '</div>';
			} else {
				echo '<p>No se encontraron categorias de producto.</p>';
			}
		} else {
			echo '<p>No se encontraró la categoria padre Especies.</p>';
		}
		?>
	</article>
</section>