<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

</main>
</div>
</div>

<footer id="colophon" class="site-footer">
    <?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>