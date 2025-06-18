<?php
function register_prayer_room_cpt()
{
    $labels = array(
        'name' => 'Prayer Rooms',
        'singular_name' => 'Prayer Room',
        'menu_name' => 'Prayer Rooms',
        'name_admin_bar' => 'Prayer Room',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Prayer Room',
        'new_item' => 'New Prayer Room',
        'edit_item' => 'Edit Prayer Room',
        'view_item' => 'View Prayer Room',
        'all_items' => 'All Prayer Rooms',
        'search_items' => 'Search Prayer Rooms',
        'not_found' => 'No Prayer Rooms found',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'prayer-room'),
        'capability_type' => 'post',
    );

    register_post_type('prayer_room', $args);
    $taxonomy_labels = array(
        'name' => 'Prayer Room Categories',
        'singular_name' => 'Prayer Room Category',
        'search_items' => 'Search Prayer Room Categories',
        'all_items' => 'All Prayer Room Categories',
        'edit_item' => 'Edit Prayer Room Category',
        'update_item' => 'Update Prayer Room Category',
        'add_new_item' => 'Add New Prayer Category',
        'new_item_name' => 'New Prayer Room Category Name',
        'menu_name' => 'Prayer Room Categories',
    );

    $taxonomy_args = array(
        'hierarchical' => true,
        'labels' => $taxonomy_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'prayer-room-category'),
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



/*
function prayer_room_shortcode() {
    ob_start();
    ?>
    <div class="tabs-wrapper--panel prayer-room-panel">
        <div class="panel-controls">
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="search-bar input-group">
                        <span class="input-group-text bg-white" id="searchbar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" id="prayerRoomSearch" class="form-control" placeholder="Search" aria-describedby="searchbar">
                    </div>
                </div>
            </div>
        </div>

        <div class="prayerroom-cards-wrapper">
            <div class="row g-4" id="prayerRoomList">
                <?php
                $args = array(
                    'post_type' => 'prayer_room',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $file_url = get_post_meta(get_the_ID(), 'file', true);
                        $doc_count = get_post_meta(get_the_ID(), 'document_count', true);
                        ?>
                        <div class="col-lg-4 prayer-room-item">
                            <div class="upload-period">Today</div>
                            <div class="prayer-room-cards">
                                <h3><?php the_title(); ?></h3>
                                <div><?php the_excerpt(); ?></div>
                                <div class="card-bottom">
                                    <a href="<?php echo esc_url($file_url); ?>" class="btn download-btn" download>Download File</a>
                                    <div class="document-count"><?php echo esc_html($doc_count ?: 1); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<div class="col-12"><p>No prayer rooms found.</p></div>';
                endif;
                ?>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('prayerRoomSearch');
        const items = document.querySelectorAll('.prayer-room-item');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.trim().toLowerCase();
            if (searchTerm.length < 3) {
                items.forEach(item => item.style.display = '');
                return;
            }

            items.forEach(item => {
                const title = item.querySelector('h3').textContent.toLowerCase();
                const content = item.querySelector('p').textContent.toLowerCase();
                const match = title.includes(searchTerm) || content.includes(searchTerm);
                item.style.display = match ? '' : 'none';
            });
        });
    });
    </script>

    <style>
    .prayer-room-item { transition: all 0.3s ease-in-out; }
    </style>

    <?php
    return ob_get_clean();
}
add_shortcode('prayer_room', 'prayer_room_shortcode');
*/


function prayer_room_shortcode()
{
    ob_start();
    ?>
    <!-- Tab Panel * PrayerRoom -->
    <div class="tabs-wrapper--panel prayer-room-panel">
        <!-- Panel Controls -->
        <div class="panel-controls">
            <div class="row justify-content-between">
                <div class="col-12">
                    <!-- Search Bar -->
                    <div class="search-bar input-group">
                        <span class="input-group-text bg-white" id="searchbar">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="">
                        </span>
                        <input type="text" id="prayerRoomSearch" class="form-control" placeholder="Search"
                            aria-describedby="searchbar">
                    </div>
                </div>
            </div>
        </div>

        <!-- PrayerRoom Card Wrapper -->
        <div class="prayerroom-cards-wrapper">
            <div class="row g-4" id="prayerRoomList">
                <?php
                $args = array(
                    'post_type' => 'prayer_room',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                );
                $query = new WP_Query($args);
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        $file_url = get_post_meta(get_the_ID(), 'file', true);
                        $doc_count = (int) get_post_meta(get_the_ID(), 'document_count', true);
                        ?>
                        <div class="col-lg-4 prayer-room-item prayer-room-item2">
                            <!-- Upload Period -->
                            <?php
                            $post_date = get_the_date('Y-m-d');
                            $today = date('Y-m-d');
                            $yesterday = date('Y-m-d', strtotime('-1 day'));

                            if ($post_date === $today) {
                                $upload_period = 'Today';
                            } elseif ($post_date === $yesterday) {
                                $upload_period = 'Yesterday';
                            } else {
                                $upload_period = 'Earlier';
                            }
                            ?>
                            <div class="upload-period"><?php echo $upload_period; ?></div>

                            <!-- Prayer Room Card -->
                            <div class="prayer-room-cards">
                                <h3><?php the_title(); ?></h3>
                                <div><?php the_excerpt(); ?></div>
                                <div class="card-bottom">
                                    <a href="<?php echo esc_url(admin_url('admin-post.php?action=generate_prayer_pdf&post_id=' . get_the_ID())); ?>"
                                        class="btn download-btn download-with-count" data-post-id="<?php echo get_the_ID(); ?>">
                                        Download File
                                    </a>


                                    <div class="document-count"><?php echo $doc_count > 0 ? esc_html($doc_count) : '0'; ?></div>


                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<div class="col-12"><p>No prayer rooms found.</p></div>';
                endif;
                ?>
            </div>

            <!-- No Results Message -->
            <div id="noPrayerRoomsMessage" style="display: none;" class="col-12">
                <p class="text-center text-danger fw-bold">No prayer rooms found.</p>
            </div>
        </div>
    </div>



    <style>
        .prayer-room-item {
            transition: all 0.3s ease-in-out;
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('prayer_room', 'prayer_room_shortcode');



add_action('admin_post_generate_prayer_pdf', 'generate_prayer_pdf_callback');
add_action('admin_post_nopriv_generate_prayer_pdf', 'generate_prayer_pdf_callback');

function generate_prayer_pdf_callback()
{
    if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
        wp_die('Invalid request');
    }

    $post_id = intval($_GET['post_id']);
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'prayer_room') {
        wp_die('Invalid post');
    }

    require_once get_template_directory() . '/tcpdf/tcpdf.php';

    // Generate PDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('dejavusans', '', 12);

    $title = get_the_title($post_id);
    $content = apply_filters('the_content', $post->post_content);

    $html = '<h1>' . esc_html($title) . '</h1>';
    $html .= $content;

    $pdf->writeHTML($html, true, false, true, false, '');

    $fileName = sanitize_title($title) . '.pdf';

    // // Track download count
    // $download_count = get_post_meta($post_id, 'document_count', true);
    // $download_count = $download_count ? intval($download_count) + 1 : 1;
    // update_post_meta($post_id, 'document_count', $download_count);

    // Output PDF
    $pdf->Output($fileName, 'D');
    exit;
}



add_action('wp_ajax_increment_download_count', 'increment_download_count');
add_action('wp_ajax_nopriv_increment_download_count', 'increment_download_count');

function increment_download_count()
{
    if (!isset($_POST['post_id']) || !is_numeric($_POST['post_id'])) {
        wp_send_json_error('Invalid request');
    }

    $post_id = intval($_POST['post_id']);

    $download_count = get_post_meta($post_id, 'document_count', true);
    $download_count = $download_count ? intval($download_count) + 1 : 1;
    update_post_meta($post_id, 'document_count', $download_count);

    wp_send_json_success(['new_count' => $download_count]);
}
