<?php

// Define paths constants
define('COMPANY_DATA_PATH', get_template_directory() . '/data/company.json');
define('SERVICES_DATA_PATH', get_template_directory() . '/data/services.json');
define('VIDEOS_DATA_PATH', get_template_directory() . '/data/videos.json');
define('NO_IMAGE_PLACEHOLDER', get_template_directory_uri() . '/assets/images/no-image-default.jpg');

function starterwptheme_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'starterwptheme_theme_support');

function starterwptheme_menus()
{
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init', 'starterwptheme_menus');

function starterwptheme_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('starterwptheme-style', get_template_directory_uri() . "/style.css", array('starterwptheme-bootstrap'), $version, 'all');
    wp_enqueue_style('starterwptheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('starterwptheme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'starterwptheme_register_styles');

function starterwptheme_register_scripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('starterwptheme-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('starterwptheme-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('starterwptheme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
    wp_enqueue_script('starterwptheme-main', get_template_directory_uri() . "/assets/js/main.js", array(), $version, true);
}

add_action('wp_enqueue_scripts', 'starterwptheme_register_scripts');

function starterwptheme_widget_areas()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area',
        )
    );
}

add_action('widgets_init', 'starterwptheme_widget_areas');

function custom_woocommerce_product_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_shop() ) {
        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'custom_woocommerce_product_query' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

function custom_product_image_modal() {
    ?>
    <!-- Modal Template -->
    <div class="modal fade" id="productImageModal" tabindex="-1" aria-labelledby="productImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Product Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productImages = document.querySelectorAll('.woocommerce-product-gallery__image a');
            productImages.forEach(function (image) {
                image.addEventListener('click', function (event) {
                    event.preventDefault();
                    const modalImage = document.getElementById('modalImage');
                    modalImage.src = this.querySelector('img').src;
                    const modal = new bootstrap.Modal(document.getElementById('productImageModal'));
                    modal.show();
                });
            });
        });
    </script>
    <?php
}

add_action( 'woocommerce_custom_product_image_modal', 'custom_product_image_modal' );

function woo_related_products_limit() {
    global $product;
        $args['posts_per_page'] = 6;
        return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'related_products_args', 20 );

function related_products_args( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 2;
    return $args;
}

function enqueue_styles() {
    // Enqueue the theme's main stylesheet
    wp_enqueue_style( 'ans-style', get_stylesheet_uri() );

    // Enqueue the custom WooCommerce stylesheet
    wp_enqueue_style( 'custom-woocommerce', get_template_directory_uri() . '/custom-woocommerce.css', array('ans-style') );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function custom_search_form( $form ) {
    $form = '
    <form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '">
        <div>
            <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
            <input type="text" value="' . get_search_query() . '" name="s" id="s" />
            <button type="submit" id="searchsubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'custom_search_form' );

function display_bag_popup_on_cart_page() {
    if (is_cart()) {
        $bag_product_id = 38; // Replace in production for 1117.
        $bag_in_cart = false;

        // WC() function return the Wocommerce object.
        // cart is a property returned by WC().
        // get_cart() returns the current items in the cart to be iterated by the loop.
        foreach (WC() -> cart -> get_cart() as $cart_item) {
            if ($cart_item['product_id'] == $bag_product_id) {
                $bag_in_cart = true;
                break;
            }
        }

        if (!$bag_in_cart) {
            echo '<div class="container">
                    <div class="bag-popup">
                        <a href="#" class="add-bag-button" data-product-id="' . esc_attr($bag_product_id) . '">    
                            <i class="fa-solid fa-bag-shopping"></i>
                            <img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/bag.png" alt="Bolsa" />
                            <p>¿Deseas incluir una bolsa?</p>
                        </a>
                    </div>
                </div>';
        }
    }
}

add_action('get_footer', 'display_bag_popup_on_cart_page');

// Load theme config file.
require_once get_template_directory() . '/config.php';