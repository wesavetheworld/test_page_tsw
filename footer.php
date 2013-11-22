<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package IvanPaulin_tsw
 */
?>

	</div><!-- #content -->
	
	<div class="footer_jumbo jumbotron hidden-xs">
		<div class="container">
			<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6 forh"><h2 class="for-head">For Tradesmen</h2></div>
			<div class="col-md-6 col-sm-6 col-xs-6 supph"><h2 class="support-head">Support links</h2></div>
				<div class="col-md-8 col-sm-8 hidden-xs">
				
				<?php wp_nav_menu( array( 'theme_location' => 'for_footer1', 'container_id' => 'navigation_ff1', 'menu_class' => 'for-menu' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'for_footer2', 'container_id' => 'navigation_ff2', 'menu_class' => 'for-menu' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'for_footer3', 'container_id' => 'navigation_ff3', 'menu_class' => 'for-menu' ) ); ?>
				<div class="clearfix"></div>
				</div><!-- .col-md-7 -->
				
				<div class="col-md-2 col-sm-2 col-xs-2">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget')) :  endif;?>
				</div><!-- .col-md-2-->
				<div class="col-md-2 col-sm-2 col-xs-2">
				<?php wp_nav_menu( array( 'theme_location' => 'support_footer', 'container_id' => 'navigation', 'menu_class' => 'support-menu' ) ); ?>
				</div><!-- .col-md-3 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .jumbotron-->
	
	<footer id="colophon" class="site-footer container" role="contentinfo">
		<div class="row">
			<div class="site-info col-md-7 col-sm-7 col-xs-7">
				<?php do_action( 'ip_tsw_credits' ); ?>
				<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'ip_tsw' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'ip_tsw' ), 'IvanPaulin_tsw', '<a href="https://github.com/ipaulin/test_page_tsw" rel="designer">Ivan Paulin</a>' ); ?>
				<p>All rights Reserved. Company Number.1234</p>
			</div><!-- .site-info -->
			<div class="col-md-5 col-xs-5 col-sm-5">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Widget')) :  endif;?>
			</div><!-- .col-md-5-->
		</div><!-- .row -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>