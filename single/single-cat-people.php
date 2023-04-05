<?php
get_header();
?>


    <!-- main -->
    <div id="main">

<?php
while (have_posts()) : ?>
    <?php the_post(); ?>
    <div class="row main-body nopadsides">
        <div class="breadcrumbs" typeof="BreadcumbList" vocab="https://schema.org">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            }
            ?>
        </div>
        <div class="col-sm-4">
            <img src="<?php echo the_post_thumbnail_url("full"); ?>" class="event-pic-big"/>
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-7">
            <h1 class="main-heading red-text"><?php the_title(); ?></h1>
            <h3><?php the_field('position') ?></h3>
            <p>
                <?php the_content(); ?>
            </p>
            <?php

            if (chop(get_field('email')) != "") {
                $email = chop(get_field('email'));
                ?>
                <p><strong>Email:</strong> <a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a>
                </p>
                <?php
            }

            if (chop(get_field('phone_number')) != "") {
                ?>
                <p><strong>Phone number:</strong> <?php the_field('phone_number') ?></p>
                <?php
            }
            ?>
        </div>
    </div>
<?php
endwhile;
wp_reset_query();
?>

<?php
get_footer();
