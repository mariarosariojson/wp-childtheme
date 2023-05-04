<?php
add_action('wp_enqueue_scripts', 'devsneakerstheme_enqueue');

function devsneakerstheme_enqueue()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_theme_support('post-thumbnails');

add_theme_support('post-formats', array('aside', 'gallery', 'link'));

add_theme_support('custom-background', array(
    'default-color' => 'e8e8e8',
));


register_nav_menus(array(
    'my-custom-menu' => __('My Custom Menu'),
    'footer-menu' => __('Footer Menu', 'zaloto'),
));


add_action('woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice');

function bbloomer_free_shipping_cart_notice()
{

    $min_amount = 600;

    $current = WC()->cart->subtotal;

    if ($current < $min_amount) {
        $added_text = 'Get free shipping if you order ' . wc_price($min_amount - $current) . ' more!';
        $return_to = wc_get_page_permalink('shop');
        $notice = sprintf('<a href="%s" class="button wc-forward">%s</a> %s', esc_url($return_to), 'Continue Shopping', $added_text);
        wc_print_notice($notice, 'notice');
    }
}


// ACF blocks

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // register a testimonial block.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'hero',
            'title'             => __('Hero'),
            'description'       => __('A custom hero block.'),
            'render_template'   => 'template-parts/blocks/hero.php',
            'category'          => 'formatting',
            'icon'              => 'welcome-view-site',
            'keywords'          => array('hero'),
        ));

        acf_register_block_type(array(
            'name'              => 'heading',
            'title'             => __('Heading'),
            'description'       => __('A custom heading block.'),
            'render_template'   => 'template-parts/blocks/heading.php',
            'category'          => 'formatting',
            'icon'              => 'admin-customizer',
            'keywords'          => array('heading'),
        ));

        acf_register_block_type(array(
            'name'              => 'highlight',
            'title'             => ('Highlight'),
            'description'       => ('A custom highlight block.'),
            'render_template'   => 'template-parts/blocks/highlight.php',
            'category'          => 'formatting',
            'icon'              => 'welcome-view-site',
            'keywords'          => array('highlight'),
        ));
        acf_register_block_type(array(
            'name'              => 'collections',
            'title'             => ('collections'),
            'description'       => ('A custom collections block.'),
            'render_template'   => 'template-parts/blocks/collections.php',
            'category'          => 'formatting',
            'icon'              => 'welcome-view-site',
            'keywords'          => array('collections'),
        ));

        acf_register_block_type(array(
            'name'              => 'Categories',
            'title'             => __('Categories'),
            'description'       => __('A custom categories block.'),
            'render_template'   => 'template-parts/blocks/categories.php',
            'category'          => 'formatting',
            'icon'              => 'admin-customizer',
            'keywords'          => array('categories'),
        ));

        acf_register_block_type(array(
            'name'              => 'stores',
            'title'             => __('Store'),
            'description'       => __('A custom store block.'),
            'render_template'   => 'template-parts/blocks/stores.php',
            'category'          => 'formatting',
            'icon'              => 'store',
            'keywords'          => array('store'),
        ));
        acf_register_block_type(array(
            'name'              => 'mini hero',
            'title'             => __('Mini hero'),
            'description'       => __('A custom mini hero block.'),
            'render_template'   => 'template-parts/blocks/mini-hero.php',
            'category'          => 'formatting',
            'icon'              => 'welcome-view-site',
            'keywords'          => array('hero'),
        ));
        acf_register_block_type(array(
            'name'              => 'suggestions',
            'title'             => __('Suggestions'),
            'description'       => __('A custom suggestions block.'),
            'render_template'   => 'template-parts/blocks/suggestions.php',
            'category'          => 'formatting',
            'icon'              => 'welcome-view-site',
            'keywords'          => array('suggestions'),
        ));
    }
}


if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
    return 10;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);


/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});

/*Google fonts*/
function google_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat&display=swap', false);
}
add_action('wp_enqueue_scripts', 'google_fonts');


function add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'add_woocommerce_support');


remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


function remove_post_custom_fields()
{
    remove_post_type_support('stores', 'editor');
}
add_action('admin_init', 'remove_post_custom_fields');


function custom_post_type()
{

    $labels = array(
        'name'                  => _x('Stores', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Store', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Stores', 'text_domain'),
        'name_admin_bar'        => __('Post Type', 'text_domain'),
        'archives'              => __('Store Archives', 'text_domain'),
        'attributes'            => __('Store Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('All Stores', 'text_domain'),
        'add_new_item'          => __('Add New Store', 'text_domain'),
        'add_new'               => __('Add New Store', 'text_domain'),
        'new_item'              => __('New Store', 'text_domain'),
        'edit_item'             => __('Edit Store', 'text_domain'),
        'update_item'           => __('Update Store', 'text_domain'),
        'view_item'             => __('View Store', 'text_domain'),
        'view_items'            => __('View Stores', 'text_domain'),
        'search_items'          => __('Search Storee', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into Store', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this store', 'text_domain'),
        'items_list'            => __('Stores List', 'text_domain'),
        'items_list_navigation' => __('Stores list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter Stores list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Store', 'text_domain'),
        'description'           => __('Adds a new store to storepage', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-store',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('stores', $args);
}
add_action('init', 'custom_post_type', 0);




// remove related products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function woo_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);
    unset($tabs['reviews']);

    return $tabs;
}
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 60);





// Show plus minus buttons

add_action('woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus');

function bbloomer_display_quantity_plus()
{
    echo '<button type="button" class="plus">+</button>';
}

add_action('woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus');

function bbloomer_display_quantity_minus()
{
    echo '<button type="button" class="minus">-</button>';
}

add_action('wp_footer', 'bbloomer_add_cart_quantity_plus_minus');

function bbloomer_add_cart_quantity_plus_minus()
{

    if (!is_product() && !is_cart()) return;

    wc_enqueue_js("

      $(document).on( 'click', 'button.plus, button.minus', function() {

         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));

         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }

      });

   ");
}

function woocommerce_button_proceed_to_checkout()
{ ?>
    <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="checkout-button button alt wc-forward">
        <?php esc_html_e('Checkout', 'woocommerce'); ?>
    </a>
<?php
}

function remove_tabs_my_account($items)
{
    unset($items['dashboard']);
    unset($items['orders']);
    unset($items['downloads']);
    unset($items['edit-address']);
    unset($items['payment-methods']);
    unset($items['edit-account']);
    unset($items['customer-logout']);
    return $items;
}

add_filter('woocommerce_account_menu_items', 'remove_tabs_my_account', 999);

add_action('woocommerce_account_dashboard',  'woocommerce_account_orders');
add_action('woocommerce_account_dashboard',  'woocommerce_account_edit_address');
add_action('woocommerce_account_dashboard',  'woocommerce_account_edit_account');

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 4;
    }
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('woocommerce_show_page_title', '__return_false');
