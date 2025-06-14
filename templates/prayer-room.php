<?php
/*
Template Name: Prayer Room Page
*/

get_header();
?>

<!-- HEADER -->
<?php get_template_part('templates/sections/common-header'); ?>


<!-- MAIN -->
<main>


    <!-- Tabs Wrapper -->
    <section class="tabs-wrapper prayer-room">

        <div class="container">



            <!-- Common Tab-Header -->
             <?php get_template_part('templates/sections/tab-header'); ?>





            <!-- Tab Panel * PrayerRoom  -->
                <?php echo do_shortcode('[prayer_room]') ?>





        </div>

    </section>
    <!-- /Section -->





</main>


<?php get_footer(); ?>