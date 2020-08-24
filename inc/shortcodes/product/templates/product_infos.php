<?php
$product = wc_get_product($post->ID);
$user_id = get_post_meta($post->ID, 'user_associate', true); ?>

<div>
  <p class="product_author"><?php echo get_user_meta($user_id, 'public_name', true); ?></p>
  <p class="product_name"><?php echo get_the_title($post->ID); ?></p>
  <p class="product_price"><?php echo $product->get_price(); ?>€</p>

  <div class="product_qty">
    <label>Quantity</label>
    <select id="product_qty" onchange="change_product_qty();" data-id="<?php echo $post->ID; ?>">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>

  <a href="?add-to-cart=<?php echo $post->ID; ?>" id="product_add_to_cart_button" class="add_to_cart_button" >Add to cart</a>
</div>
