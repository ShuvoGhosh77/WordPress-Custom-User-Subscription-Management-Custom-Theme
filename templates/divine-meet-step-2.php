<?php
/*
Template Name: Divine meet step2 Page
*/
get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>


<!-- / HEADER -->

<!-- MAIN -->
<main>


    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper divine-meet overflow-hidden">

        <div class="container">



            <!-- Common Tab-Header -->
            <?php get_template_part('templates/sections/tab-header'); ?>




            <!-- Tab Panel * Divine Step Panel-->
            <div class="tabs-wrapper--panel  divine-steps-panel p-0">


                <!-- Divine Meet Step (Details) -->
                <div class="divine-meet-step">

                    <div class="container">

                        <div class="row justify-content-between">


                            <div class="col-lg-6 d-flex p-0" id="divien-step-left2">

                                <!-- Divine Steps Left -->
                                <?php get_template_part('templates/sections/divine-step-left'); ?>

                            </div>



                            <div class="col-xl-5 col-lg-6 p-0">

                                <!-- Divine Steps Form -->
                                <div class="divine-steps-form details-form ps-xl-0">

                                    <!-- Form Start -->
                                    <form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">

                                        <!-- Heading -->
                                        <h3 class="text-start">Tell us About Yourself</h3>

                                        <!-- Height Field -->
                                        <div class="detail-info-block pb-lg-4 pb-3 border-bottom">

                                            <h5>Height</h5>

                                            <!-- Slider Wrapper -->
                                            <div class="slider-wrapper">

                                                <div class="d-flex justify-content-between">
                                                    <label class="slider-label">5</label>
                                                    <label class="slider-label">6`5</label>
                                                </div>

                                                <!-- Height Slider Input -->
                                                <input class="input-range" type="text" data-slider-min="5"
                                                    data-slider-tooltip="always" data-slider-max="6.416"
                                                    data-slider-step="0.083333333" name="height" />

                                                <div class="d-flex justify-content-between">
                                                    <label class="slider-label">Very Short</label>
                                                    <label class="slider-label">Very Tall</label>
                                                </div>

                                            </div>

                                        </div>


                                        <!-- Marital Status -->
                                        <div class="detail-info-block py-sm-4 py-3 border-bottom">

                                            <h5>Marital Status</h5>

                                            <!-- Form Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="maritalStatus"
                                                    id="divorcedRadio" value="divorced">
                                                <label class="form-check-label" for="divorcedRadio">Divorced</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="maritalStatus"
                                                    id="widowedRadio" value="widowed">
                                                <label class="form-check-label" for="widowedRadio">Widowed</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="maritalStatus"
                                                    id="neverMarriedRadio" value="neverMarried">
                                                <label class="form-check-label" for="neverMarriedRadio">Never
                                                    Married</label>
                                            </div>

                                        </div>


                                        <!-- Relationship Type -->
                                        <div class="detail-info-block py-sm-4 py-3 border-bottom">

                                            <h5>Relationship type</h5>

                                            <!-- Form Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="relationshipType"
                                                    id="committedRadio" value="committed">
                                                <label class="form-check-label" for="committedRadio">Commited
                                                    Relationship</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="relationshipType"
                                                    id="marriageRadio" value="marriage">
                                                <label class="form-check-label" for="marriageRadio">Marriage</label>
                                            </div>

                                        </div>


                                        <!-- Drinking Habit -->
                                        <div class="detail-info-block py-sm-4 py-3 border-bottom">

                                            <h5>Drinking Habit</h5>

                                            <!-- Form Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="drinkingHabit"
                                                    id="socialDrinkerRadio" value="socialDrinker">
                                                <label class="form-check-label" for="socialDrinkerRadio">Social Drinker
                                                    (a person who drinks on an occasional basis)</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="drinkingHabit"
                                                    id="nonDrinkerRadio" value="nonDrinker">
                                                <label class="form-check-label" for="nonDrinkerRadio">No, I don’t take
                                                    alcohol</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="drinkingHabit"
                                                    id="undisclosedDrinkerRadio" value="undisclosedDrinker">
                                                <label class="form-check-label"
                                                    for="undisclosedDrinkerRadio">Undisclosed</label>
                                            </div>

                                        </div>


                                        <!-- Smoking Habit -->
                                        <div class="detail-info-block py-sm-4 py-3">

                                            <h5>Smoking Habit</h5>

                                            <!-- Form Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="smokingHabit"
                                                    id="socialSmokerRadio" value="socialSmoker">
                                                <label class="form-check-label" for="socialSmokerRadio">Social Smoker
                                                    (who only smoke in specific settings)</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="smokingHabit"
                                                    id="nonSmokerRadio" value="nonSmoker">
                                                <label class="form-check-label" for="nonSmokerRadio">No, I don’t
                                                    Smoke</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="smokingHabit"
                                                    id="undisclosedSmokerRadio" value="undisclosedSmoker">
                                                <label class="form-check-label"
                                                    for="undisclosedSmokerRadio">Undisclosed</label>
                                            </div>

                                        </div>

                                        <input type="hidden" name="action" value="save_custom_user_profile_data">
                                        <?php wp_nonce_field('save_user_data_nonce_action', 'save_user_data_nonce'); ?>

                                        <!-- Form Button Group -->
                                        <div class="form-btn-group">

                                            <button class="btn btn-primary back-btn">Back</button>

                                            <button type="submit" class="btn btn-primary">Next</button>

                                        </div>

                                    </form>
                                    <!-- Form End -->

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