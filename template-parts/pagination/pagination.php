<?php
//
// Script to show pagination.
//
// @link https://codex.wordpress.org/Pagination
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


global $wp_query;
$big = PHP_INT_MAX ;

// if only have one page don't show pagination.
if ( $wp_query->max_num_pages <= 1 ) {
  return;
}
?>

<nav class="nav-pagination">
  <span class="screen-reader-text"><?php esc_html_e( 'Posts Navigation', 'template' ); ?></span>
  <div class="nav-pagination__links">
    <?php
    echo paginate_links(
      array(
        'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'             => '?paged=%#%',
        'current'            => max( 1, get_query_var( 'paged' ) ),
        'total'              => $wp_query->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'template' ) . '</span>',
        'next_text'          => esc_html__( 'Next', 'template' ),
        'prev_text'          => esc_html__( 'Before', 'template' ),
        'mid_size'           => 4,
      )
    );
    ?>
  </div>
</nav>