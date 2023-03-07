<?php
//
// The main template file
//
// @link https://developer.wordpress.org/themes/basics/template-hierarchy/
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


get_header(); ?>

<section class="main__title">
  <h1><?php the_archive_title() ?></h1>
</section>

<section class="container">
  <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : the_post(); 
        get_template_part( 'template-parts/content' ); 
      endwhile;
    else :
      _e( 'Sorry, no posts matched your criteria.', 'template' );
    endif;
    get_template_part( 'template-parts/pagination/pagination' );
  ?>
</section>

<?php get_footer();
