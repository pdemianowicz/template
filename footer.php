<?php
//
// The template for displaying the footer
//
// @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.
?>


</main>
<footer class="footer">
  <div class="footer__wrapper">
    <div class="footer__primary">
        <?php wp_nav_menu(
          array(
            'theme_location' => '1 column footer',
            'container' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul class="">%3$s</ul>',
          )
        );?>

        
        <?php wp_nav_menu(
          array(
            'theme_location' => '2 column footer',
            'container' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul class="">%3$s</ul>',
          )
        );?>

        <?php wp_nav_menu(
          array(
            'theme_location' => '3 column footer',
            'container' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul class="">%3$s</ul>',
          )
        );?>

        <?php wp_nav_menu(
          array(
            'theme_location' => '4 column footer',
            'container' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul class="">%3$s</ul>',
          )
        );?>
    </div>
    <div class="footer__secondary">
      <div class="footer__copyright">Copyright © <?php echo date("Y"); ?> 🚀 All rights reserved.</div>
    </div>
  </div>
</footer>

<div id="top" class="top">
  <span class="screen-reader-text"><?php esc_html_e( 'Back to top', 'template' ); ?></span>
  <span aria-hidden="true">↑</span>
</div>

<div id="cookie-notice" role="dialog" aria-label="cookie-consent" aria-describedby="cookieconsent:desc">
  <span id="cookieconsent:desc">
    <?php esc_html_e( 'This website uses cookies to ensure you get the best experience on our website.', 'template' ); ?>
    <a aria-label="more about cookies" role="button" href="https://cyberfolks.pl/generator-polityki-prywatnosci/" target="_blank"><?php esc_html_e( 'Read Privacy Policy', 'template' ); ?></a>
  </span>
  <br><a onclick="acceptCookie();" aria-label="dismiss cookie message" role="button"><?php esc_html_e( 'Got it!', 'template' ); ?></a>
</div>

<?php wp_footer(); ?>
</body>
</html>

