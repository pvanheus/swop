<?php
get_header();
?>
	<!-- this is a features post -->

	<div id="primary" class="content-area">
				<div id="main">
					<div class="row event-list">
						<?php
						while ( have_posts() ) : ?>
							<?php the_post(); ?>
								<div class="col-xs-12 col-md-6 nopad">
									<div class="single-featured"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("full"); ?></a></div>
								</div>
								<div class="col-xs-12 col-md-6 nopad">
									<a href="<?php the_permalink(); ?>"><h2 class="event-title"><?php the_title(); ?></h2></a>
									<p><?php the_content(); ?></p>
								</div>
							</div>
						<?php
							endwhile;
							wp_reset_query();
						?>

					</div>
				</div>

<?php
get_footer();
