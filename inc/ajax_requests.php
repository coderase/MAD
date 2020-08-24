<?php
function register_user(){
  $parameters = $_POST['parameters'];
  $first_name = $parameters[0];
  $last_name = $parameters[1];
  $email = $parameters[2];
  $password = $parameters[3];
  $valid = true;
  $message = '';

  if(is_email($email) AND !email_exists($email)):
    $user_id = wp_create_user($email, $password, $email);

    update_user_meta($user_id, 'first_name', $first_name);
    update_user_meta($user_id, 'last_name', $last_name);
    update_user_meta($user_id, 'activate', false);

    //Envoyer email
    require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_activation.php');
  else:
    $valid = false;
    $message = 'L\'adresse email est déjà rataché à un compte utilisateur';
  endif;

  print_r(json_encode(array(
    'valid' => $valid,
    'message' => $message
  )));
  die();
}
add_action('wp_ajax_register_user', 'register_user');
add_action('wp_ajax_nopriv_register_user', 'register_user');

function mad_reset_password(){
  $parameters = $_POST['parameters'];
  $email = $parameters[0];
  $valid = true;

  if(is_email($email)):
    require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_forgot.php');
  else:
    $valid = false;
  endif;

  print_r(json_encode(array(
    'valid' => $valid
  )));
  die();
}
add_action('wp_ajax_mad_reset_password', 'mad_reset_password');
add_action('wp_ajax_nopriv_mad_reset_password', 'mad_reset_password');

function isUserActivated(){
  $parameters = $_POST['parameters'];
  $email = $parameters[0];
  $activated = true;
  $email_exist = true;

  if(!is_email($email)):
    $user = get_user_by('login', $email);
  else:
    $user = get_user_by('email', $email);
  endif;

  if($user === false):
    $email_exist = false;
  endif;

  if(!get_user_meta($user->ID, 'activate', true)):
    $activated = false;

    if($email_exist):
      require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_activation.php');
    endif;
  endif;

  print_r(json_encode(array(
    'activated' => $activated,
    'email_exist' => $email_exist
  )));
  die();
}
add_action('wp_ajax_isUserActivated', 'isUserActivated');
add_action('wp_ajax_nopriv_isUserActivated', 'isUserActivated');

function passwordMatch(){
  $parameters = $_POST['parameters'];
  $email = $parameters[0];
  $password = $parameters[1];
  $match = true;

  if(!is_email($email)):
    $user = get_user_by('login', $email);
  else:
    $user = get_user_by('email', $email);
  endif;

  if(!wp_check_password($password, $user->data->user_pass, $user->ID)):
    $match = false;
  endif;

  print_r(json_encode(array(
    'match' => $match
  )));
  die();
}
add_action('wp_ajax_passwordMatch', 'passwordMatch');
add_action('wp_ajax_nopriv_passwordMatch', 'passwordMatch');

function emailExists(){
  $parameters = $_POST['parameters'];
  $email = $parameters[0];
  $exist = false;

  if(email_exists($email)):
    $exist = true;
  endif;

  print_r(json_encode(array(
    'exist' => $exist
  )));
  die();
}
add_action('wp_ajax_emailExists', 'emailExists');
add_action('wp_ajax_nopriv_emailExists', 'emailExists');

function become_artist(){
  $parameters = $_POST['parameters'];
  $user_id = $parameters[0];

  update_user_meta($user_id, 'become_artist', true);

  print_r(json_encode(array(
    'valid' => true
  )));
  die();
}
add_action('wp_ajax_become_artist', 'become_artist');
add_action('wp_ajax_nopriv_become_artist', 'become_artist');

function updateProfile(){
  $parameters = $_POST['parameters'];
  $user_id = $parameters[0];
  $first_name = $parameters[1];
  $last_name = $parameters[2];
  $email = $parameters[3];
  $phone = $parameters[4];

  update_user_meta($user_id, 'first_name', $first_name);
  update_user_meta($user_id, 'last_name', $last_name);
  update_user_meta($user_id, 'phone', $phone);
  wp_update_user(array('ID' => $user_id, 'user_email' => $email));

  print_r(json_encode(array(
    'valid' => true
  )));
  die();
}
add_action('wp_ajax_updateProfile', 'updateProfile');
add_action('wp_ajax_nopriv_updateProfile', 'updateProfile');

function updatePassword(){
  $parameters = $_POST['parameters'];
  $user_id = $parameters[0];
  $password = $parameters[1];

  wp_set_password($password, $user_id);
  require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_forgot_confirm.php');

  print_r(json_encode(array(
    'valid' => true
  )));
  die();
}
add_action('wp_ajax_updatePassword', 'updatePassword');
add_action('wp_ajax_nopriv_updatePassword', 'updatePassword');
