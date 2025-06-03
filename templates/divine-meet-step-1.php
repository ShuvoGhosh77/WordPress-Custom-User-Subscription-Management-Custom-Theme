<?php
/*
Template Name: Divine meet step1 Page
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



            <!-- Tab Panel * Divine Step Panel -->
            <div class="tabs-wrapper--panel  divine-steps-panel p-0">


                <!-- Divine Meet Step (Upload Photo) -->
                <div class="divine-meet-step">

                    <div class="container">

                        <div class="row">


                            <div class="col-lg-6 d-flex p-0" id="divien-step-left1">

                                <!-- Divine Step Left -->
                                <?php get_template_part('templates/sections/divine-step-left'); ?>


                            </div>



                            <div class="col-lg-6 p-0">

                                <!-- Divine Steps Form -->
                                <div class="divine-steps-form">

                                    <!-- Form Start -->
                                    <form id="mediaUploadForm" enctype="multipart/form-data" method="POST">

                                        <!-- Heading -->
                                        <h3>Upload Your Photos</h3>


                                        <div class="row">

                                            <!-- Column 1 -->
                                            <div class="col-md-6">

                                                <!-- Main Photo Upload Field -->
                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="photos">Main Photo</label>

                                                    <!-- Upload File Box -->
                                                    <div class="upload-file-box" id="uploadBox">

                                                        <div class="upload-icon">
                                                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                                        </div>

                                                        <p>Drag and drop a file less than 10MB</p>

                                                        <a href="#" class="btn btn-primary" id="chooseFileLink">Or
                                                            Select file</a>

                                                        <!-- File Input -->
                                                        <input type="file" name="main_photo"
                                                            class="form-control-file d-none" id="photos"
                                                            accept="image/*" required>


                                                    </div>

                                                    <!-- Uploaded File List -->
                                                    <ul class="upload-file-list mt-3" id="fileList"></ul>

                                                </div>

                                            </div>

                                            <!-- Column 2 -->
                                            <div class="col-md-6">

                                                <!-- Short Video Upload Field -->
                                                <div class="form-group mb-4">

                                                    <label class="form-label" for="photos2">Short Video of yourself

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#QualityVideoModal">
                                                            <i class="fa fa-circle-info"></i>
                                                        </button>

                                                    </label>

                                                    <!-- Upload File Box -->
                                                    <div class="upload-file-box" id="uploadBox2">

                                                        <div class="upload-icon">
                                                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                                        </div>

                                                        <p>Drag and drop files less than 10MB</p>

                                                        <a href="#" class="btn btn-primary" id="chooseFileLink2">Or
                                                            Select file</a>

                                                        <!-- File Input -->
                                                        <input type="file" name="short_video"
                                                            class="form-control-file d-none" id="photos2"
                                                            accept="video/*,image/*" required>

                                                    </div>

                                                    <!-- Uploaded File List -->
                                                    <ul class="upload-file-list mt-3" id="fileList2"></ul>

                                                </div>

                                            </div>

                                        </div>


                                        <!-- Upload Instruction List -->
                                        <ul class="upload-instruction m-0">
                                            <li>You must upload at least 1 photo of yourself</li>
                                            <li>Choose clear photos where everybody can see your face</li>
                                            <li>Photos need to be at least 375 x 375px</li>
                                            <li>No suggestive, offensive or copyrighted photos.</li>
                                            <li>All Pictures will be verified for identity confirmation.</li>
                                        </ul>

                                        <!-- Data Protection Note -->
                                        <p class="data-protection-note">
                                            We ensure that personal data are well protected and wouldn’t be
                                            disclosed or sold to third party.
                                        </p>
                                        <input type="hidden" name="user_media_upload" value="1">

                                        <!-- Error Message -->
                                        <div id="uploadError" class="text-danger mb-3" style="display: none;"></div>

                                        <!-- Form Button Group -->
                                        <div class="form-btn-group">
                                            <button class="btn btn-primary back-btn"><a href="/divine-meet" style="color:#72bd2f; text-decoration: none;">Back</a></button>
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

<!-- Produce Quality Video Modal -->
<div class="quality-video-popup  modal fade" id="QualityVideoModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <h1>How to produce Hight-Quality Video for Divine Meet</h1>


            <ol class="quality-instruction">
                <li>
                    <h5>Camera Position</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                </li>
                <li>
                    <h5>Camera Position</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </li>
                <li>
                    <h5>Background</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                </li>
                <li>
                    <h5>Dressing</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun.</p>
                </li>
                <li>
                    <h5>Audiablity</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do incididunt ut labore et dolore
                        magna aliqu ipsum dolor sit amet, consectetur elit.</p>
                </li>
            </ol>


        </div>

    </div>

</div>


<?php get_footer(); ?>