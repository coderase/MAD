<?php
function register_user(){
  $parameters = $_POST['parameters'];


  print_r(json_encode(array(
    'valid' => true
  )));
  die();
}
add_action('wp_ajax_register_user', 'register_user');
add_action('wp_ajax_nopriv_register_user', 'register_user');
