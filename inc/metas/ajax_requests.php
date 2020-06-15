<?php
function add_perk(){
  global $wpdb;

  $parameters = $_POST['parameters'];
  $project_id = $parameters[0];
  $product_id = $parameters[1];
  $delivery =  $parameters[2];

  if(empty(get_post_meta($project_id, 'perks', true))):
    $perks = array(
      array(
        "product_id" => $product_id,
        "delivery" => $delivery
      )
    );
  else:
    $perks = get_post_meta($project_id, 'perks', true);
    $perks[] = array(
      "product_id" => $product_id,
      "delivery" => $delivery
    );
  endif;

  update_post_meta($project_id, 'perks', $perks);

  print_r(json_encode(array(
    'result' => 'ok'
  )));
  die();
}
add_action('wp_ajax_add_perk', 'add_perk');
add_action('wp_ajax_nopriv_add_perk', 'add_perk');
