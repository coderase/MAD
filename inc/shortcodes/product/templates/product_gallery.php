<?php
$product = wc_get_product($post->ID);
$user_id =  get_post_meta($post->ID, 'user_associate', true);
$attachment_ids = $product->get_gallery_image_ids();  ?>

<div id="product_galery">
  <div class="col1" <?php echo(count($attachment_ids) == 0) ? 'style="display: none;"' : '';?>>
    <?php
    foreach($attachment_ids as $key => $img): ?>
      <img src="<?php echo wp_get_attachment_url($img); ?>"/><?php
    endforeach; ?>
  </div>

  <div class="col2" <?php echo(count($attachment_ids) == 0) ? 'style="width: 100%; margin-left: 0;"' : '';?>>
    <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>"/>
  </div>
</div>
