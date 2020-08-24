<?php
if(!class_exists('Products')):
  class Products{
    function __construct(){
      add_shortcode('mad_products', array( $this, 'shortcode_get_products_html'));
    }

    function shortcode_get_products_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/templates/products.php';
      return ob_get_clean();
    }
  }
endif;
