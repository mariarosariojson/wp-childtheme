
<?php
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
    );
}

add_filter('body_class', 'my_body_classes');
function my_body_classes($classes)
{
    $classes[] = 'test-childtheme';

    return $classes;
}

register_nav_menus(array(
    'footer_menu' => 'My Custom Footer Menu'
));
