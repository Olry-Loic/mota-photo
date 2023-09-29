<?php
    $query->the_post();
    $image_url = get_the_post_thumbnail_url();
    $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
    ?>
    <div class="photo">
        <img src="<?php echo esc_url($image_url); ?>" />
    </div>
    