<?php
/**
 * Sample template for displaying single team posts.
 *
 */
get_header(); ?>
<?php $bg_url = lb_get_featured_image_source($post->ID, 'full');
	if(empty($bg_url)){
		$bg_url = get_template_directory_uri().'' .'/images/bg_default.jpg';
	}
?>
<!-- BEGIN: Home Banner Section -->
<section class="page-banner bg-custom-banner" style="background-image:url(<?php echo lb_get_featured_image_source(28, 'full'); ?>) !important">
	<div class="row">
		<div class="columns medium-10 medium-centered">
	     <div class="banner-content"><h1>News</h1></div>
		</div>
	</div>
</section> 
<!-- END: Home Banner Section -->
<section id="section_news">
	<div class="row eq-parent">
			<div class="medium-8 columns eq-child">
			  <div class="news-block">
				<h3 class="double-br-heading"><?php the_title(); ?> <br>
				<sapn class="news-date"> <?php echo get_the_date('M j, Y');?></sapn></h3>
			    <p><?php echo get_custom_field('team_designation'); ?></p>
	            <?php the_content(); ?>
				
    		</div>
			</div>
			<div class="medium-4 columns recent-news-block eq-child">
			     <div class="p-l20">
				<h3 class="border-heading m-t0">Recent News</h3>
					<?php 
						echo is_page($post->ID);
						$args = array('post_type' => 'news', 'post_status' => 'publish');
		                $the_query = new WP_Query( $args );
		                $current_page = $post->ID ;
		                if ($the_query->have_posts()) :
		             ?>
		            <ul class="news-updates">
		             <?php while ($the_query->have_posts()) : $the_query->the_post();
		             ?>
							<li class='<?php if ( $post->ID == $current_page ){ 
								echo 'active';
							}?>'>
								<a href="<?php the_permalink();?>"><h5><?php the_title(); ?> </h5>
							  	<span> <?php echo get_the_date('M j, Y');?></span>
							  	</a>
							</li>
						<?php endwhile; // end of the loop. ?>
					</ul>
				<?php wp_reset_postdata();?>
                <?php endif; //if ?>
			</div>	
			</div>	
	</div>
</section>
<?php get_footer(); ?>