<?php
if(!class_exists('ProductBanner')):
  class ProductBanner{
    function __construct(){
      add_shortcode('mad_product_banner', array( $this, 'shortcode_product_banner_html'));
    }

    function shortcode_product_banner_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/templates/product_banner.php';
      return ob_get_clean();
    }
  }
endif;
