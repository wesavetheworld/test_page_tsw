<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package IvanPaulin_tsw
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header container" role="banner">
		<div class="row">
			<div class="site-branding col-md-5 col-xs-12 col-sm-5 pull-left">
			<?php if(get_theme_mod('ip_tsw_logo')){ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="img-responsive" src="<?php echo get_theme_mod('ip_tsw_logo'); ?>" /></a>
			<?php } else{ ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php } ?>
			</div>
			
			<div class="col-md-7 col-sm-7 col-xs-12 pull-right">
				<div class="row">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Widget')) : ?>
					<div class="col-md-12">
					</div><!-- .col-md-12 -->
					<?php endif; ?>
				</div><!-- .row -->
				
			</div><!-- .col-md-8 -->
			<div class="col-md-7 col-sm-7 col-xs-12 pull-right">
			<nav id="site-navigation" class="main-navigation" role="navigation">
						<h1 class="menu-toggle"><?php _e( 'Menu', 'ip_tsw' ); ?></h1>
						<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ip_tsw' ); ?></a>

						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'navigation', 'menu_class' => 'nav navbar-nav' ) ); ?>
					</nav><!-- #site-navigation -->
					</div>
			<div class="clearfix"></div><!-- .clearfix -->
		</div><!-- .row -->
	</header><!-- #masthead -->
	
	<div class="slider hidden-xs head_jumbo jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="slider-head">Simple, Professional &amp; affordable Websites for Tradesmen in Wales. Tidy.</h2>
					<div id="myCarousel" class="carousel slide">
					<?php //if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slider Widget')) : endif;?>
					<div class="carousel-inner">
<div class="item active"><img usemap="#test" src="http://demo.ivanpaulin.com/wp-content/uploads/2013/11/slider.png" />
<map name="test">
 <area shape="rect" coords="840,270,677,330" href="#">
 <area shape="rect" coords="620,270,457,330" href="#">
</map>
</div>
<div class="item"><img usemap="#teste" src="http://demo.ivanpaulin.com/wp-content/uploads/2013/11/slider.png" />
<map name="teste">
 <area shape="rect" coords="840,270,677,330" href="#">
 <area shape="rect" coords="620,270,457,330" href="#">
</map>
</div>
</div> <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div><!-- .carousel -->
				</div><!-- .col-md-12 -->
			</div><!-- .row-->
		</div><!-- .container -->
	</div><!-- .slider-->
	<div id="content" class="site-content container">
