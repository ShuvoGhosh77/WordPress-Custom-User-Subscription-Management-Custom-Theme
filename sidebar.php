<?php if (is_active_sidebar('main-sidebar')): ?>
    <aside class="sidebar" id="sidebar">

        <!-- Close Sidebar Button -->
        <div class="close-sidebar-btn">
            <a href="javascript:void(0)" class="d-lg-none" onclick="closeNav()"><i class="fa fa-times"></i></a>
        </div>

        <!-- User Info -->
        <div class="user-info">
            <h2 class="username">
                <?php
                $current_user = wp_get_current_user();
                $firstname = get_user_meta($current_user->ID, 'first_name', true);
                $lastname = get_user_meta($current_user->ID, 'last_name', true);
                ?>

                <Span><?php echo esc_attr($firstname); ?> </Span><Span><?php echo esc_attr($lastname); ?></Span>
            </h2>
            <div class="useremail"><?php echo esc_html($current_user->user_email); ?></div>
        </div>

        <!-- Sidebar Menu Wrap-->
        <div class="sidebar-menu-wrap">

            <h2>MY ACCOUNT</h2>

            <!-- Sidebar-Menu -->
            <nav class="sidebar-menu">

                <ul class="list-unstyled">

                    <li>
                        <a class="<?php if (is_page('account-setting')) echo 'active'; ?>" href="/account-setting"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/account-setting-icon.png"
                                alt="Account Setting">Account
                            Setting</a>
                    </li>

                    <li>
                        <a class="<?php if (is_page('donation-plan')) echo 'active'; ?>" href="/donation-plan"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/donation-plan-icon.png"
                                alt="Donation Plan">Donation
                            Plan</a>
                    </li>

                    <li>
                        <a class="<?php if (is_page('matches')) echo 'active'; ?>"  href="/matches"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/heart-icon.png"
                                alt="Matches">Matches</a>
                    </li>

                    <li>
                        <a href="invoice-blank.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/invoice-icon.png"
                                alt="Invoice">Invoice <span class="notification">1</span></a>
                    </li>

                    <li>
                        <a  class="<?php if (is_page('support')) echo 'active'; ?>" href="/support"><img
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

