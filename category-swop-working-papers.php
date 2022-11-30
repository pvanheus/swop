<?php
get_header();
?>


<main>
    <div class="breadcrumbs" typeof="BreadcumbList" vocab="https://schema.org">
        <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        }
        ?>
    </div>

    <h1 class="main-heading">Working Papers</h1>

    <?php

        $args = array(
            'category_name' => 'swop-working-papers',
            'order' => 'DESC'
        );
        $papers = new WP_Query($args);
    ?>

    <div class="row">
        <?php while ( $papers->have_posts() ) : $papers->the_post(); ?>
            <div class="col-sm-6 my-sm-4">
                <div class="row">
                    <div class="col-sm-5">
                        <?php the_post_thumbnail('medium') ; ?>
                    </div>
                    <div class="col-sm-7"
                        <h3 class="pub-title"><?php the_title(); ?></h3>
                        <p class="author-text"><?php the_field('authors'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 download-button-holder">
                        <a href="<?php the_field('link'); ?>" class="download-button">View/download document</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>

</main>

<?php
  get_footer(); ?>