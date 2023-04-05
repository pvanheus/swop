<?php
get_header();
?>


    <div id="main">

    <div class="row nopadsides">
        <div class="col-sm-12">
            <h1 class="main-heading">Our publications</h1>
            </p>
        </div>
    </div>

    <!--      <div class="row main-body equal nopad">-->
    <!---->
    <!--      --><?php
//
//        $cat = get_category( get_query_var('cat'));
//        $cat_id = $cat->cat_ID;
//        $child_categories = get_categories(
//            array('parent' => $cat_id)
//        );
//
//        foreach ($child_categories as $child) { ?>
    <!--            <div class="col-md-3 pubs-col bgblack-30">-->
    <!--                --><?php //echo "$child->cat_name" ?>
    <!--            </div>-->
    <!--        --><?php //} ?>
    <!--      </div>-->

    <div class="row main-body equal nopad">
    <div class="col-md-3 pubs-col bgblack-10">
        <a href="<?php echo(get_category_link(get_cat_ID('SWOP Working Papers')));?>" class="black-text no-underline">
            <h2 class="pubs-heading">SWOP working papers</h2>
        </a>

        <?php
        $args = array(
            'category_name' => 'swop-working-papers',
            'posts_per_page' => 200,
            'order' => 'DESC'
        );
        $papers = new WP_Query($args);
        $count = 0;
        if ($papers->have_posts()) :
            while ($papers->have_posts()) :
                $papers->the_post();
                $count++;

                ?>
                <?php if ($count < 4): ?>
                <div class="pubs-box">
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="<?php the_post_thumbnail_url("full"); ?>" width="100%"
                                 class="frontpage-section-image"/>
                        </div>
                        <div class="col-sm-7">
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
            <?php endif; ?>

            <?php
            endwhile;
            wp_reset_query();
            ?>
        <?php endif; ?>

        <div class="pubs-box">
            <div class="row">
                <div class="col-sm-12 download-button-holder">
                    SWOP has published <?php echo($papers->found_posts) ?> working papers.
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 download-button-holder">
                    <a href="<?php echo(get_category_link(get_cat_ID('SWOP Working Papers'))); ?>"
                       class="download-button">More</a>
                </div>
            </div>
        </div>

    </div>


<?php
$categories = array("journal-articles", "books", "popular-pieces");
$overview_categories = array("all-journal-articles", "all-books", "all-popular-pieces");
$category_titles = array("Journal articles", "Books", "Popular Pieces");
$see_all_texts = array("See all Journal Articles", "See all Books &amp; Book Chapters", "See all Popular Pieces");
$bg_class = array("bgblack-20", "bgblack-10", "bgblack-20");
$max_items = 4;
foreach (array_values($categories) as $i => $category) { ?>
    <div class="col-md-3 pubs-col <?php echo $bg_class[$i]?>">
        <?php
        $all_items_args = array(
            'category_name' => $overview_categories[$i],
            'posts_per_page' => 1,
            'order' => 'DESC'
        );

        $items_args = array(
            'category_name' => $category,
            'posts_per_page' => 10,
            'order' => 'DESC'
        );

        $all_items = new WP_Query($all_items_args);
        if ($all_items->have_posts()) {
            while ($all_items->have_posts()) {
                $all_items->the_post();
                ?>
                <a href="<?php echo(get_permalink()); ?>" class="black-text no-underline">
                    <h2 class="pubs-heading"><?php echo $category_titles[$i] ?></h2></a>
                <?php
            }
        }
        wp_reset_query();
        $items = new WP_Query($items_args);
        $count = 0;

        if ($items->have_posts()) {
            while ($items->have_posts()) {
                $items->the_post();
                $count++;

                if ($count < ($max_items + 1)): ?>
                    <div class="pubs-box">
                        <div class="row">
                            <div class="col-sm-12">
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
                <?php endif; /* if  count < ($max_items + 1) */
            }  /* while posts */
        };     /* if posts in category */

        if ($all_items->have_posts()) {
            while ($all_items->have_posts()) {
                $all_items->the_post();

                ?>
                <div class="row">
                    <div class="col-sm-12 download-button-holder">
                        <a href="<?php echo(get_permalink()); ?>"
                           class="download-button"><?php echo $see_all_texts[$i] ?></a>
                    </div>
                </div>
                <?php
            } /* while posts in category */
        }     /* if all_items have_posts */
        wp_reset_query();
        ?>
    </div>
    <?php
} /* foreach across categories */
?>

<?php
get_footer();
?>