<?php
function add_perk(){
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

function delete_perk(){
  $parameters = $_POST['parameters'];
  $project_id = $parameters[0];
  $product_id = $parameters[1];

  $perks = get_post_meta($project_id, 'perks', true);

  foreach ($perks as $key => $perk):
    if($perk["product_id"] == $product_id):
      unset($perks[$key]);
      break;
    endif;
  endforeach;

  update_post_meta($project_id, 'perks', $perks);

  print_r(json_encode(array(
    'result' => 'ok'
  )));
  die();
}
add_action('wp_ajax_delete_perk', 'delete_perk');
add_action('wp_ajax_nopriv_delete_perk', 'delete_perk');

function add_judge(){
  $parameters = $_POST['parameters'];
  $compete_id = $parameters[0];
  $artist_id = $parameters[1];

  if(empty(get_post_meta($compete_id, 'judges', true))):
    $judges = array($artist_id);
  else:
    $judges = get_post_meta($compete_id, 'judges', true);
    $judges[] = $artist_id;
  endif;

  update_post_meta($compete_id, 'judges', $judges);

  print_r(json_encode(array(
    'result' => 'ok'
  )));
  die();
}
add_action('wp_ajax_add_judge', 'add_judge');
add_action('wp_ajax_nopriv_add_judge', 'add_judge');

function delete_judge(){
  $parameters = $_POST['parameters'];
  $compete_id = $parameters[0];
  $artist_id = $parameters[1];

  $judges = get_post_meta($compete_id, 'judges', true);

  for ($i=0; $i < count($judges); $i++):
    if($judges[$i] == $artist_id):
      unset($judges[$i]);
    endif;
  endfor;

  update_post_meta($compete_id, 'judges', $judges);

  print_r(json_encode(array(
    'result' => 'ok'
  )));
  die();
}
add_action('wp_ajax_delete_judge', 'delete_judge');
add_action('wp_ajax_nopriv_delete_judge', 'delete_judge');
