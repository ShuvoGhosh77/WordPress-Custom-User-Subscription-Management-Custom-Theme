<?php
/*
Template Name: Reset Email Sent Page
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
        
                        <!-- Title -->
                        <div class="d-flex justify-content-between align-items-center mb-lg-4 mb-3">

                            <h1>Password Reset</h1>

                            <div>
                                <a href="/login">Back to Log In</a>
                            </div>
                        
                        </div>
    
                        <div class="form-help-text">
                            Enter your email, and we’ll send you instructions on how to reset your password.
                        </div>

                        
                        <!-- Alert Success Container -->
                        <div class="alert-success-container d-flex">

                            <div>
                                <i class="fa-solid fa-check-circle"></i>
                            </div>

                            <div class="text">
                                If there's a Mysight account connected to this email address, we'll email you password reset instructions.
                                <br>
                                If you don't receive the email, please try again and make sure you enter the email address associated with your MySight account.
                            </div>

                        </div>
    
                        <!-- Next Button -->
                        <div>
                            <a href="/login" class="btn btn-primary w-100">Back to Log In</a>
                        </div>
    
                        <!-- Forgot Email? -->
                        <div class="text-center mt-3">
                            <a href="/forgot-email" class="text-muted"><small>Forgot email?</small></a>
                        </div>
                         
                </div>
                
    
            </div>
    
        </section>
        <!-- /Forgot Password Wrapper -->
    
    
    
    
    
    
    </main>
    <!-- /MAIN -->

    
<?php get_footer(); ?>