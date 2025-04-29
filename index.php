<?php
get_header();
?>

<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            get_template_part( 'templates/content', get_post_type() );

        endwhile;

        the_posts_navigation();

    else :
        get_template_part( 'templates/content', 'none' );
    endif;
    ?>
</main>

<?php
get_footer();
?>
