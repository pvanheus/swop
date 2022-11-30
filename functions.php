<?php

if ( ! function_exists( 'swop_setup' ) ) :

	function swop_setup() {

		load_theme_textdomain( 'swop', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		// apply tags to attachments
		function wptp_add_tags_to_attachments() {
		    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
		}

		add_action( 'init' , 'wptp_add_tags_to_attachments' );

		//define a constant path to our single template folder
		define('SINGLE_PATH', TEMPLATEPATH . '/single');
		add_filter('single_template', 'event_template');

		add_filter( 'widget_text', 'do_shortcode' );

		//choose template per category
		function event_template($single) {
			global $wp_query, $post;
			foreach((array)get_the_category() as $cat) :
			if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
				return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
			elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
				return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
			else
				return SINGLE_PATH . '/single.php';
			endforeach;
		}

		//single template by category
		add_filter('single_template', 'check_for_category_single_template');
		function check_for_category_single_template( $t )
		{
		  foreach( (array) get_the_category() as $cat )
		  {
		    if ( file_exists(STYLESHEETPATH . "/single-category-{$cat->slug}.php") ) return STYLESHEETPATH . "/single-category-{$cat->slug}.php";
		    if($cat->parent)
		    {
		      $cat = get_the_category_by_ID( $cat->parent );
		      if ( file_exists(STYLESHEETPATH . "/single-category-{$cat->slug}.php") ) return STYLESHEETPATH . "/single-category-{$cat->slug}.php";
		    }
		  }
		  return $t;
		}

		//add category to body class
		add_filter('body_class','add_category_to_single');
		  function add_category_to_single($classes) {
		    if (is_single() ) {
		      global $post;
		      foreach((get_the_category($post->ID)) as $category) {
		        // add category slug to the $classes array
		        $classes[] = $category->category_nicename;
		      }
		    }
		    // return the $classes array
		    return $classes;
		  }

		//check and switch background
		function onPageLoad(){
			$cat = get_the_category();
			$size = count($cat);
			$subcat = $cat[$size-1]->name;
		}
		add_action( 'wp', 'onPageLoad' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'home-thumbnail', 200, 200, true );
		add_post_type_support( 'download', 'custom-fields' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'swop' ),
		) );

	}
endif;

add_action( 'after_setup_theme', 'swop_setup' );

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
function swop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swop_content_width', 640 );
}
add_action( 'after_setup_theme', 'swop_content_width', 0 );
/**



/* Enqueue scripts and styles. */
function swop_scripts() {
	$rand = rand(1,19999999);
	wp_enqueue_style( 'swop-style', get_stylesheet_uri(),'', $rand );
}

add_action( 'wp_enqueue_scripts', 'swop_scripts' );

//add bootstrap and jquery
function custom_scripts() {
	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
	wp_enqueue_script( 'bootstrap-cdn-js',  get_template_directory_uri() . '/js/bootstrap-grid.min.js' );
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );



function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');

//add Open Graph Meta Info
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="swop - Society, Work and Politics Institute"/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
				$default_image= get_template_directory_uri()."/img/logo.png"; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

