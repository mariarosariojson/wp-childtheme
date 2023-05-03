<footer class="footer-wrapper">

    <div class="footer-container">

        <div class="footer-menus">


            <div class="footer-col1">
                <h2> Navigation </h2>

                <?php wp_nav_menu(array('theme_location' => 'my-custom-menu')); ?>


            </div>

            <div class="footer-col2">
                <h2>Information</h2>

                <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>


            </div>
        </div>

        <div class="brand-name">

            <h1>
                <?php bloginfo('name'); ?>
            </h1>


        </div>
    </div>
</footer>
<?php







?>



<?php wp_footer(); ?>
</body>

</html>