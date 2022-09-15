<?php
get_header();
?>


<div id="main">
  <div class="row nopadsides">
    <div class="col-sm-12">
      <h1 class="main-heading">Research projects and programmes</h1>
      <p>
      This is a brief blurb containing an overview of the projects/programmes.
      </p>
    </div>
  </div>

  <div class="row main-body nopadsides">

    <?php

    $cat = get_category( get_query_var('cat'));
    $cat_id = $cat->cat_ID;
    $child_categories = get_categories(
        array('parent' => $cat_id)
    );

    foreach ( $child_categories as $child ) {?>

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
