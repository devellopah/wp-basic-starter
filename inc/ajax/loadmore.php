<?php
add_action('wp_ajax_loadmore', 'mw_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'mw_loadmore');

function mw_loadmore()
{

  $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
  $paged++;

  $args = [
    'paged' => $paged,
    'post_status' => 'publish',
  ];

  $cpt = $_POST['cpt'];

  if (!empty($cpt)) {
    $args['post_type'] = $cpt;
    $args['posts_per_page'] = get_field($cpt . '_per_page', 'option');
  }

  if (!empty($_POST['search'])) {
    $args['s'] = $_POST['search'];
  }

  query_posts($args);

  while (have_posts()) : the_post();
    if (!empty($cpt)) {
      get_template_part('template-parts/content', $cpt);
    } else {
      get_template_part('template-parts/content', null);
    }
  endwhile;

  die;
}
