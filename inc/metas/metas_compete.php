<?php
function mad_compete_planification_html(){
  global $post; ?>

  <div>
    <div>
      <p>Étape n°1</p>

      <div>
        <div>
          <label>Date début:</label>
          <input type="text" name="step1_start_date" value="<?php echo get_post_meta($post->ID, 'step1_start_date', true); ?>"/>
        </div>

        <div>
          <label>Date fin:</label>
          <input type="text" name="step1_end_date" value="<?php echo get_post_meta($post->ID, 'step1_end_date', true); ?>"/>
        </div>
      </div>
    </div>

    <div>
      <p>Étape n°2</p>

      <div>
        <div>
          <label>Date début:</label>
          <input type="text" name="step2_start_date" value="<?php echo get_post_meta($post->ID, 'step2_start_date', true); ?>"/>
        </div>

        <div>
          <label>Date fin:</label>
          <input type="text" name="step2_end_date" value="<?php echo get_post_meta($post->ID, 'step2_end_date', true); ?>"/>
        </div>
      </div>
    </div>

    <div>
      <p>Étape n°3</p>

      <div>
        <div>
          <label>Date début:</label>
          <input type="text" name="step3_start_date" value="<?php echo get_post_meta($post->ID, 'step3_start_date', true); ?>"/>
        </div>

        <div>
          <label>Date fin:</label>
          <input type="text" name="step3_end_date" value="<?php echo get_post_meta($post->ID, 'step3_end_date', true); ?>"/>
        </div>
      </div>
    </div>
  </div>
  <?php
}

function mad_compete_about_html(){
  global $post; ?>

  <div>
    <?php wp_editor(get_post_meta($post->ID, 'compete_about_text', true), 'compete_about_text'); ?>
  </div><?php
}

function mad_compete_guidelines_html(){
  global $post; ?>

  <div>
    <?php wp_editor(get_post_meta($post->ID, 'compete_guidelines_text', true), 'compete_guidelines_text'); ?>
  </div><?php
}

function mad_compete_deadlines_html(){
  global $post; ?>

  <div>
    <?php wp_editor(get_post_meta($post->ID, 'compete_deadlines_text', true), 'compete_deadlines_text'); ?>
  </div><?php
}

function mad_compete_prizes_html(){
  global $post; ?>

  <div>
    <?php wp_editor(get_post_meta($post->ID, 'compete_prizes_text', true), 'compete_prizes_text'); ?>
  </div><?php
}

function mad_compete_judges_html(){
  global $wpdb;
  global $post;

  $all_artists = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'artist' AND post_status = 'publish'"); ?>

  <div id="mad_compete_judges_container">
    <div id="mad_compete_judges_title">
      <a onclick="show_metas_project_popup('#metas_compete_judges_popup');" class="button button-primary button-large" id="admin_add_judges">Ajouter</a>
    </div>

    <div>
      Liste des Juges

      <?php
      $judges = get_post_meta($post->ID, 'judges', true);

      foreach($judges as $key => $judge): ?>
          <div class="judges_row">
            <p><?php echo get_the_title($judge); ?></p>
            <p><a onclick="delete_a_judge(this);" data-compete="<?php echo $post->ID; ?>" data-judge="<?php echo $judge; ?>">supprimer</a></p>
          </div>
        <?php
      endforeach; ?>
    </div>
  </div>

  <div id="metas_compete_judges_popup" class="metas_compete_popup">
    <a class="x_button" onclick="hide_metas_project_popup('#metas_compete_judges_popup');">x</a>

    <div class="container">
      <div>
        <select name="artist_id" id="artist_id">
          <option value="null">Choisir un Artiste</option>

          <?php
          foreach(ArtistManager::get_all_artists() as $artist): ?>
            <option value="<?php echo $artist->ID; ?>"><?php echo $artist->post_title; ?></option>
            <?php
          endforeach; ?>
        </select>

        <input type="hidden" id="compete_id" value="<?php echo $post->ID; ?>"/>
        <a class="" onclick="add_judge();">Ajouter</a>
      </div>

      <div class="loader"></div>
    </div>
  </div>
  <?php
}

if(!function_exists('save_mad_compete_infos')):
  function save_mad_compete_infos($post_id, $post, $update){
    //if($post->post_type == 'compete'):
      update_post_meta($post_id, 'compete_about_text', @$_POST['compete_about_text']);
      update_post_meta($post_id, 'compete_guidelines_text', @$_POST['compete_guidelines_text']);
      update_post_meta($post_id, 'compete_deadlines_text', @$_POST['compete_deadlines_text']);
      update_post_meta($post_id, 'compete_prizes_text', @$_POST['compete_prizes_text']);
    //endif;
  }
endif;
add_action('save_post', 'save_mad_compete_infos', 10, 3);
