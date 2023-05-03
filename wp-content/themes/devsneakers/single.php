<?php
get_header();
?>


<div class="single-page-wrapper">

    <div class="single-page-content">
        <p><?php the_time(get_option('date_format')); ?></p>
        <h1><?php the_title(); ?></h1>

        <div class="single-page-img">
            <?php the_post_thumbnail('large'); ?>
        </div>

    </div>

    <div class="single-page-link">

        <?php the_content(); ?>
        <a class="page-link" href="http://localhost/zaloto/news/"> Back</a>
    </div>
</div>




<?php
get_footer();
?>