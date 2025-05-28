<?php
/*
Template Name: Marital Screening Page
*/
get_header();
?>


<!-- HEADER -->
<header class="light-header">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Mysight logo">
        </a>

    </div>
</header>
<!-- / HEADER -->


<!-- MAIN -->
<main>


    <!-- Screening Process Section -->
    <section class="screening-process">

        <div class="container-fluid">

            <div class="row align-items-end">


                <!-- First Column -->
                <div class="col-lg-6">

                    <!-- Screening Text Wrapper -->
                    <div class="screening-text-wrap">

                        <!-- Background Image -->
                        <div class="screening-text-bg martial-bg"></div>

                        <h1>Divine Insight Made Easy!</h1>

                        <p>Surely the Sovereign LORD does nothing without revealing his plan to his servants the
                            prophets. Amos 3:7</p>

                    </div>

                </div>


                <!-- Second Column -->
                <div class="col-lg-6">

                    <div class="screening-form-wrap">

                        <!-- Cancel-Form Button -->
                        <a href="/" class="cancel-form">
                            <img src="http://mysight.test/wp-content/uploads/2025/05/close.png" alt="close">
                        </a>

                        <!-- Head -->
                        <h2>Screening Process</h2>

                        <!-- Screening Form -->
                        <form class="screening-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="custom_screening_form_submitted" value="1">
                            <!-- Form Head -->
                            <div class="form-head">
                                <h3>Marital Screening</h3>
                                <span class="sub-head">Partner Information</span>
                            </div>


                            <div class="row">


                                <!-- First Name Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="first-name">First Name</label>

                                        <input type="text" class="form-control" id="first-name" name="first-name">

                                    </div>

                                </div>

                                <!-- Last Name Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="last-name">Last Name</label>

                                        <input type="text" class="form-control" id="last-name" name="last-name">

                                    </div>

                                </div>


                            </div>


                            <div class="row">


                                <!-- DOB Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="date-of-birth">Date of Birth</label>

                                        <input type="date" class="form-control" id="date-of-birth" name="date-of-birth">

                                    </div>

                                </div>

                                <!-- Relationship Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="relationship">Relationship</label>

                                        <select class="form-select" id="relationship" name="relationship">
                                            <option value="">&nbsp;</option>
                                            <option value="Fiancée">Fiancée</option>
                                            <option value="Fiancé">Fiancé</option>
                                            <option value="Courtship">Courtship</option>
                                            <option value="Married">Married</option>
                                        </select>

                                    </div>

                                </div>


                            </div>

                            <div class="row">

                                <!-- Gender Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="gender">Gender</label>

                                        <select class="form-select" id="gender" name="gender">
                                            <option value="">&nbsp;</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>

                                    </div>

                                </div>

                                <!-- State-Origin Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="state-origin">State of Origin and LGA</label>

                                        <input type="text" class="form-control" id="state-origin" name="state-origin">

                                    </div>

                                </div>


                            </div>

                            <div class="row">


                                <!-- Maternal-Origin Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="maternal-origin">Maternal State of Origin
                                            (optional)</label>

                                        <input type="text" class="form-control" id="maternal-origin"
                                            name="maternal-origin">

                                    </div>

                                </div>

                                <!-- Paternal-Origin Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="paternal-origin">Paternal State of Origin
                                            (optional)</label>

                                        <input type="text" class="form-control" id="paternal-origin"
                                            name="paternal-origin">

                                    </div>

                                </div>


                            </div>


                            <!-- Photo Upload Field -->
                            <div class="form-group mb-4">

                                <label class="form-label" for="photos">Photos (optional)</label>

                                <!-- Upload File Box -->
                                <div class="upload-file-box" id="uploadBox">

                                    <!-- Box Text -->
                                    <p class="d-flex justify-content-center align-items-center">
                                        <img style="margin-right: 15px;"
                                            src="http://mysight.test/wp-content/uploads/2025/05/upload.png"
                                            alt="upload icon">
                                        <span>Drag and drop or <a href="#" id="chooseFileLink">choose file</a> less than
                                            10MB</span>
                                    </p>

                                    <!-- File Input -->
                                    <input type="file" name="photos[]" class="form-control-file d-none" id="photos"
                                        accept="image/*" multiple>

                                </div>

                                <!-- Uploaded File List -->
                                <ul class="upload-file-list mt-3" id="fileList"></ul>

                            </div>



                            <!-- Questioning Section -->
                            <div class="question-section">

                                <!-- Head -->
                                <h5>I would like to know the following</h5>

                                <!-- Question Container -->
                                <div class="question-container ms-sm-4">



                                    <!-- Type Question Area -->
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0 bg-white"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/minus-img.png"
                                                alt="Type Question"></span>
                                        <textarea name="questions[]" class="form-control ms-2"
                                            placeholder="Type your question here..." maxlength="100"></textarea>

                                    </div>

                                    <!-- Add Question Button -->
                                    <button id="add-question-btn" type="button" class="add-question-btn"><img
                                            class="me-3"
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/plus-img.png"
                                            alt="Add New Question"> Add New Question</button>

                                </div>

                                <!-- Question Limits  -->
                                <div class="question-limit ms-sm-3 mt-3">
                                    <ul class="m-0">
                                        <li>The maximum word count is 100 words per inquiry</li>
                                        <li>Maximum of 7 questions</li>
                                    </ul>
                                </div>

                            </div>

                            <!-- Donate Button -->
                            <button type="submit" class="btn btn-primary">Proceed</button>

                        </form>

                    </div>

                </div>


            </div>

        </div>


    </section>
    <!-- /Screening Process Section -->



</main>
<!-- / MAIN -->

<!--  Toaster Notification -->
<div id="toaster-container" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <!-- Upper Block -->
    <div class="toast-header justify-content-between">
        <strong class="mr-auto">Notification</strong>
        <button type="button" class="btn-close pe-3" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <!-- Message -->
    <div class="toast-body d-flex align-items-center">
        <i class="fa-solid fa-circle-exclamation text-warning me-2"></i> <span>You have reached the maximum number of
            questions.</span>
    </div>
</div>


<?php get_footer(); ?>