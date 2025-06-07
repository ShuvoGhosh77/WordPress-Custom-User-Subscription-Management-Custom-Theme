<?php
/*
Template Name: Divine Matches Page
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
<section class="divine-matches-wrapper dashboard-wrapper">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-3">

                <?php get_sidebar(); ?>

            </div>



            <div class="col-lg-9">

                <!-- Main Content -->
                <main class="layout-main matches-main">


                    <div class="matches-wrapper">

                        <!-- Header Area -->
                        <div class="header-area d-sm-flex align-items-center justify-content-between">

                            <div class="header-area-left">
                                <h1>Your Matches</h1>
                                <?php $match_count = do_shortcode('[user_match_count]'); ?>
                                <?php if (!empty($match_count)): ?>
                                    <p>You have <span id="match-count-global"><?php echo $match_count; ?></span> Attempts
                                        left</p>
                                <?php endif; ?>
                            </div>

                            <div class="header-area-right mt-sm-0 mt-4">
                                <a href="/divine-meet" style="text-decoration: none;"><button class="btn btn-primary"><i
                                            class="fa fa-plus"></i> New Request</button></a>
                            </div>

                        </div>


                        <div class="match-found-block">

                            <?php echo do_shortcode('[user_matches]'); ?>

                        </div>

                    </div>


                </main>


            </div>

        </div>

    </div>

</section>
<!-- /Matches -->


<?php get_footer(); ?>