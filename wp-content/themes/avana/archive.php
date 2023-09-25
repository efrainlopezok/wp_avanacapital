<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
<section class="page-banner bg-custom-banner" style="background-image:url(<?php echo lb_get_featured_image_source(28, 'full'); ?>) !important">
	<div class="row">
		<div class="columns medium-10 medium-centered">
	     <div class="banner-content">
	<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<p class="taxonomy-description black">', '</p>' );
				?>
	     </div>
		</div>
	</div>
</section> 
<!-- END: Home Banner Section -->
<section class="section">
	<div class="page-content">
		<div class="row">
			<div class="columns medium-12">
				<?php if ( have_posts() ) : ?>
					<ul class="medium-block-grid-2 blog-list">
						<?php
						while ( have_posts() ) : the_post();
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
							$featuredImage_url = lb_get_featured_image_source($post->ID, 'full');
							if(empty($featuredImage_url)){
								$featuredImage_url = get_template_directory_uri().'' .'/images/bg_default.jpg';
							}
						?>
							<li class="grid-item">
								<div class="text-center m-b15">
									<img alt="<?php $alt; ?>" src="<?php echo $featuredImage_url;?>">
								</div>
								<div class="row">
									<div class="columns medium-4">
										<?php //the_date('Y-M-d', '<h2>', '</h2>'); ?>
										<div class="blog-post-date m-t15">
											<div class="date"><?php echo get_the_date('d')?></div>
											<div class="month-year">
												<p><?php echo get_the_date('Y')?></p>
												<h3><?php echo get_the_date('M')?></h3>
											</div>
											<div class="blog-list-categories">
												<?php echo get_the_category_list(); ?>
											</div>
											<a href="<?php echo the_permalink();?>#comments"><i class="fa-chat p-r5"></i> <?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a>
										</div>
									</div>
									<div class="columns medium-8">
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<header class="entry-header">
												<?php the_title( sprintf( '<h2 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
											</header><!-- .entry-header -->

											<div class="entry-content">
												<p><?php
													the_excerpt();
													?><i class="clearfix">&nbsp;</i>
													<a href="<?php echo the_permalink();?>" class="cta cta-xs-small cta-small">Read More</a></p>
												</div><!-- .entry-content -->
											</article><!-- #post-## -->
										</div>
									</div>
							</li>
						<?php 
						
						endwhile;?>
					</ul>
					<div class="bottom-tool-bar row">
						<div class="columns medium-12 text-right">
							<?php wp_pagenavi();?>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->

	
<?php get_footer(); ?>
