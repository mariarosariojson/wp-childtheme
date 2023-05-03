<div class="hero-block">

    <?php
    $image = get_field('image');

    if ($image) {
        $image_id = $image['id'];
        echo wp_get_attachment_image($image_id, 'large');
    }
    ?>

</div>