<?php
$current_category_object = get_queried_object(); ?>

<div class="other_categories_page">

    <div class="other_categories_page_text">
        <h1><?php the_field('title', $current_category_object); ?></h1>
        <p><?php the_field('text', $current_category_object); ?></p>
    </div>
    <?php
    $terms = get_field('categories', $current_category_object);

    if ($terms) : ?>
        <ul>
            <?php foreach ($terms as $term) : ?>
                <li>
                    <?php $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_url($thumbnail_id); ?>
                    <?php echo "<img src='{$image}' alt='' width='200' height='260' />"; ?>
                    <div class="categories_page_content">
                        <h2><?php echo esc_html($term->name); ?></h2>
                        <p><?php echo esc_html($term->description); ?></p>
                        <a href="<?php echo esc_url(get_term_link($term)); ?>">VIEW COLLECTION</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>