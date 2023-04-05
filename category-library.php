<?php
get_header();
?>


    <div id="main">

        <div class="row nopadsides">
            <div class="col-sm-12">
                <h1 class="main-heading">Library</h1>
                <p>
                    <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'tag' => 'librarypage'
                    );
                    $aboutRight = new WP_Query($args);
                    if ($aboutRight->have_posts()) :
                        while ($aboutRight->have_posts()) :
                            $aboutRight->the_post();
                        ?>

                            <h2><?php echo the_title() ?></h2>
                            <?php echo the_content() ?>
                        <?php
                        endwhile;
                    endif;
                    ?>
                <br/><br/>
                </p>
            </div>
        </div>
    </div>

<?php
get_footer();
