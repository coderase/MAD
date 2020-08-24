<?php
$user_id =  get_post_meta($post->ID, 'user_associate', true); ?>

<img src="<?php echo wp_get_attachment_url(get_user_meta($user_id, 'banner', true)); ?>" style="width: 100% !important;"/>
