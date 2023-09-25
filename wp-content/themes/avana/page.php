<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php $bg_url = lb_get_featured_image_source($post->ID, 'full');
	if(empty($bg_url)){
		$bg_url = get_template_directory_uri().'' .'/images/bg_default.jpg';
	}
?>
<!-- BEGIN: Home Banner Section -->

<section class="page-banner" style="background-image:url(<?php echo $bg_url; ?>)">
	<div class="row">
		<div class="columns medium-10 medium-centered">
		<?php the_excerpt() ?>
		</div>
	</div>
</section>

<!-- END: Home Banner Section -->
<?php the_content() ?>

<?php get_footer(); ?>