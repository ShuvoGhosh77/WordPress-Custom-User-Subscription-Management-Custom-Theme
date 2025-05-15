<?php
/*
Template Name: Plan Selection Page
*/
get_header();
?>


<!-- HEADER -->
<header class="single-header border-0 position-relative">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <!-- LOGO -->
            <a href="select-screening.html" class="logo">
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


<!-- Plan Selection Section -->
<section class="plan-selection">


    <!-- Steps Wrapper -->





    <div class="container">


        <!-- Plans Wrapper -->
        <div class="plans-wrapper mx-auto">

            <!-- Main Heading -->
            <h1>Choose Your Plan</h1>


            <!-- Plan Items -->
            <div class="plan-items">


                <div class="d-flex align-items-center justify-content-between mb-3">

                    <!-- Plan Items Heading -->
                    <h2 class="mb-0">Donation Plan (Individual)</h2>

                    <p class="currency-info">USD price is not fixed and NGN will be converted into USD</p>

                </div>


                <!-- Plan -->
                <div class="normal-plan plan">

                    <!-- Plan title -->
                    <div class="upper-block d-flex align-items-center justify-content-between">

                        <h3> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.png" alt="Pay-as-you-go Plan"> Pay-as-you-go</h3>

                    </div>

                    <div class="main-block d-flex justify-content-between align-items-center">

                        <!-- Price -->
                        <div class="price">
                            <span class="value">₦5,000 ($6.57 USD)</span>
                        </div>

                        <!-- Donate Btn -->
                        <div class="btn-block">
                            <button type="button" class="btn btn-primary">Donate</button>
                        </div>

                    </div>

                </div>


                <!-- Plan -->
                <div class="monthly-plan plan">

                    <!-- Plan title -->
                    <div class="upper-block d-flex align-items-center justify-content-between">

                        <h3> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaves.png" alt="Monthly Plan"> Monthly</h3>

                    </div>

                    <div class="main-block d-flex justify-content-between align-items-center">

                        <!-- Price -->
                        <div class="price">
                            <span class="value">₦20,000 ($26.30 USD)</span>
                            <span class="duration">per month</span>
                        </div>

                        <!-- Donate Btn -->
                        <div class="btn-block">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='/checkout/?add-to-cart=123';">Donate</button>

                        </div>

                    </div>

                </div>


                <!-- Plan -->
                <div class="annual-plan plan">

                    <!-- Plan title -->
                    <div class="upper-block d-flex align-items-center justify-content-between">

                      <div class="d-flex align-items-center">
                        <h3> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/three-leaf.png" alt="Annual Plan"> Annual</h3>
                        <span class="popular-plan-box ms-2">Most Popular</span>
                      </div>  
                       

                        <div class="saving-block">
                            <span>Save 60%</span> 
                        </div>

                    </div>

                    <div class="main-block d-flex justify-content-between align-items-center">

                        <!-- Price -->
                        <div class="price">
                            <span class="value">₦8,500 ($11.03 USD)</span>
                            <span class="duration">per month</span>
                            <p>Billed as one donation of N102,000 ($132.36 USD)</p>
                        </div>

                        <!-- Donate Btn -->
                        <div class="btn-block">
                            <button type="button" class="btn btn-primary">Donate</button>
                        </div>

                    </div>

                </div>



            </div>


        </div>



    </div>
    
</section>




</main>
<!-- / MAIN -->