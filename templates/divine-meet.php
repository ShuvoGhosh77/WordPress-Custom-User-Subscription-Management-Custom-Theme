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

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart-cross-icon.png"
                                        alt="Divine Icon" class="img-fluid divine-icon">

                                    <h1>Divine Meet</h1>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seed consectrtur diam
                                        quis pellentesque.</p>

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Divine-Meet-couple-img.jpg"
                                        alt="Divine Meet Couple" class="img-fluid couple-img">

                                </div>

                            </div>



                            <div class="col-xl-5 col-lg-6">


                                <!-- DivineMeet Form Wrapper -->
                                <div class="divine-register-right  mt-lg-0 mt-5">


                                    <!-- Form -->
                                   <form class="divinemeet-register-form" method="post" action="">
                                    <input type="hidden" name="dm-form-submitted" value="1">

                                        <div class="row">


                                            <!-- First Name Field -->
                                            <div class="col-md-6">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-first-name">First Name</label>

                                                    <input type="text" class="form-control" id="dm-first-name" name="first_name" required>

                                                </div>

                                            </div>

                                            <!-- Last Name Field -->
                                            <div class="col-md-6">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-last-name">Last Name</label>

                                                    <input type="text" class="form-control" id="dm-last-name" name="last_name" required>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- Gender Field -->
                                            <div class="col-md-12">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-gender">Gender</label>

                                                    <select class="form-select" id="dm-gender" name="gender" required>
                                                        <option value=""></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- First Name Field -->
                                            <div class="col-md-12">

                                                <div class="form-group mb-4">

                                                    <label class="form-label">Birthday</label>

                                                    <div class="row">

                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="DD"
                                                                name="day" required>
                                                        </div>

                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="MM"
                                                                name="month" required>
                                                        </div>

                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="YYYY"
                                                                name="year" required>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- Preferred Mobile Field -->
                                            <div class="col-md-6">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-mobile">Preferred Mobile</label>

                                                    <input type="text" class="form-control" id="dm-mobile" name="mobile" required>

                                                </div>

                                            </div>

                                            <!-- Preferred Whatsapp Field -->
                                            <div class="col-md-6">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-whatsapp">Preferred
                                                        Whatsapp</label>

                                                    <input type="text" class="form-control" id="dm-whatsapp" name="whatsapp" required>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- Preferred Facetime Field -->
                                            <div class="col-md-12">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-facetime">Preferred Facetime
                                                        ID/Number</label>

                                                    <input type="text" class="form-control" id="dm-facetime" name="facetime" required>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- Country Field -->
                                            <div class="col-md-12">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-country">Country</label>

                                                    <select id="dm-country" class="form-select" name="country" required>
                                                        <option value=""></option>
                                                        <option value="" disabled>Select a Country</option>
                                                    </select>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- State Field -->
                                            <div class="col-md-12">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-state">State</label>

                                                    <input type="text" class="form-control" id="dm-state" name="state" required>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">


                                            <!-- City Field -->
                                            <div class="col-md-12">

                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="dm-city">City</label>

                                                    <input type="text" class="form-control" id="dm-city" name="city" required>

                                                </div>

                                            </div>


                                        </div>


                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary w-100">Continue</button>

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