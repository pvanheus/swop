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
          <h2 class="pubs-heading">SWOP working papers</h2>

          <?php
            $args = array(
              'category_name' => 'swop-working-papers',
              'posts_per_page' => 200,
              'order' => 'DESC'
            );
          $papers = new WP_Query($args);
          $count = 0;
          if($papers->have_posts()) :
              while ($papers->have_posts()) :
                $papers->the_post();
                $count++;

          ?>
          <?php if ($count < 4):?>
          <div class="pubs-box">
            <div class="row">
              <div class="col-sm-5">
                <img src="<?php the_post_thumbnail_url("full"); ?>" width="100%" class="frontpage-section-image" />
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
                    <a href="<?php echo(get_category_link(get_cat_ID('SWOP Working Papers'))); ?>" class="download-button">Read more</a>
                </div>
            </div>
        </div>

        </div>


        <div class="col-md-3 pubs-col bgblack-20">
          <h2 class="pubs-heading">Journal articles</h2>

          <?php
            $args = array(
              'category_name' => 'journal-articles',
              'posts_per_page' => 200,
              'order' => 'DESC'
            );
          $papers = new WP_Query($args);
          $count = 0;
          if($papers->have_posts()) :
              while ($papers->have_posts()) :
                $papers->the_post();
                $count++;

          ?>

          <?php if ($count < 4):?>
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
        <?php else: ?>
          <div class="pubs-box">
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php the_field('link'); ?>"><p class="author-text red-text"><b><?php the_title(); ?></b></p></a>
              </div>
            </div>
          </div>
        <?php endif; ?>

          <?php
            endwhile;
            wp_reset_query();
          ?>
        <?php endif; ?>

        </div>


        <div class="col-md-3 pubs-col bgblack-10">
          <h2 class="pubs-heading">Books</h2>

          <?php
            $args = array(
              'category_name' => 'books',
              'posts_per_page' => 200,
              'order' => 'DESC'
            );
          $papers = new WP_Query($args);
          $count = 0;
          if($papers->have_posts()) :
              while ($papers->have_posts()) :
                $papers->the_post();
                $count++;

          ?>

          <?php if ($count < 4):?>
          <div class="pubs-box">
            <div class="row">
              <div class="col-sm-5">
                <img src="<?php the_post_thumbnail_url("full"); ?>" width="100%" class="frontpage-section-image" />
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
        <?php else: ?>
          <div class="pubs-box">
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php the_field('link'); ?>"><p class="author-text red-text"><b><?php the_title(); ?></b></p></a>
              </div>
            </div>
          </div>
        <?php endif; ?>

          <?php
            endwhile;
            wp_reset_query();
          ?>
        <?php endif; ?>

        </div>



        <div class="col-md-3 pubs-col bgblack-20">
          <h2 class="pubs-heading">Popular pieces</h2>

          <?php
            $args = array(
              'category_name' => 'popular-pieces',
              'posts_per_page' => 200,
              'order' => 'DESC'
            );
          $papers = new WP_Query($args);
          $count = 0;

          if($papers->have_posts()) :
              while ($papers->have_posts()) :
                $papers->the_post();
                $count++;

          ?>

          <?php if ($count < 4):?>
          <div class="pubs-box">
            <div class="row">
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
        <?php else: ?>
          <div class="pubs-box">
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php the_field('link'); ?>"><p class="author-text red-text"><b><?php the_title(); ?></b></p></a>
              </div>
            </div>
          </div>
        <?php endif; ?>

          <?php
            endwhile;
            wp_reset_query();
          ?>
        <?php endif; ?>

        </div>


      </div>

  <?php
  get_footer();
