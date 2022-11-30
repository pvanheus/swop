<!--
used for displaying a sub-category of programmes, e.g. 'transition from coal'
-->

<?php get_header(); ?>


<div id="main">
    <div class="breadcrumbs" typeof="BreadcumbList" vocab="https://schema.org">
        <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        }
        ?>
    </div>
  <div class="row nopadsides">
    <div class="col-sm-12">
      <?php
      $category = get_category( get_query_var('cat'));
      $cat_name = $category->name;
      $catDescription = $category->category_description;
      ?>
      <h1 class="main-heading"><?php echo $cat_name; ?></h1>
      <p>
      <?php echo $catDescription ?>
      </p>
    </div>
  </div>


<div class="row main-body nopadsides">
  <div class="col-sm-4">

    <?php

    $cat = get_category( get_query_var('cat'));
    $cat_id = $cat->cat_ID;
    $child_categories = get_categories(
        array(
          'parent' => $cat_id,
          'hide_empty'  => 0
        ),
    );
    $count = 1;

    foreach ($child_categories as $child) {?>
      <a href="#" class="project-nav" data-info="<?php echo $count; ?>"><h3><?php echo $child->name ?></h3></a>
    <?php
      $count++;
    }
    ?>


  </div>
  <div class="col-sm-1">
  </div>
  <div class="col-sm-7">

    <?php

    $cat = get_category( get_query_var('cat'));
    $cat_id = $cat->cat_ID;
    $child_categories = get_categories(
        array(
          'parent' => $cat_id,
          'hide_empty'  => 0
        ),
    );
    $count = 1;

    foreach ($child_categories as $child) { ?>
      <div class="row rp-section" id="project-section-<?php echo $count; ?>">
        <div class="col-sm-12">
          <h3 class="main-heading red-text"><?php echo $child->name ?></h3>

          <?php
            $args = array(
              'cat' => $child->term_id,
              'posts_per_page' => 10,
              'order' => 'DESC'
            );
            $programmeSection = new WP_Query($args);
            if($programmeSection->have_posts()) :
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

  </div>
</div>

<?php get_footer(); ?>
