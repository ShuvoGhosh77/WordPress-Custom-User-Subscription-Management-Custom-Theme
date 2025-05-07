<?php
/*
Template Name: support Page
*/
get_header();
?>

<!-- HEADER -->
<header class="single-header">
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

            <button type="button" class="open-sidebar d-lg-none" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </button>

        </div>

    </div>
</header>
<!-- / HEADER -->


<!-- Account Setting Wrapper -->
<section class="support-wrapper dashboard-wrapper">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-3">

                <!-- Sidebar Main -->
                <?php get_sidebar(); ?>

            </div>



            <div class="col-lg-9">

                <!-- Main Content -->
                <main class="layout-main support-main">


                    <div class="support-text-box">

                        <h1>Support</h1>

                        <h3>Hi! We are here to help you</h3>

                        <p>When Customers have problems, they open support ticket or contact us.</p>

                        <div class="support-info">
                            <span>To reach us now Call our 24 Hours Support Line at 09981-8372-2323</span>
                        </div>

                    </div>


                    <div class="create-ticket-box">

                        <h2>Create a New Ticket</h2>

                        <p>Fill out this form then click submit for tech support</p>

                        <div class="ticket-form-wrapper">

                            <div class="ticket-form" id="supportForm">

                            <?php echo do_shortcode('[contact-form-7 id="4a4addc" title="Support"]'); ?>

                            </div>

                        </div>

                    </div>


                </main>


            </div>

        </div>

    </div>

</section>
<!-- /Support Wrapper -->