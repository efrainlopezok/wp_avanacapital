<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<!-- BEGIN: Home Banner Section -->
<section class="page-banner bg-custom-banner" style="background-image:url(<?php echo lb_get_featured_image_source(2199, 'full'); ?>) !important">
	<div class="row">
		<div class="columns medium-12 medium-centered">
	     <div class="banner-content"><h1><?php the_title(); ?></h1>
	     	
	     </div>
		</div>
	</div>
</section> 
<!-- END: Home Banner Section -->
<section id="section_news">
	<div class="row eq-parent">
		<div class="medium-9 columns eq-child">
			<?php
			// Start the loop.
			if ( have_posts() ) while ( have_posts() ) : the_post();?>
			  	<div class="news-block">
			  		<?php
					$alt = "";
					$args = array(
						'post_type'         => 'attachment',
						'post_parent'       => $post->ID,
						'post_mime_type'    => 'image',
						'post_status'       => null,
						'posts_per_page'    => -1    
					);
					$attachments    = get_posts( $args );
		
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
						}	 
					}
			  		//Featured Image Url
					$featuredImage_url = lb_get_featured_image_source($post->ID, 'medium');
					?>
					<div class="text-center m-b15 clearfix">
						<?php
							if($featuredImage_url){
								echo '<img alt="'. $alt .'" src="'.$featuredImage_url.'">';
							}
						?>
					</div>
					<span class="news-date"> <?php echo get_the_date('M j, Y');?></span>
<br><br>
					<?php the_content(); ?>
	    		</div>
	    		<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				// End the loop.
			 endwhile; // end of the loop.
    		?>

		</div>
		<div class="medium-3 columns recent-news-block eq-child">
	     	<div class="p-l20">
				<h3 class="border-heading m-t0">Recent Blogs</h3>
				<?php 
					//echo is_page($post->ID);
					$args = array('post_status' => 'publish', 'posts_per_page' => '5');
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