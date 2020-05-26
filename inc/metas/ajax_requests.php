<?php
function add_contribution(){
  global $wpdb;

  $parameters = $_POST['parameters'];
  $title = $parameters[0];
  $price =  $parameters[1];
  $delivery =  $parameters[2];
  $description =  $parameters[3];

  

  print_r(json_encode(array(
    'result' => 'ok'
  )));
  die();
}
add_action('wp_ajax_add_contribution', 'add_contribution');
add_action('wp_ajax_nopriv_add_contribution', 'add_contribution');
