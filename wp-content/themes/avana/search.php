<?php
/**
 * The template for displaying search results pages.
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
	$postType = $_GET["post_type"];
?>
<!-- BEGIN: page Banner Section -->
<section class="page-banner" style="background-image:url(<?php echo $bg_url; ?>)">
	<div class="row">
		<div class="columns medium-10 medium-centered">
			<div class="banner-content">
				<h1>
					Search
				</h1>
				<p class="black">Question Bank</p>
			</div>
		</div>
	</div>
</section>
<!-- END: page Banner Section -->

<?php if($postType){ 
echo do_shortcode('[sb name="Knowledge-Base-Search"]');
 } ?>
<section class="section">
	<div class="row">
		<div class="columns medium-12">
			<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
				<?php if($postType){ 
					 echo do_shortcode('[sb name="Knowledge-Base-List"]');
				} else {
					// Start the loop.
					while ( have_posts() ) : the_post(); ?>

						<?php
						/*
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'search' );

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
						'next_text'          => __( 'Next page', 'twentyfifteen' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
					) );

				// If no content, include the "No posts found" template.
				
			}
			else :
				if($postType){ ?>
					<style type="text/css">
						.search-form{display: none}
					</style>
				<?php } 
				get_template_part( 'content', 'none' );
			endif;
			?>
		</div>
	</div>
</section>


<?php get_footer(); ?>
