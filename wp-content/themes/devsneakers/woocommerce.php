<?php
get_header();
?>

<?php if (is_product_category()) { ?>
    <div class="other_categories_page_header">
        <?php $current_category_object = get_queried_object(); ?>
        <h1><?php echo $current_category_object->name; ?></h1>
        <p> <?php echo  $current_category_object->description; ?> </p>
    </div>
<?php
}

?>
</div>

<?php woocommerce_content(); ?>

<?php
if (is_product_category()) {
    get_template_part("/template-parts/blocks/categories");
}
?>


<?php
get_footer();
?>