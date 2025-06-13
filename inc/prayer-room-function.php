<?php
function register_prayer_room_cpt() {
    $labels = array(
        'name'                  => 'Prayer Rooms',
        'singular_name'         => 'Prayer Room',
        'menu_name'             => 'Prayer Rooms',
        'name_admin_bar'        => 'Prayer Room',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Prayer Room',
        'new_item'              => 'New Prayer Room',
        'edit_item'             => 'Edit Prayer Room',
        'view_item'             => 'View Prayer Room',
        'all_items'             => 'All Prayer Rooms',
        'search_items'          => 'Search Prayer Rooms',
        'not_found'             => 'No Prayer Rooms found',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_in_rest'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-heart',
        'supports'              => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'prayer-room'),
        'capability_type'       => 'post',
    );

    register_post_type('prayer_room', $args);
    $taxonomy_labels = array(
        'name'              => 'Prayer Room Categories',
        'singular_name'     => 'Prayer Room Category',
        'search_items'      => 'Search Prayer Room Categories',
        'all_items'         => 'All Prayer Room Categories',
        'edit_item'         => 'Edit Prayer Room Category',
        'update_item'       => 'Update Prayer Room Category',
        'add_new_item'      => 'Add New Prayer Category',
        'new_item_name'     => 'New Prayer Room Category Name',
        'menu_name'         => 'Prayer Room Categories',
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'prayer-room-category'), 
    );

    register_taxonomy('prayer_room_category', 'prayer_room', $taxonomy_args);
}
add_action('init', 'register_prayer_room_cpt');


function flush_prayer_room_rewrite()
{
    register_prayer_room_cpt();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_prayer_room_rewrite');
