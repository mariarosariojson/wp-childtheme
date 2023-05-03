<?php
/*Template Name: Stores*/

get_header();




the_content();


query_posts(array(
    'post_type' => 'stores'
)); ?>

<div class="store-wrapper">



    <h1><strong>Våra Butiker</strong></h1>


    <div class="store-container">

        <?php
        while (have_posts()) : the_post(); ?>
            <div class="single-store">
                <h2><?php the_field('city'); ?></h2>
                <div class="store-address-zip">

                    <p><?php the_field('street'); ?></p>
                    <p><?php the_field('zip_code') ?> <?php the_field('city'); ?></p>
                </div>

                <div class="stores-times">

                    <p>Öppettider:</p>
                    <p>Måndag-Torsdag: <?php the_field('monday-thursday') ?></p>
                    <p>Fredag: <?php the_field('friday') ?></p>
                    <p>Lördag: <?php the_field('saturday') ?></p>
                    <p>Söndag: <?php the_field('sunday') ?></p>
                </div>



            </div>
        <?php endwhile; ?>

    </div>

</div>



<?php get_footer(); ?>