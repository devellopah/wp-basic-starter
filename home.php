<?php

/**
 * The template for displaying blog
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_Starter
 */

get_header();
global $wp_query;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$max_pages = $wp_query->max_num_pages;
$latest_post = get_post();
?>

<main id="primary" class="site-main" data-barba="container" data-barba-namespace="news">
  <section class="news section-padding-bottom" id="news">
    <div class="container">

      <div id="data-wrapper" class="news__wrapper">
        <?php while (have_posts()) : the_post();
          get_template_part('template-parts/content', null, ['latest_post_ID' => $latest_post->ID]);
        endwhile; ?>
      </div>

      <?php if ($paged < $max_pages) : ?>
        <button id="loadmore" class="news__more btn btn--red" data-aos="fade-up" data-max_pages="<?= $max_pages ?>" data-paged="<?= $paged ?>">Загрузить еще</button>
      <?php endif ?>
  </section>
</main>

<?php
get_footer();
