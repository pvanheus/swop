<?php
get_header();
?>

      <!-- main -->
      <div id="main">

        <div class="row nopadsides">
          <div class="col-sm-12">
            <h1 class="main-heading">Events</h1>
          </div>
        </div>



        <div class="row main-body nopadsides">
          <div class="col-sm-12">

            <?php
              $args = array(
                'category_name' => 'events',
                'posts_per_page' => 50,
                'meta_key'  => 'date',
                'orderby'   => 'date',
                'order' => 'DESC'
              );
            $events = new WP_Query($args);
            if($events->have_posts()) :
                while ($events->have_posts()) :
                  $events->the_post();
                  //check if past or future event
                  $future_event = false;
                  $event_date = get_field('date');
                  $event_date = explode("/",$event_date);
                  $currentDay = date("d");
                  $currentMonth = date("m");
                  $currentYear = date("Y");
                  $event_year = explode(" ",$event_date[2])[0];

                  if (($event_year > $currentYear) || ($event_year == $currentYear && $event_date[1] > $currentMonth) || ($event_year == $currentYear && $event_date[1] == $currentMonth&& $event_date[0] > $currentDay)){
                    $future_event = true;
                  }
            ?>

            <?php if ($future_event): ?>
            <div class="row event-box">
              <div class="col-sm-12 col-md-3">
                <a href="<?php the_permalink(); ?>"><img class="event-pic" src="<?php the_post_thumbnail_url("full"); ?>" width="100%" /></a>
              </div>
              <div class="col-md-1 hidemobile">
              </div>
              <div class="col-sm-12 col-md-8">
                <p class="date-text red-text"><?php the_field('date') ?></p>
                <a class="no-underline" href="<?php the_permalink(); ?>"><h1 class="event-title"><?php the_title(); ?></h1></a>
                <?php the_excerpt(); ?>
              </div>
            </div>
          <?php endif ?>
            <?php
              endwhile;
              wp_reset_query();
            ?>
          <?php endif; ?>

          </div>
          <div class="col-sm-12 nopad bgblack-30xxx">
            <h2>Past events</h2>
            <div class="row nopad">

                <?php
                  $args = array(
                    'category_name' => 'events',
                    'posts_per_page' => 50,
                    'meta_key'  => 'date',
                    'orderby'   => 'date',
                    'order' => 'DESC'
                  );
                $events = new WP_Query($args);
                if($events->have_posts()) :
                    while ($events->have_posts()) :
                      $events->the_post();
                      //check if past or future event
                      $future_event = false;
                      $event_date = get_field('date');
                      $event_date = explode("/",$event_date);
                      $currentDay = date("d");
                      $currentMonth = date("m");
                      $currentYear = date("Y");
                      $event_year = explode(" ",$event_date[2])[0];

                      if (($event_year > $currentYear) || ($event_year == $currentYear && $event_date[1] > $currentMonth) || ($event_year == $currentYear && $event_date[1] == $currentMonth&& $event_date[0] > $currentDay)){
                        $future_event = true;
                      }
                ?>

                <?php if (!$future_event): ?>

                <div class="col-sm-6 nopad">
                <div class="row event-box-small">
                  <div class="col-sm-12">
                    <a href="<?php the_permalink(); ?>">
                      <div>
                        <div class="event-pic-small" style="background-image:url('<?php the_post_thumbnail_url("full"); ?>');"></div>
                      </div>
                  </div>
                  <div class="col-sm-12">

                    <div class="col-sm-12 col-md-3">
                    </div>
                    <div class="col-md-1 hidemobile">
                    </div>
                    <div class="col-sm-12 col-md-8">
                      <p class="date-text red-text"><?php the_field('date') ?></p>
                      <a class="no-underline" href="<?php the_permalink(); ?>"><h1 class="event-title-small"><?php the_title(); ?></h1></a>
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif ?>
                <?php
                  endwhile;
                  wp_reset_query();
                ?>
              <?php endif; ?>


            </div>
          </div>
        </div>


  <?php
  get_footer();
