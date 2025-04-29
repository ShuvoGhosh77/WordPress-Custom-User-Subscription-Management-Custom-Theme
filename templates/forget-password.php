<?php
/*
Template Name: Forget Password Page
*/

get_header();
?>

<!-- HEADER -->
<header class="single-header position-relative">
    <div class="container-fluid">

        <div>

            <!-- LOGO -->
            <a href="select-screening.html" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                    alt="<?php bloginfo('name'); ?>">
            </a>

        </div>

    </div>
</header>
<!-- / HEADER -->


<!-- MAIN -->
<main class="gradient-bg">


    <!-- Forgot Password Wrapper -->
    <section class="forgot-password-wrapper">

        <div class="container">


            <!-- Forgot Password Box -->
            <div class="forgot-password-box mx-auto">

                <!-- Form -->
                <form method="post" action="<?php echo wp_lostpassword_url(); ?>">

                    <!-- Title -->
                    <div class="d-flex justify-content-between align-items-center mb-lg-4 mb-3">
                        <h1>Forgot Password?</h1>
                        <div>
                            <a href="/login">Back to Log In</a>
                        </div>
                    </div>

                    <div class="form-help-text">
                        Enter your email, and we’ll send you instructions on how to reset your password.
                    </div>

                    <!-- Email Input -->
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="user_login" placeholder="Email"
                            required>
                        <label for="email">Email</label>
                    </div>

                    <!-- Next Button -->
                    <div>
                        <button type="submit" class="btn btn-primary w-100">Send me reset instructions</button>
                    </div>

                    <!-- Forgot Email? -->
                    <div class="text-center mt-3">
                        <a href="/forgot-email" class="text-muted"><small>Forgot email?</small></a>
                    </div>

                </form>


            </div>


        </div>

    </section>
    <!-- /Forgot Password Wrapper -->






</main>
<!-- /MAIN -->