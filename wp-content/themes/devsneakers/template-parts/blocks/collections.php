<div class="collections-container">

    <div class="collection-image">
        <?php
        $image = get_field('product_image');

        if ($image) {
            $image_id = $image['id'];
            echo wp_get_attachment_image($image_id, 'large');
        }
        ?>
    </div>

    <div class="collection-block">
        <h2 class="collection-heading"><?php the_field('category'); ?></h2>
        <p><?php the_field('product_description'); ?></p>
        <div class="collection-link">
            <?php
            $link = get_field('category_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a class="collection-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
