<?php

/***************************************
          Upload Your Photos step-1
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
    $age = isset($_POST['age']) ? sanitize_text_field($_POST['age']) : '';
    $body_type = isset($_POST['bodyType']) ? sanitize_text_field($_POST['bodyType']) : '';
    $skin_complexion = isset($_POST['skinComplextion']) ? sanitize_text_field($_POST['skinComplextion']) : '';

    update_user_meta($user_id, 'seeking_for', $seeking_for);
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

    $photo_id = get_user_meta($user->ID, 'main_photo', true);
    $photo_url = wp_get_attachment_url($photo_id);

    $video_id = get_user_meta($user->ID, 'short_video', true);
    $video_url = wp_get_attachment_url($video_id);

    $height = get_user_meta($user->ID, 'height', true);
    $marital_status = get_user_meta($user->ID, 'marital_status', true);
    $relationship_type = get_user_meta($user->ID, 'relationship_type', true);
    $drinking_habit = get_user_meta($user->ID, 'drinking_habit', true);
    $smoking_habit = get_user_meta($user->ID, 'smoking_habit', true);
    $current_summary = get_user_meta($user->ID, 'user_summary', true);
    $sports = get_user_meta($user->ID, 'user_sports_interests', true);
    $activities = get_user_meta($user->ID, 'user_activity_interests', true);

    $seeking = get_user_meta($user->ID, 'seeking_for', true);
    $age_range = get_user_meta($user->ID, 'preferred_age_range', true);
    $body_type = get_user_meta($user->ID, 'body_type', true);
    $skin_complexion = get_user_meta($user->ID, 'skin_complexion', true);


    ?>
    <h2>User Uploaded Media</h2>
    <table class="form-table profile-table">
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



/****************************************************
      Add  Question part  for general-screening page
*******************************************************/

add_action('init', 'handle_custom_screening_form');
function handle_custom_screening_form()
{
    if (isset($_POST['custom_screening_form_submitted'])) {

        // Get admin email
        $admin_email = get_option('admin_email');

        // Sanitize inputs
        $first_name = sanitize_text_field($_POST['first-name'] ?? '');
        $last_name = sanitize_text_field($_POST['last-name'] ?? '');
        $dob = sanitize_text_field($_POST['date-of-birth'] ?? '');
        $relationship = sanitize_text_field($_POST['relationship'] ?? '');
        $gender = sanitize_text_field($_POST['gender'] ?? '');
        $state_origin = sanitize_text_field($_POST['state-origin'] ?? '');
        $maternal_origin = sanitize_text_field($_POST['maternal-origin'] ?? '');
        $paternal_origin = sanitize_text_field($_POST['paternal-origin'] ?? '');
        $questions = $_POST['questions'] ?? []; // If you're sending them as an array

        // Build email body
        $message = '<html><body>';
        $message .= '<h2>New Screening Form Submission</h2>';
        $message .= '<table style="border-collapse: collapse; width: 100%;">';

        $rows = [
            'First Name' => $first_name,
            'Last Name' => $last_name,
            'Date of Birth' => $dob,
            'Relationship' => $relationship,
            'Gender' => $gender,
            'State of Origin and LGA' => $state_origin,
            'Maternal State of Origin' => $maternal_origin,
            'Paternal State of Origin' => $paternal_origin,
        ];

        foreach ($rows as $label => $value) {
            $message .= '<tr>';
            $message .= '<td style="border: 1px solid #000; padding: 8px;"><strong>' . esc_html($label) . ':</strong></td>';
            $message .= '<td style="border: 1px solid #000; padding: 8px;">' . esc_html($value) . '</td>';
            $message .= '</tr>';
        }

        if (!empty($questions)) {
            $message .= '<tr>';
            $message .= '<td style="border: 1px solid #000; padding: 8px;"><strong>Questions:</strong></td>';
            $message .= '<td style="border: 1px solid #000; padding: 8px;"><ul style="margin:0; padding-left: 20px;">';
            foreach ($questions as $index => $question) {
                $message .= '<li>Q' . ($index + 1) . ': ' . esc_html($question) . '</li>';
            }
            $message .= '</ul></td></tr>';
        }

        $message .= '</table>';
        $message .= '</body></html>';



        // Handle file uploads (if any)
        $attachments = [];
        if (!empty($_FILES['photos']['name'][0])) {
            foreach ($_FILES['photos']['name'] as $key => $name) {
                if ($_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES['photos']['tmp_name'][$key];
                    $file_name = $_FILES['photos']['name'][$key];

                    // Upload using wp_upload_bits
                    $upload = wp_upload_bits($file_name, null, file_get_contents($tmp_name));
                    if (!$upload['error']) {
                        $attachments[] = $upload['file']; // Add file to email attachments
                    }
                }
            }
        }


        // Send email
        $subject = "New General Screening Form Submission";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        wp_mail($admin_email, $subject, $message, $headers, $attachments);

        // Optional: redirect after submission
        wp_redirect(home_url('//plan-selection')); // Replace with your thank you page
        exit;
    }
}
