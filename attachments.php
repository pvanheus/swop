<?php
/*
 * Template Name: attachments
 * description: >-
  Page template without sidebar
 */

 	get_header();
 ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">

      <!-- this will display for site/page-attachments/ -->
      <?php
      $args = array(
        'post_type'=>'attachment',
        'numberposts'=>null,
        'post_status'=>null,
        'tag'=>'gender'

      );
        $attachments = get_posts($args);

        if ( $attachments ) {
          foreach ( $attachments as $attachment ){
            $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
            $thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
            $thumburl = $attachment->url;
            echo '<li>'.$thumbimg.' '.$thumburl.'</li>';
          }
        }
      ?>

    </main>
 	</div>

<?php
  get_footer();
?>
