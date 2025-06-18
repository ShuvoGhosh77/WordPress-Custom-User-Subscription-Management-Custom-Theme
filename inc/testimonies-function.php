<?php

// Register Custom Post Type: Testimonies
function register_testimony_post_type()
{
    $labels = array(
        'name' => _x('Testimonies', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Testimony', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => __('Testimonies', 'textdomain'),
        'name_admin_bar' => __('Testimony', 'textdomain'),
        'add_new_item' => __('Add New Testimony', 'textdomain'),
        'edit_item' => __('Edit Testimony', 'textdomain'),
        'new_item' => __('New Testimony', 'textdomain'),
        'view_item' => __('View Testimony', 'textdomain'),
        'search_items' => __('Search Testimonies', 'textdomain'),
        'not_found' => __('No testimonies found', 'textdomain'),
    );

    $args = array(
        'label' => __('Testimonies', 'textdomain'),
        'description' => __('Client testimonials and stories', 'textdomain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
        'taxonomies' => array('testimony_category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-testimonial',
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonies'),
        'exclude_from_search' => false,
        'publicly_queryable' => true,
    );

    register_post_type('testimony', $args);
}
add_action('init', 'register_testimony_post_type');

// Register Custom Taxonomy: Testimony Categories
function register_testimony_category_taxonomy()
{
    $labels = array(
        'name' => _x('Testimony Categories', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Testimony Category', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Categories', 'textdomain'),
        'all_items' => __('All Categories', 'textdomain'),
        'edit_item' => __('Edit Category', 'textdomain'),
        'update_item' => __('Update Category', 'textdomain'),
        'add_new_item' => __('Add New Category', 'textdomain'),
        'new_item_name' => __('New Category Name', 'textdomain'),
        'menu_name' => __('Testimony Categories', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimony-category'),
    );

    register_taxonomy('testimony_category', array('testimony'), $args);
}
add_action('init', 'register_testimony_category_taxonomy');



/***************************************************************************
   Show anonymous  admin deshboard in post
*****************************************************************************/
add_action('add_meta_boxes', function () {
    add_meta_box(
        'testimony_meta_box',
        'Testimony Details',
        'render_testimony_meta_box',
        'testimony',
        'side',
        'default'
    );
});

function render_testimony_meta_box($post)
{
    $anonymous = get_post_meta($post->ID, 'testimonies_anonymous', true);
    echo '<p><strong>Anonymous:</strong> ' . ($anonymous ? 'Yes' : 'No') . '</p>';
}




/************************************************
    Short code for show all prayer wall
**************************************************/

function testimonies_shortcode()
{
    ob_start();
    ?>

    <div class="tabs-wrapper--panel testimonies-panel">

        <!-- Panel Controls -->
        <div class="panel-controls">

            <div class="row justify-content-between">


                <div class="col-auto">

                    <!-- Filter Wrapper -->
                    <div class="filter-wrapper">

                        <!-- Button -->
                        <button class="btn btn-secondary" id="filterButton">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter-icon.png"
                                alt="Filter Icon">
                            <span>Filter</span>
                            <span class="filter-count">0</span>
                        </button>

                        <!-- Filter Dropdown -->
                        <div class="filter-wrapper--dropdown">

                            <!-- Close button -->
                            <button class="close-btn">
                                <i class="fa fa-times"></i>
                            </button>

                            <!-- Filter list -->
                            <ul class="list-unstyled p-0 m-0">

                                <li class="mb-3">
                                    <label>
                                        <input type="checkbox" class="form-check-input filter-checkbox" value="recent">
                                        <span>Most Recent</span>
                                    </label>
                                </li>

                                <li class="mb-3">
                                    <label>
                                        <input type="checkbox" class="form-check-input filter-checkbox" value="week">
                                        <span>This Week</span>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="checkbox" class="form-check-input filter-checkbox" value="month">
                                        <span>This Month</span>
                                    </label>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>


                <div class="col-md  order-md-2 order-3">

                    <!-- Search Form -->
                    <form>

                        <!-- Search Bar -->
                        <div class="search-bar input-group mt-md-0 mt-3">

                            <span class="input-group-text bg-white" id="searchbar">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png"
                                    alt="search">
                            </span>

                            <input type="text" class="form-control" id="testimonySearch" placeholder="Search">

                        </div>

                    </form>

                </div>


                <div class="col-auto  order-md-3 order-2">

                    <!-- Add Prayer Button -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonyModal">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plus-icon.png"
                            alt="Add Testimony">Add Testimony
                    </button>

                </div>


            </div>

        </div>

        <!-- Testimonies Card Wrapper -->
        <?php
        $args = array(
            'post_type' => 'testimony',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        $query = new WP_Query($args);

        if ($query->have_posts()): ?>
            <div class="testimony-cards-wrapper">
                <div class="testimony-header text-center mx-auto">
                    <h1>God is good All the time</h1>
                    <p>They will give a testimony of Your great goodness and will joyfully sing of Your righteousness Psalms
                        145:7</p>
                </div>
                <div id="noTestimoniesMessage" class="text-center mt-4" style="display: none;">
                    <div class=" text-center">
                        <div>
                            <h2>No Testimony Match!</h2>
                        </div>

                    </div>
                </div>

                <div class="row masonry-grid" id="testimonyList">
                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        $user = get_the_author_meta('display_name');
                        $user_login = get_the_author_meta('user_login');
                        $post_date = get_the_date('d M');
                        $post_time = get_the_time('g:i A');
                        $content = get_the_content();
                        $anonymous = get_post_meta(get_the_ID(), 'testimonies_anonymous', true);
                        $author_id = get_post_field('post_author', get_the_ID());
                        $photo_id = get_user_meta($author_id, 'main_photo', true);
                        $photo_url = wp_get_attachment_url($photo_id);
                        $default_photo = get_template_directory_uri() . '/assets/images/user-man.png';
                        ?>
                        <div class="col-lg-4 testimony-item" data-date="<?php echo get_the_date('Y-m-d'); ?>"
                            data-content="<?php echo esc_attr(strip_tags(get_the_content())); ?>">

                            <div class="testimony-card">
                                <div class="testimony-card--user">

                                    <?php if (!$anonymous): ?>
                                        <img src="<?php echo esc_url($photo_url ? $photo_url : $default_photo); ?>" alt="User Image"
                                            class="img-testimony-fluid">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url($default_photo); ?>" alt="Anonymous User" class="img-fluid">
                                    <?php endif; ?>

                                    <div class="user-info">
                                        <h5><?php echo $anonymous ? 'Anonymous' : esc_html($user); ?></h5>
                                        <div class="user-id"><?php echo $anonymous ? '' : '@' . esc_html($user_login); ?></div>
                                    </div>
                                </div>

                                <p class="testimony-text"><?php echo esc_html($content); ?></p>

                                <div class="date-time-block">
                                    <span class="date"><?php echo $post_date; ?></span> • <span
                                        class="time"><?php echo $post_time; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

            </div>
            <?php wp_reset_postdata(); ?>
        <?php else:
            get_template_part('templates/sections/testimonies-empty');
        endif; ?>

    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('testimonies', 'testimonies_shortcode');







/************************************************
   Submit prayer request post
**************************************************/

// add_action('admin_post_nopriv_submit_testimonies_request', 'handle_testimonies_request_submission');
add_action('admin_post_submit_testimonies_request', 'handle_testimonies_request_submission');

function handle_testimonies_request_submission()
{
    // Security check
    if (!isset($_POST['testimonies_request_nonce']) || !wp_verify_nonce($_POST['testimonies_request_nonce'], 'submit_testimonies_request_nonce')) {
        wp_die('Security check failed!');
    }
    $content = sanitize_textarea_field($_POST['testimonies_content']);
    $anonymous = isset($_POST['testimonies_anonymous']) ? true : false;
    $title = $anonymous ? 'Anonymous testimonie Request' : 'testimonie Request by User';

    $post_id = wp_insert_post(array(
        'post_title' => $title,
        'post_content' => $content,
        'post_type' => 'testimony',
        'post_status' => 'publish',
        'post_author' => get_current_user_id(),
    ));

    if (!is_wp_error($post_id)) {
        update_post_meta($post_id, 'testimonies_anonymous', $anonymous);

    }
    wp_redirect(home_url('/testimonie/'));
    exit;
}
