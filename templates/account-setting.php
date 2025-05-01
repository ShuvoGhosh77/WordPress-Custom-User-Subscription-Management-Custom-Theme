<?php
/*
Template Name: Account Setting Page
*/
get_header();
?>


<!-- HEADER -->
<header class="single-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <!-- LOGO -->
            <a href="/" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Mysight logo">
            </a>

            <div class="username">
                <?php
                $current_user = wp_get_current_user();
                $firstname = get_user_meta($current_user->ID, 'first_name', true);
                $lastname = get_user_meta($current_user->ID, 'last_name', true);
                ?>
                
                Hello, <Span><?php echo esc_attr($firstname); ?> </Span><Span><?php echo esc_attr($lastname); ?></Span>
            </div>

            <button type="button" class="open-sidebar d-lg-none" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </button>

        </div>

    </div>
</header>
<!-- / HEADER -->





<!-- Account Setting Wrapper -->
<section class="account-setting-wrapper dashboard-wrapper">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-3">

                <!-- Sidebar Main -->
                <?php get_sidebar(); ?>

            </div>



            <div class="col-lg-9">


                <!-- Main Content -->
                <main class="layout-main account-setting-main">
                    <?php
                    $current_user_id = get_current_user_id();
                    $error_message = get_transient('email_update_error_' . $current_user_id);
                    if ($error_message) {
                        echo '<div class="alert alert-danger">' . esc_html($error_message) . '</div>';
                        delete_transient('email_update_error_' . $current_user_id);
                    }
                    ?>
                    <?php
                    $user_id = get_current_user_id();

                    if ($message = get_transient('password_update_success_' . $user_id)) {
                        echo '<div class="success-message" style="color:green;">' . esc_html($message) . '</div>';
                        delete_transient('password_update_success_' . $user_id);
                    }

                    if ($error = get_transient('password_update_error_' . $user_id)) {
                        echo '<div class="error-message" style="color:red;">' . esc_html($error) . '</div>';
                        delete_transient('password_update_error_' . $user_id);
                    }
                    ?>

                    <!-- Heading -->
                    <h1>Account Settings</h1>

                    <!-- Profile Section -->
                    <div class="profile-section">

                        <!-- Head -->
                        <h3>Profile</h3>

                        <!-- Name Update -->
                        <div class="profile-item">
                            <p>Name</p>
                            <div class="d-flex align-items-center">
                                <p class="user-data">
                                    <?php
                                    $current_user = wp_get_current_user();
                                    $firstname = get_user_meta($current_user->ID, 'first_name', true);
                                    ?>
                                    <?php echo esc_attr($firstname); ?>
                                </p>
                                <button type="button" class="update-btn" data-bs-toggle="modal"
                                    data-bs-target="#UpdateNameModal">Update</button>
                            </div>
                        </div>

                        <!-- Email Update -->
                        <div class="profile-item">
                            <p>Email</p>
                            <div class="d-flex align-items-center">
                                <p class="user-data"><?php echo wp_get_current_user()->user_email; ?></p>
                                <button type="button" class="update-btn" data-bs-toggle="modal"
                                    data-bs-target="#UpdateEmailModal">Update</button>
                            </div>
                        </div>

                        <!-- Password Update -->
                        <div class="profile-item">
                            <p>Password</p>
                            <div class="d-flex align-items-center">
                                <p class="user-data">•••••••</p>
                                <button type="button" class="update-btn" data-bs-toggle="modal"
                                    data-bs-target="#UpdatePasswordModal">Update</button>
                            </div>
                        </div>

                    </div>

                    <!-- Delete Account Section -->
                    <div class="delete-ac-section">
                        <h3>
                            <a href="/delete-account">Delete Account <i
                                    class="fa-solid fa-trash-can text-muted ms-2"></i></a>
                        </h3>
                        <p>This account will no longer be available, and all your saved data will be permanently
                            deleted.</p>
                    </div>


                </main>


            </div>

        </div>

    </div>

</section>
<!-- /Account Setting Wrapper -->






<!-- ====================================
           # MODALS/POPUPS  Starts
        ========================================-->

<!-- MODAL / Update Name -->
<div class="modal fade" id="UpdateNameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <!-- First Name Input -->
                    <div class="mb-3"> 
                        <?php
                        $current_user = wp_get_current_user();
                        $firstname = get_user_meta($current_user->ID, 'first_name', true);
                        ?>
                        <input type="text" class="form-control" id="UpdateFirstname" name="first_name"
                            placeholder="First Name" value="<?php echo esc_attr($firstname); ?>">
                    </div>

                    <!-- Last Name Input -->
                    <div>
                        <?php
                         $current_user = wp_get_current_user();
                        $lastname = get_user_meta($current_user->ID, 'last_name', true);
                        ?>
                        <input type="text" class="form-control" id="UpdateLastname" name="last_name"
                            placeholder="Last Name" value="<?php echo esc_attr($lastname); ?>">
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                    <!-- Submit Button -->
                    <button type="submit" name="update_user_name" class="btn btn-primary">Update</button>
                </div>

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('update_user_name_action', 'update_user_name_nonce'); ?>

            </form>


        </div>
    </div>
</div>



<!-- MODAL / Update Email -->
<div class="modal fade" id="UpdateEmailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="mb-4">
                        <p class="modal-upper-text">Please verify that your email address is correct.</p>
                    </div>

                    <!-- Email Address Input -->
                    <div class="mb-3">
                        <input type="email" class="form-control" name="new_email" id="UpdateEmailAddress"
                            placeholder="New email address" required>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="input-group">
                            <input class="form-control" name="user_password" id="EmaiUpdatePassword" type="password"
                                placeholder="For security, please confirm your password" required>
                            <span class="input-group-text UpdateEmail-password-toggle"
                                onclick="EmaiUpdatePassword('EmaiUpdatePassword')">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_user_email" class="btn btn-primary">Update</button>
                </div>

                <?php wp_nonce_field('update_user_email_action', 'update_user_email_nonce'); ?>


            </form>

        </div>
    </div>
</div>



<!-- MODAL / Update Password -->
<div class="modal fade" id="UpdatePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <!-- Current Password Input -->
                    <div class="input-group mb-3">
                        <input class="form-control" name="current_password" id="currentPassword" type="password"
                            placeholder="Current Password" required>
                        <span class="input-group-text password-toggle-current"
                            onclick="toggleCurrentPassword('currentPassword')">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>

                    <!-- New Password Input -->
                    <div class="input-group">
                        <input class="form-control" name="new_password" id="newPassword" type="password"
                            placeholder="New Password" required>
                        <span class="input-group-text password-toggle-new" onclick="toggleNewPassword('newPassword')">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_user_password" class="btn btn-primary">Update</button>
                </div>

                <?php wp_nonce_field('update_user_password_action', 'update_user_password_nonce'); ?>
            </form>


        </div>
    </div>
</div>

<!-- ====================================
           # MODALS/POPUPS  Ends
        ========================================-->
<?php get_footer(); ?>