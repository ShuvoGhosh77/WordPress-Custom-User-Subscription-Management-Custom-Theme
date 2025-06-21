<?php

function register_prayer_request_cpt()
{
    // Register CPT: Prayer Requests
    $labels = array(
        'name' => 'Prayer Requests',
        'singular_name' => 'Prayer Request',
        'menu_name' => 'Prayer Requests',
        'name_admin_bar' => 'Prayer Request',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Prayer Request',
        'new_item' => 'New Prayer Request',
        'edit_item' => 'Edit Prayer Request',
        'view_item' => 'View Prayer Request',
        'all_items' => 'All Prayer Requests',
        'search_items' => 'Search Prayer Requests',
        'not_found' => 'No prayer requests found',
        'not_found_in_trash' => 'No prayer requests found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor', 'comments', 'author'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'prayer-requests'),
        'show_in_rest' => true,

    );

    register_post_type('prayer_request', $args);
}

function register_prayer_category_taxonomy()
{
    $labels = array(
        'name' => 'Prayer Categories',
        'singular_name' => 'Prayer Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Prayer Categories',
    );

    $args = array(
        'hierarchical' => true, // Like categories
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'prayer-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('prayer_category', array('prayer_request'), $args);

    // Add default terms
    if (!term_exists('Normal', 'prayer_category')) {
        wp_insert_term('Normal', 'prayer_category');
    }
    if (!term_exists('Urgent', 'prayer_category')) {
        wp_insert_term('Urgent', 'prayer_category');
    }
    if (!term_exists('Group Prayer', 'prayer_category')) {
        wp_insert_term('Group Prayer', 'prayer_category');
    }
}

add_action('init', 'register_prayer_request_cpt');
add_action('init', 'register_prayer_category_taxonomy');

/***************************************************************************
   Show anonymous and group_contact have or not in admin deshboard in post
*****************************************************************************/

add_action('add_meta_boxes', function () {
    add_meta_box(
        'prayer_request_meta',
        'Prayer Request Details',
        'render_prayer_request_meta_box',
        'prayer_request',
        'side',
        'default'
    );
});

function render_prayer_request_meta_box($post)
{
    $anonymous = get_post_meta($post->ID, 'anonymous', true);
    $group_contact = get_post_meta($post->ID, 'group_contact', true);

    echo '<p><strong>Anonymous:</strong> ' . ($anonymous ? 'Yes' : 'No') . '</p>';
    echo '<p><strong>Wants Group Contact:</strong> ' . ($group_contact ? 'Yes' : 'No') . '</p>';
}

/************************************************
   Submit prayer request post
**************************************************/

add_action('admin_post_nopriv_submit_prayer_request', 'handle_prayer_request_submission');
add_action('admin_post_submit_prayer_request', 'handle_prayer_request_submission');

function handle_prayer_request_submission()
{
    // Security check
    if (!isset($_POST['prayer_request_nonce']) || !wp_verify_nonce($_POST['prayer_request_nonce'], 'submit_prayer_request_nonce')) {
        wp_die('Security check failed!');
    }
    $content = sanitize_textarea_field($_POST['prayer_content']);
    $priority = sanitize_text_field($_POST['request_priority']);
    $anonymous = isset($_POST['anonymous']) ? true : false;
    $allow_comment = isset($_POST['allow_comment']) ? 'open' : 'closed';
    $group_contact = isset($_POST['group_contact']) ? true : false;
    $title = $anonymous ? 'Anonymous Prayer Request' : 'Prayer Request by User';

    $post_id = wp_insert_post(array(
        'post_title' => $title,
        'post_content' => $content,
        'post_type' => 'prayer_request',
        'post_status' => 'publish',
        'comment_status' => $allow_comment,
        'post_author' => get_current_user_id(),
    ));

    if (!is_wp_error($post_id)) {
        $terms = [$priority];
        if ($group_contact) {
            $terms[] = 'Group Prayer';
        }
        wp_set_object_terms($post_id, $terms, 'prayer_category');
 
        update_post_meta($post_id, 'anonymous', $anonymous);
        update_post_meta($post_id, 'group_contact', $group_contact);
        if (is_user_logged_in() && $group_contact) {
            update_user_meta(get_current_user_id(), 'wants_group_contact', 1);
        }
    }
    wp_redirect(home_url('/prayer-wall/'));
    exit;
}


/************************************************
    Short code for show all prayer wall
**************************************************/

function prayer_wall_shortcode()
{
    ob_start();



    ?>
    <!-- Tab Panel * PrayerWall  -->
    <div class="tabs-wrapper--panel prayerwall-panel">


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
                                        <input type="checkbox" class="form-check-input filter-checkbox" value="Normal">
                                        <span>Normal</span>
                                    </label>
                                </li>

                                <li class="mb-3">
                                    <label>
                                        <input type="checkbox" class="form-check-input filter-checkbox" value="Urgent">
                                        Urgent
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="checkbox" class="form-check-input filter-checkbox"
                                            value="Group Prayer">
                                        Group Prayer
                                    </label>
                                </li>

                            </ul>


                        </div>

                    </div>

                </div>



                <div class="col-md  order-md-2 order-3">

                    <!-- Search Bar -->
                    <div id="prayer-search-form">
                        <div class="search-bar input-group mt-md-0 mt-3">
                            <span class="input-group-text bg-white" id="searchbar">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="">
                            </span>
                            <input type="text" id="prayer-search" class="form-control" placeholder="Search"
                                aria-describedby="searchbar">

                        </div>
                    </div>


                </div>


                <div class="col-auto  order-md-3 order-2">

                    <!-- Add Prayer Request Button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#prayerRequestModal">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plus-icon.png"
                            alt="Add Request">Add Request
                    </button>

                </div>


            </div>


        </div>

        <!-- Prayer Cards Wrapper -->
        <div class="prayer-cards-wrapper">
            <div id="prayer-request-list" class="row gx-3 gy-4">
                <!-- Prayer cards will be injected here via AJAX -->
            </div>
        </div>




    </div>

    <?php

    return ob_get_clean();
}
add_shortcode('prayer_wall', 'prayer_wall_shortcode');


add_action('wp_ajax_load_prayer_requests', 'load_prayer_requests_callback');
add_action('wp_ajax_nopriv_load_prayer_requests', 'load_prayer_requests_callback');

function load_prayer_requests_callback()
{
    check_ajax_referer('load_prayers_nonce', 'nonce');

    $search = sanitize_text_field($_POST['search']);
    $filters = isset($_POST['filters']) ? array_map('sanitize_text_field', $_POST['filters']) : [];

    $args = array(
        'post_type' => 'prayer_request',
        'post_status' => 'publish',
        's' => $search,
        'posts_per_page' => -1
    );

    if (!empty($filters)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'prayer_category',
                'field' => 'name',
                'terms' => $filters
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();

            $author_id = get_post_field('post_author', get_the_ID());
            $anonymous = get_post_meta(get_the_ID(), 'anonymous', true);
            $name = $anonymous ? 'Anonymous' : get_the_author_meta('display_name', $author_id);
            $content = get_the_content();
            $date = get_the_date('F j, Y');
            $photo_id = get_user_meta($author_id, 'main_photo', true);
            $photo_url = wp_get_attachment_url($photo_id);
            $group_contact = get_post_meta(get_the_ID(), 'group_contact', true);

            $current_user_id = get_current_user_id();
            $current_user_photo_id = get_user_meta($current_user_id, 'main_photo', true);
            $current_user_photo_url = wp_get_attachment_url($current_user_photo_id);

            $current_user_id = get_current_user_id();

            $prayed_users = get_post_meta(get_the_ID(), 'prayed_user_ids', true);
            if (!is_array($prayed_users))
                $prayed_users = [];

            $group_prayed_users = get_post_meta(get_the_ID(), 'group_prayed_user_ids', true);
            if (!is_array($group_prayed_users))
                $group_prayed_users = [];

            $has_prayed = in_array($current_user_id, $prayed_users);
            $has_group_prayed = in_array($current_user_id, $group_prayed_users);


            ?>
            <div class="col-lg-4">
                <div class="prayer-card">
                    <div class="prayer-card--user">
                        <?php if (!$anonymous && $photo_url): ?>
                            <img src="<?php echo esc_url($photo_url); ?>" style="max-width: 80px;" alt="User Image"
                                class="img-fluid44" />
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png" alt="User Image"
                                class="img-fluid44">
                        <?php endif; ?>
                        <div class="user-info">
                            <h5><?php echo esc_html($name); ?></h5>
                            <div class="request-date"><?php echo esc_html($date); ?></div>
                        </div>
                    </div>
                    <?php
                    $has_urgent = has_term('Urgent', 'prayer_category', get_the_ID());
                    $has_group = !empty($group_contact);
                    $anonymous = get_post_meta(get_the_ID(), 'anonymous', true);
                    ?>

                    <?php if ($anonymous): ?>
                        <div class="group-contact-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/group-tag.png" alt="Group Tag">
                        </div>
                    <?php elseif ($has_urgent): ?>
                        <div class="group-contact-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/urgent-tag.png" alt="Urgent Tag">
                        </div>
                    <?php endif; ?>




                    <div class="prayer-card--request" id="prayer-card-more">
                        <div class="request-text"><?php echo apply_filters('the_content', get_the_content()) ?></div>
                        <button class="expand-text-btn">Read More <i class="fa fa-chevron-down"></i></button>
                    </div>

                    <!-- Comment & Share Block -->
                    <div class="comment-share-block">

                        <?php if (comments_open(get_the_ID())): ?>
                            <!-- Comment Wrapper -->
                            <div class="comment-wrapper">

                                <!-- Comment Open Button -->
                                <button class="btn btn-primary comment-btn">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/comment-icon.png"
                                        class="img-fluid" alt="Comment Icon">
                                    <span class="comment-count"><?php echo get_comments_number(get_the_ID()); ?></span>
                                </button>

                                <!-- Comment Box -->
                                <div class="comment-box" style="display: none;">

                                    <div class="d-flex justify-content-end pb-3">
                                        <!-- Close button -->
                                        <button class="close-btn">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>

                                    <!-- Comment List -->
                                    <ul class="list-unstyled p-0">
                                        <?php
                                        $comments = get_comments(['post_id' => get_the_ID(), 'status' => 'approve']);
                                        if (!empty($comments)):
                                            foreach ($comments as $comment):
                                                $comment_user_id = $comment->user_id;
                                                $comment_user_photo_url = '';

                                                if ($comment_user_id) {
                                                    $photo_id = get_user_meta($comment_user_id, 'main_photo', true);
                                                    $comment_user_photo_url = wp_get_attachment_url($photo_id);
                                                }
                                                ?>
                                                <li class="comment-item comment-user-img">
                                                    <?php if ($comment_user_photo_url): ?>
                                                        <img src="<?php echo esc_url($comment_user_photo_url); ?>" style="max-width: 80px;"
                                                            alt="User Image" class="img-fluid" />
                                                    <?php else: ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png"
                                                            alt="User Image" class="img-fluid" />
                                                    <?php endif; ?>

                                                    <div class="comment-info">
                                                        <h5>
                                                            <?php
                                                            if ($comment->user_id) {
                                                                echo esc_html(get_the_author_meta('display_name', $comment->user_id));
                                                            } else {
                                                                echo esc_html($comment->comment_author);
                                                            }
                                                            ?>
                                                            <span class="comment-time">
                                                                <?php echo human_time_diff(strtotime($comment->comment_date), current_time('timestamp')) . ' ago'; ?>
                                                            </span>
                                                        </h5>
                                                        <p><?php echo esc_html($comment->comment_content); ?></p>
                                                    </div>
                                                </li>
                                            <?php endforeach;
                                        else:
                                            echo '<li>No comments yet.</li>';
                                        endif;
                                        ?>
                                    </ul>


                                    <!-- Comment Input  -->
                                    <form method="post" class="prayer-comment-form">
                                        <div class="comment-input input-group comment-user-img">
                                            <?php if ($current_user_photo_url): ?>
                                                <img src="<?php echo esc_url($current_user_photo_url); ?>" style="max-width: 80px;"
                                                    alt="User Image" class="img-fluid" />
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png"
                                                    alt="User Image" class="img-fluid">
                                            <?php endif; ?>

                                            <textarea class="form-control form-control-comment ms-2" name="comment" placeholder="Write a comment" minlength="5" maxlength="100"></textarea>
                                            <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>">
                                            <input type="hidden" name="action" value="submit_prayer_comment">
                                            <input type="hidden" name="nonce"
                                                value="<?php echo wp_create_nonce('submit_prayer_comment'); ?>">
                                        </div>
                                        <button type="submit" id="comment-submit" class="btn btn-sm btn-success mt-2">Post Comment</button>
                                    </form>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Just the icon when comments are closed -->
                            <div class="comment-wrapper" id="no-comment">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/forbidden-chat.png"
                                    class="img-fluid" alt="Comments Closed Icon">
                            </div>
                        <?php endif; ?>

                        <!-- Share Prayer Wrapper -->
                        <div class="social-share-wrapper">

                            <!-- Share-Box Button -->
                            <button class="btn share-btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prayer-upload-icon.png"
                                    class="img-fluid" alt="Share">
                            </button>

                            <!-- Share Box -->
                            <div class="social-share-box">

                                <ul class="list-unstyled p-0 m-0">

                                    <!-- Share Icon-Btns -->
                                    <li><button class="share-icon"> <img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/facebookp-icon.png"
                                                alt="facebook icon"> </button></li>

                                    <li><button class="share-icon"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/instagramp-icon.png"
                                                alt="instagram icon"></button></li>

                                    <li><button class="share-icon"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/twitterp-icon.png"
                                                alt="twitter icon"></button></li>

                                    <li><button class="share-icon"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin-logo.png"
                                                alt="linkedin logo"></button></li>

                                    <!-- Close Btn -->
                                    <li><button class="close-btn"><i class="fa fa-close"></i></button></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <!-- Praying Button Group -->

                    <div class="praying-btn-group">
                        <!-- I Will Pray Form -->
                        <form method="post" class="prayer-action-form">
                            <input type="hidden" name="action_type" value="pray">
                            <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
                            <input type="hidden" name="action" value="submit_prayer_action">
                            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('submit_prayer_action'); ?>">

                            <button type="submit" class="btn btn-primary pray-btn" style="width:100%">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prayer-hand-icon.png"
                                    class="img-fluid" alt="Prayer Icon">
                                <?php echo $has_prayed ? 'Prayed' : 'I will Pray'; ?>
                            </button>
                        </form>

                        <!-- Group Pray Form -->
                        <?php if (has_term('Group Prayer', 'prayer_category', get_the_ID())): ?>
                            <form method="post" class="prayer-action-form">
                                <input type="hidden" name="action_type" value="group_pray">
                                <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
                                <input type="hidden" name="action" value="submit_prayer_action">
                                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('submit_prayer_action'); ?>">

                                <button type="submit" class="btn btn-primary group-pray-btn" style="width:100%">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prayer-hand-icon.png"
                                        class="img-fluid" alt="Prayer Icon">
                                    <?php echo $has_group_prayed ? 'Group Prayed' : 'Group Praying'; ?>
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>


                    <!-- Prayer Counter -->
                    <div class="prayer-count-wrap">

                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prayer-count-icon.png" class="img-fluid"
                            alt="Praying">

                        <?php
                        $prayer_count = get_post_meta(get_the_ID(), 'prayer_count', true);
                        $group_prayer_count = get_post_meta(get_the_ID(), 'group_prayer_count', true);

                        // Ensure they're numeric and fallback to 0 if empty
                        $prayer_count = $prayer_count ? intval($prayer_count) : 0;
                        $group_prayer_count = $group_prayer_count ? intval($group_prayer_count) : 0;

                        // Combine both
                        $total_prayer_count = $prayer_count + $group_prayer_count;
                        ?>

                        <div class="prayer-counter">
                            <span class="fw-bold"><?php echo number_format($total_prayer_count); ?></span> Praying
                        </div>



                    </div>

                </div>
            </div>
            <?php

        endwhile;
        wp_reset_postdata();
    else:
        get_template_part('templates/sections/prayer-wall-empty');
    endif;

    wp_die();
}


/************************************************
    submt prayer comment and show comment
**************************************************/

add_action('wp_ajax_submit_prayer_comment', 'submit_prayer_comment');
add_action('wp_ajax_nopriv_submit_prayer_comment', 'submit_prayer_comment');

function submit_prayer_comment()
{
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'submit_prayer_comment')) {
        wp_send_json_error(['message' => 'Security check failed!']);
    }

    $post_id = intval($_POST['comment_post_ID']);
    $content = sanitize_textarea_field($_POST['comment']);

    if (empty($content)) {
        wp_send_json_error(['message' => 'Comment cannot be empty.']);
    }

    $comment_data = array(
        'comment_post_ID' => $post_id,
        'comment_content' => $content,
        'user_id' => get_current_user_id(),
        'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
        'comment_agent' => $_SERVER['HTTP_USER_AGENT'],
        'comment_approved' => 1,
    );

    $comment_id = wp_insert_comment($comment_data);

    if ($comment_id) {
        wp_send_json_success(['message' => 'Comment added successfully.']);
    } else {
        wp_send_json_error(['message' => 'Failed to post comment.']);
    }
}





/************************************************
    submt prayer_count and show total prayer_count
**************************************************/

// add_action('wp_ajax_submit_prayer_action', 'handle_prayer_action');
// add_action('wp_ajax_nopriv_submit_prayer_action', 'handle_prayer_action');

// function handle_prayer_action()
// {
//     if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'submit_prayer_action')) {
//         wp_send_json_error(['message' => 'Security check failed!']);
//     }

//     $post_id = intval($_POST['post_id']);
//     $type = sanitize_text_field($_POST['action_type']);

//     if (!$post_id || !in_array($type, ['pray', 'group_pray'])) {
//         wp_send_json_error(['message' => 'Invalid request.']);
//     }

//     $meta_key = $type === 'pray' ? 'prayer_count' : 'group_prayer_count';
//     $current = (int) get_post_meta($post_id, $meta_key, true);
//     $new = $current + 1;

//     update_post_meta($post_id, $meta_key, $new);

//     wp_send_json_success(['message' => 'Thank you for your prayer!', 'new_count' => $new]);
// }

add_action('wp_ajax_submit_prayer_action', 'handle_prayer_action');
add_action('wp_ajax_nopriv_submit_prayer_action', 'handle_prayer_action');
function handle_prayer_action()
{
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'submit_prayer_action')) {
        wp_send_json_error(['message' => 'Security check failed!']);
    }

    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'You must be logged in to pray.']);
    }

    $user_id = get_current_user_id();
    $post_id = intval($_POST['post_id']);
    $type = sanitize_text_field($_POST['action_type']);

    if (!$post_id || !in_array($type, ['pray', 'group_pray'])) {
        wp_send_json_error(['message' => 'Invalid request.']);
    }

    $meta_key_count = $type === 'pray' ? 'prayer_count' : 'group_prayer_count';
    $meta_key_users = $type === 'pray' ? 'prayed_user_ids' : 'group_prayed_user_ids';

    $prayed_users = get_post_meta($post_id, $meta_key_users, true);
    if (!is_array($prayed_users)) {
        $prayed_users = [];
    }
    if (in_array($user_id, $prayed_users)) {
        wp_send_json_error(['message' => 'You have already prayed for this request.']);
    }
    $prayed_users[] = $user_id;
    update_post_meta($post_id, $meta_key_users, $prayed_users);
    $current_count = (int) get_post_meta($post_id, $meta_key_count, true);
    $new_count = $current_count + 1;
    update_post_meta($post_id, $meta_key_count, $new_count);

    wp_send_json_success(['message' => 'Thank you for your prayer!', 'new_count' => $new_count]);
}
