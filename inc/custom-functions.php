<?php
// Registation logick 
function custom_handle_user_registration() {
    if (isset($_POST['submit_register'])) {
        $username   = sanitize_user($_POST['username']);
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
function custom_login_redirect($user_login, $user) {
    // Redirect to the homepage after successful login
    wp_redirect(home_url());
    exit;
}

add_action('wp_login', 'custom_login_redirect', 10, 2);


function custom_forgot_password_messages() {
    if ( isset($_GET['action']) && $_GET['action'] == 'lostpassword' ) {
        if ( isset($_GET['errors']) && $_GET['errors'] == 'invalidkey' ) {
            echo '<div class="alert alert-danger">The email address is not registered. Please check and try again.</div>';
        }
    }
}
add_action( 'wp_footer', 'custom_forgot_password_messages' );
