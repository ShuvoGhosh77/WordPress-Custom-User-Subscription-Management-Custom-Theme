<?php
/*
Template Name: Testimonies Page
*/

get_header();
?>

<!-- HEADER -->
<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>

<!-- MAIN -->
<main>




    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper testimonies">

        <div class="container">


            <!-- Common Tab-Header -->
            <?php get_template_part('templates/sections/tab-header'); ?>




            <!-- Tab Panel * Testimonies  -->
            <?php echo do_shortcode('[testimonies]') ?>




        </div>

    </section>
    <!-- /Section -->







    <!--------------------
         MODALS ~ PopUp
      --------------------->

    <!-- Add Testimony ~ Popup -->
    <div class="add-testimony-modal modal fade" id="addTestimonyModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="addPrayerRequest" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <?php if (is_user_logged_in()): ?>
                    <!-- form -->
                    <form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">
                        <input type="hidden" name="action" value="submit_testimonies_request">

                        <!-- Close Button -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <h2 class="mb-sm-3 mb-2">Add Your Testimony</h2>

                        <!-- Add Request TextArea -->
                        <textarea class="form-control" name="testimonies_content" id="yourTestimony" rows="10"
                            maxlength="750" placeholder="Your Testimony..." required></textarea>

                        <div class="text-end">
                            <small class="word-limit text-muted">750 Words Limit</small>
                        </div>


                        <!-- Priority Block -->
                        <div class="priority-block mt-sm-4 mt-3">

                            <h3 class="mb-sm-4 mb-3">Priority</h3>

                            <div class="d-flex align-items-center">

                                <div class="form-check">
                                    <input class="form-check-input" name="testimonies_anonymous" type="checkbox" value="1"
                                        id="anonymousPost">
                                    <label class="form-check-label text-dark" for="anonymousPost">
                                        Anonymous post
                                    </label>
                                </div>

                            </div>


                        </div>


                        <div class="modal-footer p-0 border-0 d-flex align-items-center justify-content-between">

                            <div>
                                <p>In case of an emergency please contact the <a href="/support">support team</a> to
                                    help.</p>
                            </div>

                            <div class="mt-lg-0 mt-3">
                                <?php wp_nonce_field('submit_testimonies_request_nonce', 'testimonies_request_nonce'); ?>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary" data-bs-target="#testimonyThankYouModal"
                                    data-bs-toggle="modal">Submit Testimony</button>
                            </div>

                        </div>


                    </form>

                <?php else: ?>
                    <p>You must be <span><a href="/login">logged in</a></span> to submit a testimony.</p>
                <?php endif; ?>


            </div>

        </div>

    </div>



    <!-- Thank You Modal -->
    <div class="testimony-submitted-modal modal fade" id="testimonyThankYouModal" tabindex="-1"
        aria-labelledby="testimonyThankYouModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content text-center">

                <!-- Close Btn -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <!-- Check Icon -->
                <div class="check-icon">
                    <i class="fa fa-check-circle"></i>
                </div>

                <h2>Thank you</h2>

                <p>Your Testimony has been submitted!</p>

                <!-- Dismiss Popup -->
                <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Done</button>

            </div>

        </div>

    </div>







</main>



<?php get_footer(); ?>