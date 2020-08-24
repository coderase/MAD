<?php
get_header();

if(isset($_GET['code'])):
  global $wpdb;

  $user_id = base64_decode($_GET['code']);

  $user_infos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE ID = '$user_id'");

  if(count($user_infos) > 0):
    update_user_meta($user_id, 'activate', true);

    require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_welcome.php'); ?>

    <div class="activation_page">
      <p>Account Activated !</p>

      <a onclick="show_popup('#login_popup');">Log In</a>
    </div>
    <?php
  else: ?>
    <div class="activation_page">
      <p>Code d\'activation invalide</p>
    </div><?php
  endif;
else: ?>
  <div class="activation_page">
    <p>Aucun code d\'activation</p>
  </div><?php
endif;

get_footer();
