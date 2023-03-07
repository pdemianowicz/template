<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

$template_includes = array(
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueues.php', 						            // Enqueue scripts and styles.     
	'/template-tags.php',                   // Custom template tags for this theme.
	'/woocommerce.php',                     // Load WooCommerce functions.

  '/clean-head.php',						          // Eliminates useless meta tags, emojis, etc   
	'/disable-comments.php',				        // Disable comments
	'/disable-gutenberg.php',				        // Disable gutenberg
	'/disable-widgets-block-editor.php',	  // Disable widgets block editor
	'/disable-xml-rpc.php',					        // Disable xml-rpc
);

foreach ( $template_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

  


