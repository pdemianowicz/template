<?php
//
// The template for displaying all single posts
//
// @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


get_header(); 
the_post(); ?>
    
<article class="single-post container">
  <header class="single-post__header">
    <div class="single-post__categories">
      <span class="screen-reader-text"><?php esc_html_e( 'Categories', 'template' ); ?></span>
      <?php the_category( ' ' ); ?>
    </div>

    <h1 class="single-post__title"><?php the_title(); ?></h1>
    
    <div class="single-post__meta">
      <?php the_date(); ?>
      <svg width="3" height="4" viewBox="0 0 3 4" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin:2px">
        <circle cx="1.5" cy="2" r="1.5" fill="currentColor"></circle>
      </svg>
      <?php the_author_posts_link(); ?>
    </div> 

    <div class="single-post__main-image">
      <?php the_post_thumbnail( 'post-thumbnail' ); ?>
    </div>
  </header>
  <div class="single-post__content">
    <?php 
    
    the_content();
    
    edit_post_link( __( 'Edit post', 'template' ), '<p class="edit-link">', '</p>' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    } 
    
    ?>
  </div>
</article>

<?php 
get_template_part( 'template-parts/related/related-post' );
get_footer();

















