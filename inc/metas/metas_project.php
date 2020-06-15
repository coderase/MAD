<?php
function mad_project_artist_html(){
  global $wpdb;
  global $post;

  $all_artist = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'artist' AND post_status = 'publish'"); ?>

  <div id="mad_project_artist_container">
    <select id="project_artist" name="project_artist">
      <option value="null">Choisir un artiste</option>

      <?php
      foreach($all_artist as $artist): ?>
        <option value="<?php echo $artist->ID;  ?>"><?php echo $artist->post_title; ?></option><?php
      endforeach; ?>
    </select>
    <script>jQuery('#project_artist option[value="<?php echo get_post_meta($post->ID, 'artist', true); ?>"]').attr("selected", "selected");</script>
  </div><?php
}

function mad_project_date_html(){
  global $post; ?>

  <div id="mad_project_date_container">
    <div class="mad_project_date_box">
      <label for="start_date">Date de début</label>
      <input type="text" id="start_date" name="start_date" onchange="change_min_end_date();"/>
    </div>

    <div class="mad_project_date_box">
      <label for="end_date">Date de fin</label>
      <input type="text" id="end_date" name="end_date"/>
    </div>
  </div><?php
}

function mad_project_location_html(){
  global $post;
  $active_countries = get_option('active_countries'); ?>

  <div>
    <select name="project_localisation" id="project_localisation">
      <option value="null">Choisir une localisation</option>
      <?php
      foreach($active_countries as $country): ?>
        <option value="<?php echo $country; ?>"><?php echo $country; ?></option><?php
      endforeach; ?>
    </select>

    <script>jQuery('#project_localisation option[value="<?php echo get_post_meta($post->ID, 'localisation', true); ?>"]').attr("selected", "selected");</script>
  </div><?php
}

function mad_project_perks_html(){
  global $wpdb;
  global $post; ?>

  <div id="mad_project_perks_container">
    <div id="mad_project_perks_title">
      <a onclick="show_metas_project_popup('#metas_project_perks_popup');" class="button button-primary button-large">Ajouter</a>
    </div>

    <div>
      Liste des Contre-parties


      <?php
      $perks = get_post_meta($post->ID, 'perks', true);

      foreach($perks as $perk): ?>
          <div>
            <p><a href="<?php echo get_the_permalink($perk['product_id']); ?>"><?php echo get_the_title($perk['product_id']); ?></a></p>
            <p><?php echo $perk['delivery']; ?></p>
          </div>
        <?php
      endforeach; ?>
    </div>
  </div>

  <div id="metas_project_perks_popup" class="metas_project_popup">
    <a class="x_button" onclick="hide_metas_project_popup('#metas_project_perks_popup');">x</a>

    <div class="container">
      <div>
        <select name="product_id" id="product_id">
          <option value="null">Choisir un produit</option>

          <?php
          foreach(ProjectManager::get_all_products() as $product): ?>
            <option value="<?php echo $product->ID; ?>"><?php echo $product->post_title; ?></option>
            <?php
          endforeach; ?>
        </select>

        <div>
          <label>Livraison:</label>
          <textarea id="perk_delivery" name="perk_delivery"></textarea>
        </div>

        <input type="hidden" id="project_id" value="<?php echo $post->ID; ?>"/>
        <a class="" onclick="add_perk();">Ajouter</a>
      </div>

      <div class="loader"></div>
    </div>
  </div>
  <?php
}

function mad_project_package_html(){
  global $wpdb;
  global $post;

  $all_package = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND post_type = 'perk'"); ?>

  <div id="mad_project_perks_container">
    <div id="mad_project_perks_title">
      <a onclick="show_metas_project_popup('#metas_project_package_popup');" class="button button-primary button-large">Ajouter</a>
    </div>

    <div>
      Liste des Packages
    </div>
  </div>

  <div id="metas_project_package_popup" class="metas_project_popup">
    <a class="x_button" onclick="hide_metas_project_popup('#metas_project_package_popup');">x</a>

    <div class="container">
      <div id="step1">
        <a class="choice_button" onclick="show_step2(1);">Existante</a>
        <a class="choice_button" onclick="show_step2(2);">Créer</a>
      </div>

      <div id="step2">
        <a onclick="show_step1();" class="return_button">Retour</a>

        <div id="step2choice1" class="step2choice">
          <select>
            <option value="null">Choisir un package</option>

            <?php
            foreach($all_perks as $perk): ?>
              <option><?php echo $perk->post_title; ?></option><?php
            endforeach; ?>
          </select>
        </div>

        <div id="step2choice2" class="step2choice">
          <div class="row">
            <label>Titre</label>
            <input type="text" id="contribution_title" name="contribution_title"/>
          </div>

          <div class="row">
            <label>Prix</label>
            <input type="text" id="contribution_price" name="contribution_price"/>
          </div>

          <div class="row">
            <label>Expedition</label>
            <input type="text" id="contribution_delivery" name="contribution_delivery"/>
          </div>

          <div class="row">
            <label>Description</label>
            <textarea id="contribution_desc" name="contribution_desc"></textarea>
          </div>

          <a class="button button-primary button-large" onclick="add_contribution();">Ajouter</a>
        </div>
      </div>

      <div class="loader"></div>
    </div>
  </div><?php
}

function mad_project_contribution_html(){
  global $post;  ?>

  <div>
    <p>Aucune contribution</p>
  </div><?php
}

function mad_project_comments_html(){
  global $post;  ?>

  <div>
    <p>Aucun commentaires</p>
  </div><?php
}

if(!function_exists('save_mad_project_infos')):
  function save_mad_project_infos($post_id, $post, $update){
    update_post_meta($post_id, 'localisation', @$_POST['project_localisation']);
    update_post_meta($post_id, 'artist', @$_POST['project_artist']);
  }
endif;
add_action('save_post', 'save_mad_project_infos', 10, 3);

/*function add_fullinpark_resa_acf_columns ( $columns ) {
  unset($columns['date']);

  return array_merge ($columns, array(
   'resa_id' => __ ( 'N° Résa' ),
   'resa_type' => __ ( 'Activité' ),
   'resa_date' => __ ( 'Date - Heure' ),
   'resa_duration' => __ ( 'Durée' ),
   'resa_jump' => __ ( 'Jump' ),
   'resa_kids' => __ ( 'Kids' )
 ));
}
add_filter ( 'manage_edit-fip_resa_columns', 'add_fullinpark_resa_acf_columns' );*/

/*function fullinpark_resa_custom_column ($column, $post_id){
   switch($column):
     case 'resa_id':
       echo '#'.$post_id;
       break;
     case 'resa_type':
       if(get_post_meta($post_id, 'resa_activity', true) == "Course"):
         if(get_post_meta($post_id, 'resa_collective_course', true)):
           echo $resa_type_label[get_post_meta($post_id, 'resa_activity', true)].' Collectif';
         else:
           echo $resa_type_label[get_post_meta($post_id, 'resa_activity', true)].' Privé';
         endif;
       else:
         echo $resa_type_label[get_post_meta($post_id, 'resa_activity', true)];
       endif;
       break;
     case 'resa_date':
       echo date('d/m/Y', strtotime(get_post_meta($post_id, 'resa_date', true))).' - '.get_post_meta($post_id, 'resa_hour', true);
       break;
     case 'resa_duration':
       echo get_post_meta($post_id, 'resa_duration', true);
       break;
     case 'resa_jump':
       echo get_post_meta($post_id, 'resa_jump', true);
       break;
     case 'resa_kids':
       echo get_post_meta($post_id, 'resa_kids', true);
       break;
     default:
       break;
   endswitch;
}
add_action ('manage_fip_resa_posts_custom_column', 'fullinpark_resa_custom_column', 10, 2);*/
