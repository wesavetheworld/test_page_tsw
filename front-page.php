<?php

/**
* Template Name: Home Page
*
**/
	
		get_header();
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php
			$arg=array(
				'post_type'	=>	'post',
				'category_name'	=>	'home posts',
				'post_status'	=>	'publish',
				'post_per_page'	=>	3,
				'meta_key'	=>	'post_order',
				'orderby'	=>	'meta_value_num',
				'order'	=>	'ASC',
			);
			$home_query=new WP_Query($arg);
			
			if($home_query->have_posts()){ ?>
			<div class="row"> <?php
				$counter=0;
				while($home_query->have_posts()){
					$counter++;
					$home_query->the_post(); ?>
					<div class="col-md-4 col-sm-4 col-xs-12 home-posts hpn-<?php echo $counter; ?>">
						<span class="home-post-heading hn-<?php echo $counter; ?>"><span class="heading_num"><?php echo $counter; ?></span><span class="heading"><?php the_title(); ?></span>
						<?php $subtitle=get_post_meta($home_query->post->ID, 'subtitle', true); if($subtitle){ echo '<span class="subtitle">'.$subtitle.'</span>';} ?></span>
						<?php the_content('FIND OUT MORE'); ?>
						</div><!-- .home-posts -->
					<?php
				} ?>
				</div><!-- .row --> <?php
			}
			wp_reset_postdata();
		?>
	</div><!-- .col-md-12 -->
</div><!-- .row -->
<?php get_footer(); ?>