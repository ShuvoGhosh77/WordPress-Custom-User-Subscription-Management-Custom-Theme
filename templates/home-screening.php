<?php
/*
Template Name: Home Screening Page
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
                        <div class="screening-text-bg home-bg"></div>

                        <h1>Divine Insight Made Easy!</h1>

                        <p>Where there is no revelation, people cast off restraint; but blessed is the one who heeds
                            wisdom’s instruction. Proverbs 29:18</p>

                    </div>

                </div>


                <!-- Second Column -->
                <div class="col-lg-6">

                    <div class="screening-form-wrap">

                        <!-- Cancel-Form Button -->
                        <a href="/" class="cancel-form">
                            <img src="/wp-content/uploads/2025/05/close.png" alt="close">
                        </a>

                        <!-- Head -->
                        <h2>Screening Process</h2>

                        <!-- Screening Form -->
                        <form class="screening-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="custom_screening_form_submitted2" value="1">
                            <!-- Form Head -->
                            <div class="form-head">
                                <h3>Employment Screening</h3>
                                <span class="sub-head">Employee Information</span>
                            </div>


                            <div class="row">


                                <!-- First Name Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-first-name">First Name</label>

                                        <input type="text" class="form-control" id="home-first-name"
                                            name="home-first-name" required>

                                    </div>

                                </div>

                                <!-- Last Name Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-last-name">Last Name</label>

                                        <input type="text" class="form-control" id="home-last-name"
                                            name="home-last-name" required>

                                    </div>

                                </div>


                            </div>


                            <div class="row">


                                <!-- DOB Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-date-of-birth">Date of Birth</label>

                                        <input type="date" class="form-control" id="home-date-of-birth"
                                            name="home-date-of-birth" required>

                                    </div>

                                </div>

                                <!-- Relationship Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-Ownership">Ownership</label>

                                        <select class="form-select" id="home-Ownership" name="home-Ownership" required>
                                            <option value="">&nbsp;</option>
                                            <option value="Sole Ownership">Sole Ownership</option>
                                            <option value="Joint Tenancy With Right of Survivorship">Joint Tenancy With Right of Survivorship</option>
                                            <option value="Trust Ownership">Trust Ownership</option>
                                            <option value="Tenancy in Common">Tenancy in Common</option>
                                            <option value="Community Property">Community Property</option>
                                            <option value="Partnership Owners">Partnership Owners</option>
                                        </select>

                                    </div>

                                </div>


                            </div>

                            <div class="row">

                                <!-- Gender Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-gender">Gender</label>

                                        <select class="form-select" id="home-gender" name="home-gender" required>
                                            <option value="">&nbsp;</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>

                                    </div>

                                </div>

                                <!-- State-Origin Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-state-origin">State of Origin and
                                            LGA</label>

                                        <input type="text" class="form-control" id="home-state-origin"
                                            name="home-state-origin" required>

                                    </div>

                                </div>


                            </div>

                            <div class="row">


                                <!-- Maternal-Origin Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-maternal-origin">Maternal State of Origin
                                            (optional)</label>

                                        <input type="text" class="form-control" id="home-maternal-origin"
                                            name="home-maternal-origin">

                                    </div>

                                </div>

                                <!-- Paternal-Origin Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="home-paternal-origin">Paternal State of Origin
                                            (optional)</label>

                                        <input type="text" class="form-control" id="home-paternal-origin"
                                            name="home-paternal-origin">

                                    </div>

                                </div>


                            </div>

                            <div class="border-top my-3 pb-2"></div>


                            <div class="row">


                                <!-- Form Head -->
                                <div class="form-head mb-3">
                                    <h3>House Address <span>(Optional)</span></h3>
                                </div>

                                <!-- Address Field -->
                                <div class="col-md-12">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="house-address">Address</label>

                                        <input type="text" class="form-control" id="house-address" name="house-address"
                                            placeholder="Type full address">

                                    </div>

                                </div>


                            </div>

                            <div class="row">


                                <!-- City Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="city">City</label>

                                        <input type="text" class="form-control" id="city" name="city">

                                    </div>

                                </div>


                                <!-- landmark Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="landmark">Landmark</label>

                                        <input type="text" class="form-control" id="landmark" name="landmark">

                                    </div>

                                </div>


                            </div>

                            <div class="row">


                                <!-- State Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="state">State</label>

                                        <select class="form-select" id="state" name="State">
                                            <option value="">&nbsp;</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Kano">Kano</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Katsina">Katsina</option>
                                            <option value="Oyo">Oyo</option>
                                            <option value="Rivers">Rivers</option>
                                            <option value="Bauchi">Bauchi</option>
                                            <option value="Jigawa">Jigawa</option>
                                            <option value="Benue">Benue</option>
                                            <option value="Anambra">Anambra</option>
                                        </select>
                                    </div>

                                </div>


                                <!-- LGA Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="LGA">LGA</label>

                                        <select class="form-select" id="LGA" name="LGA">
                                            <option value="">&nbsp;</option>
                                            <option value="Alimosho LGA">Alimosho LGA</option>
                                            <option value="Abuja Municipal LGA">Abuja Municipal LGA </option>
                                            <option value="Abuja Municipal LGA">Abuja Municipal LGA </option>
                                            <option value="Port Harcourt LGA">Port Harcourt LGA </option>
                                            <option value="Surulere LGA">Surulere LGA</option>
                                            <option value="Asokoro LGA">Asokoro LGA</option>
                                            <option value="Asokoro LGA">Asokoro LGA</option>
                                            <option value="Kaduna North LGA">Kaduna North LGA</option>
                                        </select>
                                    </div>

                                </div>


                            </div>



                            <div class="row">


                                <!-- House-Front-Photo Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="photos">Front House Photo</label>

                                        <!-- Upload File Box -->
                                        <div class="upload-file-box" id="uploadBox">

                                            <!-- Box Text -->
                                            <p class="d-flex justify-content-center align-items-center">
                                                <i class="fs-3 fa-solid fa-arrow-up-from-bracket me-2"></i>
                                                <span>Drag and drop or <a href="#" id="chooseFileLink">choose file</a>
                                                    less than 10MB</span>
                                            </p>

                                            <!-- File Input -->

                                            <input type="file" name="home-photos1[]" class="form-control-file d-none"
                                                id="photos" accept="image/*" multiple>

                                        </div>

                                        <div class="form-text pt-2">
                                            <i class="fa-solid fa-circle-info"></i> Upload front house pictures
                                        </div>

                                        <!-- Uploaded File List -->
                                        <ul class="upload-file-list mt-3" id="fileList"></ul>

                                    </div>

                                </div>


                                <!-- House-Back-Photo Field -->
                                <div class="col-md-6">

                                    <div class="form-group mb-4">

                                        <label class="form-label" for="photos2">Back House Photo</label>

                                        <!-- Upload File Box -->
                                        <div class="upload-file-box" id="uploadBox2">

                                            <!-- Box Text -->
                                            <p class="d-flex justify-content-center align-items-center">
                                                <i class="fs-3 fa-solid fa-arrow-up-from-bracket me-2"></i>
                                                <span>Drag and drop or <a href="#" id="chooseFileLink2">choose file</a>
                                                    less than 10MB</span>
                                            </p>

                                            <!-- File Input -->                    
                                            
                                            <input type="file" name="home-photos2[]" class="form-control-file d-none"
                                                id="photos2" accept="image/*" multiple>

                                        </div>

                                        <div class="form-text pt-2">
                                            <i class="fa-solid fa-circle-info"></i> Upload back house pictures
                                        </div>


                                        <!-- Uploaded File List -->
                                        <ul class="upload-file-list mt-3" id="fileList2"></ul>

                                    </div>

                                </div>


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