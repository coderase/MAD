<?php
if(!class_exists('ProductGallery')):
  class ProductGallery{
    function __construct(){
      add_shortcode('mad_product_gallery', array( $this, 'shortcode_product_gallery_html'));
    }

    function shortcode_product_gallery_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/templates/product_gallery.php';
      return ob_get_clean();
    }
  }
endif;
