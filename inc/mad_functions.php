<?php
require(PLUGIN_MAD_DIRECTORY.'inc/custom_post_type_metas.php');
require(PLUGIN_MAD_DIRECTORY.'inc/admin_includes.php');
require(PLUGIN_MAD_DIRECTORY.'inc/frontend_includes.php');

if(!function_exists('custom_ajaxurl')):
  function custom_ajaxurl(){ echo '<script type="text/javascript">var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>'; }
endif;
add_action('wp_head', 'custom_ajaxurl');

if(!function_exists('wpdocs_set_html_mail_content_type')):
  function wpdocs_set_html_mail_content_type(){  return 'text/html';  }
endif;

function mad_add_cpt_support() {
	$cpt_support = get_option( 'elementor_cpt_support' );

	if(!$cpt_support):
	  $cpt_support = [ 'page', 'post', 'project'];
	  update_option('elementor_cpt_support', $cpt_support);
	elseif(!in_array('realisations', $cpt_support)):
	  $cpt_support[] = 'project';
    update_option( 'elementor_cpt_support', $cpt_support);
	endif;
}
add_action('after_switch_theme', 'mad_add_cpt_support');

//Admin menu
function mad_admin_menu(){
  add_menu_page('MAD', 'MAD', 'manage_options', 'mad_admin', 'mad_admin_page', 'dashicons-admin-generic', '4');
  add_submenu_page('mad_admin', 'mad_settings', 'Réglages', 'manage_options', 'mad_settings', 'mad_settings_page');
}
add_action('admin_menu', 'mad_admin_menu');

function mad_admin_page(){
  require(PLUGIN_MAD_DIRECTORY.'inc/admin/validation.php');
}

function mad_settings_page(){
  require(PLUGIN_MAD_DIRECTORY.'inc/admin/settings.php');
}

//CRON
function mad_daily_cron_tasks(){
  global $wpdb;

  $day = 86400;
  $all_users = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users");

  foreach ($all_users as $user):
    if(!get_user_meta($user->ID, 'activate', true)):
      $day_since_registered = intval((strtotime(date('Y-m-d h:i:s')) - strtotime($user->user_registered)) / $day);

      if($day_since_registered > 5):
        //Delete user
        $wpdb->delete("{$wpdb->prefix}users", array("ID" => $user->ID));
      elseif($day_since_registered > 4):
        require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_activation_d4.php');
      elseif($day_since_registered > 3):
        require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_activation_d1.php');
      elseif($day_since_registered > 1):
        require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_activation_d1.php');
      endif;
    endif;
  endforeach;
}
add_action('mad_daily_cron_hook', 'mad_daily_cron_tasks');

if(!wp_next_scheduled('mad_daily_cron_hook')):
  wp_schedule_event(time(), 'daily', 'mad_daily_cron_hook');
endif;

function redirect_activation_failed( $username ) {
  if(is_wp_error($username)):
    wp_redirect(esc_url(home_url().'/activation'));
    exit;
  endif;
}
add_action('wp_login_failed', 'redirect_activation_failed');

function mad_redirect_after_logout(){
  wp_redirect(esc_url(home_url()));
  exit();
}
add_action('wp_logout','mad_redirect_after_logout');

//Templates
function mad_page_template($page_template){
    if(get_page_template_slug() == 'template-activation.php'):
      $page_template = PLUGIN_MAD_DIRECTORY. 'templates/template-activation.php';
    endif;

    if(get_page_template_slug() == 'template-forgot-password.php'):
      $page_template = PLUGIN_MAD_DIRECTORY. 'templates/template-forgot-password.php';
    endif;

    if(get_page_template_slug() == 'template-become-artist.php'):
      $page_template = PLUGIN_MAD_DIRECTORY. 'templates/template-become-artist.php';
    endif;

    if(get_page_template_slug() == 'template-profil.php'):
      $page_template = PLUGIN_MAD_DIRECTORY. 'templates/template-profil.php';
    endif;

    if(get_page_template_slug() == 'template-artist-manager.php'):
      $page_template = PLUGIN_MAD_DIRECTORY. 'templates/template-artist-manager.php';
    endif;

    if(get_page_template_slug() == 'template-preview.php'):
      $page_template = PLUGIN_MAD_DIRECTORY. 'templates/template-preview.php';
    endif;

    return $page_template;
}
add_filter('page_template', 'mad_page_template');

function mad_add_template_to_select($post_templates, $wp_theme, $post, $post_type){
    // Add custom template named template-custom.php to select dropdown
    $post_templates['template-activation.php'] = __('Activation');
    $post_templates['template-become-artist.php'] = __('Become Artist');
    $post_templates['template-forgot-password.php'] = __('Forgot Password');
    $post_templates['template-profil.php'] = __('Profil');
    $post_templates['template-artist-manager.php'] = __('Artist Manager');
    $post_templates['template-preview.php'] = __('Preview');

    return $post_templates;
}
add_filter( 'theme_page_templates', 'mad_add_template_to_select', 10, 4 );

//Ajax
require(PLUGIN_MAD_DIRECTORY.'inc/ajax_requests.php');
require(PLUGIN_MAD_DIRECTORY.'inc/metas/ajax_requests.php');
