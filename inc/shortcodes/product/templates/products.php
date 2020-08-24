<?php
global $wpdb;

$all_product = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status = 'publish' ORDER BY RAND()");  ?>

<div id="all_product">
  <?php
  foreach ($all_product as $key => $product): ?>
    <div class="product_box">
      <a href="<?php echo get_post_permalink($product->ID); ?>"><div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url($product->ID) ?>');"></div></a>
      <a href="<?php echo get_post_permalink($product->ID); ?>"><p class="title"><?php echo get_the_title($product->ID); ?></p></a>

      <?php
      if(strlen(get_the_excerpt($product->ID)) < 100): ?>
        <p class="excerpt"><?php echo get_the_excerpt($product->ID); ?></p><?php
      else: ?>
        <p class="excerpt"><?php echo substr(get_the_excerpt($product->ID), 0, 100).'[...]'; ?></p><?php
      endif; ?>

      <p class="price"><?php echo get_post_meta($product->ID, '_price', true); ?> €</p>
    </div><?php
  endforeach; ?>
</div>
