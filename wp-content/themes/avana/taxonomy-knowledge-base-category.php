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
<section class="page-banner" style="background-image:url(<?php echo $bg_url; ?>)">
	<div class="row">
		<div class="columns medium-10 medium-centered">
			<div class="banner-content">
				<h1>
					<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					echo $term->name;?>
				</h1>
				<p class="black">Question Bank</p>
			</div>
		</div>
	</div>
</section>
<!-- END: Home Banner Section -->

<?php echo do_shortcode('[sb name="Knowledge-Base-Search"]');?>
<section class="section">
	
	<?php echo do_shortcode('[sb name="Knowledge-Base-List"]');
	/*?>
	<div class="row eq-parent">
		<div class="columns medium-8 eq-child">
			<ul class="question-detail-list">
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();?>
				<li>
					<h5 class="font-b"><?php the_title();?></h5>
					<?php if(get_custom_field('knowledge_base_team')){?>
						<p class="p-14x"><strong>Team Name:</strong> <span class="red"><?php echo get_custom_field('knowledge_base_team')?></span></p>
					<?php } ?>
					<?php the_content();?>
				</li>
				<?php endwhile; ?>
			<?php endif;?>
			</ul>
			<?php  wp_pagenavi();?>
		</div>
		<div class="columns medium-4 question-sidebar eq-child">
		<?php 
			$taxonomyName = 'knowledge-base-category';
			$custom_terms = get_terms($taxonomyName);
			
			foreach($custom_terms as $custom_term) {
			wp_reset_query();
				$args = array('post_type' => 'knowledge-base',
				    'tax_query' => array(
				        array(
				            'taxonomy' => $taxonomyName,
				            'field' => 'slug',
				            'terms' => $custom_term->slug,
				        ),
				    ),
				 );
				 $the_query = new WP_Query($args);
				 if($the_query->have_posts() && $catName != $custom_term->term_id) { ?>
				 		<div>
						   	<h5 class="font-b"><a href="<?php echo home_url().'/'.$taxonomyName.'/'.$custom_term->slug ?>"><?php echo $custom_term->name ?></a></h5>
						   	<ul class="list-red-tick eq-child">
						    <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
						        <li><?php echo get_the_title();?></li>
						    <?php endwhile;?> 
						    </ul>
					    </div>
				    <?php
				 }
			}?>
		</div>
	</div>
	<?php */?>
</section><!-- .no-results -->

	
<?php get_footer(); ?>
