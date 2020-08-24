<?php
if(!class_exists('ProductInfos')):
  class ProductInfos{
    function __construct(){
      add_shortcode('mad_product_infos', array( $this, 'shortcode_product_infos_html'));
    }

    function shortcode_product_infos_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/templates/product_infos.php';
      return ob_get_clean();
    }
  }
endif;
