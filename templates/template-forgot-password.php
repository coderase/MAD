<?php
get_header();

if(isset($_POST['reset_password'])):
  $user_id = $_POST['user_id'];

  wp_set_password($_POST["newpwd"], $user_id);

  require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_forgot_confirm.php'); ?>

  <div class="forgot_page">
    <p>Password changed successfully!</p>
    <p><a onclick="show_popup('#login_popup');">Log In</a> to continue</p>
  </div>
  <?php
elseif(isset($_GET['forgot-password'])):
  $user = get_user_by('email', base64_decode($_GET['forgot-password']));  ?>

  <div class="forgot_page">
    <p class="title">Create new Password</p>

    <form action="#" method="POST" id="reset_password_form">
      <div>
        <label for="newpwd">New password</label>
        <input type="password" name="newpwd" id="newpwd" onkeyup="update_set_password_error();"/>
        <span id="errorpdw1" class="register_errors">Your password must be between 8 and 10 characters, contain at least one uppercase, one number digit and one special character (ex: $, #, @, !,%,^,&,*)</span>
      </div>

      <div>
        <label for="newpwdbis">Re-enter new password</label>
        <input type="password" name="newpwdbis" id="newpwdbis" onkeyup="update_set_password_error();"/>
        <span id="errorpdw2" class="register_errors">Passwords don't match</span>
      </div>

      <input type="hidden" name="user_id" value="<?php echo $user->ID; ?>"/>
      <input type="hidden" name="reset_password"/>
      <button type="submit">Confirm</button>
    </form>
  </div><?php
else: ?>
  <div class="forgot_page">
    <p>Une erreur est survenu !</p>
  </div><?php
endif;

get_footer();
