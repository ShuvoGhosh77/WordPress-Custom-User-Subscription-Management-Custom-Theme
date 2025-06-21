<?php


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
        $churchName = sanitize_text_field($_POST['churchName'] ?? '');
        $typeOfPrayer = sanitize_text_field($_POST['typeOfPrayer'] ?? '');
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
            'Gender' => $gender,
            'State of Origin and LGA' => $state_origin,
        ];

        // Conditionally add optional fields
        if (!empty($relationship)) {
            $rows['Relationship'] = $relationship;
        }

        if (!empty($churchName)) {
            $rows['Church Name'] = $churchName;
        }
        if (!empty($typeOfPrayer)) {
            $rows['Type Of Prayer'] = $typeOfPrayer;
        }

        if (!empty($maternal_origin)) {
            $rows['Maternal State of Origin'] = $maternal_origin;
        }
        if (!empty($paternal_origin)) {
            $rows['Paternal State of Origin'] = $paternal_origin;
        }
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
        $subject = "New Screening Form Submission";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        wp_mail($admin_email, $subject, $message, $headers, $attachments);

        // Optional: redirect after submission
        wp_redirect(home_url('/plan-selection')); // Replace with your thank you page
        exit;
    }
}


// home screening 

add_action('init', 'handle_custom_screening_form2');
function handle_custom_screening_form2()
{
    if (isset($_POST['custom_screening_form_submitted2'])) {

        // Get admin email
        $admin_email = get_option('admin_email');

        // Sanitize inputs
        $home_first_name = sanitize_text_field($_POST['home-first-name'] ?? '');
        $home_last_name = sanitize_text_field($_POST['home-last-name'] ?? '');
        $home_dob = sanitize_text_field($_POST['home-date-of-birth'] ?? '');
        $home_Ownership = sanitize_text_field($_POST['home-Ownership'] ?? '');
        $home_gender = sanitize_text_field($_POST['home-gender'] ?? '');
        $home_state_origin = sanitize_text_field($_POST['home-state-origin'] ?? '');
        $home_maternal_origin = sanitize_text_field($_POST['home-maternal-origin'] ?? '');
        $home_paternal_origin = sanitize_text_field($_POST['home-paternal-origin'] ?? '');
        $house_address = sanitize_text_field($_POST['house-address'] ?? '');
        $city = sanitize_text_field($_POST['city'] ?? '');
        $landmark = sanitize_text_field($_POST['landmark'] ?? '');
        $State = sanitize_text_field($_POST['State'] ?? '');
        $LGA_address = sanitize_text_field($_POST['LGA'] ?? '');
        $questions = $_POST['questions'] ?? [];

        // Build email body
        $message = '<html><body>';
        $message .= '<h2>New Screening Form Submission</h2>';
        $message .= '<table style="border-collapse: collapse; width: 100%;">';

        $rows = [
            'First Name' => $home_first_name,
            'Last Name' => $home_last_name,
            'Date of Birth' => $home_dob,
            'Ownership' => $home_Ownership,
            'Gender' => $home_gender,
            'State of Origin and LGA' => $home_state_origin,
            'Maternal State of Origin' => $home_maternal_origin,
            'Paternal State of Origin' => $home_paternal_origin,
            'House Address'=> $house_address,
            'City'=> $city,
            'Landmark'=> $landmark,
            'State'=> $State,
            'LGA Address'=> $LGA_address,
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
        $attachments1 = [];
        if (!empty($_FILES['home-photos1']['name'][0])) {
            foreach ($_FILES['home-photos1']['name'] as $key => $name) {
                if ($_FILES['home-photos1']['error'][$key] === UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES['home-photos1']['tmp_name'][$key];
                    $file_name = $_FILES['home-photos1']['name'][$key];

                    // Upload using wp_upload_bits
                    $upload = wp_upload_bits($file_name, null, file_get_contents($tmp_name));
                    if (!$upload['error']) {
                        $attachments1[] = $upload['file']; // Add file to email attachments
                    }
                }
            }
        }
        $attachments2 = [];
        if (!empty($_FILES['home-photos2']['name'][0])) {
            foreach ($_FILES['home-photos2']['name'] as $key => $name) {
                if ($_FILES['home-photos2']['error'][$key] === UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES['home-photos2']['tmp_name'][$key];
                    $file_name = $_FILES['home-photos2']['name'][$key];

                    // Upload using wp_upload_bits
                    $upload = wp_upload_bits($file_name, null, file_get_contents($tmp_name));
                    if (!$upload['error']) {
                        $attachments2[] = $upload['file']; // Add file to email attachments
                    }
                }
            }
        }

        



        // Send email
        $subject = "New Screening Form Submission";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];



        $all_attachments = array_merge($attachments1, $attachments2);
        wp_mail($admin_email, $subject, $message, $headers, $all_attachments);

        // Optional: redirect after submission
        wp_redirect(home_url('//plan-selection')); // Replace with your thank you page
        exit;
    }
}



/****************************************************
     Bug/Feature Form Submission 
*******************************************************/

add_action('init', 'handle_bug_feature_form_submission');
function handle_bug_feature_form_submission() {
    if (
        isset($_POST['custom_bug_feature_form_submitted']) &&
        isset($_POST['custom_bug_feature_nonce']) &&
        wp_verify_nonce($_POST['custom_bug_feature_nonce'], 'custom_bug_feature_action')
    ) {
        // Get current user email
        $user = wp_get_current_user();
        $user_email = $user->exists() ? $user->user_email : 'Guest';

        // Sanitize fields
        $type = sanitize_text_field($_POST['bugfeature']);
        $type_label = $type === '1' ? 'Report a Bug' : ($type === '2' ? 'Request a Feature' : 'Unknown');
        $title = sanitize_text_field($_POST['bugTitle']);
        $description = sanitize_textarea_field($_POST['bugDescription']);

        // Create email body
        $message = '
        <html><body>
        <h2>Bug / Feature Submission</h2>
        <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
            <tr><td><strong>Type</strong></td><td>' . esc_html($type_label) . '</td></tr>
            <tr><td><strong>Title</strong></td><td>' . esc_html($title) . '</td></tr>
            <tr><td><strong>Description</strong></td><td>' . nl2br(esc_html($description)) . '</td></tr>
            <tr><td><strong>User Email</strong></td><td>' . esc_html($user_email) . '</td></tr>
        </table>
        </body></html>';

        // Send email
        $to = get_option('admin_email');
        $subject = 'New Bug/Feature Submission';
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        wp_mail($to, $subject, $message, $headers);

        // Redirect to thank you page (optional)
        // wp_safe_redirect(home_url());
        wp_safe_redirect(add_query_arg('submitted', '1', wp_get_referer()));
        exit;
    }
}
