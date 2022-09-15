<?php
get_header();
?>


    <div id="main">

      <div class="row nopadsides">
        <div class="col-sm-12">
          <h1 class="main-heading"><?php printf( esc_html__( 'Search Results for: %s', 'inkani' ), '<span>' . get_search_query() . '</span>' );?></h1>
        </div>
      </div>

      <div class="row main-body equal nopad">

        <?php
        while ( have_posts() ) :
          the_post();
          ?>

          <div class="col-md-12">
            <a class="no-underline" href="<?php the_permalink(); ?>"><h3 class="pub-title"><?php the_title(); ?></h3></a>
          </div>

        <?php
          endwhile;
        ?>

      </div>

  <?php
  get_footer();
