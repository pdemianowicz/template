<?php
//
// The template for displaying search results pages
//
// @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


get_header(); ?>

<section class="main__title">
  <h1>
    <?php
    /* translators: %s: search query. */
    printf( esc_html__( 'Search Results for: %s', 'template' ), '<span>' . get_search_query() . '</span>' );
    ?>
  </h1>
  <?php get_search_form( true ); ?>
</section>

<section class="container">
  <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : the_post();
        if (is_search() && ($post->post_type=='page')) continue;
          get_template_part( 'template-parts/content' ); 
      endwhile;
    else :
      _e( 'Sorry, no posts matched your criteria.', 'template' );
    endif;
    get_template_part( 'template-parts/pagination/pagination' );
  ?>
</section>

<?php get_footer();




