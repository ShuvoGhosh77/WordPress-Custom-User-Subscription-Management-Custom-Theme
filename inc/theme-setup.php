<?php
function yourtheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mysightbooking'),
    ));
}
add_action('after_setup_theme', 'yourtheme_setup');

function yourtheme_register_sidebar() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'mysightbooking'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'mysightbooking'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title mb-2">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'yourtheme_register_sidebar');

add_filter('wp_mail_content_type', function() {
    return 'text/html';
});
