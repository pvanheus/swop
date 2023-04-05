<?php
get_header();
?>


<div id="main">
  <div class="row nopadsides">
    <div class="col-sm-12">
      <h1 class="main-heading">Research projects and programmes</h1>
    </div>
  </div>

  <div class="row main-body nopadsides">

    <?php

    $cat = get_category( get_query_var('cat'));
    $cat_id = $cat->cat_ID;
    $child_categories = get_categories(
        array('parent' => $cat_id)
    );

    $count = 0;
    foreach ( $child_categories as $child ) {
        if ($count == 4) {
            ?><hr class="mt-3 mb-3" style="border-top: 2px solid;"/><?
        }
        $count++;
        ?>
      <div class="col-sm-12 col-md-6 nopadsides">

        <div class="research-box" style="background-image:url('<?php echo z_taxonomy_image_url($child->term_id); ?>');">
          <div class="research-box-inner">
            <div class="inner-block"></div>
            <div class="inner-text">
              <a class="no-underline" href="<?php echo($child->slug) ?>"><h2><?php echo($child->cat_name) ?></h2></a>
              <p><?php echo $child->category_description; ?></p>
            </div>
          </div>
        </div>
      </div>

    <?php
    }
     ?>

</div>

  <?php
  get_footer();
