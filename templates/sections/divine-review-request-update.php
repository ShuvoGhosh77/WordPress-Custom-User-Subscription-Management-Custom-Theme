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
<!-- MODAL / Update Gender -->
<div class="modal fade" id="UpdateGender" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Gender</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">

                        <label class="form-label" for="dm-gender">Gender</label>

                        <select class="form-select" id="dm-gender" name="gender" required>
                            <option value=""></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                    <!-- Submit Button -->
                    <button type="submit" name="update_user_gender" class="btn btn-primary">Update</button>
                </div>

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('update_user_gender_action', 'update_user_gender_nonce'); ?>

            </form>


        </div>
    </div>
</div>
<!-- MODAL / UpdatePhone-->
<div class="modal fade" id="UpdatePhone" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Preferred Mobile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <?php
                        $current_user = wp_get_current_user();
                        $mobile = get_user_meta($current_user->ID, 'mobile', true);
                        ?>
                        <label class="form-label" for="dm-mobile">Preferred Mobile</label>

                        <input type="text" class="form-control" id="dm-mobile" name="mobile"
                            value="<?php echo esc_attr($mobile); ?>" required>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                    <!-- Submit Button -->
                    <button type="submit" name="update_user_mobile" class="btn btn-primary">Update</button>
                </div>

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('update_user_mobile_action', 'update_user_mobile_nonce'); ?>

            </form>


        </div>
    </div>
</div>
<!-- MODAL / whatsapp-->
<div class="modal fade" id="UpdateWhatsapp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Whatsapp Number</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <?php
                        $current_user = wp_get_current_user();
                        $whatsapp = get_user_meta($current_user->ID, 'whatsapp', true);
                        ?>
                        <label class="form-label" for="dm-mobile">Whatsapp Number</label>

                        <input type="text" class="form-control" id="dm-mobile" name="whatsapp"
                            value="<?php echo esc_attr($whatsapp); ?>" required>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                    <!-- Submit Button -->
                    <button type="submit" name="update_user_whatsapp" class="btn btn-primary">Update</button>
                </div>

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('update_user_whatsapp_action', 'update_user_whatsapp_nonce'); ?>

            </form>


        </div>
    </div>
</div>
<!-- MODAL / myage-->
<div class="modal fade" id="UpdateMyage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update myage</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <?php
                        $current_user = wp_get_current_user();
                        $myage = get_user_meta($current_user->ID, 'myage', true);
                        ?>
                        <label class="form-label" for="dm-mobile">Age</label>

                        <input type="text" class="form-control" id="dm-mobile" name="myage"
                            value="<?php echo esc_attr($myage); ?>" required>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                    <!-- Submit Button -->
                    <button type="submit" name="update_user_myage" class="btn btn-primary">Update</button>
                </div>

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('update_user_myage_action', 'update_user_myage_nonce'); ?>

            </form>


        </div>
    </div>
</div>
<!-- MODAL / my Height-->
<div class="modal fade" id="UpdateHeight" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Height</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <?php
                        $current_user = wp_get_current_user();
                        $height = get_user_meta($current_user->ID, 'height', true);
                        ?>
                        <label class="form-label" for="dm-mobile">Height</label>

                        <input type="text" class="form-control" id="dm-mobile" name="height"
                            value="<?php echo esc_attr($height); ?>" required>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                    <!-- Submit Button -->
                    <button type="submit" name="update_user_height" class="btn btn-primary">Update</button>
                </div>

                <!-- Add Nonce Field -->
                <?php wp_nonce_field('update_user_height_action', 'update_user_height_nonce'); ?>

            </form>


        </div>
    </div>
</div>

<!-- MODAL / marital status-->
<div class="modal fade" id="UpdateMaritalStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Height</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="detail-info-block py-sm-4 py-3 border-bottom modal-checkbox-input">

                        <h5>Marital Status</h5>

                        <!-- Form Checkboxes -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="maritalStatus" id="divorcedRadio"
                                value="divorced" required>
                            <label class="form-check-label" for="divorcedRadio">Divorced</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="maritalStatus" id="widowedRadio"
                                value="widowed" required>
                            <label class="form-check-label" for="widowedRadio">Widowed</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="maritalStatus" id="neverMarriedRadio"
                                value="neverMarried" required>
                            <label class="form-check-label" for="neverMarriedRadio">Never
                                Married</label>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_maritalStatus" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_maritalStatus_action', 'update_user_maritalStatus_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Relationship status-->
<div class="modal fade" id="UpdateRelationship" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Relationship</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="detail-info-block py-sm-4 py-3 border-bottom modal-checkbox-input">

                        <h5>Relationship type</h5>

                        <!-- Form Checkboxes -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="relationshipType" id="committedRadio"
                                value="committed" required>
                            <label class="form-check-label" for="committedRadio">Commited
                                Relationship</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="relationshipType" id="marriageRadio"
                                value="marriage" required>
                            <label class="form-check-label" for="marriageRadio">Marriage</label>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_relationship" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_relationship_action', 'update_user_relationship_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL Drinking Habit-->
<div class="modal fade" id="UpdateDrinkingHabit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Drinking Habit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="detail-info-block py-sm-4 py-3 border-bottom modal-checkbox-input">

                        <h5>Drinking Habit</h5>

                        <!-- Form Checkboxes -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="drinkingHabit" id="socialDrinkerRadio"
                                value="socialDrinker" required>
                            <label class="form-check-label" for="socialDrinkerRadio">Social Drinker
                                (a person who drinks on an occasional basis)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="drinkingHabit" id="nonDrinkerRadio"
                                value="nonDrinker" required>
                            <label class="form-check-label" for="nonDrinkerRadio">No, I don’t take
                                alcohol</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="drinkingHabit"
                                id="undisclosedDrinkerRadio" value="undisclosedDrinker" required>
                            <label class="form-check-label" for="undisclosedDrinkerRadio">Undisclosed</label>
                        </div>

                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_drinking_habit" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_drinking_habit_action', 'update_user_drinking_habit_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update Smoking Habit-->
<div class="modal fade" id="UpdateSmokingHabit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Smoking Habit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="detail-info-block py-sm-4 py-3 modal-checkbox-input">

                        <h5>Smoking Habit</h5>

                        <!-- Form Checkboxes -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="smokingHabit" id="socialSmokerRadio"
                                value="socialSmoker" required>
                            <label class="form-check-label" for="socialSmokerRadio">Social Smoker
                                (who only smoke in specific settings)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="smokingHabit" id="nonSmokerRadio"
                                value="nonSmoker" required>
                            <label class="form-check-label" for="nonSmokerRadio">No, I don’t
                                Smoke</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="smokingHabit" id="undisclosedSmokerRadio"
                                value="undisclosedSmoker" required>
                            <label class="form-check-label" for="undisclosedSmokerRadio">Undisclosed</label>
                        </div>

                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_smoking_habit" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_smoking_habit_action', 'update_user_smoking_habit_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update Seeking For-->
<div class="modal fade" id="UpdateSeekingFor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update I am seeking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Seeking For -->
                    <div class="preferences-info-block pb-lg-4 pb-3 border-bottom modal-checkbox-input">

                        <h5>I am seeking</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seekingFor" id="husbandRadio"
                                value="Husband" required>
                            <label class="form-check-label" for="husbandRadio">Husband</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seekingFor" id="wifeRadio" value="Wife"
                                required>
                            <label class="form-check-label" for="wifeRadio">Wife</label>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_seeking" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_seeking_action', 'update_user_seeking_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update Preferred Age-->
<div class="modal fade" id="UpdatePreferredAge" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Preferred Age Range</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <?php
                        $current_user = wp_get_current_user();
                        $preferred_age_range = get_user_meta($current_user->ID, 'preferred_age_range', true);
                        ?>
                        <label class="form-label" for="dm-mobile">Age</label>

                        <input type="text" class="form-control" id="dm-mobile" name="age"
                            value="<?php echo esc_attr($preferred_age_range); ?>" required>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_preferred_age_range"
                            class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_preferred_age_range_action', 'update_user_preferred_age_range_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update Seeking For-->
<div class="modal fade" id="UpdatePreferencesHeight" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Preferred Height</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <?php
                        $current_user = wp_get_current_user();
                        $preferencesHeight = get_user_meta($current_user->ID, 'preferencesHeight', true);
                        ?>
                        <label class="form-label" for="dm-mobile">Preferences Height</label>

                        <input type="text" class="form-control" id="dm-mobile" name="preferencesHeight"
                            value="<?php echo esc_attr($preferencesHeight); ?>" required>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_preferencesHeight"
                            class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_preferencesHeight_action', 'update_user_preferencesHeight_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update Body Type-->
<div class="modal fade" id="UpdateBodyType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Body Type</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="preferences-info-block  border-bottom modal-checkbox-input">

                        <h5>Body Type</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyType" id="fatRadio" value="Fat"
                                required>
                            <label class="form-check-label" for="fatRadio">Fat</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyType" id="mediumBodyRadio"
                                value="Medium" required>
                            <label class="form-check-label" for="mediumBodyRadio">Medium</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyType" id="marriageRadio" value="Slim"
                                required>
                            <label class="form-check-label" for="marriageRadio">Slim</label>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_bodyType" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_bodyType_action', 'update_user_bodyType_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update Body Type-->
<div class="modal fade" id="UpdateSkinComplexion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Skin complextion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="preferences-info-block  border-bottom modal-checkbox-input">

                        <h5>Skin complextion</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="skinComplextion" id="extremelyLightRadio"
                                value="Extremely Light" required>
                            <label class="form-check-label" for="extremelyLightRadio">Extremely
                                Light</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="skinComplextion" id="fairRadio"
                                value="Fair" required>
                            <label class="form-check-label" for="fairRadio">Fair</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="skinComplextion" id="mediumSkinRadio"
                                value="Medium" required>
                            <label class="form-check-label" for="mediumSkinRadio">Medium</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="skinComplextion" id="naturallyBrownRadio"
                                value="Naturally brown" required>
                            <label class="form-check-label" for="naturallyBrownRadio">Naturally
                                brown</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="skinComplextion" id="veryDarkBrownRadio"
                                value="very dark brown/black" required>
                            <label class="form-check-label" for="veryDarkBrownRadio">Very dark
                                brown/black</label>
                        </div>



                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_skin_complexion" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_skin_complexion_action', 'update_user_skin_complexion_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- MODAL / Update few interests-->
<div class="modal fade" id="UpdateInterest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update few interests</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Interest Category Wrapper -->
                    <div class="interest-category-wrapper">

                        <!-- Sport and Fitness Interest Category -->
                        <div class="interest-category pt-4 pb-2 border-bottom">


                            <!-- Heading -->
                            <h5>Sport and Fitness</h5>

                            <!-- Interest Pill Wrapper (Sport Interests) -->
                            <div class="interest-pill-wrapper pt-2" id="sportInterests">

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Basketball">
                                    <span class="interest-label">Basketball</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Biking">
                                    <span class="interest-label">Biking</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Birdwatching">
                                    <span class="interest-label">Birdwatching</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Bowling">
                                    <span class="interest-label">Bowling</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Fishing">
                                    <span class="interest-label">Fishing</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Golf">
                                    <span class="interest-label">Golf</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Hiking">
                                    <span class="interest-label">Hiking</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Hunting">
                                    <span class="interest-label">Hunting</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Hockey">
                                    <span class="interest-label">Hockey</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Horseback Riding">
                                    <span class="interest-label">Horseback Riding</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Ice Skating">
                                    <span class="interest-label">Ice Skating</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Martial Arts">
                                    <span class="interest-label">Martial Arts</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Pilates">
                                    <span class="interest-label">Pilates</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Rock Climbing">
                                    <span class="interest-label">Rock Climbing</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Running">
                                    <span class="interest-label">Running</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Sailing">
                                    <span class="interest-label">Sailing</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Skateboarding">
                                    <span class="interest-label">Skateboarding</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Skiing">
                                    <span class="interest-label">Skiing</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Snorkeling">
                                    <span class="interest-label">Snorkeling</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Swimming">
                                    <span class="interest-label">Swimming</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Snowboarding">
                                    <span class="interest-label">Snowboarding</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Soccer">
                                    <span class="interest-label">Soccer</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Surfing">
                                    <span class="interest-label">Surfing</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Working Out">
                                    <span class="interest-label">Working Out</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Tennis">
                                    <span class="interest-label">Tennis</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Volleyball">
                                    <span class="interest-label">Volleyball</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Weight Training">
                                    <span class="interest-label">Weight Training</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Scuba Diving">
                                    <span class="interest-label">Scuba Diving</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="sports_interests[]" value="Training">
                                    <span class="interest-label">Training</span>
                                </label>

                            </div>

                        </div>


                        <!-- Activities Interest Category -->
                        <div class="interest-category pt-4">


                            <!-- Heading -->
                            <h5>Activities</h5>

                            <!-- Interest Pill Wrapper (Activity Interests) -->
                            <div class="interest-pill-wrapper pt-2" id="activityInterests">

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Blogging">
                                    <span class="interest-label">Blogging</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Board Games">
                                    <span class="interest-label">Board Games</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Boating">
                                    <span class="interest-label">Boating</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Activism">
                                    <span class="interest-label">Activism</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Bridge">
                                    <span class="interest-label">Bridge</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Chess">
                                    <span class="interest-label">Chess</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Entertaining">
                                    <span class="interest-label">Entertaining</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Theme Parks">
                                    <span class="interest-label">Theme Parks</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Gardening">
                                    <span class="interest-label">Gardening</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Home Improvement">
                                    <span class="interest-label">Home Improvement</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Meditation">
                                    <span class="interest-label">Meditation</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Riding Motorcycles">
                                    <span class="interest-label">Riding Motorcycles</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Painting/Drawing">
                                    <span class="interest-label">Painting/Drawing</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Photography">
                                    <span class="interest-label">Photography</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Reading">
                                    <span class="interest-label">Reading</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Sewing and Crafts">
                                    <span class="interest-label">Sewing and Crafts</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Stock Trading">
                                    <span class="interest-label">Stock Trading</span>
                                </label>

                                <!-- Intrest -->
                                <label class="interest-pill">
                                    <input type="checkbox" name="activity_interests[]" value="Volunteering and Writing">
                                    <span class="interest-label">Volunteering and Writing</span>
                                </label>

                            </div>

                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_Interest" class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_Interest_action', 'update_user_Interest_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- MODAL / Update Location-->
<div class="modal fade" id="UpdateLocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="update-info-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Form -->
            <form method="POST">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Update Location</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <!-- City Field -->
                        <div class="col-md-12">

                            <div class="form-group mb-4">
                                <?php
                                $current_user = wp_get_current_user();
                                $city = get_user_meta($current_user->ID, 'city', true);
                                ?>

                                <label class="form-label" for="dm-city">City</label>

                                <input type="text" class="form-control" id="dm-city" name="city"
                                    value="<?php echo esc_attr($city); ?>" required>

                            </div>

                        </div>
                    </div>

                    <div class="row">


                        <!-- State Field -->
                        <div class="col-md-12">

                            <div class="form-group mb-4">
                                <?php
                                $current_user = wp_get_current_user();
                                $state = get_user_meta($current_user->ID, 'state', true);
                                ?>


                                <label class="form-label" for="dm-state">State</label>

                                <input type="text" class="form-control" id="dm-state" name="state" value="<?php echo esc_attr($state); ?>" required>

                            </div>

                        </div>


                    </div>


                    <div class="row">
                        <!-- Country Field -->
                        <div class="col-md-12">

                            <div class="form-group mb-4">

                                <label class="form-label" for="dm-country">Country</label>

                                <select id="dm-country" class="form-select" name="country" required>
                                    <option value=""></option>
                                    <option value="" disabled>Select a Country</option>
                                </select>

                            </div>

                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>

                        <!-- Submit Button -->
                        <button type="submit" name="update_user_location"
                            class="btn btn-primary">Update</button>
                    </div>

                    <!-- Add Nonce Field -->
                    <?php wp_nonce_field('update_user_location_action', 'update_user_location_nonce'); ?>
                </div>
            </form>


        </div>
    </div>
</div>