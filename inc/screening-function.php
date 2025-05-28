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
        $subject = "New General Screening Form Submission";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        wp_mail($admin_email, $subject, $message, $headers, $attachments);

        // Optional: redirect after submission
        wp_redirect(home_url('//plan-selection')); // Replace with your thank you page
        exit;
    }
}
