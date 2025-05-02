<?php if (is_active_sidebar('main-sidebar')): ?>
    <aside class="sidebar" id="sidebar">

        <!-- Close Sidebar Button -->
        <div class="close-sidebar-btn">
            <a href="javascript:void(0)" class="d-lg-none" onclick="closeNav()"><i class="fa fa-times"></i></a>
        </div>

        <!-- User Info -->
        <div class="user-info">
            <h2 class="username">John Doe</h2>
            <div class="useremail">johndoe@mail.com</div>
        </div>

        <!-- Sidebar Menu Wrap-->
        <div class="sidebar-menu-wrap">

            <h2>MY ACCOUNT</h2>

            <!-- Sidebar-Menu -->
            <nav class="sidebar-menu">

                <ul class="list-unstyled">

                    <li>
                        <a class="active" href="/account-setting"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/account-setting-icon.png"
                                alt="Account Setting">Account
                            Setting</a>
                    </li>

                    <li>
                        <a href="donation-plan.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/donation-plan-icon.png"
                                alt="Donation Plan">Donation
                            Plan</a>
                    </li>

                    <li>
                        <a href="matches.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/heart-icon.png"
                                alt="Matches">Matches <span class="notification">1</span></a>
                    </li>

                    <li>
                        <a href="invoice-blank.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/invoice-icon.png"
                                alt="Invoice">Invoice <span class="notification">1</span></a>
                    </li>

                    <li>
                        <a href="support.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/customer-support-icon.png"
                                alt="Support">Support</a>
                    </li>

                    <li>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sign-out-icon.png"
                                alt="Sign out">Sign out</a>
                    </li>

                </ul>

            </nav>

        </div>

    </aside>
<?php endif; ?>

