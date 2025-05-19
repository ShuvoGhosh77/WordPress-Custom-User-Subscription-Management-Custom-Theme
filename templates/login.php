<?php
/*
Template Name: Login Page
*/

get_header();
?>

<!-- HEADER -->
<header class="light-header">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="select-screening.html" class="logo">
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


                <!-- Column 1 -->
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
                            <a href="/login" class="btn btn-primary active">Login</a>
                            <a href="/register" class="btn btn-primary ms-2">Register</a>
                        </div>

                    </div>
                </div>



                <div class="col-lg-6 z-1">

                    <!-- Login Form -->
                    <form id="login-form" class="auth-form mx-auto" method="post" action="">

                        <!-- Heading -->
                        <h2 class="form-title">Account Login</h2>

                        <!-- Username Input -->
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="log" id="login-username"
                                placeholder="Username" required>
                            <label for="login-username">Username</label>
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="pwd" id="login-password"
                                placeholder="Password" required>
                            <label for="login-password">Password</label>
                        </div>

                        <div class="d-flex justify-content-between">

                            <!-- Remember Me Checkbox -->
                            <div class="form-check rememberme">
                                <input class="form-check-input" type="checkbox" name="rememberme"
                                    id="RemembermeCheckbox">
                                <label class="form-check-label" for="RemembermeCheckbox">Remember Me</label>
                            </div>

                            <!-- Forget Password -->
                            <a href="/forget-password" class="forgetpass">Forgot Password</a>

                        </div>
                        <input type="hidden" name="custom_login_form" value="1">

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary w-100">Login to your Account!</button>
                        <?php
                        global $custom_login_error;
                        if (!empty($custom_login_error)) {
                            echo '<div class="alert alert-danger">' . $custom_login_error . '</div>';
                        }
                        ?>



                        <!-- Social Login Wrapper -->
                        <div class="social-login-wrapper">
                            <!-- Head -->
                            <div class="social-login-head text-center">
                                <span>Login with your Social Account</span>
                            </div>

                            <!-- Social Icon Row -->
                            <div class="social-icons-wrap d-flex justify-content-center">
                                <!-- Facebook -->
                                <a class="social-icon fb" href="#">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>

                                <!-- Twitter -->
                                <a class="social-icon tw" href="#">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>

                                <!-- Instagram -->
                                <a class="social-icon ig" href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>

                                <!-- TikTok -->
                                <a class="social-icon tt" href="#">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </div>
                        </div>

                    </form>

                </div>


            </div>

        </div>

    </section>





</main>


<?php get_footer(); ?>