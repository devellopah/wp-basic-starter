<?php

/**
 * The template for displaying newsletter confirmation page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_Starter
 */

get_header();
?>

<main id="primary" class="site-main">
  <?= get_template_part('page-sections/newsletter-success') ?>
</main><!-- #main -->

<?php
get_footer();
