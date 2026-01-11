<?php
/*
Template Name: WooCommerce Shop
*/

get_header();

// WooCommerce shop loop
if (have_posts()) :
    while (have_posts()) :
        the_post();
        woocommerce_content();
    endwhile;
endif;

get_footer();
