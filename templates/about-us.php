<?php
/*
Template Name: About Page
*/
get_header();
?>

 <!-- HEADER -->
 <header>


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" style="padding: 0;">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="<?php echo home_url(); ?>" class="navbar-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
        </a>

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span>
                <i class="fa fa-bars"></i>
            </span>
        </button>

        <!-- Navbar Collapsible Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav pt-lg-0 pt-3 ms-auto">
                <!-- Account Settings -->
                <li class="nav-item">
                    <a class="nav-link" href="account-setting.html">Account Settings</a>
                </li>

                <!-- Donation Plan -->
                <li class="nav-item">
                    <a class="nav-link" href="donation-plan.html">Donation Plan</a>
                </li>

                <!-- Invoice -->
                <li class="nav-item">
                    <a class="nav-link active" href="about-us.html">About Us</a>
                </li>

                <!-- Support -->
                <li class="nav-item">
                    <a class="nav-link" href="support.html">Support</a>
                </li>

                <!-- Sign out -->
                <li class="nav-item">
                    <a class=" nav-link" href="#">Sign out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

</header>
<!-- / HEADER -->
 <!-- MAIN -->
 <main>


<div class="container-fluid">


    <!-- Mission Section -->
    <section class="mission-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h1 class="display-5">Our Mission</h1>
                </div>
                <div class="col-lg-7 pt-lg-0 pt-5">
                    <p class="main-para">Empowered by the Holy Spirit and entrusted with the great commission by Christ Jesus,
                        our mission is to make disciples of all nations. We are dedicated to sharing the
                        uncompromising message of salvation and demonstrating God's love through a
                        comprehensive approach that addresses the diverse needs of humanity, ultimately
                        leading to the attainment of eternal life.</p>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <p class="pb-lg-0 pb-3">Lorem ipsum dolor sit amet, consectetur dipg elit, sed do eiusmod tempor incididunt ut ore et dolore magna aliqua. Ut enim ad minim. magna aliqua. Ut enim ad minim.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Lorem ipsum dolor sit amet, adipien elit, sed do eiusmod tempor incidut labore et dolore magna aliqua. Ut enim ad minim. magna aliqua. Ut enim ad minim.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- /Mission Section -->

</div>



<!-- Video Section -->
<section class="video-wrapper">
    <div class="container">
        <div class="video-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/video-banner.jpg" class="img-fluid" alt="About Us Video">
            <div class="play-icon-wrapper">
                <a href="#" class="video_lightbox-link" data-bs-toggle="modal" data-bs-target="#video-popup">
                    <svg class="play-icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 104 104" fill="none">
                        <path d="M71.5 49.4848C73.5 50.6027 73.5 53.3973 71.5 54.5152L44.5 69.6066C42.5 70.7244 40 69.3271 40 67.0913L40 36.9087C40 34.6729 42.5 33.2756 44.5 34.3934L71.5 49.4848Z" fill="white" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- /Video Section -->



<!-- Story Section -->
<section class="story-wrapper">
    <div class="container">
        <div class="wrapper-content">
            <div class="row">
                <div class="col-lg-5">
                    <h1 class="dipslay-5">Our Story</h1>
                </div>
                <div class="col-lg-7 pt-lg-0 pt-5">
                    <p class="main-para">Welcome to Mysight, a compassionate and dedicated platform committed to providing spiritual assistance and guidance to Christians around the world. Our team of experienced and anointed ministers is passionate about helping individuals connect with the divine, receive prophetic insights, experience healing, and find deliverance from spiritual bondage.
                    <br> <br>
                    Through our website Channel, we offer a range of services, including prophecy, word of knowledge, teaching, healing, and deliverance. Each member of our team is equipped with a deep understanding of Scripture and a sensitivity to the leading of the Holy Spirit. We believe in the power of divine intervention and have witnessed countless lives being transformed through our ministry.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="pb-lg-0 pb-3">At Mysight, we value the individual needs and unique journeys of our visitors. Our approach is compassionate, empathetic, and non-judgmental, creating a safe space where you can freely express your concerns and receive the spiritual assistance you seek. Our ministers are committed to serving you with integrity, respect, and confidentiality.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Thank you for choosing Mysight Ministry as your source of spiritual guidance. We look forward to walking alongside you on your journey of faith, offering insights, support, and encouragement every step of the way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Story Section -->



<!-- Quote Section -->
<section class="quote-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="quote-img-wrap pe-md-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/explore-girl-image.jpg" class="img-fluid rounded-circle pb-md-0 pb-4" alt="Quote Bible Image">
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="quote-text">
                    <h2 class="display-5">Explore Website</h2>
                    <p>Explore Our Website and Discover the Various Services. We Offer via Seamless
                        Communication, Cutting-Edge Technology Driving Communication Assistance, and
                        Safeguarding User Data, which is our #1 Priority, Including:</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Quote Section -->




<!-- featurette Section -->
<section class="featurette-section">



    <!-- featurette Block 1 -->
    <div class="featurette-wrapper">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 pe-lg-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Prophetic-Insights.jpg" class="img-fluid pb-lg-0 pb-3" alt="Prophetic Insights">
                </div>

                <div class="col-lg-6 ps-lg-4">
                    <h2 class="display-5">Prophetic Insights</h2>
                    <p>Receive timely and accurate prophetic guidance tailored specifically
                        to your situation.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- featurette Block 2 -->
    <div class="featurette-wrapper has-bg">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 ps-lg-4 order-lg-2 order-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Word-of-Knowledge.jpg" class="img-fluid pb-lg-0 pb-3" alt="Word of Knowledge">
                </div>

                <div class="col-lg-6 pe-lg-4 order-lg-1 order-2">
                    <h2 class="display-5">Word of Knowledge</h2>
                    <p>Gain insight into hidden truths and receive divine revelation
                        concerning your life.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- featurette Block 3 -->
    <div class="featurette-wrapper">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 pe-lg-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Teaching.jpg" class="img-fluid pb-lg-0 pb-3" alt="Teaching">
                </div>

                <div class="col-lg-6 ps-lg-4">
                    <h2 class="display-5">Teaching</h2>
                    <p>Access in-depth biblical teachings that will strengthen your faith and deepen
                        your understanding of God's Word.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- featurette Block 4 -->
    <div class="featurette-wrapper has-bg">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 ps-lg-4 order-lg-2 order-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Healing.jpg" class="img-fluid pb-lg-0 pb-3" alt="Healing">
                </div>

                <div class="col-lg-6 pe-lg-4 order-lg-1 order-2">
                    <h2 class="display-5">Healing</h2>
                    <p>Experience the miraculous healing power of God as we pray for your physical,
                        emotional, and spiritual well-being.</p>
                </div>
                
            </div>
        </div>
    </div>

     <!-- featurette Block 5 -->
     <div class="featurette-wrapper">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 pe-lg-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Deliverance.jpg" class="img-fluid pb-lg-0 pb-3" alt="Deliverance">
                </div>

                <div class="col-lg-6 ps-lg-4">
                    <h2 class="display-5">Deliverance</h2>
                    <p>Break free from bondage, strongholds, and spiritual oppression through
                        our powerful deliverance ministry.</p>
                </div>

            </div>
        </div>
    </div>

</section>
<!-- /Quote Section -->



<section class="more-about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-wrap">
                    <p>We are committed to providing you with a seamless and user-friendly experience on our website. With just a few clicks, you can connect with our ministers, schedule appointments, and embark on a journey of spiritual transformation. Our online platform ensures that distance is no longer a barrier to receiving the divine assistance you need.</p>
                    <p>Don't let life's challenges overwhelm you. Mysight is here to walk alongside you, offering hope, encouragement, and divine guidance. Your breakthrough is just a click away!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Donation Section -->
<section class="donation-section d-lg-flex align-items-center">

    <!-- Left Image -->
    <div class="col-lg-6 donation-image"></div>


    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-6 ms-auto">
                
                <!-- Donation Section Text -->
                <div class="donation-section-right ps-lg-5">
                    
                    <!-- Disbursement Icon -->
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/donation-disburse-icon.png" class="img-fluid" alt="Donation Disbursement Icon">
                    
                    <h2>Where Your Donations Go?</h2>
                   
                    <p>At Mysight, we deeply appreciate your generosity and support. Your donations play a vital role in enabling us to continue offering our services to Christians in need around the world. We are committed to transparency and accountability when it comes to handling donations, and we want to assure you that your contributions will be utilized responsibly and effectively. A percentage of the donations received on our platform go directly towards supporting Ministers, funding, upkeep, orphans, and widows in need.</p>
                   
                    <!-- Button Link -->
                    <a href="donation-disbursement.html" class="btn btn-primary">Learn more</a>

                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- /Donation Section -->



<!-- Join-Team Section -->
<section class="join-team-section">
    <div class="container">
        <div class="box-container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    
                    <h2 class="display-5">Join Eagle Team</h2>
                    
                    <p>The dedicated team at Mysight is driven by a shared mission to serve and support the Christian community. With unwavering commitment and passion, we work tirelessly to provide resources, guidance, and assistance to those seeking spiritual growth and transformation.</p>
                   
                    <a href="join-eagle-team.html" class="btn btn-primary">Join Now</a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Join-Team Section -->











<!-- ===========
    # MODAL 
==============-->

<!-- Video Popup Modal -->
<div class="modal fade" id="video-popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content rounded-0">
                <div class="modal-body">
                    <div class="embed-responsive">
                        <iframe src="https://www.youtube.com/embed/mLwlGsRhNIU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









</main>
<!-- / MAIN -->

<?php get_footer(); ?>
