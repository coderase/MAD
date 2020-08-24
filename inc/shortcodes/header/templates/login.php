<div id="login_popup" class="popup">
  <div class="content">
    <div id="step1">
      <p class="login title">Log in</p>
      <p class="register title">Sign up</p>
      <p class="forgot title" style="display: none;">Forgot your password?</p>
      <p class="register_link login">First MAD visit? <a onclick="switch_to_register_form();" class="popup_link">Sign Up</a></p>
      <p class="register_link register">Already have an account? <a onclick="switch_to_login_form();" class="popup_link">Log In</a></p>
      <p class="register_link forgot" style="display: none;">Please enter your email address. You will receive an email with instructions on how to reset your password</p>

      <form name="loginform" id="loginform" action="<?php echo wp_login_url(get_permalink()); ?>" method="POST">
        <div class="row register">
          <label for="first_name">First name</label>
          <input type="text" name="first_name" id="first_name" onkeyup="update_register_errors();"/>
        </div>

        <div class="row register">
          <label for="last_name">Last name</label>
          <input type="text" name="last_name" id="last_name" onkeyup="update_register_errors();"/>
        </div>

        <div class="row">
          <label for="log">Email address</label>
          <input type="text" name="log" id="log_id" onkeyup="update_register_errors();"/>
          <span id="error1" class="register_errors">Email format not valid</span>
          <span id="error2" class="register_errors">Email already exists</span>
        </div>

        <div class="row register">
          <label for="log">Re-enter Email</label>
          <input type="text" name="log_id_bis" id="log_id_bis" onkeyup="update_register_errors();"/>
          <span id="error3" class="register_errors">Emails don't match</span>
        </div>

        <div class="row register login">
          <label for="pwd">Password</label>
          <input type="password" name="pwd" id="pwd" onkeyup="update_register_errors();"/>
          <span id="error4" class="register_errors">Your password must be between 8 and 10 characters, contain at least one uppercase, one number digit and one special character (ex: $, #, @, !,%,^,&,*)</span>
        </div>

        <div class="row register">
          <label for="pwdbis">Re-enter Password</label>
          <input type="password" name="pwdbis" id="pwdbis" onkeyup="update_register_errors();"/>
          <span id="error5" class="register_errors">Passwords don't match</span>
        </div>

        <div id="notActivatedText">
          <p>Email already exists. Activate your account with the link sent to you by email</p>
        </div>

        <div id="passwordNotMatchText">
          <p>Email and Password don't match</p>
        </div>

        <div class="extra_options login">
          <p>
            <input type="checkbox"/>
            <label>Keep me logged in</label>
          </p>

          <p><a onclick="switch_to_forgot_password_form();">Forgot your password?</a></p>
        </div>

        <a onclick="login_request();" class="login_button login">Log in</a>
        <a onclick="register_user();" class="register_button register">Sign up</a>
        <a onclick="send_forgot_password_email();" class="forgot_button forgot">Generate new password</a>
      </form>

      <div>
        <?php
        //echo do_shortcode('[nextend_social_login provider="facebook"]');
        //echo do_shortcode('[nextend_social_login provider="google"]'); ?>
      </div>

      <p class="rgpd_text register">
        <input type="checkbox" name="agree_terms" id="agree_terms" onchange="update_register_errors();"/>

        <span id="agree_terms_text">
          I agree to <a href="<?php echo esc_url(home_url()).'/terms-of-use/'; ?>" class="popup_link">MAD’s Terms of Use</a> and <a href="<?php echo esc_url(home_url()).'/privacy-and-policies/'; ?>" class="popup_link">Privacy Policy</a>. </br>
          MAD may send you newsletters and occasional updates; you may change your preferences in your account settings
        </span>
      </p>
    </div>

    <div id="step2">
      <p>Hello <span id="step2Firstname"></span>, </p>
      <p>Congrats! You are now a MADer.</p>

      <p>To activate your account, check your email inbox now and click on the activation link provided.</p>
      <p>(Yep! You might want to look in your junk mail for it)</p>
    </div>

    <div id="step2forgotpassword">
      <p>Please check your mailbox now to find your password reset confirmation link</p>
    </div>

    <div id="register_errors"></div>
  </div>
</div>
