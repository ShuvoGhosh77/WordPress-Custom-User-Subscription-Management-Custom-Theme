<?php
/*
Template Name: Prayer Wall Page
*/

get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>


<!-- MAIN -->
<main>


    <!-- Tabs Wrapper  -->
    <section class="tabs-wrapper prayerwall">

        <div class="container">



            <!-- Common Tab-Header -->
            <?php get_template_part('templates/sections/tab-header'); ?>




            <?php  echo do_shortcode('[prayer_wall]') ?>
            




        </div>

    </section>
    <!-- /Section -->






    <!--------------------
         MODALS ~ PopUp
      --------------------->

    <!-- Add Prayer Request ~ Popup -->
    <div class="add-request-modal modal fade" id="prayerRequestModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="addPrayerRequest" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <!-- Add Prayer Request Form -->
                <form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">
                    <input type="hidden" name="action" value="submit_prayer_request">
                    <!-- Close Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <!-- Title -->
                    <h2 class="mb-sm-3 mb-2">Your Prayer Request</h2>

                    <!-- Prayer Request TextArea -->
                    <textarea class="form-control"  name="prayer_content"  id="yourPrayerRequest" rows="10" maxlength="750"
                        placeholder="Your Prayer Request..." required></textarea>

                    <!-- Word Limit -->
                    <div class="text-end">
                        <small class="word-limit text-muted">750 Words Limit</small>
                    </div>


                    <!-- Priority Block -->
                    <div class="priority-block mt-sm-4 mt-3">

                        <!-- Priority Title -->
                        <h3 class="mb-sm-4 mb-3">Priority</h3>

                        <!-- Priority Options -->
                        <div class="d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="request_priority" value="Normal" id="normalRequest"
                                    checked>
                                <label class="form-check-label text-dark" for="normalRequest">Normal</label>
                            </div>
                            <div class="form-check ms-sm-4 ms-3">
                                <input class="form-check-input" type="radio" name="request_priority" value="Urgent" id="urgentRequest">
                                <label class="form-check-label text-dark" for="urgentRequest">Urgent</label>
                            </div>
                        </div>

                        <!-- Additional Options -->
                        <div class="d-flex align-items-center mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="anonymous" value="1" id="anonymousPost">
                                <label class="form-check-label text-dark" for="anonymousPost">Anonymous post</label>
                            </div>
                            <div class="form-check ms-sm-4 ms-3">
                                <input class="form-check-input" type="checkbox" name="allow_comment" value="1" id="allowComment">
                                <label class="form-check-label text-dark" for="allowComment">Allow comments</label>
                            </div>
                        </div>

                        <!-- Group Contact Option -->
                        <div class="d-flex align-items-center mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="group_contact" value="1" id="groupContact">
                                <label class="form-check-label text-dark" for="groupContact">Would you like to be
                                    contacted by a group leader?</label>
                            </div>
                        </div>

                    </div>


                    <!-- Modal Footer -->
                    <div class="modal-footer p-0 border-0 d-flex align-items-center justify-content-between">
                        <div>
                            <p>In case of an emergency please contact the <a href="support.html">support team</a> to
                                help.</p>
                        </div>
                        <div class="mt-lg-0 mt-3">
                            <?php wp_nonce_field('submit_prayer_request_nonce', 'prayer_request_nonce'); ?>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary" data-bs-target="#thankYouModal"
                                data-bs-toggle="modal">Submit Request</button>
                        </div>
                    </div>


                </form>

            </div>

        </div>

    </div>







    <!-- Thank You Modal -->
    <div class="prayer-submitted-modal modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content text-center">

                <!-- Close Btn -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <!-- Check Icon -->
                <div class="check-icon">
                    <i class="fa fa-check-circle"></i>
                </div>

                <h2>Thank you</h2>

                <p>Your Prayer Request has been submitted!</p>

                <!-- Dismiss Popup -->
                <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Done</button>

            </div>

        </div>

    </div>









</main>



<?php get_footer(); ?>