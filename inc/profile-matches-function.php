<?php




/************************************************
   display user matches details
**************************************************/
function display_user_matches()
{
    if (!is_user_logged_in()) {
        return '<p>Please log in to see matches.</p>';
    }



    $current_user_id = get_current_user_id();



    $accepted = get_user_meta($current_user_id, 'accepted_matches', true);
    $rejected = get_user_meta($current_user_id, 'rejected_matches', true);
    $accepted = is_array($accepted) ? $accepted : array();
    $rejected = is_array($rejected) ? $rejected : array();

    $seeking_for = get_user_meta($current_user_id, 'seeking_for', true);
    $preferencesHeight = get_user_meta($current_user_id, 'preferencesHeight', true);
    $preferred_age = get_user_meta($current_user_id, 'preferred_age_range', true);
    $preferred_body_type = get_user_meta($current_user_id, 'body_type', true);
    $preferred_skin = get_user_meta($current_user_id, 'skin_complexion', true);

    $match_gender = '';
    if ($seeking_for === 'Wife') {
        $match_gender = 'female';
    } elseif ($seeking_for === 'Husband') {
        $match_gender = 'male';
    }

    ob_start();

    if (!empty($match_gender)) {
        $args = array(
            'role' => 'subscriber',
            'exclude' => array_merge([$current_user_id], $accepted, $rejected),
            'meta_query' => array(
                'relation' => 'AND',
                array('key' => 'gender', 'value' => $match_gender, 'compare' => '='),
                array('key' => 'height', 'value' => $preferencesHeight, 'compare' => '='),
                array('key' => 'myage', 'value' => $preferred_age, 'compare' => '='),
                array('key' => 'mybodyType', 'value' => $preferred_body_type, 'compare' => '='),
                array('key' => 'myskinComplextion', 'value' => $preferred_skin, 'compare' => '=')
            )
        );

        $user_query = new WP_User_Query($args);
        $matched_users = $user_query->get_results();

        if (empty($matched_users)) {
            get_template_part('templates/sections/no-matches');
            return ob_get_clean();
        }

        $current_user_photo_id = get_user_meta($current_user_id, 'main_photo', true);
        $current_user_photo_url = wp_get_attachment_url($current_user_photo_id);
        ?>

        <div id="match-container" class="match-container">
            <div class="congratulation-massage">
                <h3>Congratulation!</h3>
                <p>We found you a match</p>
            </div>



            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($matched_users as $user):
                        $match_photo_id = get_user_meta($user->ID, 'main_photo', true);
                        $match_photo_url = wp_get_attachment_url($match_photo_id);
                        ?>
                        <div class="swiper-slide">
                            <div class="match" data-id="<?php echo esc_attr($user->ID); ?>">
                                <div class="match-container-image">


                                    <div class="match-area match-images">

                                        <?php if ($current_user_photo_url): ?>
                                            <img class="img-fluid2" src="<?php echo esc_url($current_user_photo_url); ?>">
                                        <?php else: ?>
                                            <p>No Photo</p>
                                        <?php endif; ?>
                                        <?php if ($match_photo_url): ?>
                                            <img class="img-fluid2" src="<?php echo esc_url($match_photo_url); ?>">
                                        <?php else: ?>
                                            <p>No Photo</p>
                                        <?php endif; ?>
                                        <div class="heart-icon"><i class="fa fa-heart"></i></div>

                                    </div>


                                    <p class="command-text">Swipe right and left to change your match</p>

                                    <div class="action-buttons">
                                        <button class="reject-match btn btn-primary" data-id="<?php echo esc_attr($user->ID); ?>"><i
                                                class="fa fa-close"></i> Reject</button>
                                        <button class="accept-match btn btn-primary" data-id="<?php echo esc_attr($user->ID); ?>"><i
                                                class="fa fa-check"></i>Accept</button>
                                    </div>


                                </div>
                                <div class="extra-info match-accepted-wrapper text-center" style="display:none;">
                                    <h3>Congratulation!</h3>

                                    <p>You have Accepted your Match</p>
                                    <!-- Contact Info Box -->
                                    <div class="contact-info-box text-start">
                                        <div class="info-block">
                                            <div class="block-icon">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone-ring-icon.png"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="block-text">
                                                <span>Phone Number</span>
                                                <p><?php echo esc_html(get_user_meta($user->ID, 'mobile', true)); ?></p>
                                            </div>
                                        </div>
                                        <div class="info-block">
                                            <div class="block-icon">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facetime-icon.png"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="block-text">
                                                <span>Facetime</span>
                                                <p><?php echo esc_html($user->user_email); ?></p>
                                            </div>
                                        </div>

                                        <div class="info-block">
                                            <div class="block-icon">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/solid-whatsapp-icon.png"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="block-text">
                                                <span>Whatsapp</span>
                                                <p><?php echo esc_html(get_user_meta($user->ID, 'whatsapp', true)); ?></p>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="?action=download_match_report&match_id=<?php echo esc_attr($user->ID); ?>"
                                                class="btn btn-primary">Download PDF Report</a>

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Swiper Controls -->
                <!-- <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->
            </div>
        </div>

        <script>
            document.querySelectorAll('.accept-match').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const parent = this.closest('.match');
                    parent.querySelector('.extra-info').style.display = 'block';
                    const matchCount = document.getElementById('match-count');
                    matchCount.textContent = parseInt(matchCount.textContent) - 1;

                    fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=accept_match&match_id=${id}`);
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.reject-match').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const id = this.dataset.id;
                        const parentSlide = this.closest('.swiper-slide');
                        parentSlide.remove();

                        const matchCount = document.getElementById('match-count');
                        matchCount.textContent = parseInt(matchCount.textContent) - 1;

                        fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=reject_match&match_id=' + id)
                            .then(() => {
                                location.reload();
                            });
                    });
                });
            });
        </script>
        <?php
    } else {
        echo '<p>Invalid value. Please update your profile preferences.</p>';
    }

    return ob_get_clean();
}
add_shortcode('user_matches', 'display_user_matches');


// AJAX handlers
function handle_reject_match()
{
    $user_id = get_current_user_id();
    $match_id = intval($_GET['match_id']);
    if ($user_id && $match_id) {
        $rejected = get_user_meta($user_id, 'rejected_matches', true);
        $rejected = is_array($rejected) ? $rejected : array();
        if (!in_array($match_id, $rejected)) {
            $rejected[] = $match_id;
            update_user_meta($user_id, 'rejected_matches', $rejected);
        }
    }
    wp_die();
}
add_action('wp_ajax_reject_match', 'handle_reject_match');


function handle_accept_match()
{
    $user_id = get_current_user_id();
    $match_id = intval($_GET['match_id']);
    if ($user_id && $match_id) {
        $accepted = get_user_meta($user_id, 'accepted_matches', true);
        $accepted = is_array($accepted) ? $accepted : array();
        if (!in_array($match_id, $accepted)) {
            $accepted[] = $match_id;
            update_user_meta($user_id, 'accepted_matches', $accepted);
        }
    }
    wp_die();
}
add_action('wp_ajax_accept_match', 'handle_accept_match');



/************************************************
    enerate match report pdf
**************************************************/
function generate_match_report_pdf()
{
    if (isset($_GET['action']) && $_GET['action'] == 'download_match_report') {
        if (!is_user_logged_in()) {
            wp_die('You must be logged in to download this report.');
        }

        if (!isset($_GET['match_id'])) {
            wp_die('Invalid request: No match specified.');
        }
        $matched_user_id = intval($_GET['match_id']);
        $matched_user = get_userdata($matched_user_id);
        $phone = esc_html(get_user_meta($matched_user_id, 'mobile', true));
        $whatsapp = esc_html(get_user_meta($matched_user_id, 'whatsapp', true));
        $facetime = esc_html($matched_user->user_email);
        require_once get_template_directory() . '/tcpdf/tcpdf.php';
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator('Your Website');
        $pdf->SetAuthor('Match System');
        $pdf->SetTitle('Match Report for User #' . $matched_user_id);
        $pdf->AddPage();
        $html = '
            <h1 style="text-align:center;">Match Report</h1>
            <p>Generated on: ' . date('F j, Y') . '</p>
            <h3>Contact Information</h3>
            <table border="1" cellpadding="5">
                <tr><td><strong>Phone Number</strong></td><td>' . $phone . '</td></tr>
                <tr><td><strong>Facetime</strong></td><td>' . $facetime . '</td></tr>
                <tr><td><strong>WhatsApp</strong></td><td>' . $whatsapp . '</td></tr>
            </table>
        ';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('match_report_' . $matched_user_id . '.pdf', 'D');
        exit;
    }
}
add_action('init', 'generate_match_report_pdf');





/************************************************
    display total matchs number
**************************************************/

function display_user_match_count()
{
    if (!is_user_logged_in()) {
        return '<span>Login to see match count.</span>';
    }

    $current_user_id = get_current_user_id();

    $accepted = get_user_meta($current_user_id, 'accepted_matches', true);
    $accepted = is_array($accepted) ? $accepted : array();

    $rejected = get_user_meta($current_user_id, 'rejected_matches', true);
    $rejected = is_array($rejected) ? $rejected : array();

    $seeking_for = get_user_meta($current_user_id, 'seeking_for', true);
    $preferencesHeight = get_user_meta($current_user_id, 'preferencesHeight', true);
    $preferred_age = get_user_meta($current_user_id, 'preferred_age_range', true);
    $preferred_body_type = get_user_meta($current_user_id, 'body_type', true);
    $preferred_skin = get_user_meta($current_user_id, 'skin_complexion', true);

    $match_gender = $seeking_for === 'Wife' ? 'female' : ($seeking_for === 'Husband' ? 'male' : '');

    if (empty($match_gender)) {
        return '<span>Update profile to see matches.</span>';
    }

    $args = array(
        'role' => 'subscriber',
        'exclude' => array_merge([$current_user_id], $accepted, $rejected),
        'meta_query' => array(
            'relation' => 'AND',
            array('key' => 'gender', 'value' => $match_gender, 'compare' => '='),
            array('key' => 'height', 'value' => $preferencesHeight, 'compare' => '='),
            array('key' => 'myage', 'value' => $preferred_age, 'compare' => '='),
            array('key' => 'mybodyType', 'value' => $preferred_body_type, 'compare' => '='),
            array('key' => 'myskinComplextion', 'value' => $preferred_skin, 'compare' => '=')
        )
    );

    $user_query = new WP_User_Query($args);
    $match_count = count($user_query->get_results());
    if ($match_count > 0) {
        return '<span id="match-count">' . $match_count . '</span>';
    }

    return '';
}
add_shortcode('user_match_count', 'display_user_match_count');







