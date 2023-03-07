<?php
//
// Declaring widgets
//
// @link https://codex.wordpress.org/Widgetizing_Themes
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

function template_widgets_init() {

  // register_sidebar( array(
  //   'name'          => __( 'Main Sidebar', 'template' ),
  //   'id'            => 'sidebar-1',
  //   'description'   => __( 'Main sidebar widget area', 'template' ),
  //   'before_widget' => '<section id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</section>',
  //   'before_title'  => '<h3 class="widget-title">',
  //   'after_title'   => '</h3>',
  // ) ); 

	if ( class_exists( 'Woocommerce' ) ){
		register_sidebar(
			array(
				'name'          => __( 'WooCommerce Shop Sidebar', 'template' ),
				'id'            => 'wc-sidebar',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
  }
}
add_action( 'widgets_init', 'template_widgets_init' );