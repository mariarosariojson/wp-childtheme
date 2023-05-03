   <div class="post-list">
       <?php the_post_thumbnail('medium') ?>
       <h3>
           <?php the_title(); ?>
       </h3>
       <div>
           <?= the_excerpt(); ?>
           <a href="<?= the_permalink() ?>">Read More</a>
       </div>
       <span><?= the_time(get_option('date_format')); ?></span>
   </div>