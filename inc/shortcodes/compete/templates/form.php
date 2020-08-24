<?php
if(isset($_POST['candidat_submit'])):
  $candidat_infos = array(
    'post_title'    => $_POST['first_name'].' '.$_POST['last_name'].' - '.date('d/m/Y'),
    'post_content'  => '',
    'post_status'   => 'publish',
    'post_author'   => 1,
    'post_category' => array(),
    'post_type'     => 'candidat',
  );

  $candidat_id = wp_insert_post($candidat_infos);

  update_post_meta($candidat_id, 'first_name', $_POST['first_name']);
  update_post_meta($candidat_id, 'first_name', $_POST['last_name']);
  update_post_meta($candidat_id, 'artist_name', $_POST['last_name']);
  update_post_meta($candidat_id, 'town', $_POST['town']);
  update_post_meta($candidat_id, 'birthday', $_POST['birthday']);
  update_post_meta($candidat_id, 'email', $_POST['email']);
  update_post_meta($candidat_id, 'introduction', $_POST['introduction']);
  update_post_meta($candidat_id, 'video_link', $_POST['video_link']);
  update_post_meta($candidat_id, 'project_desc', $_POST['project_desc']);
  update_post_meta($candidat_id, 'know_about', $_POST['v']);

  if(!function_exists('wp_generate_attachment_metadata')):
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  endif;

  if(isset($_FILES['introduction_file']) and strlen($_FILES['introduction_file']['name']) > 3):
    if(0 === $_FILES['introduction_file']['error']):
      $attach_id = media_handle_upload('introduction_file', 0);
      update_post_meta($candidat_id, 'introduction_file', $attach_id);
    endif;
  endif;

  if(isset($_FILES['project_desc_file']) and strlen($_FILES['project_desc_file']['name']) > 3):
    if(0 === $_FILES['project_desc_file']['error']):
      $attach_id = media_handle_upload('project_desc_file', 0);
      update_post_meta($candidat_id, 'project_desc_file', $attach_id);
    endif;
  endif;
endif;  ?>

<form action="#" method="POST" enctype="multipart/form-data" id="compete_form">
  <p class="title">I want to participate</p>

  <div class="form_content">
    <div class="half_row">
      <input type="text" name="first_name" id="compete_first_name" placeholder="*Prénom"/>
    </div>

    <div class="half_row">
      <input type="text" name="last_name" id="compete_last_name" placeholder="*Nom"/>
    </div>

    <div class="half_row">
      <input type="text" name="artist_name" id="artist_name" placeholder="Nom d'artiste"/>
    </div>

    <div class="half_row">
      <input type="text" name="town" id="town" placeholder="*Ville en France"/>
    </div>

    <div class="half_row">
      <input type="text" name="birthday" id="birthday" placeholder="Date de naissance (dd/mm/aaaa)"/>
    </div>

    <div class="half_row">
      <input type="email" name="email" id="compete_email" placeholder="*Email"/>
    </div>


    <div class="full_row">
      <textarea name="introduction" id="introduction" placeholder="Présentez vous (400 mots max)"></textarea>
    </div>

    <div class="half_row">
      <div class="upload-btn-wrapper">
        <button class="btn"><span class="text">Choose a file</span> <span class="selector">v</span></button>
        <input type="file" name="introduction_file" id="introduction_file"/>
      </div>
    </div>

    <div class="full_row">
      <input type="text" name="video_link" id="video_link" placeholder="On adore les vidéos, si c'est aussi votre cas, envoyez-nous votre lien"/>
    </div>

    <div class="full_row">
      <textarea name="project_desc" id="project_desc" placeholder="*Que souhaitez-vous présenter/exposer à <?php //echo get_the_title($post->ID); ?>"></textarea>
    </div>

    <div class="half_row">
      <div class="upload-btn-wrapper">
        <button class="btn"><span class="text">Choose a file</span> <span class="selector">v</span></button>
        <input type="file" name="project_desc_file" id="project_desc_file"/>
      </div>
    </div>

    <div class="half_plus_row">
      <select name="know_about" id="know_about">
        <option value="null">Comment avez-vous connu le concours ?</option>
        <option value="Réseau sociaux">Réseaux sociaux</option>
        <option value="Presse">Presse</option>
        <option value="Bouche à Oreille">Bouche à Oreille</option>
        <option value="De quoi je me mêle ?">De quoi je me mêle ?</option>
      </select>
    </div>

    <p class="infos">Si vous avez des problèmes pour soumettre votre candidatures,</p>
    <p class="infos">contactez <a href="mailto:help@howmadareyou.com">help@howmadareyou.com</a></p>
  </div>

  <input type="hidden" name="candidat_submit"/>
  <a class="button" onclick="submit_candidat();">Submit your entry here</a>
</form>
