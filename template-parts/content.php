<?php
//
// Template part for displaying posts
//
// @link https://developer.wordpress.org/themes/basics/template-hierarchy/
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.
?>

<div class="content">
  <div class="content__title">

    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <div class="content__meta">
      <small>
        <?php the_category( ' ' ); ?>
          <svg width="3" height="4" viewBox="0 0 3 4" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin:2px">
            <circle cx="1.5" cy="2" r="1.5" fill="currentColor"></circle>
          </svg>

        <?php echo get_the_date(); ?>
          <svg width="3" height="4" viewBox="0 0 3 4" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin:2px">
            <circle cx="1.5" cy="2" r="1.5" fill="currentColor"></circle>
          </svg>

        <?php the_author_posts_link(); ?>
      </small>
    </div>
  </div>

  <div class="content__image">
    <a href="<?= the_permalink();?>">
      <span class="content__image-read-more"><?php esc_html_e( 'Read more', 'template' ); ?></span>
      <?php the_post_thumbnail( 'custom-medium' ); ?>
    </a>
  </div>

  <div class="content__text">
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="content__text-read-more"><?php esc_html_e( 'Read more...', 'template' ); ?></a>
  </div>

</div>


