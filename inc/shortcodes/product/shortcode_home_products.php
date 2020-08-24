<?php
if(!class_exists('ProductsHome')):
  class ProductsHome{
    function __construct(){
      add_shortcode('mad_home_product', array( $this, 'shortcode_home_product_html'));
    }

    function shortcode_home_product_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/templates/home_products.php';
      return ob_get_clean();
    }
  }
endif;
