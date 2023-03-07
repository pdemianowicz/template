<?php
//
// Shows related post on single page
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

global $post;
$post_id     = get_the_id();
$categories  = get_the_terms( $post_id, 'category' );
$updated_cat = array();

// Get only category slug of current post.
if ( $categories && is_array( $categories ) ) {
	foreach ( $categories as $category ) {
		$updated_cat[] = $category->term_id;
	}
}

// Query the posts.
$related_post = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 4,
		'orderby'        => 'rand',
		'post__not_in'   => array( $post_id ),
		'category__in'   => $updated_cat,
	)
);

if ( $related_post->have_posts() ) : ?>
	<section class="related-post container">
		<h2 class="related-post__title"><?php esc_html_e( 'Related post', 'template' ); ?></h2>
		<div class="related-post__content">
      <?php while ( $related_post->have_posts() ) : $related_post->the_post(); ?>
      
          <article id="post-<?php the_ID(); ?>" class="related-post__item">

            <a href="<?= the_permalink();?>">
              <span class="related-post__read-more"><?php esc_html_e( 'Read more', 'template' ); ?></span>
              <?= the_post_thumbnail( 'custom-thumb' ); ?>
            </a>

            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

          </article>

      <?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>
