<?php
/*
Template Name: Account Cancelled Page
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
<!-- /HEADER -->





<!-- MAIN -->
<main class="gradient-bg">



    <!-- Account Cancelled Page -->
    <section class="account-cancel-wrapper">

        <div class="container">


            <!-- Cancel Box -->
            <div class="cancel-box mx-auto">

                <!-- Checkmark icon -->
                <div class="cancel-check">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <!-- Heading -->
                <h1>Account Cancelled</h1>

                <!-- Description -->
                <p>Your account has been successfully cancelled.</p>

                <!-- Confirmation button -->
                <a href="/" class="btn btn-primary w-100">Got it!</a>

            </div>


        </div>

    </section>
    <!-- /Account Cancelled Page -->





</main>
<!-- / MAIN -->


<?php get_footer(); ?>