<?php
//
// The template for displaying 404 pages (not found)
//
// @link https://codex.wordpress.org/Creating_an_Error_404_Page
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


get_header(); ?>

<section class="error-404">
  <h1 class="error-404__title"><?php esc_html_e( '404', 'template' ); ?></h1>
  <p class="error-404__content"><?php esc_html_e( 'It looks like nothing was found in this location. Perhaps you would like to go to our home page?', 'template' ); ?>&nbsp;</p>
  <a class="error-404__btn" href="<?php bloginfo('url') ?>"><?php esc_html_e( 'Home', 'template' ); ?></a>
</section>

<?php get_footer();
