<div class="heading-block intro-block">
    <h1><?php the_field('heading-title'); ?></h1>
    <p><?php the_field('heading-text'); ?></p>

    <div class="heading-link intro-link">
        <?php
        $link = get_field('heading-link');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
    </div>
</div>