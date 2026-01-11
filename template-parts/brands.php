<?php
// Obtain & decode static data from JSON.
require_once get_template_directory() . '/functions.php';

if (file_exists(BRANDS_DATA_PATH)) {
    $json_data = file_get_contents(BRANDS_DATA_PATH);
    $images_names = json_decode($json_data, true); // "True" to decode as Associative array instead of an Object. 
} else {
    $images_names = array();
}

$brands = get_terms(array(
    'taxonomy' => 'pa_marca',
    'hide_empty' => false
));

$no_image_placeholder = NO_IMAGE_PLACEHOLDER;

function get_brand_data($brand, $images_names, $no_image_placeholder) {
    $term_slug = $brand->slug;
    $image_name = isset($images_names[$term_slug]) ? $images_names[$term_slug] : null;
    $image_url = $image_name ? get_template_directory_uri() . '/assets/images/brands/' . $image_name : $no_image_placeholder;
    // Construct the link to filter product by brand.
    $brand_link = home_url('/tienda/?filter_marca=' . $term_slug . '&query_type_marca=or');

    return array(
        'image_url' => $image_url,
        'brand_link' => $brand_link,
        'brand_name' => $brand->name,
    );
}

if (!empty($brands) && !is_wp_error($brands)) : ?>
    <!-- Desktop Version (Grid Layout) -->
    <section class="brands-slider d-none d-lg-block">
        <article class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Nuestras marcas</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($brands as $brand) :
                    $brand_data = get_brand_data($brand, $images_names, $no_image_placeholder);
                ?>
                    <div class="col" style="flex: 0 0 12.5%;">
                        <div class="brand-wrapper p-2">
                            <a href="<?php echo esc_url($brand_data['brand_link']); ?>">
                                <img 
                                    width="100%" 
                                    class="border-radius box-shadow" 
                                    src="<?php echo esc_url($brand_data['image_url']); ?>" 
                                    alt="<?php echo esc_attr($brand_data['brand_name']); ?>" 
                                />
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    </section>

    <!-- Mobile Version (Bootstrap Carousel) -->
    <section class="brands-slider d-block d-lg-none">
        <article class="container">
            <div class="row">
                <div class="section-title mb-0">
                    <h2>Nuestras marcas</h2>
                </div>
            </div>
            <div id="brandCarouselMobile" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner py-5">
                    <?php foreach ($brands as $index => $brand) :
                        $brand_data = get_brand_data($brand, $images_names, $no_image_placeholder);
                    ?>
                        <div class="carousel-item px-5 <?php echo $index === 0 ? 'active' : ''; ?>">
                            <a href="<?php echo esc_url($brand_data['brand_link']); ?>">
                                <img 
                                    class="d-block w-100 border-radius box-shadow" 
                                    src="<?php echo esc_url($brand_data['image_url']); ?>" 
                                    alt="<?php echo esc_attr($brand_data['brand_name']); ?>" 
                                />
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#brandCarouselMobile" role="button" data-slide="prev">
                    <i class="fa-solid fa-chevron-left position-arrow"></i>
                </a>
                <a class="carousel-control-next" href="#brandCarouselMobile" role="button" data-slide="next">
                    <i class="fa-solid fa-chevron-right position-arrow"></i>
                </a>
            </div>
        </article>
    </section>
<?php endif; ?>