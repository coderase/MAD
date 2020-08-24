<?php
global $wpdb;

$all_product = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status = 'publish' ORDER BY RAND() LIMIT 4");  ?>

<div id="all_product">
  <?php
  foreach ($all_product as $key => $product): ?>
    <div class="product_box">
      <a href="<?php echo get_post_permalink($product->ID); ?>"><div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url($product->ID) ?>');"></div></a>
      <a href="<?php echo get_post_permalink($product->ID); ?>"><p class="title"><?php echo get_the_title($product->ID); ?></p></a>

      <?php
      $artist_id = get_post_meta($product->ID, 'user_associate', true); ?>
      <p class="excerpt">By <?php echo get_user_meta($artist_id, 'public_name', true); ?></p>
    </div><?php
  endforeach; ?>
</div>
