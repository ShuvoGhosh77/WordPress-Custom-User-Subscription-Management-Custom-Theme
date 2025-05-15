<!-- NAVBAR -->
<header>
    <nav class="navbar navbar-expand-lg" style="padding: 0;">
        <div class="container-fluid">

            <!-- LOGO -->
            <a href="<?php echo home_url(); ?>" class="navbar-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                    alt="<?php bloginfo('name'); ?>">
            </a>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span>
                    <i class="fa fa-bars"></i>
                </span>
            </button>

            <!-- Navbar Collapsible Content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav pt-lg-0 pt-3 ms-auto">
                    <!-- Account Settings -->
                    <li class="nav-item">
                        <a class="nav-link  <?php if (is_page('account-setting'))
                            echo 'active'; ?>"
                            href="/account-setting">Account Settings</a>
                    </li>

                    <!-- Donation Plan -->
                    <li class="nav-item">
                        <a class="nav-link" href="/donation-plan">Donation Plan</a>
                    </li>

                    <!-- Invoice -->
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us">About Us</a>
                    </li>

                    <!-- Support -->
                    <li class="nav-item">
                        <a class="nav-link" href="/support">Support</a>
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