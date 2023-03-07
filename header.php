<?php
//
// The template for displaying header.
//
// @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.
?>


<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo get_bloginfo("description"); ?>" >
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>	
	  <?php } ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="skip-link screen-reader-text" href="#theme-main"><?php esc_html_e( 'Skip to content', 'template' ); ?></a>

  <?php wp_body_open(); ?>
  <header class="header">
    <div class="header__wrapper">
      <div class="header__navbar">
        <div class="header__logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span>🚀LOGO</span></a>
        </div>

        <nav id="nav" class="nav" aria-label="Primary Navigation">
          <button id="nav__toggle" class="nav__toggle" type="button" aria-controls="nav" aria-expanded="false" aria-label="Open Primary Navigation">
            <span class="hamburger"></span>
          </button>
          <?php wp_nav_menu(
            array(
              'theme_location' => 'header',
              'container' => false,
              'menu_class' => '',
              'fallback_cb' => '__return_false',
              'items_wrap' => '<ul class="nav__menu" data-visible="false">%3$s</ul>',
            )
          );?>
        </nav>

        <div class="header__icons">
          <a class="header__cart-button" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <span class="screen-reader-text"><?php esc_html_e( 'Cart', 'template' ); ?></span>

            <span class="header__cart-amount">
              <?php
                if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                  echo WC()->cart->get_cart_contents_count();
                }?>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg>
          </a>

          <button class="header__search-button"> 
            <span class="screen-reader-text"><?php esc_html_e( 'Search', 'template' ); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" >
              <path fill="currentColor" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill-rule="evenodd" clip-rule="evenodd"/>
            </svg>
          </button>
        </div>

      </div>
    </div>
  </header>
  <main id='theme-main'>
    <div class="search-bar">
      <?php get_search_form(); ?>
      <span class="search-bar__close">&times;</span>
    </div>

    