<?php
//
// Template Name: Contact Template
//
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

get_header(); ?>

<section class="main__title">
  <h1><?php the_title(); ?></h1>
</section>

<div class="contact-template container">

    <div class="contact-template__map">
      <iframe width="100%" height="350px" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d19153.511550403528!2d23.171231408300784!3d53.12475375017473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spl!2spl!4v1677867929717!5m2!1spl!2spl"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="contact-template__form">
      <?php echo do_shortcode( '[contact-form-7 id="17" title="Formularz 1"]' ); ?>
    </div>

</div>
<?php 
get_footer();
