<?php
/*
Template Name: Divine meet step3 Page
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
                

                    <!-- Divine Meet Step (Summary) -->
                    <div class="divine-meet-step">

                        <div class="container">

                            <div class="row justify-content-between">

    
                                <div class="col-lg-6 d-flex p-0" id="divien-step-left3">

                                    <!-- Divine Steps Left -->
                                    <?php get_template_part('templates/sections/divine-step-left'); ?>
                                </div>



                                <div class="col-xl-5 col-lg-6 p-0">

                                    <!-- Divine Step Form -->
                                    <div class="divine-steps-form  summary-form ps-xl-0">

                                        <!-- Form Start -->
                                        <form  method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                                    
                                            <!-- Heading -->
                                            <h3>Write a summary about yourself</h3>
                                    
                                            <!-- Textarea for Summary -->
                                            <textarea class="form-control" name="user_summary" id="summaryTextarea" rows="10" placeholder="We suggest you include your real name and not a made up name. Include your interests/hobbies/likes/dislikes. Describe yourself in a way that people see you/how you see yourself. Mention favorite meals/activities." minlength="100" maxlength="5000" required></textarea>
                                    
                                            <!-- Word Limit Information -->
                                            <div class="text-end">
                                                <small class="word-limit text-muted">5000 Words Limit</small>
                                            </div>
                                    
                                            <!-- Summary Note -->
                                            <div class="summary-note text-center">
                                                Please be honest and be descriptive about yourself
                                            </div>

                                            <input type="hidden" name="action" value="save_user_summary_data">
                                    
                                            <!-- Form Button Group -->
                                            <div class="form-btn-group">
                                                
                                                <button class="btn btn-primary back-btn"><a href="/divine-meet-step-2" style="color:#72bd2f; text-decoration: none;">Back</a></button>
                                               
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