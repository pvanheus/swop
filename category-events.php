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
                <div class="col-sm-6 nopad">
                  <a href="<?php the_permalink(); ?>">
                    <div class="event-pic">
                      <img src="<?php the_post_thumbnail_url("full"); ?>" class="event-pic"/>
                    </div>
                  </a>
                </div> <!-- col-sm-6 - left column -->
                <div class="col-sm-6">
                  <p class="date-text red-text"><?php the_field('date') ?></p>
                  <a class="no-underline" href="<?php the_permalink(); ?>"><h1 class="event-title-small"><?php the_title(); ?></h1></a>
                  <?php the_excerpt(); ?>
                </div> <!-- col-sm-6 - right column -->
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

                <div class="row event-box-small">
                  <div class="col-sm-6 nopad">
                    <a href="<?php the_permalink(); ?>">
                      <div class="event-pic">
                        <img src="<?php the_post_thumbnail_url("full"); ?>" class="event-pic"/>
                      </div>
                    </a>
                  </div> <!-- col-sm-6 - left column -->
                  <div class="col-sm-6">


                      <p class="date-text red-text"><?php the_field('date') ?></p>
                      <a class="no-underline" href="<?php the_permalink(); ?>"><h1 class="event-title-small"><?php the_title(); ?></h1></a>
                      <?php the_excerpt(); ?>
                  </div> <!-- col-sm-6 - right column -->
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
