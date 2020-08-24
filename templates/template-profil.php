<?php
get_header();

$user = wp_get_current_user();
$user_id = $user->ID; ?>

<div id="profil_page">
  <div id="profil_header">
    <div class="col">
      <?php
      if(!empty(get_user_meta($user_id, 'profil_picture', true))):
         $img_url = wp_get_attachment_url(get_user_meta($user_id, 'profil_picture', true));
      else:
        $img_url = PLUGIN_MAD_URL.'/MAD/img/user.png';
      endif; ?>

      <div id="profil_picture" style="background: url('<?php echo $img_url; ?>')">
        <label for="profil_picture_input"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Camera.png'; ?>"/></label>

        <form action="#" method="POST" enctype="multipart/form-data">
          <input type="file" name="profil_picture_input" id="profil_picture_input" style="display: none;"/>
        </form>
      </div>
    </div>

    <div class="col">
      <p class="title"><?php echo get_user_meta($user_id, 'first_name', true).' '.get_user_meta($user_id, 'last_name', true); ?></p>
      <div class="profil_folow">
        <p>12 Following</p>
        <?php
        if(get_user_meta($user_id, 'artist', true)): ?>
          <p>1 Follower</p><?php
        endif; ?>
      </div>
      <p>120 Credits</p>
      <a onclick="show_edit_profil_popup('#profile_popup');" class="edit_profil_link">Edit Profile</a>
    </div>

    <div class="col">
      <p class="title">About</p>
      <p><?php echo __( 'Joined', 'MAD' ); ?> <?php echo date('F d, Y', strtotime($user->user_registered)); ?></p>
      <p><?php echo __( 'Level', 'MAD' ); ?> <span class="bold">Bronze</span></p>

      <?php
      if(get_user_meta($user_id, 'artist', true)): ?>
        <p class="artist_status">MAD Artist Profile</p> <?php
      else: ?>
        <p class="artist_status">MADer Profile</p> <?php
        if(get_user_meta($user_id, 'waiting', true)):?>
          <p class="notification">Artist Profile Submitted</p> <?php
        endif;
      endif; ?>
    </div>
  </div>

  <div id="profil_nav">
    <ul>
      <li <?php echo (!isset($_GET['favorites']) && !isset($_GET['purchases']) && !isset($_GET['messages'])) ? 'class="active"': ''; ?>><a href="<?php echo esc_url(home_url()).'/profil/'; ?>">Feed</a></li>
      <li <?php echo (isset($_GET['favorites'])) ? 'class="active"': ''; ?>><a href="<?php echo esc_url(home_url()).'/profil/?favorites=1'; ?>">Favorites</a></li>
      <li <?php echo (isset($_GET['purchases'])) ? 'class="active"': ''; ?>><a href="<?php echo esc_url(home_url()).'/profil/?purchases=1'; ?>">Purchases</a></li>
      <li <?php echo (isset($_GET['messages'])) ? 'class="active"': ''; ?>><a href="<?php echo esc_url(home_url()).'/profil/?messages=1'; ?>">Messages</a></li>
    </ul>
  </div>

  <div id="profil_content">
    <?php
    if(isset($_GET['messages'])): ?>
      <div id="profil_messages">
        Messages
      </div><?php
    elseif(isset($_GET['favorites'])):  ?>
      <div id="profil_favorites">
        Favorites
      </div><?php
    elseif(isset($_GET['purchases'])): ?>
      <div id="profil_purchases">
        Purchases
      </div><?php
    else: ?>
      <div id="profil_feed">
        <div class="col1">
          <p class="title">View by</p>
          <input type="text" placeholder="search"/>
          <div class="filter">
            <ul>
              <li class="active">All</li>
              <li>Favorites</li>
              <li>MAD feeds</li>
            </ul>
          </div>

          <a class="profil_button">Settings</a>
        </div>

        <div class="col2">

        </div>
      </div><?php
    endif; ?>
  </div>
</div>

<div id="profile_popup" class="popup">
  <div class="content">
    <div id="step1Profil">
      <p class="title"><?php echo get_user_meta($user_id, 'first_name', true).' '.get_user_meta($user_id, 'last_name', true); ?>'s Infos</p>
      <p class="note">Fields marked with * are mandatory</p>

      <div class="row">
        <label>First Name*</label>
        <input type="text" name="profil_first_name" id="profil_first_name" value="<?php echo get_user_meta($user_id, 'first_name', true); ?>"/>
      </div>

      <div class="row">
        <label>Last Name*</label>
        <input type="text" name="profil_last_name" id="profil_last_name" value="<?php echo get_user_meta($user_id, 'last_name', true); ?>"/>
      </div>

      <div class="row">
        <label>Email Address*</label>
        <input type="email" name="profil_email" id="profil_email" value="<?php echo $user->user_email; ?>"/>
      </div>

      <div class="row">
        <label>Phone Number</label>
        <input type="text" name="profil_phone" id="profil_phone" value="<?php echo get_user_meta($user_id, 'phone', true); ?>"/>
      </div>

      <input type="hidden" name="profile_id" id="profile_id" value="<?php echo $user_id; ?>"/>

      <div class="submit_buttons">
        <a onclick="update_infos();" class="modify_profil_button">Confirm</a>
        <a onclick="switch_to_update_password();" class="switch_button">Change Password</a>
      </div>
    </div>

    <div id="step2Profil">
      <p class="title">Change your Password</p>
      <p class="note">Changing your password will clear login cookies. You will need to login again after saving.</p>

      <div class="row">
        <label>New Password</label>
        <input type="password" name="profil_pwd" id="profil_pwd"/>
        <span id="profil_error1" class="register_errors" style="display: none;">Your password must be between 8 and 10 characters, contain at least one uppercase, one number digit and one special character (ex: $, #, @, !,%,^,&,*)</span>
      </div>

      <div class="row">
        <label>Re-enter New Password</label>
        <input type="password" name="profil_pwdbis" id="profil_pwdbis"/>
        <span id="profil_error2" class="register_errors" style="display: none;">Passwords don't match</span>
      </div>

      <div class="submit_buttons">
        <a onclick="update_password();" class="modify_profil_button">Confirm</a>
        <a onclick="switch_to_update_infos();" class="switch_button">Change Informations</a>
      </div>
    </div>

    <p class="submit_message" style="text-align: center;">Changes Saved!</p>
  </div>
</div>

<?php
get_footer();
