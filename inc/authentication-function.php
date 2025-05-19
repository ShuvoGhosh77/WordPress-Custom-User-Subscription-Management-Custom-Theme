<?php
// Registation logick 
function custom_handle_user_registration() {
    if (isset($_POST['submit_register'])) {
        $username   = sanitize_user($_POST['username']);
        $firstname   = sanitize_user($_POST['firstname']);
        $lastname   = sanitize_user($_POST['lastname']);
        $email      = sanitize_email($_POST['email']);
        $password   = $_POST['password'];
        $confirm    = $_POST['confirm_password'];

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
function handle_custom_login() {
    if ( isset($_POST['custom_login_form']) ) {
        $creds = array();
        $creds['user_login']    = sanitize_user($_POST['log']);
        $creds['user_password'] = $_POST['pwd'];
        $creds['remember']      = isset($_POST['rememberme']) ? true : false;

        $user = wp_signon($creds, false);

        if ( is_wp_error($user) ) {
            // Save error message temporarily using transient or global
            global $custom_login_error;
            $custom_login_error = $user->get_error_message();
        } else {
            // Successful login
            wp_redirect(home_url()); // Or redirect to wc_get_page_permalink('myaccount');
            exit;
        }
    }
}
add_action('template_redirect', 'handle_custom_login'); 



function handle_custom_forgot_password() {
    if ( isset($_POST['custom_forgot_password']) && !empty($_POST['user_login']) ) {
        $user_login = sanitize_text_field($_POST['user_login']);
        $user = get_user_by('email', $user_login);

        if ( $user ) {
            // Trigger password reset email
            $reset = retrieve_password($user_login);

            if ( $reset === true ) {
                // Show success message
               wp_redirect(home_url('/reset-email-sent'));
                exit;
            } else {
                add_filter('custom_forgot_message', function() {
                    return '<div class="alert alert-danger">Could not send reset instructions. Please try again later.</div>';
                });
            }
        } else {
            add_filter('custom_forgot_message', function() {
                return '<div class="alert alert-danger">No user found with that email address.</div>';
            });
        }
    }
}
add_action('template_redirect', 'handle_custom_forgot_password');






/***********************************************************
            upadte user frist and last name 
 ******************************************************** */ 
add_action('init', 'handle_user_name_update_form_secure');
function handle_user_name_update_form_secure() {
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
            upadte user email
 ******************************************************** */ 

add_action('init', 'handle_user_email_update_form');
function handle_user_email_update_form() {
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

            if (wp_check_password($provided_password, $current_user->user_pass, $user_id)) {
                // Success: Update email
                wp_update_user([
                    'ID' => $user_id,
                    'user_email' => $new_email,
                ]);
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

/***********************************************************
            upadte user password
 ******************************************************** */ 
add_action('init', 'handle_user_password_update');
function handle_user_password_update() {
    if (
        isset($_POST['update_user_password']) &&
        isset($_POST['current_password']) &&
        isset($_POST['new_password']) &&
        isset($_POST['update_user_password_nonce']) &&
        wp_verify_nonce($_POST['update_user_password_nonce'], 'update_user_password_action')
    ) {
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            $user_id = $user->ID;
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];

            if (wp_check_password($current_password, $user->user_pass, $user_id)) {
                $update_result = wp_update_user([
                    'ID' => $user_id,
                    'user_pass' => $new_password,
                ]);

                if (!is_wp_error($update_result)) {
                    set_transient('password_update_success_' . $user_id, 'Password updated successfully.', 60);
                } else {
                    set_transient('password_update_error_' . $user_id, 'Something went wrong. Please try again.', 60);
                }

                wp_redirect($_SERVER['REQUEST_URI']);
                exit;
            } else {
                set_transient('password_update_error_' . $user_id, 'Incorrect current password.', 60);
                wp_redirect($_SERVER['REQUEST_URI']);
                exit;
            }
        }
    }
}


/***********************************************************
           deletion user Account
 ******************************************************** */ 

add_action('template_redirect', 'handle_account_deletion');

function handle_account_deletion() {
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
