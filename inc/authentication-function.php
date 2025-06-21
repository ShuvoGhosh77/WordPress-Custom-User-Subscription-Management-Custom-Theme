<?php
// Registation logick 
function custom_handle_user_registration()
{
    if (isset($_POST['submit_register'])) {
        $username = sanitize_user($_POST['username']);
        $firstname = sanitize_user($_POST['firstname']);
        $lastname = sanitize_user($_POST['lastname']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];

        global $registration_error, $registration_success;

        if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
            $registration_error = 'All fields are required.';
        } elseif (!is_email($email)) {
            $registration_error = 'Invalid email address.';
        } elseif (username_exists($username) || email_exists($email)) {
            $registration_error = 'Username or email already exists.';
        } elseif ($password !== $confirm) {
            $registration_error = 'Passwords do not match.';
        } else {
            $user_id = wp_create_user($username, $password, $email);
            if (!is_wp_error($user_id)) {
                // Save first and last name
                update_user_meta($user_id, 'first_name', $firstname);
                update_user_meta($user_id, 'last_name', $lastname);

                // // Optional: Set display name
                // wp_update_user([
                //     'ID' => $user_id,
                //     'display_name' => $firstname . ' ' . $lastname,
                // ]);
                wp_new_user_notification($user_id, null, 'user');
                $registration_success = true;
            } else {
                $registration_error = 'Registration failed. Try again.';
            }
        }
    }
}
add_action('template_redirect', 'custom_handle_user_registration');


// login logick 
function handle_custom_login()
{
    if (isset($_POST['custom_login_form'])) {
        $creds = array();
        $creds['user_login'] = sanitize_user($_POST['log']);
        $creds['user_password'] = $_POST['pwd'];
        $creds['remember'] = isset($_POST['rememberme']) ? true : false;

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            // Save error message temporarily using transient or global
            global $custom_login_error;
            $custom_login_error = $user->get_error_message();
        } else {
            // Successful login
            wp_redirect(home_url());
            exit;
        }
    }
}
add_action('template_redirect', 'handle_custom_login');


// Reset password link send in use email
function handle_custom_forgot_password()
{
    if (isset($_POST['custom_forgot_password']) && !empty($_POST['user_login'])) {
        $user_login = sanitize_text_field($_POST['user_login']);
        $user = get_user_by('email', $user_login);

        if ($user) {
            // Generate reset key
            $key = get_password_reset_key($user);
            if (is_wp_error($key)) {
                // Error generating key
                return;
            }

            $reset_link = home_url('/reset-password') . '?key=' . urlencode($key) . '&login=' . urlencode($user->user_login);

            // Send custom email
            ob_start();
            include get_template_directory() . '/templates/sections/email-password-reset-template.php';
            $message = ob_get_clean();

            // Send the email
            $subject = 'Reset your password';
            $headers = ['Content-Type: text/html; charset=UTF-8'];
            wp_mail($user->user_email, $subject, $message, $headers);


            wp_redirect(home_url('/reset-email-sent'));
            exit;
        } else {
            add_filter('custom_forgot_message', function () {
                return '<div class="alert alert-danger">No user found with that email address.</div>';
            });
        }
    }
}
add_action('template_redirect', 'handle_custom_forgot_password');



function handle_custom_reset_password_form()
{
    if (isset($_POST['custom_reset_password'])) {
        $login = sanitize_text_field($_POST['login']);
        $key = sanitize_text_field($_POST['key']);
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        $messages = [];

        if ($pass1 !== $pass2) {
            $messages[] = '<div class="alert alert-danger">Passwords do not match.</div>';
        }

        // Password strength check (length, uppercase, number, special character)
        if (
            strlen($pass1) < 8 ||
            !preg_match('/[A-Z]/', $pass1) ||
            !preg_match('/[0-9]/', $pass1) ||
            !preg_match('/[\W]/', $pass1) // checks for special characters
        ) {
            $messages[] = '<div class="alert alert-danger" style="margin-top: 10px;">Password must be at least 8 characters and include an uppercase letter, a number, and a special character.</div>';
        }

        $user = check_password_reset_key($key, $login);
        if (is_wp_error($user)) {
            $messages[] = '<div class="alert alert-danger" style="margin-top: 10px;">Invalid or expired reset link.</div>';
        }

        // Only proceed if there are no errors
        if (empty($messages)) {
            $old_passwords = get_user_meta($user->ID, 'previous_passwords', true);
            $old_passwords = is_array($old_passwords) ? $old_passwords : [];

            foreach ($old_passwords as $old) {
                if (wp_check_password($pass1, $old)) {
                    $messages[] = '<div class="alert alert-danger" style="margin-top: 10px;">You cannot reuse an old password. Please choose a new one.</div>';
                    break;
                }
            }

            if (empty($messages)) {
                reset_password($user, $pass1);
                $old_passwords[] = wp_hash_password($pass1);
                if (count($old_passwords) > 5)
                    array_shift($old_passwords);
                update_user_meta($user->ID, 'previous_passwords', $old_passwords);

                // Send email to the user after password is changed
                $to = $user->user_email;
                $subject = 'Your Password Has Been Changed';

                // Capture template output
                ob_start();
                include get_template_directory() . '/templates/sections/email-password-changed-email.php';
                $message = ob_get_clean();

                $headers = ['Content-Type: text/html; charset=UTF-8'];

                wp_mail($to, $subject, $message, $headers);
                // Redirect to confirmation page
                wp_redirect(home_url('/email-password-changed'));
                exit;
            }
        }

        // Save messages to a global or static var to show in form
        global $custom_reset_messages;
        $custom_reset_messages = $messages;
    }
}



add_action('template_redirect', function () {
    if (is_page('reset-password')) {
        handle_custom_reset_password_form();
    }
});







/***********************************************************
            upadte user frist and last name 
 ******************************************************** */
add_action('init', 'handle_user_name_update_form_secure');
function handle_user_name_update_form_secure()
{
    if (
        isset($_POST['update_user_name']) &&
        isset($_POST['first_name']) &&
        isset($_POST['last_name']) &&
        isset($_POST['update_user_name_nonce']) &&
        wp_verify_nonce($_POST['update_user_name_nonce'], 'update_user_name_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_first_name = sanitize_text_field($_POST['first_name']);
            $new_last_name = sanitize_text_field($_POST['last_name']);

            update_user_meta($user_id, 'first_name', $new_first_name);
            update_user_meta($user_id, 'last_name', $new_last_name);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

/***********************************************************
            upadte password
 ******************************************************** */

add_action('init', 'handle_user_password_update_form_secure');
function handle_user_password_update_form_secure()
{
    if (
        isset($_POST['update_user_password']) &&
        isset($_POST['current_password']) &&
        isset($_POST['new_password']) &&
        isset($_POST['update_user_password_nonce']) &&
        wp_verify_nonce($_POST['update_user_password_nonce'], 'update_user_password_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            if (wp_check_password($current_password, $current_user->user_pass, $user_id)) {
                wp_set_password($new_password, $user_id);
                wp_set_auth_cookie($user_id);
                wp_set_current_user($user_id);
                set_transient('password_update_success_' . $user_id, 'Your password has been updated successfully.', 30);
                wp_redirect($_SERVER['REQUEST_URI']);
                exit;

            } else {
                set_transient('password_update_error_' . $user_id, 'Current password is incorrect.', 30);

                wp_redirect($_SERVER['REQUEST_URI']);
                exit;
            }
        }
    }
}



/***********************************************************
            upadte user email
 ******************************************************** */

add_action('init', 'handle_user_email_update_form');
function handle_user_email_update_form()
{
    if (
        isset($_POST['update_user_email']) &&
        isset($_POST['new_email']) &&
        isset($_POST['user_password']) &&
        isset($_POST['update_user_email_nonce']) &&
        wp_verify_nonce($_POST['update_user_email_nonce'], 'update_user_email_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $provided_password = $_POST['user_password'];
            $new_email = sanitize_email($_POST['new_email']);
            $last_update_timestamp = get_user_meta($user_id, 'last_email_update_timestamp', true);

            if ($last_update_timestamp && (time() - $last_update_timestamp) < YEAR_IN_SECONDS) {
                set_transient('email_update_error_' . $user_id, 'You can only update your email once per year.', 60);
                wp_redirect($_SERVER['REQUEST_URI']);
                exit;
            }

            if (wp_check_password($provided_password, $current_user->user_pass, $user_id)) {
                // Success: Update email
                wp_update_user([
                    'ID' => $user_id,
                    'user_email' => $new_email,
                ]);
                update_user_meta($user_id, 'last_email_update_timestamp', time());
                wp_redirect($_SERVER['REQUEST_URI']);
                exit;
            } else {
                // Store error in a transient (valid for 60 seconds)
                set_transient('email_update_error_' . $user_id, 'Incorrect password. Please try again.', 60);
                wp_redirect($_SERVER['REQUEST_URI']);
                exit;
            }
        }
    }
}


add_action('init', 'handle_user_email_update_form');






/***********************************************************
           deletion user Account
 ******************************************************** */

add_action('template_redirect', 'handle_account_deletion');

function handle_account_deletion()
{
    if (
        is_user_logged_in() &&
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['delete_account']) &&
        isset($_POST['del_password'])
    ) {
        $current_user = wp_get_current_user();
        $password = sanitize_text_field($_POST['del_password']);

        if (wp_check_password($password, $current_user->user_pass, $current_user->ID)) {
            require_once ABSPATH . 'wp-admin/includes/user.php';
            wp_delete_user($current_user->ID);
            wp_redirect(home_url('/account-cancelled'));
            exit;
        } else {
            // Store error in session or use a transient
            set_transient('account_deletion_error', 'Incorrect password. Please try again.', 30);
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}




/***********************************************************
     divine-review-request  page upadte user Gender
 ******************************************************** */
add_action('init', 'handle_user_gender_update_form_secure');
function handle_user_gender_update_form_secure()
{
    if (
        isset($_POST['update_user_gender']) &&
        isset($_POST['gender']) &&
        isset($_POST['update_user_gender_nonce']) &&
        wp_verify_nonce($_POST['update_user_gender_nonce'], 'update_user_gender_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_gender = sanitize_text_field($_POST['gender']);


            update_user_meta($user_id, 'gender', $new_gender);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

add_action('init', 'handle_user_mobile_update_form_secure');
function handle_user_mobile_update_form_secure()
{
    if (
        isset($_POST['update_user_mobile']) &&
        isset($_POST['mobile']) &&
        isset($_POST['update_user_mobile_nonce']) &&
        wp_verify_nonce($_POST['update_user_mobile_nonce'], 'update_user_mobile_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_mobile = sanitize_text_field($_POST['mobile']);


            update_user_meta($user_id, 'mobile', $new_mobile);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_whatsapp_update_form_secure');
function handle_user_whatsapp_update_form_secure()
{
    if (
        isset($_POST['update_user_whatsapp']) &&
        isset($_POST['whatsapp']) &&
        isset($_POST['update_user_whatsapp_nonce']) &&
        wp_verify_nonce($_POST['update_user_whatsapp_nonce'], 'update_user_whatsapp_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_whatsapp = sanitize_text_field($_POST['whatsapp']);


            update_user_meta($user_id, 'whatsapp', $new_whatsapp);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_myage_update_form_secure');
function handle_user_myage_update_form_secure()
{
    if (
        isset($_POST['update_user_myage']) &&
        isset($_POST['myage']) &&
        isset($_POST['update_user_myage_nonce']) &&
        wp_verify_nonce($_POST['update_user_myage_nonce'], 'update_user_myage_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_myage = sanitize_text_field($_POST['myage']);


            update_user_meta($user_id, 'myage', $new_myage);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_height_update_form_secure');
function handle_user_height_update_form_secure()
{
    if (
        isset($_POST['update_user_height']) &&
        isset($_POST['height']) &&
        isset($_POST['update_user_height_nonce']) &&
        wp_verify_nonce($_POST['update_user_height_nonce'], 'update_user_height_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_height = sanitize_text_field($_POST['height']);


            update_user_meta($user_id, 'height', $new_height);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_maritalStatus_update_form_secure');
function handle_user_maritalStatus_update_form_secure()
{
    if (
        isset($_POST['update_user_maritalStatus']) &&
        isset($_POST['maritalStatus']) &&
        isset($_POST['update_user_maritalStatus_nonce']) &&
        wp_verify_nonce($_POST['update_user_maritalStatus_nonce'], 'update_user_maritalStatus_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_maritalStatus = sanitize_text_field($_POST['maritalStatus']);

            update_user_meta($user_id, 'marital_status', $new_maritalStatus);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_relationship_update_form_secure');
function handle_user_relationship_update_form_secure()
{
    if (
        isset($_POST['update_user_relationship']) &&
        isset($_POST['relationshipType']) &&
        isset($_POST['update_user_relationship_nonce']) &&
        wp_verify_nonce($_POST['update_user_relationship_nonce'], 'update_user_relationship_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_relationship = sanitize_text_field($_POST['relationshipType']);


            update_user_meta($user_id, 'relationship_type', $new_relationship);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_drinking_habit_update_form_secure');
function handle_user_drinking_habit_update_form_secure()
{
    if (
        isset($_POST['update_user_drinking_habit']) &&
        isset($_POST['drinkingHabit']) &&
        isset($_POST['update_user_drinking_habit_nonce']) &&
        wp_verify_nonce($_POST['update_user_drinking_habit_nonce'], 'update_user_drinking_habit_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_rinkingHabit = sanitize_text_field($_POST['drinkingHabit']);


            update_user_meta($user_id, 'drinking_habit', $new_rinkingHabit);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_smoking_habit_update_form_secure');
function handle_user_smoking_habit_update_form_secure()
{
    if (
        isset($_POST['update_user_smoking_habit']) &&
        isset($_POST['smokingHabit']) &&
        isset($_POST['update_user_smoking_habit_nonce']) &&
        wp_verify_nonce($_POST['update_user_smoking_habit_nonce'], 'update_user_smoking_habit_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_smoking = sanitize_text_field($_POST['smokingHabit']);


            update_user_meta($user_id, 'smoking_habit', $new_smoking);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_seeking_update_form_secure');
function handle_user_seeking_update_form_secure()
{
    if (
        isset($_POST['update_user_seeking']) &&
        isset($_POST['seekingFor']) &&
        isset($_POST['update_user_seeking_nonce']) &&
        wp_verify_nonce($_POST['update_user_seeking_nonce'], 'update_user_seeking_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_seeking_for = sanitize_text_field($_POST['seekingFor']);


            update_user_meta($user_id, 'seeking_for', $new_seeking_for);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

add_action('init', 'handle_user_preferred_age_range_update_form_secure');
function handle_user_preferred_age_range_update_form_secure()
{
    if (
        isset($_POST['update_user_preferred_age_range']) &&
        isset($_POST['age']) &&
        isset($_POST['update_user_preferred_age_range_nonce']) &&
        wp_verify_nonce($_POST['update_user_preferred_age_range_nonce'], 'update_user_preferred_age_range_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_preferred_age_range = sanitize_text_field($_POST['age']);


            update_user_meta($user_id, 'preferred_age_range', $new_preferred_age_range);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

add_action('init', 'handle_user_preferencesHeight_update_form_secure');
function handle_user_preferencesHeight_update_form_secure()
{
    if (
        isset($_POST['update_user_preferencesHeight']) &&
        isset($_POST['preferencesHeight']) &&
        isset($_POST['update_user_preferencesHeight_nonce']) &&
        wp_verify_nonce($_POST['update_user_preferencesHeight_nonce'], 'update_user_preferencesHeight_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_preferencesHeight = sanitize_text_field($_POST['preferencesHeight']);


            update_user_meta($user_id, 'preferencesHeight', $new_preferencesHeight);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_bodyType_update_form_secure');
function handle_user_bodyType_update_form_secure()
{
    if (
        isset($_POST['update_user_bodyType']) &&
        isset($_POST['bodyType']) &&
        isset($_POST['update_user_bodyType_nonce']) &&
        wp_verify_nonce($_POST['update_user_bodyType_nonce'], 'update_user_bodyType_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_bodyType = sanitize_text_field($_POST['bodyType']);


            update_user_meta($user_id, 'body_type', $new_bodyType);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_skin_complexion_update_form_secure');
function handle_user_skin_complexion_update_form_secure()
{
    if (
        isset($_POST['update_user_skin_complexion']) &&
        isset($_POST['skinComplextion']) &&
        isset($_POST['update_user_skin_complexion_nonce']) &&
        wp_verify_nonce($_POST['update_user_skin_complexion_nonce'], 'update_user_skin_complexion_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

            $new_skin_complexion = sanitize_text_field($_POST['skinComplextion']);


            update_user_meta($user_id, 'skin_complexion', $new_skin_complexion);

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}
add_action('init', 'handle_user_Interest_update_form_secure');
function handle_user_Interest_update_form_secure()
{
    if (
        isset($_POST['update_user_Interest']) &&
        isset($_POST['update_user_Interest_nonce']) &&
        wp_verify_nonce($_POST['update_user_Interest_nonce'], 'update_user_Interest_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;

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

            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}


add_action('init', 'handle_user_location_update_form_secure');
function handle_user_location_update_form_secure()
{
    if (
        isset($_POST['update_user_location']) &&
        isset($_POST['update_user_location_nonce']) &&
        wp_verify_nonce($_POST['update_user_location_nonce'], 'update_user_location_action')
    ) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
            
            $new_country = sanitize_text_field($_POST['country'] ?? '');
            $new_state = sanitize_text_field($_POST['state'] ?? '');
            $new_city = sanitize_text_field($_POST['city'] ?? '');

            update_user_meta($user_id, 'country', $new_country);
            update_user_meta($user_id, 'state', $new_state);
            update_user_meta($user_id, 'city', $new_city);


            // Optional: redirect to avoid resubmission on refresh
            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        }
    }
}