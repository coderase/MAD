<?php
$to = $user->user_email;
$object = 'Artist Profile Submitted !';
$headers[] = 'From: MAD <marketing@howmadareyou.com>';

add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

$phpmailerInitAction = function(&$phpmailer) {
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/entete_mail.png', 'logo');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/submit_mail.png', 'banner');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/col1_submit_mail.png', 'col1');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/col2_submit_mail.png', 'col2');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/col3_submit_mail.png', 'col3');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/cta_discover.png', 'cta1');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/cta_submit_apply.png', 'cta2');
  $phpmailer->AddEmbeddedImage(PLUGIN_MAD_DIRECTORY.'img/cta_submit_watch.png', 'cta3');
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
              That’s great! Your artist profile is being reviewed by our awesome team. We’ll get back to you within the next 72h.
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>
              In the meantime, you can
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>
              <table cellpadding="0" cellspacing="20" width="600">
                <tr>
                  <td>
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <img src="cid:col1"/>
                        </td>
                      </tr>

                      <tr height="20">
                        <td></td>
                      </tr>

                      <tr>
                        <td style="font-size: 18px !important;"><span style="font-weight: bold;">Discover</span> other artists & their projects</td>
                      </tr>

                      <tr height="20">
                        <td></td>
                      </tr>

                      <tr>
                        <td>
                          <a href="'.esc_url(home_url()).'/artist/"><img src="cid:cta1" style="width: 100px !important;"/></a>
                        </td>
                      </tr>
                    </table>
                  </td>

                  <td>
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <img src="cid:col2"/>
                        </td>
                      </tr>

                      <tr height="20">
                        <td></td>
                      </tr>

                      <tr>
                        <td style="font-size: 18px !important;"><span style="font-weight: bold;">Apply</span> to competitions & talent hunts</td>
                      </tr>

                      <tr height="20">
                        <td></td>
                      </tr>

                      <tr>
                        <td>
                          <a href="'.esc_url(home_url()).'/compete/"><img src="cid:cta2" style="width: 100px !important;"/></a>
                        </td>
                      </tr>
                    </table>
                  </td>

                  <td>
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <img src="cid:col3"/>
                        </td>
                      </tr>

                      <tr height="20">
                        <td></td>
                      </tr>

                      <tr>
                        <td style="font-size: 18px !important;"><span style="font-weight: bold;">Watch</span> artists interviews & showcases</td>
                      </tr>

                      <tr height="20">
                        <td></td>
                      </tr>

                      <tr>
                        <td>
                          <a href="'.esc_url(home_url()).'/watch/"><img src="cid:cta3" style="width: 100px !important;"/></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr height="20">
            <td></td>
          </tr>

          <tr>
            <td>Madly yours,</td>
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
