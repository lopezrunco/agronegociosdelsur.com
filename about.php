<?php

/**
 * Template Name: About
 * 
 * @package ANS WP Theme
 */

get_header(); 
get_template_part('template-parts/company-description');

// Start Call to action section variables and template part
$cta_bg_image_url = '/assets/images/call-to-action-bg.jpg';
$cta_subtitle = 'Háganos llegar sus inquietudes y un especialista se contactará con usted a la brevedad.';
$cta_title = '¿Dudas? ¿Consultas?';
$contact_page = get_page_by_path('contacto');
$cta_button_url = get_permalink($contact_page->ID);
$cta_button_text = 'Contacto';
$cta_icon = 'fa-comment';
include get_template_directory() . '/template-parts/call-to-action.php';
// End Call to action section variables and template part

get_footer(); 
?>