<?php
/*
Template Name: Home Page
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
                    <a class="nav-link" href="/about-us">About Us</a>
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
<main class="container-fluid">
<?php get_sidebar(); ?>

<article>
<?php
$current_user = wp_get_current_user();

if ( $current_user->exists() ) {
    echo 'Full Name: ' . esc_html($current_user->first_name . ' ' . $current_user->last_name);
}
?>


    <h2>Empowered by the Holy Spirit and entrusted with the great commission by Christ Jesus</h2>
    <div class="entry-content">
    Empowered by the Holy Spirit and entrusted with the great commission by Christ Jesus, our mission is to make disciples of all nations. We are dedicated to sharing the uncompromising message of salvation and demonstrating God's love through a comprehensive approach that addresses the diverse needs of humanity, ultimately leading to the attainment of eternal life.
    </div>
</article>
</main>

<?php get_footer(); ?>
