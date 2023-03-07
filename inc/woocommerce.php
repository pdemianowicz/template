<?php
//
// Add WooCommerce support
//
// @link https://woocommerce.com/document/woocommerce-theme-developer-handbook/#section-5
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


// Add WooCommerce theme support
if ( ! function_exists( 'template_woocommerce_setup' ) ) {
  function template_woocommerce_setup() {
    add_theme_support(
      'woocommerce', array(
        'single_image_width'    => 600,
        'gallery_thumbnail_image_width' => 150,
        // 'thumbnail_image_width' => 300,
        
        'product_grid'          => array(
          'default_rows'    => 4,
          'min_rows'        => 1,
          'default_columns' => 3,
          'min_columns'     => 1,
          'max_columns'     => 3,
        ),
      )
    );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
  }
}
add_action( 'after_setup_theme', 'template_woocommerce_setup' );


// Remove default woocommerce style
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


// Remove add to cart from main page
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');


// Add 'woocommerce-active' class to the body tag.
function template_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';
	return $classes;
}
add_filter( 'body_class', 'template_woocommerce_active_body_class' );


// Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
//Callback function that returns true if the current page is a WooCommerce page or false if otherwise.
function is_wc_page() {
	return class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() );
}

add_action( 'template_redirect', 'conditionally_remove_wc_assets' );
// Remove WC stuff on non WC pages.
function conditionally_remove_wc_assets() {
	if ( is_wc_page() ) {
		return;
	}

	// remove WC generator tag
	remove_filter( 'get_the_generator_html', 'wc_generator_tag', 10, 2 );
	remove_filter( 'get_the_generator_xhtml', 'wc_generator_tag', 10, 2 );

	// unload WC scripts
	remove_action( 'wp_enqueue_scripts', [ WC_Frontend_Scripts::class, 'load_scripts' ] );
	remove_action( 'wp_print_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );
	remove_action( 'wp_print_footer_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );

	// remove "Show the gallery if JS is disabled"
	remove_action( 'wp_head', 'wc_gallery_noscript' );

	// remove WC body class
	remove_filter( 'body_class', 'wc_body_class' );
}

add_filter( 'woocommerce_enqueue_styles', 'conditionally_woocommerce_enqueue_styles' );
// Unload WC stylesheets on non WC pages
function conditionally_woocommerce_enqueue_styles( $enqueue_styles ) {
	return is_wc_page() ? $enqueue_styles : array();
}

add_action( 'wp_enqueue_scripts', 'conditionally_wp_enqueue_scripts' );
// Remove inline style on non WC pages
function conditionally_wp_enqueue_scripts() {
	if ( ! is_wc_page() ) {
		wp_dequeue_style( 'woocommerce-inline' );
	}
}

// add_action( 'init', 'remove_wc_custom_action' );
function remove_wc_custom_action(){
	remove_action( 'wp_head', 'wc_gallery_noscript' );
}