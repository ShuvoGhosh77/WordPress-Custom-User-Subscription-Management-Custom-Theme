<?php
/*
Template Name: Register Page
*/

get_header();
?>

<?php
global $registration_error, $registration_success;


// Success popup markup (hidden initially)
if (!empty($registration_success)) {
    echo '
    <div id="register-success-popup" class="popup-overlay">
        <div class="popup-content">
            <h3>Registration Successful!</h3>
            <p>You can now <a href="' . esc_url(home_url('/login')) . '">log in</a>.</p>
            <button onclick="document.getElementById(\'register-success-popup\').style.display = \'none\'">Close</button>
        </div>
    </div>';
}
?>

<!-- HEADER -->
<header class="light-header">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="/" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                alt="<?php bloginfo('name'); ?>">
        </a>
    </div>
</header>
<!-- / HEADER -->



<!-- MAIN -->
<main>


    <!-- Auth Wrapper -->
    <section class="auth-wrapper d-flex align-items-center">

        <div class="container-fluid">

            <div class="row align-items-end">


                <div class="col-lg-6 z-1">

                    <!-- Auth Text -->
                    <div class="auth-text">

                        <span>Welcome to</span>

                        <h1>Mysight</h1>

                        <p>Your ultimate destination for life and spiritual assistance.
                            With Mysight, you can access the spiritual support you need from the convenience of
                            your own home</p>

                        <!-- Buttons -->
                        <div class="form-switch-btns">
                            <a href="login.html" class="btn btn-primary">Login</a>
                            <a href="register.html" class="btn btn-primary ms-2 active">Register</a>
                        </div>

                    </div>
                </div>


                <!-- Column 2 -->
                <div class="col-lg-6 z-1">

                    <!-- Signup Form -->
                    <form id="register-form" class="auth-form mx-auto" method="POST"
                        action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                        <!-- Heading -->
                        <h2 class="form-title">Create your Account!</h2>

                        <!-- Email Input -->
                        <div class="form-floating mb-4">
                            <input type="email" id="signup-email" name="email" placeholder="Your Email"
                                class="form-control" required>
                            <label for="signup-email">Your Email</label>
                        </div>

                        <!-- Username Input -->
                        <div class="form-floating mb-4">
                            <input type="text" id="signup-username" name="username" placeholder="Username"
                                class="form-control" required>
                            <label for="signup-username">Username</label>
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mb-4">
                            <input type="password" id="signup-password" name="password" placeholder="Password"
                                class="form-control" required>
                            <label for="signup-password">Password</label>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="form-floating mb-4">
                            <input type="password" id="confirm-password" name="confirm_password"
                                placeholder="Repeat Password" class="form-control" required>
                            <label for="confirm-password">Repeat Password</label>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="form-check send-updates">
                            <input class="form-check-input" type="checkbox" id="AgreeOnTerms" name="terms" required>
                            <label class="form-check-label" for="AgreeOnTerms">I agree to the Mysight <a
                                    href="terms-and-condition.html">Terms and Privacy Policy</a></label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="submit_register" class="btn btn-primary w-100">Register
                            Now!</button>
                        <?php
                       
                        if (!empty($registration_error)) {
                            echo '<div class="alert alert-danger">' . esc_html($registration_error) . '</div>';
                        }
                        ?>
                    </form>





                </div>
            </div>
        </div>
    </section>




</main>
<!-- /MAIN -->