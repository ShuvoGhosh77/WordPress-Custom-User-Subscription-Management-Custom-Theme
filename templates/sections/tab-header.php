<div class="tabs-wrapper--header">

    <ul class="nav justify-content-between">

        <li><a href="prayer-wall.html">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Prayer-Wall-icon.svg"
                    class="img-fluid" alt="Prayer Wall"><span>Prayer
                    Wall</span></a>
        </li>

        <?php
        $is_active2 = is_page('testimonies');
        ?>
        <li class="<?php if (is_page('testimonies'))
            echo 'active'; ?>"><a href="/testimonies">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $is_active2 ? 'Testimonies-icon--light.svg' : 'Testimonies-icon.svg'; ?>"
                    class="img-fluid" alt="Testimonies"><span>Testimonies</span></a>
        </li>
        <?php
        $is_active3 = is_page('prayer-room');
        ?>

        <li class="<?php if (is_page('prayer-room'))
            echo 'active'; ?>"><a href="/prayer-room">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $is_active3 ? 'Prayer-Room-icon--light.svg' : 'Prayer-Room-icon.svg'; ?>"
                    class="img-fluid" alt="Prayer Room"><span>Prayer
                    Room</span></a>
        </li>

        <?php
        $is_active4 = is_page('divine-meet');
        ?>
        <li class="<?php if (is_page('divine-meet'))
            echo 'active'; ?>"><a href="/divine-meet" id="divine-meet-nav">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $is_active4 ? 'Divine-Meet-icon--light.svg' : 'Divine-Meet-icon.svg'; ?>"
                    class="img-fluid" alt="Divine Meet"><span>Divine Meet</span></a>
        </li>

    </ul>

</div>