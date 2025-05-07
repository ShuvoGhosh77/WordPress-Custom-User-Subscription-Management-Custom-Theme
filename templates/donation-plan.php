<?php
/*
Template Name: Donation Plan Page
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

<!-- Donation-Plan Wrapper -->
<section class="donation-plan-wrapper dashboard-wrapper">

<div class="container-fluid">

    <div class="row">


        <div class="col-lg-3">

            <!-- Sidebar Main -->
             <!-- Sidebar Main -->
             <?php get_sidebar(); ?>

        </div>


        <div class="col-lg-9">

            <!-- Main Content -->
            <main class="layout-main donation-plan">

                <!-- Head -->
                <h1>Donation Plan</h1>

                <div class="para-group">
                    <p>We’re a group of Holy Spirt filled, bible-believing, gifted seers. We're here to ensure you get a clear, detailed, and precise spiritual report to help you, your family, and the body of Christ.
                    </p>
                    <p>We stand on the word in 1 Timothy 5:18 and Ecclesiastes 3:13. Our Donation plans are seeds given to support the ministerial work.</p>
                </div>


                <!-- Plan Box Wrapper -->
                <div class="plan-box-wrapper">

                    <div class="row gy-4">


                        <div class="col-lg-6">

                            <!-- Donation Plan Box -->
                            <div class="donation-plan-box">

                                <span class="top-head">FOR INDIVIDUALS</span>

                                <!-- Plan title -->
                                <h2>
                                    <img class="me-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/pay-as-you-go-icon.png" width="40" alt="Pay-as-you-go">
                                    Pay-as-you-go
                                </h2>

                                <div class="divider"></div>

                                <p>Insightful, thorough, and Comprehensive spiritual report. What to expect</p>

                                <!-- Plan Features -->
                                <div class="plan-feature">

                                    <ul class="list-unstyled m-0 p-0">

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Clarity</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Comprehensive</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Thorough</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Explanatory</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Profound Discovery ( Family, Gifts, Purposes, Foundations)</span>
                                        </li>

                                    </ul>

                                </div>

                                <!-- Button -->
                                <a href="/plan-selection" class="btn btn-primary w-100">Get Started</a>

                            </div>

                        </div>


                        <div class="col-lg-6">

                            <!-- Donation Plan Box -->
                            <div class="donation-plan-box">

                                <span class="top-head">FOR INDIVIDUALS</span>

                                <!-- Plan title -->
                                <h2>
                                    <img class="me-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/diamond-icon.png" width="40"
                                        alt="Premium">Premium
                                    <span>(Monthly)</span>
                                </h2>

                                <div class="divider"></div>

                                <p>In-depth, well-detailed, and solution- driven spiritual report</p>

                                <!-- Plan Features -->
                                <div class="plan-feature">

                                    <ul class="list-unstyled m-0 p-0">

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span class="fw-bold">Everything in Pay-as-you-go</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Full Detailed spiritual report</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>1on1 Live Session (1 session)</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Spiritual Detections</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Tailored Solutions</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Divine Targeted Prayers</span>
                                        </li>

                                    </ul>

                                </div>

                                <!-- Button -->
                                <a href="/plan-selection" class="btn btn-primary w-100">Get Started</a>

                            </div>

                        </div>


                    </div>

                </div>



            </main>


        </div>

    </div>

</div>

</section>
<!-- /Donation-Plan Wrapper -->

<?php get_footer(); ?>