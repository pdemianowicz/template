<?php
defined( 'ABSPATH' ) || exit;

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}


// Move jQuery to footer 
add_action( 'wp_default_scripts', function( $wp_scripts ) {
  if ( ! is_admin() ) {
    $wp_scripts->add_data( 'jquery',         'group', 1 );
    $wp_scripts->add_data( 'jquery-core',    'group', 1 );
    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
  }
});

// Style
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'template-style', get_stylesheet_uri(), array(), _S_VERSION ); 
} );

// Script
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_script( 'template-js', get_template_directory_uri() . "/js/main.min.js#asyncload", array(), _S_VERSION, true);
} ,100);

// Required comment-reply script
add_action( 'wp_enqueue_scripts', function() {
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  } 
});


//JS ASYNC ENQUEUE: add an async load option as per https://ikreativ.com/async-with-wordpress-enqueue/
function template_async_scripts($url){
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'template_async_scripts', 11, 1 );


//UNRENDER-BLOCK CSS 
// as per https://www.phpied.com/faster-wordpress-rendering-with-3-lines-of-configuration/
// function hints() {  
//   header("link: </wp-content/themes/shopv2/style.css?ver=1.0.0>; rel=preload; as=style");
// }
// add_action('send_headers', 'hints');


// function template_get_headers(){
    //add link to preload CSS bundle
    // $headers = "link: <".template_get_css_url()."?ver=".template_get_css_version().">; rel=preload; as=style";
    //if relevant, add the CSS for Gutenberg blocks
    // if (!get_theme_mod("disable_gutenberg") OR
    //     ( function_exists('lc_plugin_option_is_set') && lc_plugin_option_is_set('gtblocks') )
    //     ) $headers.=", <".includes_url()."css/dist/block-library/style.min.css?ver=".get_bloginfo( 'version' ).">; rel=preload; as=style";
//     return $headers;
// }

// if(!function_exists('template_hints')):
//     function template_hints() {  
//         header(template_get_headers());
//     }
// endif;

// add_action('send_headers', 'template_hints'); 


// function hints() {
// 	$wp_version = get_bloginfo( 'version' );
// 	header( 'link: </wp-includes/css/dist/block-library/style.min.css?ver=' . $wp_version . '>; rel=preload' );
// }
// add_action( 'send_headers', 'hints' );



// //for testing
// add_action ("template_redirect",function(){
//     if(!current_user_can("administrator") or !isset($_GET['debug_headers'])) return;
//     echo "<pre style='font-size:16px;'>";
//     echo "<br><br>template_get_headers:<br><br>". str_replace(",","<br>",htmlentities(template_get_headers()));
//     echo "<br><br><br>Original demo:<br><br>". str_replace(",","<br>",htmlentities("link: </wp-content/themes/phpied2/style.css>; rel=preload, </wp-includes/css/dist/block-library/style.min.css?ver=5.4.1>; rel=preload"));
//     echo "</pre>";
//     die;
// });


 

