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
            <div class="tabs-wrapper--panel testimonies-panel">


                <!-- Panel Controls -->
                <div class="panel-controls">

                    <div class="row justify-content-between">


                        <div class="col-auto">

                            <!-- Filter Wrapper -->
                            <div class="filter-wrapper">

                                <!-- Button -->
                                <button class="btn btn-secondary" id="filterButton">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter-icon.png" alt="Filter Icon">
                                    <span>Filter</span>
                                    <span class="filter-count">0</span>
                                </button>

                                <!-- Filter Dropdown -->
                                <div class="filter-wrapper--dropdown">

                                    <!-- Close button -->
                                    <button class="close-btn">
                                        <i class="fa fa-times"></i>
                                    </button>

                                    <!-- Filter list -->
                                    <ul class="list-unstyled p-0 m-0">

                                        <li class="mb-3">
                                            <label>
                                                <input type="checkbox" class="form-check-input filter-checkbox"
                                                    value="Most Recent">
                                                <span>Most Recent</span>
                                            </label>
                                        </li>

                                        <li class="mb-3">
                                            <label>
                                                <input type="checkbox" class="form-check-input filter-checkbox"
                                                    value="This Week">
                                                <span>This Week</span>
                                            </label>
                                        </li>

                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input filter-checkbox"
                                                    value="This Month">
                                                <span>This Month</span>
                                            </label>
                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>


                        <div class="col-md  order-md-2 order-3">

                            <!-- Search Form -->
                            <form>

                                <!-- Search Bar -->
                                <div class="search-bar input-group mt-md-0 mt-3">

                                    <span class="input-group-text bg-white" id="searchbar"><i
                                            class="fa-solid fa-magnifying-glass"></i></span>

                                    <input type="text" class="form-control" placeholder="Search"
                                        aria-describedby="searchbar">

                                </div>

                            </form>

                        </div>


                        <div class="col-auto  order-md-3 order-2">

                            <!-- Add Prayer Button -->
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonyModal">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plus-icon.png" alt="Add Testimony">Add Testimony
                            </button>

                        </div>


                    </div>

                </div>



                <!-- Testimonies Card Wrapper -->
                <div class="testimony-cards-wrapper">

                    <!-- Header -->
                    <div class="testimony-header  text-center mx-auto">
                        <h1>God is good All the time</h1>
                        <p>They will give a testimony of Your great goodness and will joyfully sing of Your
                            righteousness Psalms 145:7</p>
                    </div>


                    <div class="row masonry-grid">


                        <div class="col-lg-4 ">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Matt Lewis</h5>
                                        <div class="user-id">@mattlewis001</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4 ">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-woman.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Aria kyle</h5>
                                        <div class="user-id">@kylearia</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam.incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. incididunt ut
                                    labore et dolore magna aliqua. incididunt ut labore et dolore magna aliqua.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4 ">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Jordan huges</h5>
                                        <div class="user-id">@designerhuges</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                    Incididunt .
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-woman.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Durga</h5>
                                        <div class="user-id">@durga001</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam.incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. incididunt ut
                                    labore et dolore magna aliqua.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Shawn morgan</h5>
                                        <div class="user-id">@mmorgan</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-woman.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Sheena gates</h5>
                                        <div class="user-id">@gates1960</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                    Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-woman.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>Emma wastson</h5>
                                        <div class="user-id">@emma1990</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a ery good services, the
                                    services are incididunt ut Very nice services by lorem ipsum dolor sit emit is a ery
                                    good services, the services are incididunt ut labore et dolore magna aliqua. Ut enim
                                    ad minim.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>David kohli</h5>
                                        <div class="user-id">@vkohli</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-4">

                            <!-- Testimony Card -->
                            <div class="testimony-card">

                                <!-- User -->
                                <div class="testimony-card--user">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user-man.png" alt="User Image" class="img-fluid">
                                    <!-- User-Info -->
                                    <div class="user-info">
                                        <h5>David redcliff</h5>
                                        <div class="user-id">@davidrc</div>
                                    </div>
                                </div>

                                <!-- Testimony Text -->
                                <p class="testimony-text">
                                    Very nice services by lorem ipsum dolor sit emit is a very good services, the
                                    services are labore et dolore magna aliqua. Ut enim ad minim veniam.incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat. incididunt ut labore et dolore
                                    magna aliqua. incididunt ut labore et dolore magna aliqua.
                                </p>

                                <!-- Date & Time -->
                                <div class="date-time-block">
                                    <span class="date">23 April</span> • <span class="time">8:13 PM</span>
                                </div>

                            </div>

                        </div>




                    </div>

                </div>


            </div>




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

                <!-- form -->
                <form>

                    <!-- Close Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <h2 class="mb-sm-3 mb-2">Add Your Testimony</h2>

                    <!-- Add Request TextArea -->
                    <textarea class="form-control" id="yourTestimony" rows="10" maxlength="750"
                        placeholder="Your Testimony..." required></textarea>

                    <div class="text-end">
                        <small class="word-limit text-muted">750 Words Limit</small>
                    </div>


                    <!-- Priority Block -->
                    <div class="priority-block mt-sm-4 mt-3">

                        <h3 class="mb-sm-4 mb-3">Priority</h3>

                        <div class="d-flex align-items-center">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="anonymousPost">
                                <label class="form-check-label text-dark" for="anonymousPost">
                                    Anonymous post
                                </label>
                            </div>

                        </div>


                    </div>


                    <div class="modal-footer p-0 border-0 d-flex align-items-center justify-content-between">

                        <div>
                            <p>In case of an emergency please contact the <a href="support.html">support team</a> to
                                help.</p>
                        </div>

                        <div class="mt-lg-0 mt-3">
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary" data-bs-target="#testimonyThankYouModal"
                                data-bs-toggle="modal">Submit Testimony</button>
                        </div>

                    </div>


                </form>


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