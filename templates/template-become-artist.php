<?php
get_header();

$user = wp_get_current_user();
$user_id = $user->ID;

if(isset($_POST['artist_form_submited'])):
  //Save infos
  if(!function_exists('wp_generate_attachment_metadata')):
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  endif;

  if(isset($_FILES['banner_img']) and strlen($_FILES['banner_img']['name']) > 3):
    if(0 === $_FILES['banner_img']['error']) :
       $banner_image_id = media_handle_upload('banner_img', 0);
       update_user_meta($user_id, 'banner', $banner_image_id);
    endif;
  endif;

  update_user_meta($user_id, 'first_name', $_POST['artist_first_name']);
  update_user_meta($user_id, 'last_name', $_POST['artist_last_name']);

  if(empty($_POST['artist_public_name'])):
    update_user_meta($user_id, 'public_name', $_POST['artist_first_name'].' '.$_POST['artist_last_name']);
  else:
    update_user_meta($user_id, 'public_name', $_POST['artist_public_name']);
  endif;

  wp_update_user(array('ID' => $user_id, 'user_email' => $_POST['artist_email']));
  update_user_meta($user_id, 'phone', $_POST['artist_phone']);

  if(isset($_FILES['profil_picture']) and strlen($_FILES['profil_picture']['name']) > 3):
    if(0 === $_FILES['profil_picture']['error']) :
       $banner_image_id = media_handle_upload('profil_picture', 0);
       update_user_meta($user_id, 'profil_picture', $banner_image_id);
    endif;
  endif;

  if(isset($_POST['artist_cat_music'])):
    update_user_meta($user_id, 'music', true);
  else:
    update_user_meta($user_id, 'music', false);
  endif;

  if(isset($_POST['artist_cat_art'])):
    update_user_meta($user_id, 'art', true);
  else:
    update_user_meta($user_id, 'art', false);
  endif;

  if(isset($_POST['artist_cat_design'])):
    update_user_meta($user_id, 'design', true);
  else:
    update_user_meta($user_id, 'design', false);
  endif;

  update_user_meta($user_id, 'about', $_POST['artist_about']);
  update_user_meta($user_id, 'headline', $_POST['artist_headline']);
  update_user_meta($user_id, 'location', $_POST['artist_location']);

  update_user_meta($user_id, 'facebook', $_POST['artist_facebook']);
  update_user_meta($user_id, 'instagram', $_POST['artist_instagram']);
  update_user_meta($user_id, 'twitter', $_POST['artist_twitter']);
  update_user_meta($user_id, 'youtube', $_POST['artist_youtube']);

  //Submit process
  if($_POST['artist_form_submited'] == 'submitted'):
    update_user_meta($user_id, 'waiting', true);
    update_user_meta($user_id, 'waiting_date', date('Y-m-d h:i:s'));

    require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_submit_profil.php');

    $to_admin = 'marketing@howmadareyou.com';
    $object_admin = 'Soumission demande artiste';

    wp_mail($to_admin, $object_admin, '
      Une demande d\'artiste a été soumise !
    ', $headers);

    remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); ?>

    <div class="popup" style="display: flex;">
      <div class="content">
        <div>
          <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/thankyou.png'; ?>" style="width: calc(100% + 68px); max-width: calc(100% + 68px); margin: -24px -30px 0px -34px;"/>
        </div>

        <p style="font-weight: bold; font-size: 20px; text-align: center;">Profile Submitted !</p>
        <p>While your profile is being reviewed by the MAD Gang, apply now to our open competitions for artists</p>

        <a href="<?php echo esc_url(home_url()).'/compete/'; ?>" class="become_an_artist_button">View Competitions</a>
      </div>
    </div>
    <?php
  endif;
endif;  ?>

<div id="page_become_artist">
  <div id="page_become_artist_banner" <?php echo (!empty(get_user_meta($user_id, 'banner', true))) ? 'style="background-image: url('.wp_get_attachment_url(get_user_meta($user_id, 'banner', true)).');"' : ''; ?>>
    <div>
      <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Camera.png'; ?>"/>
      <a><label for="banner_img">Upload your Cover Image or Video<label></a>
    </div>
  </div>

  <form action="#" method="POST" enctype="multipart/form-data" id="become_artist_form">
    <input type="file" name="banner_img" id="banner_img" style="display: none;" onchange="change_banner(this);"/>

    <p class="title">Fill out your profile to get MADly started!</p>
    <p class="note">Fields marked with * are mandatory</p>

    <div id="become_artist_form_elems">
      <div class="col">
        <div class="row">
          <label for="artist_first_name">First name* <span class="not_public">not displayed publicly</span></label>
          <input type="text" name="artist_first_name" id="artist_first_name" value="<?php echo get_user_meta($user_id, 'first_name', true); ?>"/>
        </div>

        <div class="row">
          <label for="artist_last_name">Last name* <span class="not_public">not displayed publicly</span></label>
          <input type="text" name="artist_last_name" id="artist_last_name" value="<?php echo get_user_meta($user_id, 'last_name', true); ?>"/>
        </div>

        <div class="row">
          <label for="artist_public_name">Your Artist Name</label>
          <input type="text" name="artist_public_name" id="artist_public_name" value="<?php echo get_user_meta($user_id, 'public_name', true); ?>"/>
        </div>

        <div class="row">
          <label for="artist_email">Email* <span class="not_public">not displayed publicly</span></label>
          <input type="text" name="artist_email" id="artist_email" value="<?php echo $user->user_email; ?>"/>
        </div>

        <div class="row">
          <label for="artist_phone">Phone* <span class="not_public">not displayed publicly</span></label>
          <input type="text" name="artist_phone" id="artist_phone" value="<?php echo get_user_meta($user_id, 'phone', true); ?>"/>
        </div>

        <div class="row">
          <label>Profile Picture*</label>
          <input type="file" name="profil_picture" id="profil_picture" style="display: none;" onchange="change_profil_picture(this);"/>

          <div id="profil_picture_container" <?php echo (!empty(get_user_meta($user_id, 'profil_picture', true))) ? 'style="background-image: url('.wp_get_attachment_url(get_user_meta($user_id, 'profil_picture', true)).');"' : ''; ?>>
            <div>
              <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Camera.png'; ?>"/>
              <a><label for="profil_picture">Upload your image<label></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="row">
          <label for="artist_about">Tell us more about you*</label>
          <textarea name="artist_about" id="artist_about"><?php echo get_user_meta($user_id, 'about', true); ?></textarea>
          <p class="note" style="color: #DDD !important;">This is your bio. 4-5 lines about your talent, your passions, your projects</p>
        </div>

        <div class="row">
          <label for="artist_headline">MAD headline*</label>
          <input type="text" name="artist_headline" id="artist_headline" value="<?php echo get_user_meta($user_id, 'headline', true); ?>"/>
          <p class="note" style="color: #DDD !important;">10 words sentence that describes you best</p>
        </div>

        <div class="row categories">
          <label style="width: 100%; margin-bottom: .75em;" id="cat_label">Categories*</label>

          <div>
            <input type="checkbox" name="artist_cat_music" id="artist_cat_music" <?php echo (get_user_meta($user_id, 'music', true)) ? 'checked': ''; ?>/>
            <label>Music</label>
          </div>

          <div>
            <input type="checkbox" name="artist_cat_art" id="artist_cat_art" <?php echo (get_user_meta($user_id, 'art', true)) ? 'checked': ''; ?>/>
            <label>Art</label>
          </div>

          <div>
            <input type="checkbox" name="artist_cat_design" id="artist_cat_design" <?php echo (get_user_meta($user_id, 'design', true)) ? 'checked': ''; ?>/>
            <label>Design</label>
          </div>
        </div>

        <div class="row">
          <?php
          $active_countries = get_option('active_countries'); ?>

          <label for="artist_location">Location</label>
          <select name="artist_location" id="artist_location">
            <option value="null">Choose a location</option>
            <?php
            foreach($active_countries as $country):  ?>
              <option name="<?php echo sanitize_title($country); ?>" id="<?php echo sanitize_title($country); ?>"><?php echo $country; ?></option>
              </div><?php
            endforeach; ?>
          </select>
        </div>

        <div class="row">
          <label for="artist_facebook">Facebook</label>
          <input type="text" name="artist_facebook" id="artist_facebook" value="<?php echo get_user_meta($user_id, 'facebook', true); ?>"/>
        </div>

        <div class="row">
          <label for="artist_instagram">Instagram</label>
          <input type="text" name="artist_instagram" id="artist_instagram" value="<?php echo get_user_meta($user_id, 'instagram', true); ?>"/>
        </div>

        <div class="row">
          <label for="artist_twitter">Twitter</label>
          <input type="text" name="artist_twitter" id="artist_twitter" value="<?php echo get_user_meta($user_id, 'twitter', true); ?>"/>
        </div>

        <div class="row">
          <label for="artist_youtube">Youtube // Vimeo</label>
          <input type="text" name="artist_youtube" id="artist_youtube" value="<?php echo get_user_meta($user_id, 'youtube', true); ?>"/>
        </div>
      </div>
    </div>

    <div id="profil_submit_button">
      <div class="col">
        <a class="submit_button brown" onclick="save_user_infos();">Save and submit later</a>
      </div>

      <div class="col">
        <a class="submit_button yellow" onclick="submit_user_infos();">Submit your profile</a>
      </div>
    </div>

    <input type="hidden" name="artist_form_submited" id="artist_form_submited" value="saved"/>
  </form>
</div>

<?php
get_footer();
