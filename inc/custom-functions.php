<?php 

/***************************************
          Upload Your Photos 
****************************************/

add_action('template_redirect', 'handle_user_media_upload_post');
function handle_user_media_upload_post() {
    if (
        isset($_POST['user_media_upload']) &&
        is_user_logged_in() &&
        !empty($_FILES['main_photo']['name']) &&
        !empty($_FILES['short_video']['name'])
    ) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $user_id = get_current_user_id();

        // Handle main photo upload
        $photo_id = media_handle_upload('main_photo', 0);
        if (!is_wp_error($photo_id)) {
            update_user_meta($user_id, 'main_photo', $photo_id);
        }

        // Handle short video upload
        $video_id = media_handle_upload('short_video', 0);
        if (!is_wp_error($video_id)) {
            update_user_meta($user_id, 'short_video', $video_id);
        }

        // Redirect to home after successful upload
        wp_redirect(home_url());
        exit;
    }
}




/************************************************
     Show fields in user profile (admin view)
**************************************************/
add_action('show_user_profile', 'show_user_uploaded_media_fields');
add_action('edit_user_profile', 'show_user_uploaded_media_fields');

function show_user_uploaded_media_fields($user) {
    // if (!current_user_can('edit_users')) return;

    $photo_id = get_user_meta($user->ID, 'main_photo', true);
    $photo_url = wp_get_attachment_url($photo_id);

    $video_id = get_user_meta($user->ID, 'short_video', true);
    $video_url = wp_get_attachment_url($video_id);
    ?>
    <h2>User Uploaded Media</h2>
    <table class="form-table">
        <?php if ($photo_url): ?>
        <tr>
            <th><label>Uploaded Photo</label></th>
            <td><img src="<?php echo esc_url($photo_url); ?>" style="max-width: 150px;" /></td>
        </tr>
        <?php endif; ?>

        <?php if ($video_url): ?>
        <tr>
            <th><label>Uploaded Video</label></th>
            <td>
                <video controls width="300">
                    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </td>
        </tr>
        <?php endif; ?>
    </table>
    <?php
}
