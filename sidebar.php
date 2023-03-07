<?php
//
// The sidebar containing the main widget area.
//
// @link https://developer.wordpress.org/themes/functionality/sidebars/
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


if (!is_single() && is_active_sidebar( 'sidebar-1' )): ?>

  <aside id="secondary" class="widget-area">

    <?php dynamic_sidebar( 'sidebar-1' ); ?>

  </aside>

<?php endif;