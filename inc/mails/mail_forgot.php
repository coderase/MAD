<?php
$user = get_user_by('email', $email);
$first_name = get_user_meta($user->ID, 'first_name', true);

$to = $email;
$object = 'Reset your MAD password';
$headers[] = 'From: MAD <marketing@howmadareyou.com>';

add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

$phpmailerInitAction = function(&$phpmailer) {
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/entete_mail.png', 'logo');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/forgot_mail.png', 'banner');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/forgot_button.png', 'button');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/separator_mail.png', 'separator');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/facebook_mail.png', 'facebook');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/instagram_mail.png', 'instagram');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/twitter_mail.png', 'twitter');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/youtube_mail.png', 'youtube');
};
add_action('phpmailer_init', $phpmailerInitAction);

wp_mail($to, $object, '
  <style>
    table tr{
      margin: 0 !important;
      padding: 0 !important;
    }

    table td{
      font-size: 17px;
      margin: 0 !important;
      padding: 0 !important;
    }
    @media only screen and (max-width: 599px) { td[class="pattern"] td{ width: 100%;  } }
  </style>

  <table cellpadding="0" cellspacing="0" bgcolor="#FFF" style="width: 100% !important;">
    <tr height="30">
      <td></td>
    </tr>

    <tr bgcolor="#FFF">
      <td class="pattern" width="600" align="center" bgcolor="#FFF">
        <table cellpadding="10" cellspacing="0">
          <tr>
            <td align="center">
              <a href="'.esc_url(home_url()).'"><img src="cid:logo" style="width: 100px !important;"/></a>
            </td>
          </tr>

          <tr height="30">
            <td></td>
          </tr>

          <tr>
            <td align="center">
              <a href="'.esc_url(home_url()).'"><img src="cid:banner" style="width: 400px !important;"/></a>
            </td>
          </tr>

          <tr height="30">
            <td></td>
          </tr>

          <tr>
            <td>
                We got a request to change the password for the account '.$email.',
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>
              If you don’t want to reset your password, please ignore this email.
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>
              <a href="'.esc_url(home_url()).'/reset-password/?forgot-password='.base64_encode($email).'"><img src="cid:button" style="width: 150px !important;"/></a>
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>
              If the above link does not work for you, please copy and paste the following into your browser address bar:
            </td>
          </tr>

          <tr>
            <td>
              '.esc_url(home_url()).'/reset-password/?forgot-password='.base64_encode($email).'
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>Cheers,</td>
          </tr>

          <tr>
            <td>The MAD Gang</td>
          </tr>

          <tr height="30">
            <td></td>
          </tr>

          <tr>
            <td align="center">
              <img src="cid:separator"/>
            </td>
          </tr>

          <tr height="30">
            <td></td>
          </tr>

          <tr>
            <td align="center" width="300">
              <table cellpadding="0" cellspacing="30" width="300">
                <tr>
                  <td>
                    <a href="https://www.facebook.com/howMADryou/"><img src="cid:facebook"/></a>
                  </td>

                  <td>
                    <a href="https://www.youtube.com/channel/UCV3FlZ8FcFL8dE-hdgPkbiQ"><img src="cid:youtube"/></a>
                  </td>

                  <td>
                    <a href="https://twitter.com/howMADryou"><img src="cid:twitter"/></a>
                  </td>

                  <td>
                    <a href="https://www.instagram.com/howmadryou/"><img src="cid:instagram"/></a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr height="30">
            <td></td>
          </tr>

          <tr>
            <td>
              Copyright © 2020, All rights reserved
            </td>
          </tr>

          <tr>
            <td>
              Sent by MAD ® | Paris, France
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <tr height="30">
      <td></td>
    </tr>
  </table>
', $headers);

remove_action('phpmailer_init', $phpmailerInitAction);
remove_filter('wp_mail_content_type', 'wpdocs_set_html_mail_content_type');
