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

      //shortcodes
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/shortcode_header.php');

      new MADHeader();

      add_action('init', array($this, 'register_custom_post_type'));
      register_activation_hook( __FILE__ , array('MAD', 'install'));
      register_uninstall_hook( __FILE__ , array('MAD', 'uninstall'));
    }

    public function register_custom_post_type(){
      $mad_project_category_labels = array(
        'name' => _x( 'Categories', 'MAD' ),
        'singular_name' => _x( 'Category', 'MAD' ),
        'search_items' =>  __( 'Search Categories' ),
        'all_items' => __( 'All Categories' ),
        'parent_item' => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item' => __( 'Edit Category' ),
        'update_item' => __( 'Update Category' ),
        'add_new_item' => __( 'Add New Category' ),
        'new_item_name' => __( 'New Category Name' ),
        'menu_name' => __( 'Categories' ),
      );

      register_taxonomy('project_category', array('project'), array(
        'hierarchical' => true,
        'labels' => $mad_project_category_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categorie' ),
      ));

      //Project
      $mad_project_label = array(
        'name'            => 'Projet',
        'singular_name'   => 'Projet',
        'menu_name'       => 'Projets',
        'name_admin_bar'  => 'Projets',
        'all_items'           => __( 'Tous les Projets' ),
        'view_item'           => __( 'Voir le Projet' ),
        'add_new_item'        => __( 'Ajouter un nouveau Projet' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer le Projet' ),
        'update_item'         => __( 'Mettre à jour le Projet' ),
      );

      $mad_project_args = array(
        'labels'          => $mad_project_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-media-interactive',
        'supports'        => array('title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies'      => array('project_category'),
        'show_in_rest'    => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true
      );
      register_post_type('project', $mad_project_args);

      //Package Marque
      $mad_package_label = array(
        'name'            => 'Package Marque',
        'singular_name'   => 'Package Marque',
        'menu_name'       => 'Packages Marques',
        'name_admin_bar'  => 'Packages Marques',
        'all_items'           => __( 'Tous les Packages Marques' ),
        'view_item'           => __( 'Voir le Package Marque' ),
        'add_new_item'        => __( 'Ajouter un nouveau Package Marque' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer le Package Marque' ),
        'update_item'         => __( 'Mettre à jour le Package Marque' ),
      );

      $mad_package_args = array(
        'labels'          => $mad_package_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-cart',
        'supports'        => array('title', 'thumbnail'),
        'taxonomies'      => array(),
        'show_in_rest'    => true,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false
      );
      register_post_type('perk', $mad_package_args);

      //Comments
      $mad_comment_label = array(
        'name'            => 'Commentaires',
        'singular_name'   => 'Commentaires',
        'menu_name'       => 'Commentaires',
        'name_admin_bar'  => 'Commentaires',
        'all_items'           => __( 'Tous les Commentaires' ),
        'view_item'           => __( 'Voir le Commentaire' ),
        'add_new_item'        => __( 'Ajouter un nouveau Commentaire' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer le Commentaire' ),
        'update_item'         => __( 'Mettre à jour le Commentaire' ),
      );

      $mad_comment_args = array(
        'labels'          => $mad_comment_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-format-chat',
        'supports'        => array('title', 'editor'),
        'taxonomies'      => array(),
        'show_in_rest'    => true,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false
      );
      register_post_type('comment', $mad_comment_args);
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
