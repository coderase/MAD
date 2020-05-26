<?php
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

function mad_project_perks_html(){
  global $wpdb;
  global $post;

  $all_perks = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND post_type = 'perk'"); ?>

  <div id="mad_project_perks_container">
    <div id="mad_project_perks_title">
      <a onclick="show_metas_project_popup();" class="button button-primary button-large">Ajouter</a>
    </div>

    <div>
      Liste des contre-parties
    </div>
  </div>

  <div id="metas_project_popup">
    <a id="x_button" onclick="hide_metas_project_popup();">x</a>

    <div id="container">
      <div id="step1">
        <a class="choice_button" onclick="show_step2(1);">Existante</a>
        <a class="choice_button" onclick="show_step2(2);">Créer</a>
      </div>

      <div id="step2">
        <a onclick="show_step1();" class="return_button">Retour</a>

        <div id="step2choice1" class="step2choice">
          <select>
            <option value="null">Choisir une contre-partie</option>

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
