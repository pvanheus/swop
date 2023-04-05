<?php
get_header();
?>


    <main>
        <div class="breadcrumbs" typeof="BreadcumbList" vocab="https://schema.org">
<!--            --><?php
//            if (function_exists('bcn_display')) {
//                bcn_display();
//            }
//            ?>
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
            <div class="col-sm-12">
                <h1 class="main-heading ">Our people</h1>
                <div class="row">

                    <?php
                    $args = array(
                        'category_name' => 'people'
                    );
                    $aboutPeople = new WP_Query($args);
                    if ($aboutPeople->have_posts()) :
                        while ($aboutPeople->have_posts()) :
                            $aboutPeople->the_post();
                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="<?php the_permalink() ?>">
                                    <div style="background-image:url('<?php echo the_post_thumbnail_url('full'); ?>')"
                                         class="bg-header"></div>
                                </a>
                                <a href="<?php the_permalink() ?>"><h4><?php echo the_title() ?></h4></a>
                                <p><?php echo the_excerpt() ?></p>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

    </main>

<?php
get_footer(); ?>