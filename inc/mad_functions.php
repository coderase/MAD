<?php
require(PLUGIN_MAD_DIRECTORY.'inc/custom_post_type_metas.php');
require(PLUGIN_MAD_DIRECTORY.'inc/admin_includes.php');

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

//Ajax
require(PLUGIN_MAD_DIRECTORY.'inc/metas/ajax_requests.php');
