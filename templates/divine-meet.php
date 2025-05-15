<?php
/*
Template Name: Divine Meet Page
*/
get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>


<main>


    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper divine-meet">

        <div class="container">



            <!-- Common Tab-Header -->    
            <?php get_template_part('templates/sections/tab-header'); ?>



            <!-- Tab Panel * Divine Meet Panel -->
            <div class="tabs-wrapper--panel  divine-meet-panel">


                <!-- Divine Meet Register -->
                <div class="divine-meet-register">

                    <div class="container">

                        <div class="row align-items-center justify-content-between">


                            <div class="col-lg-6">

                                <!-- Register Left -->
                                <div class="divine-register-left text-center">

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart-cross-icon.png" alt="Divine Icon"
                                        class="img-fluid divine-icon">

                                    <h1>Divine Meet</h1>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seed consectrtur diam
                                        quis pellentesque.</p>

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Divine-Meet-couple-img.jpg" alt="Divine Meet Couple"
                                        class="img-fluid couple-img">

                                </div>

                            </div>



                            <div class="col-xl-5 col-lg-6">


                                <!-- DivineMeet Form Wrapper -->
                                <div class="divine-register-right  mt-lg-0 mt-5">


                                    <!-- Form -->
                                    <?php echo do_shortcode('[contact-form-7 id="16a54f4" title="Divine Meet Form"]'); ?>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>


            </div>





        </div>

    </section>
    <!-- /Section -->





</main>

<?php get_footer(); ?>