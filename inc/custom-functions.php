<?php

/***************************************
          Upload Your Photos 
****************************************/

add_action('template_redirect', 'handle_user_media_upload_post');
function handle_user_media_upload_post()
{
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
        wp_redirect(home_url('/divine-meet-step-2'));
        exit;
    }
}


/***************************************
          Upload User details
****************************************/

add_action('admin_post_save_custom_user_profile_data', 'save_custom_user_profile_data');
add_action('admin_post_nopriv_save_custom_user_profile_data', 'save_custom_user_profile_data');

function save_custom_user_profile_data()
{
    if (!is_user_logged_in()) {
        wp_redirect(home_url());
        exit;
    }

    if (!isset($_POST['save_user_data_nonce']) || !wp_verify_nonce($_POST['save_user_data_nonce'], 'save_user_data_nonce_action')) {
        wp_die('Nonce verification failed');
    }

    $user_id = get_current_user_id();

    // Sanitize and save data
    update_user_meta($user_id, 'height', sanitize_text_field($_POST['height']));
    update_user_meta($user_id, 'marital_status', sanitize_text_field($_POST['maritalStatus']));
    update_user_meta($user_id, 'relationship_type', sanitize_text_field($_POST['relationshipType']));
    update_user_meta($user_id, 'drinking_habit', sanitize_text_field($_POST['drinkingHabit']));
    update_user_meta($user_id, 'smoking_habit', sanitize_text_field($_POST['smokingHabit']));

    // Redirect
    wp_redirect(home_url('/divine-meet-step-1'));
    exit;
}



/************************************************
     Show fields in user profile (admin view)
**************************************************/
add_action('show_user_profile', 'show_user_uploaded_media_fields');
add_action('edit_user_profile', 'show_user_uploaded_media_fields');

function show_user_uploaded_media_fields($user)
{
    // if (!current_user_can('edit_users')) return;

    $photo_id = get_user_meta($user->ID, 'main_photo', true);
    $photo_url = wp_get_attachment_url($photo_id);

    $video_id = get_user_meta($user->ID, 'short_video', true);
    $video_url = wp_get_attachment_url($video_id);

    $height = get_user_meta($user->ID, 'height', true);
    $marital_status = get_user_meta($user->ID, 'marital_status', true);
    $relationship_type = get_user_meta($user->ID, 'relationship_type', true);
    $drinking_habit = get_user_meta($user->ID, 'drinking_habit', true);
    $smoking_habit = get_user_meta($user->ID, 'smoking_habit', true);


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
        <?php if ($height): ?>
            <tr>
                <th><label>Height</label></th>
                <td><?php echo esc_html($height); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($marital_status): ?>
            <tr>
                <th><label>Marital Status</label></th>
                <td><?php echo esc_html($marital_status); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($relationship_type): ?>
            <tr>
                <th><label>Relationship Type</label></th>
                <td><?php echo esc_html($relationship_type); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($drinking_habit): ?>
            <tr>
                <th><label>Drinking Habit</label></th>
                <td><?php echo esc_html($drinking_habit); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($smoking_habit): ?>
            <tr>
                <th><label>Smoking Habit</label></th>
                <td><?php echo esc_html($smoking_habit); ?></td>
            </tr>
        <?php endif; ?>
    </table>
    <?php
}
