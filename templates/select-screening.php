<?php
/*
Template Name: Select screening Page
*/
get_header();
?>
<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>
<!-- / HEADER -->

<!-- MAIN -->
<main>



    <!-- Select-Screening Section -->
    <section class="select-screening d-flex align-items-center">

        <div class="container">

            <div class="row align-items-center">


                <div class="col-lg-6">

                    <!-- Left Section -->
                    <div class="screening-left">

                        <h1>Select your preferred <span>screening.</span></h1>
                        <p>Choose the screening option that resonates with your needs and desires. Mysight is
                            dedicated to providing you with exceptional service, ensuring your peace of mind and
                            spiritual well-being throughout the screening process. Our team is here to assist you in
                            your journey of personal and spiritual growth.</p>

                        <!-- Learn More Btn -->
                        <a href="/screening-details" class="btn btn-primary w-100">Learn More <i
                                class="fa fa-arrow-right"></i></a>


                        <!-- Divider with Text -->
                        <div class="or-divider"> <span>or</span> </div>

                        <!-- Intro Button -->
                        <a href="#" class="video_lightbox-link" data-bs-toggle="modal" data-bs-target="#video-popup2">
                            <button class="btn btn-primary w-100"><i class="fa fa-play"></i>Quick Intro</button>
                        </a>


                    </div>

                </div>



                <div class="col-lg-6">

                    <!-- Screening Right -->
                    <div class="screening-right">

                        <!-- Heading -->
                        <h2>Select your Preferred <span>Screening.</span></h2>

                        <!-- Slider Main Wrapper -->
                        <div id="carouselExampleIndicators" class="carousel slide">

                            <div class="carousel-inner">

                                <!-- Slide 1 -->
                                <div class="carousel-item active">

                                    <div class="row gy-3">

                                        <div class="col-md-4 col-6">
                                            <!-- General Screening-->
                                            <div class="screening-box" data-page="/general-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/general-screening.png"
                                                    class="img-fluid" alt="General Screening">
                                                <h5>General Screening</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Employment Screening-->
                                            <div class="screening-box" data-page="/employment-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/employment-screening.png"
                                                    class="img-fluid" alt="Employment Screening">
                                                <h5>Employment Screening</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Matial Screening-->
                                            <div class="screening-box" data-page="/marital-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/marital-screening.png"
                                                    class="img-fluid" alt="Marital Screening">
                                                <h5>Marital Screening</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Ministerial Screening-->
                                            <div class="screening-box" data-page="/ministerial-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ministerial-screening.png"
                                                    class="img-fluid" alt="Ministerial Screening">
                                                <h5>Ministerial Screening</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- House/Home Screening-->
                                            <div class="screening-box" data-page="/home-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/house-home-screening.png"
                                                    class="img-fluid" alt="Home Screening">
                                                <h5>Home Screening</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- God-Will Screening-->
                                            <div class="screening-box" data-page="/godswill-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/god-will-screening.png"
                                                    class="img-fluid" alt="God's Will">
                                                <h5>God's Will</h5>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- Slide 2 -->
                                <div class="carousel-item">

                                    <div class="row gy-3">

                                        <div class="col-md-4 col-6">
                                            <!-- Request-pray Screening-->
                                            <div class="screening-box" data-page="/request-pray-screening">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/request-pray-screening.png"
                                                    class="img-fluid" alt="Request For Prayer">
                                                <h5>Request For Prayer</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Request-pray Screening-->
                                            <div class="screening-box" data-page="/prayer-wall">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prayer-wall-screening-icon.png"
                                                    class="img-fluid" alt="Prayer Wall">
                                                <h5>Prayer Wall</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Request-pray Screening-->
                                            <div class="screening-box" data-page="/testimonies">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonies-screening-icon.png"
                                                    class="img-fluid" alt="Testimonies">
                                                <h5>Testimonies</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Request-pray Screening-->
                                            <div class="screening-box" data-page="/prayer-room">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prayer-room-screening-icon.png"
                                                    class="img-fluid" alt="Prayer Room">
                                                <h5>Prayer Room</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <!-- Request-pray Screening-->
                                            <div class="screening-box" data-page="/divine-meet">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/divine-meet-screening-icon.png"
                                                    class="img-fluid" alt="Divine Meet">
                                                <h5>Divine Meet</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Slider Control Dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <button class="btn btn-primary w-100" id="next-button">
                            Next <i class="fa fa-arrow-right ms-2"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Select-Screening Section -->






    <!-- Report Bug or Request Feature Pop-up -->

    <div class="popup-container">

        <button type="button" id="popupToggle" class="btn btn-primary plus-icon">
            <img src="/wp-content/uploads/2025/06/plus.png" alt="add-icon">
        </button>


        <div class="report-bug-box" id="popupBox">

            <button type="button" id="popupClose" class="popup-close"><img src="/wp-content/uploads/2025/05/close.png"
                    alt="add-icon"></button>

            <!-- Form -->
            <form>

                <!-- Title -->

                <h1>Report a bug or request a feature</h1>

                <div class="form-group d-flex align-items-center mb-3">
                    <label for="bugfeature" class="form-label w-50">I would like to</label>
                    <select class="form-select" id="bugfeature">
                        <option value="">Select an option</option>
                        <option value="1">Report a bug</option>
                        <option value="2">Request a feature</option>
                    </select>
                </div>

                <!-- Bug Title Input -->
                <div class="form-group mb-3">
                    <label for="bugTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="bugTitle" placeholder="Enter a Title" required>
                </div>

                <!-- Bug Description Textarea -->
                <div class="form-group">
                    <label for="bugDescription" class="form-label">Description</label>
                    <textarea id="bugDescription" class="form-control" rows="3"
                        placeholder="Enter a Description"></textarea>
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>


            </form>

        </div>


    </div>



    <!-- ===========
    # MODAL 
==============-->

    <!-- Video Popup Modal -->
    <div class="modal fade" id="video-popup2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content rounded-0">
                    <div class="modal-body">
                        <div class="embed-responsive">
                            <iframe src="https://www.youtube.com/embed/mLwlGsRhNIU" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
<!-- / MAIN -->
<?php get_footer(); ?>