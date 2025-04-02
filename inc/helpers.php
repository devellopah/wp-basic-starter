<?php
define('THEME_URI', get_template_directory_uri());

// Enable custom fields in functions.php
// add_filter('acf/settings/remove_wp_meta_box', '__return_false');

function mw_get_current_url()
{
  $protocol = is_ssl() ? 'https://' : 'http://';
  return ($protocol) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function mw_get_current_lang()
{
  return str_contains(mw_get_current_url(), site_url('/en')) ? 'en' : 'ru';
}

function mw_get_next_lang()
{
  return mw_get_current_lang() === 'en' ? 'ru' : 'en';
}

function mw_log($data)
{
  echo '<script>';
  echo 'console.log(' . json_encode($data) . ')';
  echo '</script>';
}

function mw_tel_sanitized($tel)
{
  echo preg_replace('/[(,), ,-]/', '', esc_html($tel));
}

add_filter('show_admin_bar', '__return_false');

function mw_hide_description_field()
{
  $screen = get_current_screen();

  if ($screen->id == 'edit-brand') {
    echo '<style>
            .term-description-wrap {
                display: none;
            }
        </style>';
  }
}
add_action('admin_head', 'mw_hide_description_field');

function mw_get_front_page_id()
{
  if (\get_option('show_on_front') !== 'page') {
    return 0;
  }

  return (int) \get_option('page_on_front');
}

// function id_WPSE_114111()
// {
//   echo "<pre>";
//   var_dump(get_current_screen());
//   echo "</pre>";
// }
// add_action('admin_notices', 'id_WPSE_114111');

function acf_load_locations_field_choices($field)
{

  // Reset choices
  $field['choices'] = array();

  // Check to see if Repeater has rows of data to loop over
  if (have_rows('locations', 'option')) {

    // Execute repeatedly as long as the below statement is true
    while (have_rows('locations', 'option')) {

      // Return an array with all values after the loop is complete
      the_row();


      // Variables
      // $value = get_sub_field('value');
      $label = get_sub_field('label');


      // Append to choices
      // $field['choices'][$value] = $label;
      $field['choices'][$label] = $label;
    }
  }
  // Return the field
  return $field;
}

add_filter('acf/load_field/name=location', 'acf_load_locations_field_choices');

function acf_load_durations_field_choices($field)
{

  // Reset choices
  $field['choices'] = array();

  // Check to see if Repeater has rows of data to loop over
  if (have_rows('durations', 'option')) {

    // Execute repeatedly as long as the below statement is true
    while (have_rows('durations', 'option')) {

      // Return an array with all values after the loop is complete
      the_row();


      // Variables
      // $value = get_sub_field('value');
      $label = get_sub_field('label');


      // Append to choices
      // $field['choices'][$value] = $label;
      $field['choices'][$label] = $label;
    }
  }
  // Return the field
  return $field;
}

add_filter('acf/load_field/name=duration', 'acf_load_durations_field_choices');

function acf_load_complexities_field_choices($field)
{

  // Reset choices
  $field['choices'] = array();

  // Check to see if Repeater has rows of data to loop over
  if (have_rows('complexities', 'option')) {

    // Execute repeatedly as long as the below statement is true
    while (have_rows('complexities', 'option')) {

      // Return an array with all values after the loop is complete
      the_row();


      // Variables
      $level = get_sub_field('level');
      $label = get_sub_field('label');


      // Append to choices
      $field['choices'][$level] = $label;
    }
  }
  // Return the field
  return $field;
}

add_filter('acf/load_field/name=complexity', 'acf_load_complexities_field_choices');

function mw_the_tour_dates($post = false)
{
  echo esc_html(get_field('start_date', $post)) . '-' . esc_html(get_field('finish_date', $post));
}

function mw_the_tour_fee($post = false)
{
  echo '<span>' . esc_html(get_field('fee_before', 'option')) . ' ' . esc_html(get_field('fee', $post)) . ' ' . esc_html(get_field('fee_after', 'option')) . '</span>';
}

function mw_get_upcoming_tours()
{
  $numberposts = get_field('tour_upcoming_number', 'option');

  $args = [
    'post_type' => 'tour',
    'post_status' => 'publish',
    'order' => 'asc',
    'orderby' => 'meta_value',
    'meta_key' => 'start_date',
  ];

  if ($numberposts) {
    $args['numberposts'] = $numberposts;
  }

  return get_posts($args);
}

function mw_get_tour_cats()
{
  return get_terms([
    'taxonomy' => 'tour_category',
    'hide_empty' => false,
    'orderby' => 'term_id',
  ]);
}

function mw_extract_items($inputArray)
{
  $outputArray = [];
  $delimeter = "−";

  foreach ($inputArray as $item) {
    if (str_contains($item, $delimeter)) {
      $parts = explode($delimeter, $item);

      $outputArray[] = trim($parts[0]);
      $outputArray[] = trim($parts[1]);
    } else {
      $outputArray[] = trim($item);
    }
  }

  return array_filter($outputArray);
}

function mw_prepare_date_range($string)
{
  return array_map('trim', explode("—", urldecode(sanitize_text_field($string))));
}
function mw_prepare_durations($array)
{
  $outputArray = [];
  foreach ($array as $item) {
    $outputArray[] = array_map('trim', explode(",", $item));
  }
  return $outputArray;
}

add_action('admin_menu', function () {
  global $current_user;
  $current_user = wp_get_current_user();
  $user_name = $current_user->user_login;

  //check condition for the user means show menu for this user
  if (is_admin() &&  $user_name != 'USERNAME') {
    //We need this because the submenu's link (key from the array too) will always be generated with the current SERVER_URI in mind.
    $customizer_url = add_query_arg('return', urlencode(remove_query_arg(wp_removable_query_args(), wp_unslash($_SERVER['REQUEST_URI']))), 'customize.php');
    mw_log($customizer_url);
    remove_submenu_page('themes.php', $customizer_url);
  }
}, 999);
