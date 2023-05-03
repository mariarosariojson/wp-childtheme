<div class="highlight-block-container">

    <div class="highlight-image">
        <?php
        $image = get_field('product_image');

        if ($image) {
            $image_id = $image['id'];
            echo wp_get_attachment_image($image_id, 'large');
        }
        ?>
    </div>
    <div class="highlight-block">
        <small><?php the_field('collection'); ?></small>
        <h1><?php the_field('product_title'); ?></h1>
        <small class="highlight_product_price"><?php the_field('product_price'); ?></small>
        <p><?php the_field('product_description'); ?></p>


        <div class="highlight-link">
            <?php
            $link = get_field('product_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a class="highlight-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>

</div>