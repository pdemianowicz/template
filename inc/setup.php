<?php
defined( 'ABSPATH' ) || exit;

// function template_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'template_content_width', 808 );
// }
// add_action( 'after_setup_theme', 'template_content_width', 0 );

function template_setup() {
	load_theme_textdomain( 'template', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
		// /*
		//  * Enable support for Post Formats.
		//  * See http://codex.wordpress.org/Post_Formats
		//  */
		// add_theme_support(
		// 	'post-formats',
		// 	array(
		// 		'aside',
		// 		'image',
		// 		'video',
		// 		'quote',
		// 		'link',
		// 	)
		// );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

  register_nav_menus(
		array(
			'header' => esc_html__( 'Header', 'template' ),
			'social-menu' => esc_html__( 'Social Menu Links', 'template' ),
			'1 column footer' => esc_html__( '1 column footer', 'template' ),
			'2 column footer' => esc_html__( '2 column footer', 'template' ),
			'3 column footer' => esc_html__( '3 column footer', 'template' ),
			'4 column footer' => esc_html__( '4 column footer', 'template' ),
		)
	);
}
add_action( 'after_setup_theme', 'template_setup' );


// default excerpt length
function my_excerpt_length($length){ return 30; } 
add_filter('excerpt_length', 'my_excerpt_length');


// Custom image sizes for theme.
function template_image_sizes() {
  update_option( 'image_default_align', 'center' ); 
  update_option( 'image_default_size', 'large' ); 

  set_post_thumbnail_size( 1000, 432, true );
  add_image_size( 'custom-thumb', 304, 170, true);
  add_image_size( 'custom-medium', 640, 360, true);
  add_image_size( 'custom-large', 783, 440, true);
  // add_image_size( 'custom-blog-cropped', 1200, 500, true );
  // add_image_size( 'custom-avatar-cropped', 110, 110, true );
}
add_action( 'after_setup_theme', 'template_image_sizes' );

// Register the image sizes for use in Add Media panel
function template_custom_image_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'custom-thumb' => __( 'Thumbnail' ),
    'custom-medium' => __( 'Medium' ),
    'custom-large' => __( 'Large' ),
  ) );
}
add_filter( 'image_size_names_choose','template_custom_image_sizes' );

// Disable generated image sizes
function template_disable_image_sizes($sizes) {
  unset( $sizes[ 'thumbnail' ] );
  unset( $sizes[ 'medium' ] );
	unset( $sizes[ 'medium_large' ] );
  unset( $sizes[ 'large' ] );
	unset( $sizes[ '1536x1536' ] );    
	unset( $sizes[ '2048x2048' ] );  
  
  // With WooCommerce you can remove these too
  // unset( $sizes[ 'shop_thumbnail' ]); // Shop thumbnail (180 x 180 hard cropped)
  // unset( $sizes[ 'shop_catalog' ]); // Shop catalog (300 x 300 hard cropped) 
  // unset( $sizes[ 'shop_single' ]); // Shop single (600 x 600 hard cropped)
	return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'template_disable_image_sizes');

// disable scaled image size
add_filter('big_image_size_threshold', '__return_false');

// images compression
add_filter('jpeg_quality', function($arg){return 72;});


// // FIX WORDPRESS CATEGORY / ARCHIVE TITLES /////////
// add_filter( 'get_the_archive_title', function ($title) {
//     if ( is_category() ) {
//             $title = single_cat_title( '', false );
//         } elseif ( is_tag() ) {
//             $title = single_tag_title( '', false );
//         } elseif ( is_author() ) {
//             $title = '<span class="vcard">' . get_the_author() . '</span>' ;
//     }
//     return $title;
// });



//RESPONSIVE VIDEO EMBEDS
function bootstrap_wrap_oembed( $html ){
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); // Strip width and height #1
	return'<div class="ratio ratio-16x9">'.$html.'</div>'; // Wrap in div element and return #3 and #4
  }
  add_filter( 'embed_oembed_html','bootstrap_wrap_oembed',10,1);


  
// load css&js only contact page
function remove_cf7_assets(){
  wp_reset_query();
  if(!is_page("kontakt")){
      add_filter( 'wpcf7_load_js', '__return_false' ); 
      add_filter( 'wpcf7_load_css', '__return_false' );
  }  
}
add_action("wp", "remove_cf7_assets");    


