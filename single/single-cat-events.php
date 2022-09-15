<?php
get_header();
?>


      <!-- main -->
      <div id="main">

				<?php
				while ( have_posts() ) : ?>
					<?php the_post(); ?>
				<div class="row main-body nopadsides">
          <div class="col-sm-4">
            <img src="<?php echo the_post_thumbnail_url("full"); ?>" class="event-pic-big" />
          </div>
          <div class="col-sm-1">
          </div>
          <div class="col-sm-7">
							<p class="date-text red-text"><?php the_field('date') ?></p>
              <h1 class="main-heading red-text"><?php the_title(); ?></h1>
              <p>
                <?php the_content(); ?>
              </p>
          </div>
        </div>
				<?php
					endwhile;
					wp_reset_query();
				?>

      <?php
      get_footer();
