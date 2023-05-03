<?php  /* Template Name: Search */
get_header();


?>


<div class="search-page-title"> <?php the_title(); ?> </div>
<h2 class="search-heading">SEARCH</h2>
<div class="search-text">
    <p>What are you looking for? </p>
</div>

<div class="search-container">
    <div class="search-form">
        <?php get_search_form(); ?>
    </div>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="search-result">


                <span><?php the_excerpt(); ?></span>
            </div>
            <a class="result-button" href="<?php the_permalink(); ?>"> VIEW COLLECTION</a>

            <hr>

        <?php endwhile; ?>
    <?php else : ?>


        <div class="search-result">
            <h2> <?php _e('No results matched your criteria'); ?></h2>
        </div>

    <?php endif; ?>
</div>

<?php
get_footer();
?>