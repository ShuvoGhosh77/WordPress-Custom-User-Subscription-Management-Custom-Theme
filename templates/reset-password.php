<<?php
/*
Template Name: Reset Password  Page
*/

get_header();
?>


    <!-- HEADER -->
    <header class="single-header position-relative">
        <div class="container-fluid">

            <div>

                <!-- LOGO -->
                <a href="/select-screening" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                        alt="<?php bloginfo('name'); ?>">
                </a>

            </div>

        </div>
    </header>
    <!-- / HEADER -->


    <!-- MAIN -->
    <main class="gradient-bg">


        <!-- Reset Password Wrapper -->
        <section class="reset-password-wrapper">

            <div class="container">


                <!-- Reset Password Box -->
                <div class="reset-password-box mx-auto">


                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h1>Reset password</h1>

                        <div>
                            <a href="login.html">Back to Log In</a>
                        </div>

                    </div>


                    <!-- Form -->
                    <form method="POST">
                        <input type="hidden" name="custom_reset_password" value="1">
                        <input type="hidden" name="login" value="<?php echo esc_attr($_GET['login']); ?>">
                        <input type="hidden" name="key" value="<?php echo esc_attr($_GET['key']); ?>">

                        <!-- New Password Field -->
                        <div class="form-group mb-3">

                            <label for="ResetNewPassword">New Password</label>

                            <div class="input-group">

                                <input class="form-control" name="pass1" id="ResetNewPassword" type="password"
                                    placeholder="Enter a new password" required>

                                <span class="input-group-text new-password-toggle"
                                    onclick="togglePassword('ResetNewPassword')">
                                    <img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">
                                </span>

                            </div>

                        </div>


                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4">

                            <label for="confirmNewPassword">Confirm Password</label>

                            <div class="input-group">

                                <input class="form-control" name="pass2" id="confirmNewPassword" type="password"
                                    placeholder="Confirm you new password" required>

                                <span class="input-group-text confirm-password-toggle"
                                    onclick="togglePasswordTwo('confirmNewPassword')">
                                    <img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">
                                </span>

                            </div>

                            <!-- MisMatch Error -->
                            <div id="passwordMismatchError" class="text-danger pt-2" style="display: none;"> <span><img
                                        src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt=""></span>
                                Password did not match</div>

                        </div>



                        <!-- Reset Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Reset my password</button>

                        <!-- Show errors or success below button -->
                        <?php
                        global $custom_reset_messages;
                        if (!empty($custom_reset_messages)) {
                            foreach ($custom_reset_messages as $msg) {
                                echo $msg;
                            }
                        }
                        ?>

                    </form>


                </div>


            </div>

        </section>
        <!-- /Reset Password Wrapper -->






    </main>
    <!-- /MAIN -->





    <?php get_footer(); ?>