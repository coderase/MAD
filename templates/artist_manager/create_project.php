<?php
global $wpdb;

function get_artist_id($user_id){
  global $wpdb;

  $all_artist = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'artist' AND post_status = 'publish'");

  foreach($all_artist as $artist):
    if(get_post_meta($artist->ID, 'user_associate', true) == $user_id):
      return $artist->ID;
    endif;
  endforeach;

  return false;
}

$user = wp_get_current_user();
$user_id = $user->ID;

if(isset($_POST['create_project']) AND $_POST['create_project'] == 'submitted'):
  $project = array(
    'post_title'    => wp_strip_all_tags($_POST['create_project_title']),
    'post_content'  => $_POST['create_project_desc'],
    'post_status'   => 'draft',
    'post_author'   => $user_id,
    'post_type'     => 'project',
    'post_excerpt'  => $_POST['create_project_small_desc']
  );
  $project_id = wp_insert_post( $project );

  if(!function_exists('wp_generate_attachment_metadata')):
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  endif;

  if(isset($_FILES['project_main_picture']) and strlen($_FILES['project_main_picture']['name']) > 3):
    if(0 === $_FILES['project_main_picture']['error']):
       $thumbnail_id = media_handle_upload('project_main_picture', 0);
       set_post_thumbnail($project_id, $thumbnail_id);
    endif;
  endif;

  update_post_meta($project_id, 'start_date', $_POST['start_date']);
  update_post_meta($project_id, 'end_date', $_POST['end_date']);

  $perks = array();
  $product_ids = explode(',',$_POST['create_project_perks']);
  $product_delivery = explode(',',$_POST['create_project_delivery']);

  for ($i=0; $i < count($product_ids); $i++):
    if($product_ids[$i] != ''):
      $perks[] = array(
        "product_id" => $product_ids[$i],
        "delivery" => $product_delivery[$i]
      );
    endif;
  endfor;

  update_post_meta($project_id, 'perks', $perks);

  if(get_artist_id($user_id) != false):
    update_post_meta($project_id, 'artist', get_artist_id($user_id));
  endif; ?>

  <div class="popup" style="display: flex;">
    <div class="content" style="width: 500px !important;">
      <div>
        <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/thankyou.png'; ?>" style="width: calc(100% + 68px); max-width: calc(100% + 68px); margin: -24px -30px 0px -34px;"/>
      </div>

      <p style="font-weight: bold; font-size: 20px; text-align: center;">Your inquiry has been sent !</p>
      <p>Our team will get back to you as soon as possible ragarding your request.</p>

      <a href="<?php echo esc_url(home_url()).'/artist-manager/'; ?>" class="become_an_artist_button">Projects</a>
    </div>
  </div><?php
endif; ?>

<div id="create_project" class="content" <?php echo (!isset($_GET['create-project']))? 'style="display: none;"' : ''; ?>>
  <p class="main_title">Add a new project</p>

  <div class="create_project_box">
    <div class="container">
      <div class="col1">
        <label for="" class="subtitle">Name of the project*</label>
      </div>

      <div class="col2">
        <input type="text" name="project_name" id="project_name" onchange="update_field('#create_project_title', this);"/>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label for="" class="subtitle">Small description*</label>
      </div>

      <div class="col2">
        <textarea name="project_small_desc" id="project_small_desc" onchange="update_field('#create_project_small_desc', this);"></textarea>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Image*</label>
      </div>

      <div class="col2">
        <div class="project_picture" id="project_picture_container">
          <label for="project_main_picture"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Camera.png'; ?>"/></label>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Date of project*</label>
      </div>

      <div class="col2">
        <div class="project_date">
          <input type="text" name="start_date" id="start_date" placeholder="Start Date" onchange="update_field('#create_project_start_date', this);"/>
          <input type="text" name="end_date" id="end_date" placeholder="End Date" onchange="update_field('#create_project_end_date', this);"/>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label for="" class="subtitle">Country</label>
      </div>

      <div class="col2">
        <select>
          <option value="null">Choose a country</option>
          <?php
          $active_countries = get_option('active_countries');

          foreach($active_countries as $country): ?>
            <option value="<?php echo $country; ?>"><?php echo $country; ?></option><?php
          endforeach; ?>
        </select>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label for="" class="subtitle">Project description*</label>
      </div>

      <div class="col2">
        <textarea name="project_desc" id="project_desc" onchange="update_field('#create_project_desc', this);"></textarea>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label for="" class="subtitle">Products associate to the project</label>
        <p class="note">You must create product before link it to the project.</p>
      </div>

      <div class="col2">
        <?php
        $all_product = $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status = 'publish'"); ?>

        <div class="product_to_add_container">
          <select id="product_to_add">
            <option value="null">Choose a product</option>

            <?php
            foreach ($all_product as $product):
              if(get_post_meta($product->ID, 'user_associate', true) == $user_id): ?>
                <option value="<?php echo $product->ID ?>" data-title="<?php echo get_the_title($product->ID); ?>"><?php echo get_the_title($product->ID); ?></option><?php
              endif;
            endforeach; ?>
          </select>

          <a onclick="add_product_to_project();">Add to project</a>

          <table style="display: none;" id="product_associate_table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Delivery</th>
                <th></th>
              </tr>
            </thead>

            <tbody id="product_associate_list">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div id="create_project_buttons">
    <!-- <a href="#" target="_blank" class="preview">Preview</a> -->
    <a onclick="submit_project_form();">Submit</a>
  </div>

  <form action="#" method="post" enctype="multipart/form-data" id="create_project_form">
    <input type="hidden" name="create_project_title" id="create_project_title"/>
    <input type="hidden" name="create_project_small_desc" id="create_project_small_desc"/>
    <input type="file" name="project_main_picture" id="project_main_picture" style="display: none;" onchange="update_project_img('#project_picture_container', this);"/>
    <input type="hidden" name="create_project_start_date" id="create_project_start_date"/>
    <input type="hidden" name="create_project_end_date" id="create_project_end_date"/>
    <input type="hidden" name="create_project_desc" id="create_project_desc"/>
    <input type="hidden" name="create_project_perks" id="create_project_perks"/>
    <input type="hidden" name="create_project_delivery" id="create_project_delivery"/>

    <input type="hidden" name="create_project" value="submitted"/>
  </form>
</div>
