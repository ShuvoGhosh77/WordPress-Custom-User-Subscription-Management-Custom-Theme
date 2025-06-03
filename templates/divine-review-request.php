<?php
/*
Template Name: Divine Review Request Page
*/
get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>


<!-- MAIN -->
<main>


    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper">

        <div class="container">



            <!-- Common Tab-Header -->
            <?php get_template_part('templates/sections/tab-header'); ?>




            <!-- Tab Panel * Review Request Panel  -->
            <div class="tabs-wrapper--panel  review-request-panel">


                <!-- Review Request Wrapper -->
                <div class="review-request-wrapper mt-md-4">

                    <div class="container">


                        <!-- Heading -->
                        <h2 class="pb-4 border-bottom border-2">Now Just finish and review your request</h2>


                        <div class="row mt-5">


                            <div class="col-lg-5 col-md-6">

                                <!-- Review Items List -->
                                <ul class="list-unstyled p-0 m-0">

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Full Name</span>
                                        <div>
                                            <span class="item-value">
                                                <?php
                                                $current_user = wp_get_current_user();
                                                $firstname = get_user_meta($current_user->ID, 'first_name', true);
                                                $lasttname = get_user_meta($current_user->ID, 'last_name', true);
                                                ?>
                                                <span><?php echo esc_attr($firstname); ?></span>
                                                <span><?php echo esc_attr($lasttname); ?></span>
                                            </span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateNameModal"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Gender</span>
                                        <div>
                                            <span class="item-value">
                                                <?php
                                                $current_user = wp_get_current_user();
                                                $gender = get_user_meta($current_user->ID, 'gender', true);
                                                ?>
                                                <?php echo esc_attr($gender); ?>
                                            </span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateGender"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Phone</span>
                                        <div>
                                            <?php
                                            $current_user = wp_get_current_user();
                                            $mobile = get_user_meta($current_user->ID, 'mobile', true);
                                            ?>
                                            <span class="item-value"><?php echo esc_attr($mobile); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdatePhone"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $whatsapp = get_user_meta($current_user->ID, 'whatsapp', true);
                                        ?>
                                        <span class="item-label">Whatsapp</span>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($whatsapp); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateWhatsapp"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Location</span>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $city = get_user_meta($current_user->ID, 'city', true);
                                        $state = get_user_meta($current_user->ID, 'state', true);
                                        $country = get_user_meta($current_user->ID, 'country', true);
                                        ?>
                                        <div>
                                            <span class="item-value">
                                                <?php echo esc_attr($city); ?>,
                                                <?php echo esc_attr($state); ?>,
                                                <?php echo esc_attr($country); ?>

                                            </span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateLocation"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Age</span>
                                        <div>
                                            <?php
                                            $current_user = wp_get_current_user();
                                            $myage = get_user_meta($current_user->ID, 'myage', true);
                                            ?>
                                            <span class="item-value"><?php echo esc_attr($myage); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateMyage"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $height = get_user_meta($current_user->ID, 'height', true);
                                        ?>
                                        <span class="item-label">Height</span>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($height); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateHeight"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Marital Status</span>
                                        <div>
                                            <?php
                                            $current_user = wp_get_current_user();
                                            $marital_status = get_user_meta($current_user->ID, 'marital_status', true);
                                            ?>
                                            <span class="item-value"><?php echo esc_attr($marital_status); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateMaritalStatus"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item  -->
                                    <li class="review-item">
                                        <span class="item-label">Relationship type</span>
                                        <div>
                                            <?php
                                            $current_user = wp_get_current_user();
                                            $relationship_type = get_user_meta($current_user->ID, 'relationship_type', true);
                                            ?>
                                            <span class="item-value"><?php echo esc_attr($relationship_type); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateRelationship"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>


                                    <li class="review-item">
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $drinking_habit = get_user_meta($current_user->ID, 'drinking_habit', true);
                                        ?>
                                        <span class="item-label">Drinking habit</span>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($drinking_habit); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateDrinkingHabit"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>


                                </ul>

                            </div>


                            <div class="col-lg-7 col-md-6">

                                <!-- Review Items List -->
                                <ul class="list-unstyled">

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $smoking_habit = get_user_meta($current_user->ID, 'smoking_habit', true);
                                        ?>
                                        <span class="item-label">Smoking habit</span>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($smoking_habit); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateSmokingHabit"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <span class="item-label">Interest</span>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $sports = get_user_meta($current_user->ID, 'user_sports_interests', true);
                                        $activities = get_user_meta($current_user->ID, 'user_activity_interests', true);
                                        ?>
                                        <div>
                                            <span class="item-value">
                                                <?php echo esc_html(implode(', ', $sports)); ?> ,
                                                <?php echo esc_html(implode(', ', $activities)); ?>

                                            </span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateInterest"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <span class="item-label">Seeking for</span>
                                        <div>
                                            <?php
                                            $current_user = wp_get_current_user();
                                            $seeking_for = get_user_meta($current_user->ID, 'seeking_for', true);
                                            ?>
                                            <span class="item-value"><?php echo esc_attr($seeking_for); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateSeekingFor"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <span class="item-label">Partner’s Age</span>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $preferred_age_range = get_user_meta($current_user->ID, 'preferred_age_range', true);
                                        ?>
                                        <div>
                                            <span
                                                class="item-value"><?php echo esc_attr($preferred_age_range); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdatePreferredAge"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <span class="item-label">Partner’s Height</span>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $preferencesHeight = get_user_meta($current_user->ID, 'preferencesHeight', true);
                                        ?>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($preferencesHeight); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdatePreferencesHeight"><i
                                                    class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <span class="item-label">Body Type</span>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $body_type = get_user_meta($current_user->ID, 'body_type', true);
                                        ?>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($body_type); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateBodyType"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>

                                    <!-- Review Item -->
                                    <li class="review-item">
                                        <span class="item-label">Skin Complextion</span>
                                        <?php
                                        $current_user = wp_get_current_user();
                                        $skin_complexion = get_user_meta($current_user->ID, 'skin_complexion', true);
                                        ?>
                                        <div>
                                            <span class="item-value"><?php echo esc_attr($skin_complexion); ?></span>
                                            <button class="btn edit-request-btn" data-bs-toggle="modal"
                                                data-bs-target="#UpdateSkinComplexion"><i class="fa fa-pencil me-1"></i>
                                                Edit</button>
                                        </div>
                                    </li>


                                </ul>

                            </div>


                        </div>


                    </div>

                    <div class="review-btn-group">
                        <a href="/">
                            <button type="button" class="btn btn-primary cancel-btn">Cancel</button>
                        </a>

                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#UpdateConfirm">Confirm</button>

                    </div>


                </div>

            </div>



        </div>

    </section>
    <!-- /Section -->



</main>


<?php get_template_part('templates/sections/divine-review-request-update2'); ?>

<?php get_template_part('templates/sections/divine-review-request-update'); ?>



<!-- MODAL / Update Location-->
<div class="modal fade" id="UpdateConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body Thank-modal-content" style="padding-bottom: 38px;text-align: center;">
                <img src="http://mysight.test/wp-content/uploads/2025/06/Thanks-icon.png" alt="Thanks-icon">

                <h3 class="mt-3">Thank you.</h3>
                <p>Your submission has been sent.</p>
                <p>Let God Write Your Love Story</p>
                <a href="/account-setting">
                        <button class="btn btn-primary Confirm-button-modal">Back To Dashboard</button>
                </a>

            </div>


        </div>
    </div>
</div>


<?php get_footer(); ?>