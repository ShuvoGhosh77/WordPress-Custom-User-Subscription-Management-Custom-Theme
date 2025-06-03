<?php

/***************************************
          Upload Your Photos step-1
****************************************/

// add_action('template_redirect', 'handle_user_media_upload_post');
// function handle_user_media_upload_post()
// {
//     if (
//         isset($_POST['user_media_upload']) &&
//         is_user_logged_in() &&
//         !empty($_FILES['main_photo']['name']) &&
//         !empty($_FILES['short_video']['name'])
//     ) {
//         require_once ABSPATH . 'wp-admin/includes/file.php';
//         require_once ABSPATH . 'wp-admin/includes/media.php';
//         require_once ABSPATH . 'wp-admin/includes/image.php';

//         $user_id = get_current_user_id();

//         // Handle main photo upload
//         $photo_id = media_handle_upload('main_photo', 0);
//         if (!is_wp_error($photo_id)) {
//             update_user_meta($user_id, 'main_photo', $photo_id);
//         }

//         // Handle short video upload
//         $video_id = media_handle_upload('short_video', 0);
//         if (!is_wp_error($video_id)) {
//             update_user_meta($user_id, 'short_video', $video_id);
//         }

//         // Redirect to home after successful upload
//         wp_redirect(home_url('/divine-meet-step-2'));
//         exit;
//     }
// }


add_action('template_redirect', 'handle_user_media_upload_post');
function handle_user_media_upload_post()
{
    if (
        isset($_POST['user_media_upload']) &&
        is_user_logged_in() &&
        !empty($_FILES['main_photo']['name']) &&
        !empty($_FILES['short_video']['name'])
    ) {
        $max_size = 10 * 1024 * 1024; // 10MB in bytes

        $main_photo = $_FILES['main_photo'];
        $short_video = $_FILES['short_video'];

        // Validate file sizes
        if ($main_photo['size'] > $max_size || $short_video['size'] > $max_size) {
            wp_die('Each file must be less than 10MB. Please go back and upload smaller files.');
        }

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

        // Redirect to next step
        wp_redirect(home_url('/divine-meet-step-2'));
        exit;
    }
}




/***************************************
          Upload User details step-2
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
    update_user_meta($user_id, 'myage', sanitize_text_field($_POST['myage']));
    update_user_meta($user_id, 'mybodyType', sanitize_text_field($_POST['mybodyType']));
    update_user_meta($user_id, 'myskinComplextion', sanitize_text_field($_POST['myskinComplextion']));
    update_user_meta($user_id, 'marital_status', sanitize_text_field($_POST['maritalStatus']));
    update_user_meta($user_id, 'relationship_type', sanitize_text_field($_POST['relationshipType']));
    update_user_meta($user_id, 'drinking_habit', sanitize_text_field($_POST['drinkingHabit']));
    update_user_meta($user_id, 'smoking_habit', sanitize_text_field($_POST['smokingHabit']));

    // Redirect
    wp_redirect(home_url('/divine-meet-step-3'));
    exit;
}

/***************************************
          Upload User details step-3
****************************************/

add_action('admin_post_save_user_summary_data', 'save_user_summary_data');
add_action('admin_post_nopriv_save_user_summary_data', 'save_user_summary_data');

function save_user_summary_data()
{
    if (!is_user_logged_in()) {
        wp_redirect(home_url());
        exit;
    }

    $user_id = get_current_user_id();

    if (isset($_POST['user_summary'])) {
        $summary = sanitize_textarea_field($_POST['user_summary']);
        update_user_meta($user_id, 'user_summary', $summary);
    }

    wp_redirect(home_url('/divine-meet-step-4'));
    exit;
}

/***************************************
          Upload User details step-4
****************************************/
add_action('admin_post_save_user_interests_data', 'save_user_interests_data');

function save_user_interests_data()
{
    if (!is_user_logged_in()) {
        wp_redirect(home_url());
        exit;
    }

    if (
        !isset($_POST['save_user_interests_data_nonce_field']) ||
        !wp_verify_nonce($_POST['save_user_interests_data_nonce_field'], 'save_user_interests_data_nonce')
    ) {
        wp_die('Security check failed');
    }

    $user_id = get_current_user_id();

    // Save Sport and Fitness Interests
    if (isset($_POST['sports_interests']) && is_array($_POST['sports_interests'])) {
        $sports = array_map('sanitize_text_field', $_POST['sports_interests']);
        update_user_meta($user_id, 'user_sports_interests', $sports);
    } else {
        delete_user_meta($user_id, 'user_sports_interests');
    }

    // Save Activities Interests
    if (isset($_POST['activity_interests']) && is_array($_POST['activity_interests'])) {
        $activities = array_map('sanitize_text_field', $_POST['activity_interests']);
        update_user_meta($user_id, 'user_activity_interests', $activities);
    } else {
        delete_user_meta($user_id, 'user_activity_interests');
    }

    wp_redirect(home_url('/divine-meet-step-5'));
    exit;
}

/***************************************
          Upload User details step-5
****************************************/
add_action('admin_post_nopriv_save_user_preferences', 'save_user_preferences');
add_action('admin_post_save_user_preferences', 'save_user_preferences');

function save_user_preferences()
{
    if (
        !isset($_POST['save_user_preferences_nonce_field']) ||
        !wp_verify_nonce($_POST['save_user_preferences_nonce_field'], 'save_user_preferences_nonce')
    ) {
        wp_die('Nonce verification failed');
    }

    if (!is_user_logged_in()) {
        wp_die('You must be logged in to save preferences.');
    }

    $user_id = get_current_user_id();

    // Sanitize and save each field
    $seeking_for = isset($_POST['seekingFor']) ? sanitize_text_field($_POST['seekingFor']) : '';
    $preferencesHeight = isset($_POST['preferencesHeight']) ? sanitize_text_field($_POST['preferencesHeight']) : '';
    $age = isset($_POST['age']) ? sanitize_text_field($_POST['age']) : '';
    $body_type = isset($_POST['bodyType']) ? sanitize_text_field($_POST['bodyType']) : '';
    $skin_complexion = isset($_POST['skinComplextion']) ? sanitize_text_field($_POST['skinComplextion']) : '';

    update_user_meta($user_id, 'seeking_for', $seeking_for);
    update_user_meta($user_id, 'preferencesHeight', $preferencesHeight);
    update_user_meta($user_id, 'preferred_age_range', $age);
    update_user_meta($user_id, 'body_type', $body_type);
    update_user_meta($user_id, 'skin_complexion', $skin_complexion);

    // Redirect to next step
    wp_redirect(home_url());
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

    $first_name = get_user_meta($user->ID, 'first_name', true);
    $last_name = get_user_meta($user->ID, 'last_name', true);
    $gender = get_user_meta($user->ID, 'gender', true);
    $birthday = get_user_meta($user->ID, 'birthday', true);
    $mobile = get_user_meta($user->ID, 'mobile', true);
    $whatsapp = get_user_meta($user->ID, 'whatsapp', true);
    $facetime = get_user_meta($user->ID, 'facetime', true);
    $country = get_user_meta($user->ID, 'country', true);
    $state = get_user_meta($user->ID, 'state', true);
    $city = get_user_meta($user->ID, 'city', true);

    $photo_id = get_user_meta($user->ID, 'main_photo', true);
    $photo_url = wp_get_attachment_url($photo_id);

    $video_id = get_user_meta($user->ID, 'short_video', true);
    $video_url = wp_get_attachment_url($video_id);

    $height = get_user_meta($user->ID, 'height', true);
    $myage = get_user_meta($user->ID, 'myage', true);
    $mybodyType= get_user_meta($user->ID, 'mybodyType', true);
    $myskinComplextion= get_user_meta($user->ID, 'myskinComplextion', true);
    $marital_status = get_user_meta($user->ID, 'marital_status', true);
    $relationship_type = get_user_meta($user->ID, 'relationship_type', true);
    $drinking_habit = get_user_meta($user->ID, 'drinking_habit', true);
    $smoking_habit = get_user_meta($user->ID, 'smoking_habit', true);
    $current_summary = get_user_meta($user->ID, 'user_summary', true);
    $sports = get_user_meta($user->ID, 'user_sports_interests', true);
    $activities = get_user_meta($user->ID, 'user_activity_interests', true);

    $seeking = get_user_meta($user->ID, 'seeking_for', true);
    $preferencesHeight = get_user_meta($user->ID, 'preferencesHeight', true);
    $age_range = get_user_meta($user->ID, 'preferred_age_range', true);
    $body_type = get_user_meta($user->ID, 'body_type', true);
    $skin_complexion = get_user_meta($user->ID, 'skin_complexion', true);


    ?>
    <h2>User Uploaded Media</h2>
    <table class="form-table profile-table" style="border: 1px solid #0000;">
        <?php if ($first_name): ?>
            <tr>
                <th><label>First Name</label></th>
                <td><?php echo esc_html($first_name); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($last_name): ?>
            <tr>
                <th><label>Last Name</label></th>
                <td><?php echo esc_html($last_name); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($gender): ?>
            <tr>
                <th><label>Gender</label></th>
                <td><?php echo esc_html($gender); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($birthday): ?>
            <tr>
                <th><label>Birthday</label></th>
                <td><?php echo esc_html($birthday); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($mobile): ?>
            <tr>
                <th><label>Mobile</label></th>
                <td><?php echo esc_html($mobile); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($whatsapp): ?>
            <tr>
                <th><label>WhatsApp</label></th>
                <td><?php echo esc_html($whatsapp); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($facetime): ?>
            <tr>
                <th><label>Facetime ID/Number</label></th>
                <td><?php echo esc_html($facetime); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($country): ?>
            <tr>
                <th><label>Country</label></th>
                <td><?php echo esc_html($country); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($state): ?>
            <tr>
                <th><label>State</label></th>
                <td><?php echo esc_html($state); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($city): ?>
            <tr>
                <th><label>City</label></th>
                <td><?php echo esc_html($city); ?></td>
            </tr>
        <?php endif; ?>
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
        <?php if ($myage): ?>
            <tr>
                <th><label>my age</label></th>
                <td><?php echo esc_html($myage); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($mybodyType): ?>
            <tr>
                <th><label>My body Type</label></th>
                <td><?php echo esc_html($mybodyType); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($myskinComplextion): ?>
            <tr>
                <th><label>My Skin Complextion</label></th>
                <td><?php echo esc_html($myskinComplextion); ?></td>
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
        <?php if ($current_summary): ?>
            <tr>
                <th><label>summary about myself</label></th>
                <td><?php echo esc_html($current_summary); ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($sports) && is_array($sports)): ?>
            <tr>
                <th><label>Interests Sports</label></th>
                <td><?php echo esc_html(implode(', ', $sports)); ?></td>
            </tr>
        <?php endif; ?>

        <?php if (!empty($activities) && is_array($activities)): ?>
            <tr>
                <th><label>Interests Activities</label></th>
                <td><?php echo esc_html(implode(', ', $activities)); ?></td>
            </tr>
        <?php endif; ?>

        <?php if ($seeking): ?>
            <tr>
                <th><label>Seeking</label></th>
                <td><?php echo esc_html($seeking); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($preferencesHeight): ?>
            <tr>
                <th><label>Preferences Height</label></th>
                <td><?php echo esc_html($preferencesHeight); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($age_range): ?>
            <tr>
                <th><label>Preferred Age Range</label></th>
                <td><?php echo esc_html($age_range); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($current_summary): ?>
            <tr>
                <th><label>Body Type</label></th>
                <td><?php echo esc_html($body_type); ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($skin_complexion): ?>
            <tr>
                <th><label>Skin Complexion</label></th>
                <td><?php echo esc_html($skin_complexion); ?></td>
            </tr>
        <?php endif; ?>

    </table>
    <?php
}


/************************************************
     protected some pages
**************************************************/
function restrict_custom_pages_to_logged_in_users()
{
    $protected_pages = array('support', 'account-setting');

    if (is_page($protected_pages) && !is_user_logged_in()) {
        wp_redirect(home_url('/login'));
        exit;
    }
}
add_action('template_redirect', 'restrict_custom_pages_to_logged_in_users');



/************************************************
    divine meet form submition
**************************************************/

add_action('init', 'handle_divinemeet_form_submission');

function handle_divinemeet_form_submission()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dm-form-submitted'])) {
        // Ensure user is logged in
        if (is_user_logged_in()) {
            $user_id = get_current_user_id();

            // Sanitize inputs
            $first_name = sanitize_text_field($_POST['first_name'] ?? '');
            $last_name = sanitize_text_field($_POST['last_name'] ?? '');
            $gender = sanitize_text_field($_POST['gender'] ?? '');
            $day = sanitize_text_field($_POST['day'] ?? '');
            $month = sanitize_text_field($_POST['month'] ?? '');
            $year = sanitize_text_field($_POST['year'] ?? '');
            $birthday = "$day/$month/$year";
            $mobile = sanitize_text_field($_POST['mobile'] ?? '');
            $whatsapp = sanitize_text_field($_POST['whatsapp'] ?? '');
            $facetime = sanitize_text_field($_POST['facetime'] ?? '');
            $country = sanitize_text_field($_POST['country'] ?? '');
            $state = sanitize_text_field($_POST['state'] ?? '');
            $city = sanitize_text_field($_POST['city'] ?? '');

            // Save as user meta
            update_user_meta($user_id, 'first_name', $first_name);
            update_user_meta($user_id, 'last_name', $last_name);
            update_user_meta($user_id, 'gender', $gender);
            update_user_meta($user_id, 'gender', $gender);
            update_user_meta($user_id, 'birthday', $birthday);
            update_user_meta($user_id, 'mobile', $mobile);
            update_user_meta($user_id, 'whatsapp', $whatsapp);
            update_user_meta($user_id, 'facetime', $facetime);
            update_user_meta($user_id, 'country', $country);
            update_user_meta($user_id, 'state', $state);
            update_user_meta($user_id, 'city', $city);

            wp_redirect(home_url('/divine-meet-step-1'));
            exit;
        } else {
            wp_redirect(wp_login_url());
            exit;
        }
    }

}
