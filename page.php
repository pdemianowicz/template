<?php
//
// The template for displaying all pages
//
// @link https://developer.wordpress.org/themes/basics/template-hierarchy/
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


get_header(); ?>

<section class="main__title">
  <h1><?php the_title(); ?></h1>
</section>

<section class="container">
  
  <?php 
  the_post();
  the_content();
  ?>

</section>

<?php 
get_footer();
