<?php
if (wp_doing_ajax()) {
  add_action('wp_ajax_application_form', 'application_form');
  add_action('wp_ajax_nopriv_application_form', 'application_form');
}
function application_form()
{
  check_ajax_referer('ajax-nonce');

  $ajax_result = [];

  $email = get_bloginfo('admin_email');

  $site_url = get_site_url();

  $from = 'info@' . explode('//', $site_url)[1];

  $headers = "From: $from\n";
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=UTF-8\n";

  $message = '';

  parse_str(urldecode($_POST['fields']), $fields);

  $user_name = sanitize_text_field($fields['name']);
  $user_city = isset($fields['city']) ? sanitize_text_field($fields['city']) : null;
  $user_email = isset($fields['email']) ? sanitize_email($fields['email']) : null;

  // $user_email = sanitize_email($fields['email']);
  $user_tel = sanitize_text_field($fields['tel']);
  $user_message = sanitize_text_field($fields['message']);

  $message .= 'Имя: ' . $user_name . '<br>';
  $message .= 'Телефон: ' . $user_tel . '<br>';

  if ($user_email) {
    $message .= 'Почта: ' . $user_email . '<br>';
  }

  if ($user_city) {
    $message .= 'Город: ' . $user_city . '<br>';
  }

  if ($user_message) {
    $message .= 'Сообщение: ' . $user_message . '<br>';
  }

  $subject = 'Обратная связь ' . get_site_url();

  if (wp_mail($email, $subject, $message, $headers)) {
    $ajax_result['status'] = 'success';
  } else {
    $ajax_result['status'] = 'fail';
  }

  wp_send_json($ajax_result);
}
