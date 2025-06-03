<?php
/*
Template Name: Delete Account Page
*/
get_header();
?>

<!-- HEADER -->
<header class="single-header position-relative">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <!-- LOGO -->
            <a href="/" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Mysight logo">
            </a>

            <div class="username">
                <?php
                $current_user = wp_get_current_user();
                $firstname = get_user_meta($current_user->ID, 'first_name', true);
                $lastname = get_user_meta($current_user->ID, 'last_name', true);
                ?>

                Hello, <Span><?php echo esc_attr($firstname); ?> </Span><Span><?php echo esc_attr($lastname); ?></Span>
            </div>

        </div>

    </div>
</header>
<!-- / HEADER -->


<!-- MAIN -->
<main class="gradient-bg">

    <?php
    if ($error = get_transient('account_deletion_error')) {
        echo '<div style="color: red; text-align:center; margin-top: 20px; font-weight: 700; font-size: 20px;">' . esc_html($error) . '</div>';
        delete_transient('account_deletion_error');
    }
    ?>


    <!-- Delete Account Wrapper -->
    <section class="delete-account-wrapper">

        <div class="container">


            <!-- Delete Account Box -->
            <div class="delete-account-box mx-auto">

                <!-- Form -->
                <form method="post">

                    <!-- Title -->
                    <h1>Verify that it's you</h1>

                    <!-- Email Input -->
                    <div class="form-floating">
                        <input type="email" class="form-control" id="DelVerifyEmail" readonly placeholder="Email"
                            value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>">
                        <label for="DelVerifyEmail">Your Email</label>
                    </div>

                    <!-- Password Input -->
                    <div class="form-floating input-group">
                        <input type="password" class="form-control z-1" name="del_password" id="DelPasswordVerify"
                            placeholder="password" required>
                        <label for="del-password-verify">Password</label>
                        <div class="input-group-append">
                            <span class="input-group-text password-toggle"
                                onclick="deletetogglePassword('DelPasswordVerify')">
                                 <img src="/wp-content/uploads/2025/05/eye-view.png" alt="">
                            </span>
                        </div>
                    </div>

                    <!-- Next Button -->
                    <input type="hidden" name="delete_account" value="1">
                    <div>
                        <button type="submit" class="btn btn-primary w-100">Next</button>
                    </div>

                    <!-- Can't sign in? -->
                    <div class="text-center pt-2 mt-1">
                        <a href="forget-password.html" class="text-muted"><small>Can’t sign in?</small></a>
                    </div>

                    <!-- Bottom Text - Google Policies -->
                    <div class="bottom-text">
                        This site is protected by reCAPTCHA and the Google
                        <a class="#" target="_blank" href="https://policies.google.com/privacy">Privacy Policy</a> and
                        <a target="_blank" href="https://policies.google.com/terms">Terms of Service</a> apply.
                    </div>

                    <!-- Bottom Text - Company Policies -->
                    <div class="bottom-text pt-3">
                        <a target="_blank" href="#">Terms and Conditions</a> ·
                        <a class="#" target="_blank" href="#">Privacy Policy</a> ·
                        <a class="#" target="_blank" href="#">CA Privacy Notice</a>
                    </div>

                </form>

            </div>


        </div>

    </section>
    <!-- /Delete Account Wrapper -->






</main>
<!-- /MAIN -->


<?php get_footer(); ?>