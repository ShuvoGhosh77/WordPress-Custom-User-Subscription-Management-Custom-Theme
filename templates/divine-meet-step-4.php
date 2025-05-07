<?php
/*
Template Name: Divine meet step4 Page
*/
get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>


<!-- / HEADER -->

<!-- MAIN -->
<main>


    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper divine-meet">

        <div class="container">



            <!-- Common Tab-Header -->
            <?php get_template_part('templates/sections/tab-header'); ?>



            <!-- Tab Panel * Divine Step Panel  -->
            <div class="tabs-wrapper--panel  divine-steps-panel p-0">


                <!-- Divine Meet Step (Interest) -->
                <div class="divine-meet-step">

                    <div class="container">

                        <div class="row justify-content-between">


                            <div class="col-lg-6 d-flex p-0" id="divien-step-left4">

                                <!-- Divine Steps Left -->
                                <?php get_template_part('templates/sections/divine-step-left'); ?>

                            </div>



                            <div class="col-xl-5 col-lg-6 p-0">

                                <!-- Divine Steps Form -->
                                <div class="divine-steps-form  interests-form ps-xl-0">

                                    <!--Form-->
                                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">

                                        <h3>Choose a few interests</h3>



                                        <!-- Interest Category Wrapper -->
                                        <div class="interest-category-wrapper">

                                            <!-- Sport and Fitness Interest Category -->
                                            <div class="interest-category pt-4 pb-2 border-bottom">


                                                <!-- Heading -->
                                                <h5>Sport and Fitness</h5>

                                                <!-- Interest Pill Wrapper (Sport Interests) -->
                                                <div class="interest-pill-wrapper pt-2" id="sportInterests">

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Basketball">
                                                        <span class="interest-label">Basketball</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Biking">
                                                        <span class="interest-label">Biking</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Birdwatching">
                                                        <span class="interest-label">Birdwatching</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Bowling">
                                                        <span class="interest-label">Bowling</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Fishing">
                                                        <span class="interest-label">Fishing</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Golf">
                                                        <span class="interest-label">Golf</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Hiking">
                                                        <span class="interest-label">Hiking</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Hunting">
                                                        <span class="interest-label">Hunting</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Hockey">
                                                        <span class="interest-label">Hockey</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]"
                                                            value="Horseback Riding">
                                                        <span class="interest-label">Horseback Riding</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Ice Skating">
                                                        <span class="interest-label">Ice Skating</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Martial Arts">
                                                        <span class="interest-label">Martial Arts</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Pilates">
                                                        <span class="interest-label">Pilates</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Rock Climbing">
                                                        <span class="interest-label">Rock Climbing</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Running">
                                                        <span class="interest-label">Running</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Sailing">
                                                        <span class="interest-label">Sailing</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Skateboarding">
                                                        <span class="interest-label">Skateboarding</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Skiing">
                                                        <span class="interest-label">Skiing</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Snorkeling">
                                                        <span class="interest-label">Snorkeling</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Swimming">
                                                        <span class="interest-label">Swimming</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Snowboarding">
                                                        <span class="interest-label">Snowboarding</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Soccer">
                                                        <span class="interest-label">Soccer</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Surfing">
                                                        <span class="interest-label">Surfing</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Working Out">
                                                        <span class="interest-label">Working Out</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Tennis">
                                                        <span class="interest-label">Tennis</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Volleyball">
                                                        <span class="interest-label">Volleyball</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Weight Training">
                                                        <span class="interest-label">Weight Training</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Scuba Diving">
                                                        <span class="interest-label">Scuba Diving</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="sports_interests[]" value="Training">
                                                        <span class="interest-label">Training</span>
                                                    </label>

                                                </div>

                                            </div>


                                            <!-- Activities Interest Category -->
                                            <div class="interest-category pt-4">


                                                <!-- Heading -->
                                                <h5>Activities</h5>

                                                <!-- Interest Pill Wrapper (Activity Interests) -->
                                                <div class="interest-pill-wrapper pt-2" id="activityInterests">

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Blogging">
                                                        <span class="interest-label">Blogging</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Board Games">
                                                        <span class="interest-label">Board Games</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Boating">
                                                        <span class="interest-label">Boating</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Activism">
                                                        <span class="interest-label">Activism</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Bridge">
                                                        <span class="interest-label">Bridge</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Chess">
                                                        <span class="interest-label">Chess</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Entertaining">
                                                        <span class="interest-label">Entertaining</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Theme Parks">
                                                        <span class="interest-label">Theme Parks</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Gardening">
                                                        <span class="interest-label">Gardening</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]"
                                                            value="Home Improvement">
                                                        <span class="interest-label">Home Improvement</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Meditation">
                                                        <span class="interest-label">Meditation</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]"
                                                            value="Riding Motorcycles">
                                                        <span class="interest-label">Riding Motorcycles</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]"
                                                            value="Painting/Drawing">
                                                        <span class="interest-label">Painting/Drawing</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Photography">
                                                        <span class="interest-label">Photography</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Reading">
                                                        <span class="interest-label">Reading</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]"
                                                            value="Sewing and Crafts">
                                                        <span class="interest-label">Sewing and Crafts</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]" value="Stock Trading">
                                                        <span class="interest-label">Stock Trading</span>
                                                    </label>

                                                    <!-- Intrest -->
                                                    <label class="interest-pill">
                                                        <input type="checkbox" name="activity_interests[]"
                                                            value="Volunteering and Writing">
                                                        <span class="interest-label">Volunteering and Writing</span>
                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                     

                                        <input type="hidden" name="action" value="save_user_interests_data">
                                        <?php wp_nonce_field('save_user_interests_data_nonce', 'save_user_interests_data_nonce_field'); ?>



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