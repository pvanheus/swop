<?php
get_header();
?>


    <div id="main">

      <div class="row nopadsides">
        <div class="col-sm-12">
          <h1 class="main-heading">Library</h1>
          <p>
          This is a brief blurb containing an overview of the library.
          <br /><br />
          </p>
        </div>
      </div>

      <div class="row main-body equal nopad">
        <?php
          $args = array(
            'category_name' => 'library',
            'posts_per_page' => 200,
            'order' => 'DESC'
          );
        $papers = new WP_Query($args);
        if($papers->have_posts()) :
            while ($papers->have_posts()) :
              $papers->the_post();
        ?>
        <div class="col-md-6">
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
        </div>
        <?php
          endwhile;
          wp_reset_query();
        ?>
      <?php endif; ?>

      </div>

  <?php
  get_footer();
