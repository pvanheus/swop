<?php
get_header();
?>


      <!-- main -->
      <div id="main">
        <div class="row nopad">
          <div class="col-md-12 nopad">
            <!-- MAKE DYNAMIC -->
            <!-- <?php echo do_shortcode("[carousel_slide id='116']"); ?> -->

            <?php
      				$args = array(
                'tag' => 'splash'
      				);
      				$homeSplash = new WP_Query($args);
      				if($homeSplash->have_posts()) :
      						while ($homeSplash->have_posts()) :
      							$homeSplash->the_post();
      							?>
                    <div class="homesplash" style="background-image:url(<?php echo the_post_thumbnail_url('full'); ?>);"></div>
      							<?php
      						endwhile;
      				endif;
      			?>
            <!-- <img src="https://placekitten.com/1920/1080" class="splash" /> -->
          </div>
        </div>

        <div class="row main-body equal nopad homepage">


          <div class="col-md-4 bgred homepage-programmes">
            <h2 class="frontpage-subheading">Our programmes</h2>
            <?php
            $args = array('parent' => 2);
            $categories = get_categories( $args );
            foreach($categories as $category) {
              $link = get_category_link( $category->term_id );
              $catDescription = $category->category_description;
            ?>
            <div class="programme-box">
              <h3><a href="<?php echo $link; ?>"><?php echo ($category->name)?></a></h3>

              <a href="<?php echo $link; ?>">
                <div>
                  <div class="frontpage-section-image frontpage-programme-background" style="background-image:url('<?php echo z_taxonomy_image_url($category->term_id); ?>');">
                </div>
              </div>
              </a>
              <p>
                <?php
                  echo $catDescription;
                ?>
             </p>
            </div>
            <?php
            }
            ?>
          </div>

          <div class="col-md-4 bgblack-20 section-container">
            <h2 class="frontpage-subheading">Events</h2>
            <?php
      				$args = array(
      					'category_name' => 'events',
                        'posts_per_page' => 3,
                        'order' => 'DESC',
                        'orderby' => 'meta_value',
                        'meta_key' => 'date'
      				);
      				$homepageEvents = new WP_Query($args);
      				if($homepageEvents->have_posts()) :
      						while ($homepageEvents->have_posts()) :
      							$homepageEvents->the_post();
      							?>
                    <a href="<?php the_permalink() ?>">
                    <div class="programme-box events-box event-body">
                      <h3><?php echo the_title() ?></h3>
                      <p class="date-text"><?php the_field('date') ?></p>
                      <img src="<?php echo the_post_thumbnail_url('full'); ?>" class="frontpage-section-image" />
                      <p><?php echo the_excerpt() ?></p>
                    </div>
                    </a>
      							<?php
      						endwhile;
      				endif;
      			?>
          </div>

          <div class="col-md-4 bgblack-30 section-container">
            <h2 class="frontpage-subheading">Recent publications</h2>
            <?php
      				$args = array(
      					'category_name' => 'publications',
                'posts_per_page' => 3,
                'order' => 'DESC'
      				);
      				$homepagePubs = new WP_Query($args);
      				if($homepagePubs->have_posts()) :
      						while ($homepagePubs->have_posts()) :
      							$homepagePubs->the_post();
      							?>
                      <div class="programme-box publication-box">
                        <div class="row">
                          <!-- <div class="col-sm-5"><img src="<?php echo the_post_thumbnail_url('full'); ?>" class="frontpage-section-image" /></div> -->
                          <div class="col-sm-12">

                            <?php if(has_category( 'SWOP Working Papers')) { ?>
                              <p class="publication-text red-text">SWOP working paper</p>
                            <?php } elseif(has_category( 'Books' )) { ?>
                              <p class="publication-text red-text">Book</p>
                            <?php } elseif(has_category( 'Journal Articles' )) { ?>
                              <p class="publication-text red-text">Journal article</p>
                            <?php } elseif(has_category( 'Popular Pieces' )) { ?>
                              <p class="publication-text red-text">Popular piece</p>
                            <?php } ?>
                            <a href="<?php echo the_field('link') ?>"><h3><?php echo the_title() ?></h3></a>
                            <p class="author-text"><?php the_field('authors') ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <a class="black-text" href="<?php echo the_field('link') ?>"><?php echo the_excerpt() ?></a>
                          </div>
                        </div>
                      </div>
      							<?php
      						endwhile;
      				endif;
      			?>
          </div>

        </div>


        <?php
        get_footer();
