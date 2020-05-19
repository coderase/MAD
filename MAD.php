<?php
/*
Plugin Name: MAD
Description: V2 MAD
Author: Maxime PORPIGLIA
Version: 1
*/

if(!defined('ABSPATH')):
  die;
endif;

define('PLUGIN_MAD_DIRECTORY', plugin_dir_path(__FILE__));
define('PLUGIN_MAD_URL', plugins_url());

if(!class_exists('MAD')):
  class MAD{
    function __construct(){
      require(PLUGIN_MAD_DIRECTORY.'vendor/autoload.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/mad_functions.php');

      add_action('init', array($this, 'register_custom_post_type'));
      register_activation_hook( __FILE__ , array('MAD', 'install'));
      register_uninstall_hook( __FILE__ , array('MAD', 'uninstall'));
    }

    public function register_custom_post_type(){

    }

    public static function install(){
      global $wpdb;
    }

    public static function uninstall(){
      global $wpdb;
    }
  }
endif;

new MAD();
