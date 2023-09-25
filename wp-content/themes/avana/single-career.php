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
<section class="page-banner bg-custom-banner" style="background-image:url(<?php echo lb_get_featured_image_source(41, 'full'); ?>) !important">
	<div class="row">
		<div class="columns medium-10 medium-centered">
	     <div class="banner-content"><h1>CAREER DETAILS</h1>
	     <p class="black">Choose a job you love, and you will never have to work a day in your life. - Confucius</p>
	     </div>
		</div>
	</div>
</section> 
<!-- END: Home Banner Section -->
<section class="bg-spanish-white-gradient section" id="jobpost_section">
	<div class="row">
		<div class="medium-6 columns">
		      <div class="job-details-block">
			   <div class="clearfix"><h4>Career Details</h4>
            <div class="fl"> <img src="<?php echo get_template_directory_uri(); ?>/images/user-icon.png" alt="user-icon" width="85" height="85" class="alignnone size-medium wp-image-95" /></div>
            <h5><?php echo get_custom_field('career_position'); ?></h5>
            <p><?php echo get_custom_field('career_location'); ?></p></div>
       <?php the_content(); ?>
            </div>            
		</div>
		<div class="medium-6 columns">
		      <div class="job-post-form">
			  <h4>Apply Here</h4>
			<?php echo do_shortcode('[gravityform id="2" title="false" description="true"]');?>
			</div>
		</div>	
	</div>
</section>
<?php get_footer(); ?>