<?php
get_header();
?>


      <!-- main -->
      <div id="main">

        <div class="row nopad">
          <div class="col-md-12 nopad">
            <div style="background-image:url('<?php echo the_post_thumbnail_url('full'); ?>');" class="bg-header"></div>
          </div>
        </div>

        <div class="row main-body nopadsides">
          <div class="col-sm-7">
              <h1 class="main-heading">About SWOP | Society, Work and Politics</h1>
              <?php
        			while ( have_posts() ) :
        				the_post();
    						the_content();
        			endwhile; // End of the loop.
        			?>
          </div>
          <div class="col-sm-1">
          </div>
          <div class="col-sm-4 bgblack-40">
            <div class="infobox-right">

              <?php
        				$args = array(
        					'tag' => 'aboutpage'
        				);
        				$aboutRight = new WP_Query($args);
        				if($aboutRight->have_posts()) :
        						while ($aboutRight->have_posts()) :
        							$aboutRight->the_post();
        							?>

                      <h2><?php echo the_title() ?></h2>
                      <?php echo the_content() ?>
        							<?php
        						endwhile;
        				endif;
        			?>
            </div>
          </div>

          <div class="col-sm-12">
            <h1 class="main-heading red-border-top">Our people</h1>
            <div class="row">

              <?php
        				$args = array(
        					'category_name' => 'people'
        				);
        				$aboutPeople = new WP_Query($args);
        				if($aboutPeople->have_posts()) :
        						while ($aboutPeople->have_posts()) :
        							$aboutPeople->the_post();
        							?>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="<?php the_permalink() ?>">
                          <div style="background-image:url('<?php echo the_post_thumbnail_url('full'); ?>')" class="bg-header"></div>
                        </a>
                        <a href="<?php the_permalink() ?>"><h4><?php echo the_title() ?></h4></a>
                        <p><h3><?php echo the_field('position') ?></h3></p>

                          <p><?php echo the_excerpt() ?></p>
                      </div>
        							<?php
        						endwhile;
        				endif;
        			?>
            </div>
          </div>


        </div>

      <?php
      get_footer();
