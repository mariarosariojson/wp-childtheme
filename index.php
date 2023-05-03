<?php
get_header();
?>


<!--To get the content of a page in postpage  -->

<?php
$my_id = 12;
$post_id_12 = get_post($my_id);
$content = $post_id_12->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
?>

<div class="index-post-heading"> <?php echo $content; ?></div>



<?php

// the query show 6 post
$the_query = new WP_Query(array(

    'posts_per_page' => 6,
));
?>

<div class="index-posts">

    <?php if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


            <div class="index-post-block">

                <div class="index-post-image">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail') ?></a>
                </div>

                <div class="index-post-text-content">

                    <h3><strong><?php the_title() ?></strong></h3>
                    <p><?php the_excerpt() ?></p>
                    <a href="<?php the_permalink(); ?>">READ MORE</a>

                </div>

            </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>



    <?php else : ?>

        <p><?php __('No News'); ?></p>

    <?php endif; ?>

</div>


<?php
get_footer();
?>