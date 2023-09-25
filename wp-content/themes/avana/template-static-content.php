<?php
/**
 * Template Name: Static Content Page
 */

get_header(); ?>
<?php $bg_url = lb_get_featured_image_source($post->ID, 'full');
	if(empty($bg_url)){
		$bg_url = get_template_directory_uri().'' .'/images/bg_default.jpg';
	}
?>

<!-- BEGIN: Home Banner Section   style="background-image:url(<?php echo $bg_url; ?>) -->
<section class="page-banner" style="background:none; overflow:hidden; position:relative;">
	<img src="<?php echo $bg_url; ?>" alt="" style="opacity:0.6; position:absolute; left:0; top:0; width:100%;"/> 
	<div class="row">
		<div class="columns medium-10 medium-centered">
			<div class="banner-content">
				<h1><?php the_title(); ?></h1>
				<p class="black"><?php the_excerpt() ?></p>
			</div>
		</div>
	</div>
</section>
<!-- END: Home Banner Section -->
<style>
/* .static-page-section p {
	margin-bottom:30px
} */

@media screen and (min-width:767px){
	.medium-10 {
		width: 90.333% !important;
		padding-bottom:70px
	}
}

</style>
<?php 
$static = get_post_meta(get_the_ID(), 'static_page_data' );
?>
<!-- start custom page content -->
<section id="section_sbaloancontent" class="clearfix static-page-section">

    <div class="row structure-info">
        <div class="columns medium-12">
		<!-- <?php //echo $static[0]['static-top-paragraph']; ?><br>	
		<h2><?php //echo $static[0]['static-first-title']; ?></h2>
		<p><?php //echo $static[0]['static-second-paragraph']; ?></p><br>
		<h2><?php //echo $static[0]['static-second-title']; ?></h2>
		<p><?php //echo $static[0]['static-third-paragraph']; ?></p>	 -->
		<?php the_content(); ?>
        </div>
        <div class="clearfix"></div>
	</div>
</section>


<section id="section_useof_loancontent" class="section">
	<div class="row eq-parent">
        <div class="columns medium-12">
		<h4 style="text-align: center;"><?php echo $static[0]['static-page-form-text']; ?></h4>
        </div>
        <div class="columns medium-12">
		<?php echo do_shortcode($static[0]['static-page-form-shortcode']); ?>
			<?php //echo do_shortcode('[gravityform id="4" title="false" description="false"]'); ?>
        </div>
	</div>
</section>

<?php echo do_shortcode($static[0]['static-page-support-shortcode']); ?>
<?php //echo do_shortcode('[sb name="Section_support_avana_capital"]'); ?>

<?php //the_content() ?>
<!-- / end custom page content -->

<?php get_footer(); ?>
