<?php

function enqueue_swiper_assets()
{
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

function yourtheme_enqueue_assets()
{
    // Main theme CSS (this includes your style.css)
    wp_enqueue_style('yourtheme-style', get_stylesheet_uri());

    // Custom CSS (local)
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css');

    // Bootstrap CSS (local)
    // wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

    // Responsive CSS (local)
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css');

    // FontAwesome CSS (external CDN)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

    // Bootstrap JS (external CDN, with jQuery as dependency)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    // wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    // Bootstrap Slider
    wp_enqueue_script(
        'bootstrap-slider',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js',
        array('jquery'),
        null,
        true
    );


    wp_enqueue_style(
        'bootstrap-slider-css',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css'
    );

    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);

    // masonry JS 
    wp_enqueue_script('masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js', array('jquery'), null, true);


    // Custom JS (local)
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'bootstrap-slider'), null, true);
    wp_enqueue_script('prayer-wall-script', get_template_directory_uri() . '/assets/js/prayer-wall.js', array('jquery'), null, true);
    wp_localize_script('prayer-wall-script', 'prayerWallAjax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('load_prayers_nonce')
    ));
    wp_enqueue_script('testimonies', get_template_directory_uri() . '/assets/js/testimonies.js', array('jquery'), null, true);
    wp_localize_script('testimonies', 'testimony_ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('testimony_nonce'),
    ]);


}
add_action('wp_enqueue_scripts', 'yourtheme_enqueue_assets');

