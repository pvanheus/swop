<?php
get_header();
?>


      <!-- main -->
      <div id="main">
        <div class="row main-body nopadsides">
          <div class="col-sm-12">
              <h1 class="main-heading">About SWOP | Society, Work and Politics</h1>
              <?php
        			while ( have_posts() ) :
        				the_post();
    						the_content();
        			endwhile; // End of the loop.
        			?>
          </div>
        </div>

      <?php
      get_footer();
