<?php
/**
 * IvanPaulin_tsw functions and definitions
 *
 * @package IvanPaulin_tsw
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'ip_tsw_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ip_tsw_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on IvanPaulin_tsw, use a find and replace
	 * to change 'ip_tsw' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ip_tsw', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ip_tsw' ),
		'for_footer1' => __( 'For Tradesmen Menu1', 'ip_tsw' ),
		'for_footer2' => __( 'For Tradesmen Menu2', 'ip_tsw' ),
		'for_footer3' => __( 'For Tradesmen Menu3', 'ip_tsw' ),
		'support_footer' => __( 'Support Menu', 'ip_tsw' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ip_tsw_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ip_tsw_setup
add_action( 'after_setup_theme', 'ip_tsw_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function ip_tsw_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ip_tsw' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Top Widget', 'ip_tsw' ),
		'id'            => 'top-widget-1',
		'before_widget' => '<div class="col-md-12 ip_tsw_header_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="header_widget_title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'ip_tsw' ),
		'id'            => 'footer-widget-1',
		'before_widget' => '<div class="footer_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer_widget_title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Bottom Widget', 'ip_tsw' ),
		'id'            => 'bottom-widget-1',
		'before_widget' => '<div class="bottom_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="bottom_widget_title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Slider Widget', 'ip_tsw' ),
		'id'            => 'slider-widget-1',
		'before_widget' => '<div id="myCarousel" class="carousel slide slider_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="slider_widget_title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ip_tsw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ip_tsw_scripts() {

	wp_enqueue_style( 'ip_tsw-bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', array(), '3.0.2' );
	
	wp_enqueue_style( 'ip_tsw-style', get_stylesheet_uri() );
	

	wp_enqueue_script( 'ip_tsw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ip_tsw-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'ip_tsw-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.0.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'ip_tsw_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Load header widget 
*/
require get_template_directory(). '/inc/ip_tsw_header_widget.php';

function client_reviews_shortcode($atts, $content=NULL){
	extract(shortcode_atts(array(
	'name'	=>	'',
	'trade'	=>	'',
	'location'	=>	'',
	'website'	=>	'',
	'img'	=>	''
	),$atts));
	
	$out='<div class="client-reviews">
			<img class="alignnone size-full"  src="'.$img.'" />
			<div class="client_info">
				<p class="client-name"><b>Name:</b>'.$name.'</p>
				<p class="trade-name"><b>Trade:</b>'.$trade.'</p>
				<p class="client-location"><b>Location:</b>'.$location.'</p>
				<p class="client-website"><a href="'.$website.'" target="_blank">Visit Website</a></p>
			</div>
			<div class="clearfix"></div>
			<blockquote>'.$content.'</blockquote>
		</div>';
		
	return $out;
}

function social_shortcode($atts){
	extract(shortcode_atts(array(
	'facebook'	=>	'',
	'twitter'	=>	'',
	),$atts));
	
	$out='<ul class="social_icons">';
		if(!empty($facebook)){	$out.='<li><a href="'.$facebook.'" target="_blank" ><img src="'.get_template_directory_uri().'/images/face.png" /></a></li>'; }
		if(!empty($twitter)){	$out.='<li><a href="'.$twitter.'" target="_blank" ><img src="'.get_template_directory_uri().'/images/twitter.png" /></a></li>'; }
		$out.='</ul>';
			
	return $out;
}

function shortcode_register(){
	add_shortcode('client','client_reviews_shortcode');
	add_shortcode('social','social_shortcode');
}
add_action('init', 'shortcode_register');

add_filter('widget_text', 'do_shortcode');

function add_js(){
	  if ( wp_script_is( 'ip_tsw-bootstrap-js', 'done' ) ) {
?>
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#myCarousel').carousel({
    interval:5000
    });
});

</script> 
<?php
  }
}
add_action( 'wp_footer', 'add_js',122 );