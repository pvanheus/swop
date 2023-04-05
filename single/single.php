<?php
$categories = wp_get_post_categories(get_the_ID());
if (post_in_category_named("people", $categories)) {
    include('single-cat-people.php');
    exit;
} else {
    get_header();
?>


      <!-- main -->
      <div id="main">

        <div class="row nopad">
            <div class="breadcrumbs" typeof="BreadcumbList" vocab="https://schema.org">
                <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
                ?>
            </div>
          <div class="col-md-12 nopad">
						<?php
						// Must be inside a loop.
						if ( has_post_thumbnail() ):
							?>
							<div style="background-image:url('<?php echo the_post_thumbnail_url('full'); ?>');" class="bg-header"></div>
						<?php
						endif;
						?>
          </div>
        </div>

        <div class="row main-body nopadsides">
          <div class="col-sm-12 col-md-9">
              <h1 class="main-heading"><?php the_title(); ?></h1>
              <?php
        			while ( have_posts() ) :
        				the_post();
    						the_content();
        			endwhile;
        			?>
          </div>
					<div class="col-sm-12 col-md-3">
					</div>
        </div>

      <?php
      get_footer();
}
