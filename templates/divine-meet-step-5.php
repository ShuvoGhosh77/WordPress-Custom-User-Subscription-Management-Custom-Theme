<?php
/*
Template Name: Divine meet step5 Page
*/
get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>

<!-- MAIN -->
<main>


    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper divine-meet overflow-hidden">

        <div class="container">



            <!-- Common Tab-Header -->
            <?php get_template_part('templates/sections/tab-header'); ?>



            <!-- Tab Panel * Divine Step Panel -->
            <div class="tabs-wrapper--panel  divine-steps-panel p-0">


                <!-- Divine Meet Step (Preferences) -->
                <div class="divine-meet-step">

                    <div class="container">

                        <div class="row justify-content-between">


                            <div class="col-lg-6 d-flex p-0" id="divien-step-left5">

                                <!-- Divine Step Left -->
                                <?php get_template_part('templates/sections/divine-step-left'); ?>

                            </div>



                            <div class="col-xl-5 col-lg-6 p-0">

                                <!-- Divine Steps Form -->
                                <div class="divine-steps-form  preferences-form ps-xl-0">

                                    <!--Form-->
                                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">

                                        <!-- Heading -->
                                        <h3>Who are you looking for?</h3>

                                        <!-- Sub Head -->
                                        <p class="divine-form-subhead text-center">Review and edit your preferences to
                                            help us find the best matches for you <br> (you can change later)</p>


                                        <!-- Seeking For -->
                                        <div class="preferences-info-block pb-lg-4 pb-3 border-bottom">

                                            <h5>I am seeking</h5>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="seekingFor"
                                                    id="husbandRadio" value="Husband">
                                                <label class="form-check-label" for="husbandRadio">Husband</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="seekingFor"
                                                    id="wifeRadio" value="Wife">
                                                <label class="form-check-label" for="wifeRadio">Wife</label>
                                            </div>

                                        </div>


                                        <!-- Age Preferences -->
                                        <div class="preferences-info-block py-lg-4 py-3 border-bottom">

                                            <h5>Age</h5>

                                            <div class="slider-wrapper">

                                                <!-- Age Slider Input -->
                                                <input class="input-range" type="text" data-slider-min="18"
                                                    data-slider-tooltip="always" data-slider-max="60"
                                                    data-slider-step="1" name="age" />

                                            </div>

                                        </div>

                                        <!-- Body Type Preferences -->
                                        <div class="preferences-info-block py-lg-4 py-3 border-bottom">

                                            <h5>Body Type</h5>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bodyType"
                                                    id="fatRadio" value="Fat">
                                                <label class="form-check-label" for="fatRadio">Fat</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bodyType"
                                                    id="mediumBodyRadio" value="Medium">
                                                <label class="form-check-label" for="mediumBodyRadio">Medium</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bodyType"
                                                    id="marriageRadio" value="Slim">
                                                <label class="form-check-label" for="marriageRadio">Slim</label>
                                            </div>

                                        </div>


                                        <!-- Skin Complexion Preferences -->
                                        <div class="preferences-info-block py-lg-4 py-3">

                                            <h5>Skin complextion</h5>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skinComplextion"
                                                    id="extremelyLightRadio" value="Extremely Light">
                                                <label class="form-check-label" for="extremelyLightRadio">Extremely
                                                    Light</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skinComplextion"
                                                    id="fairRadio" value="Fair">
                                                <label class="form-check-label" for="fairRadio">Fair</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skinComplextion"
                                                    id="mediumSkinRadio" value="Medium">
                                                <label class="form-check-label" for="mediumSkinRadio">Medium</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skinComplextion"
                                                    id="naturallyBrownRadio" value="Naturally brown">
                                                <label class="form-check-label" for="naturallyBrownRadio">Naturally
                                                    brown</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skinComplextion"
                                                    id="veryDarkBrownRadio" value="very dark brown/black">
                                                <label class="form-check-label" for="veryDarkBrownRadio">Very dark
                                                    brown/black</label>
                                            </div>

                                        </div>



                                        <input type="hidden" name="action" value="save_user_preferences">
                                        <?php wp_nonce_field('save_user_preferences_nonce', 'save_user_preferences_nonce_field'); ?>

                                        <!-- Form Button Group -->
                                        <div class="form-btn-group">

                                            <button class="btn btn-primary back-btn">Back</button>

                                            <button type="submit" class="btn btn-primary">Next</button>

                                        </div>


                                    </form>

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