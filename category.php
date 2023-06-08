<!--
used for displaying a sub-category of programmes, e.g. 'transition from coal'
-->

<?php get_header(); ?>


<div id="main">
    <div class="breadcrumbs" typeof="BreadcumbList" vocab="https://schema.org">
        <!--        --><?php
        //        if (function_exists('bcn_display')) {
        //            bcn_display();
        //        }
        //        ?>
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        } ?>
    </div>
    <div class="row nopadsides">
        <div class="col-sm-12">
            <?php
            $category = get_category(get_query_var('cat'));
            $cat_name = $category->name;
            $catDescription = $category->category_description;
            ?>
            <h1 class="main-heading"><?php echo $cat_name; ?></h1>
            <p>
                <?php $catDescription ?>
            </p>
        </div>
    </div>

    <!-- count the child categories -->
    <?php
        $child_categories = get_categories(
            array(
                'parent' => $category->cat_ID,
                'hide_empty' => 0
            ),
        );
        if (count($child_categories) > 0) {
    ?>
    <div class="row main-body nopadsides"> <!-- the left column -->
        <div class="col-sm-4">

            <?php

            $cat_id = $category->cat_ID;
            $child_categories = get_categories(
                array(
                    'parent' => $cat_id,
                    'hide_empty' => 0
                ),
            );
            $count = 1;

            foreach ($child_categories as $child) {
                $highlight = $count == 1 ? " project-nav-highlight" : "";
                ?>
                <a href="#" class="project-nav<?php echo $highlight ?>" data-info="<?php echo $count; ?>">
                    <h3><?php echo $child->name ?></h3></a>
                <?php
                $count++;
            }
            ?>


        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-7">

            <?php

            $cat_id = $category->cat_ID;
            $child_categories = get_categories(
                array(
                    'parent' => $cat_id,
                    'hide_empty' => 0
                ),
            );
            $count = 1;

            foreach ($child_categories as $child) { ?>
                <div class="row rp-section" id="project-section-<?php echo $count; ?>">
                    <div class="col-sm-12">
                        <!-- the following commented out because the headings look redundant with the menu items -->
                        <!--          <h3 class="main-heading red-text">--><?php //echo $child->name ?><!--</h3>-->

                        <?php
                        $args = array(
                            'cat' => $child->term_id,
                            'posts_per_page' => 10,
                            'order' => 'DESC'
                        );
                        $programmeSection = new WP_Query($args);
                        if ($programmeSection->have_posts()) :
                            while ($programmeSection->have_posts()) :
                                $programmeSection->the_post();
                                ?>
                                <a style="text-decoration:none;" href="<?php the_permalink() ?>">
                                    <div class="programme-box event-body">
                                        <?php echo the_title() ?>
                                        <p><?php echo the_excerpt() ?></p>
                                    </div>
                                </a>
                            <?php
                            endwhile;
                        endif;
                        ?>


                    </div>
                </div>


                <?php
                $count++;
            }
            ?>

        </div> <!-- end right column -->
        <?php
        } else { # if there are no child categoryies
            global $wp_query;

            $args = array(
                'posts_per_page' => 1,
                'cat' => $category->cat_ID,
                'tag' => 'index'
            );

            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
        <div class="row-cols-2">
            <?php the_content(); ?>
        </div>
        <?php
                }
            } else {
                echo "<h2>NO POSTS</h2";
            }
        }
        ?>
    </div>
    <script>

    </script>
    <?php get_footer(); ?>
