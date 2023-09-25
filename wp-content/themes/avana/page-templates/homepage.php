<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<!-- BEGIN: Home Banner Section -->
<section id="section_home_banner">
	<div class="content-cols">
		<div class="columns medium-6 home-banner-left">
			<div class="home-banner-columns">
				<h2>Investing</h2>
				<span>Preserving Wealth</span><br>
				<a href="<?php echo get_permalink(132); ?>" class="cta cta-big  cta-xs-small">Get Started</a>
			</div>
			<div class="hover-bg"></div>
			<div class="home-banner-solutions">
				<?php echo do_shortcode("[sb name='HP_Investing_Rollover']");?>
			</div>
			
		</div>
		<div class="columns medium-6 text-right home-banner-right">
			<div class="home-banner-columns">
				<h2>Borrowing</h2>
				<span>Creating Growth</span><br>
				<a href="<?php echo get_permalink(28); ?>" class="cta cta-big cta-xs-small">Get Started</a>
			</div>
            <div class="hover-bg"></div>
            <div class="home-banner-solutions">
				<?php echo do_shortcode("[sb name='HP_Borrowing_Rollover']");?>
			</div>
			
		</div>
	</div>
</section>
<!-- END: Home Banner Section -->
<?php //echo do_shortcode('[sb name="Avana_Facts"]') ?>
<?php echo do_shortcode('[message_covid19]') ?>

<?php echo do_shortcode('[faqs]') ?>

<?php the_content()?>
<script>
   jQuery(window).load(function() {
        SITE.initSlider('#our_team_slider',4);
    });
</script>
<?php get_footer();