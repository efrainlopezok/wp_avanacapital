<?php
/**
* Sample template for displaying single board members.
*
*/
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="<?php echo get_template_directory_uri(); ?>/css/grid.css" rel="stylesheet">
		<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/style.css' type='text/css' media='all' />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
		<style type="text/css" media="screen">
			.nav-tab li.active a, .nav-tab li:hover a {color: white;background: #912036;position: relative;}
			.nav-tab li.active a:after{ width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-top: 10px solid #912036; top: 100%; content: ""; position: absolute; left: 0; right: 0; margin: auto; }	
			.nav-tab { display: table !important; }
			
		</style>
		<?php wp_head(); ?>
	</head>
	<body>
		<section class="team-single-page test" style="min-height: 440px;">
			<span class="control prev hide-for-small"><?php echo lb_print_next_prev_members('PREV'); ?></span>
			<div class="row">
				<?php /* BEGIN: Content */?>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="medium-5 small-12 columns ">
                   <div class="team-detail">
					<?php $thumbnail = lb_get_featured_image_source(get_the_ID(), 'thumbnail');?>
					<div class="img-block" style="background-image:url('<?php echo $thumbnail;?>')"></div> 
					 <div class="info"><h1><?php print_custom_field('team_full_name'); ?></h1>
                    <?php if (get_custom_field('team_designation')){ ?>
						<h5 class="designation"><?php print_custom_field('team_designation'); ?></h5></div>	
					<?php }?>
					<style>
					.table{width:100%}
					.table td{text-align:left; padding:5px;}
					</style>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
					<tbody>
						<tr>
							<td width="30%" class="text-right"><strong>Office:</strong></td>
							<td><?php print_custom_field('team_office'); ?></td>
						</tr>
						<?php if (get_custom_field('team_phone')){ ?>
						<tr>
							<td class="text-right"><strong>Phone:</strong></td>
							<td><?php print_custom_field('team_phone'); ?></td>
						</tr>
						<?php }?>
						<?php if (get_custom_field('team_mobile')){ ?>
						<tr>
							<td class="text-right"><strong>Mobile:</strong></td>
							<td><?php print_custom_field('team_mobile'); ?></td>
						</tr>
						<?php }?>
						<?php if (get_custom_field('team_fax')){ ?>
						<tr>
							<td class="text-right"><strong>Fax:</strong></td>
							<td><?php print_custom_field('team_fax'); ?></td>
						</tr>
						<?php }?>						
						<?php if (get_custom_field('team_email')){ ?>
						<tr>
							<td class="text-right"><strong>Email:</strong></td>
							<td> <a href="mailto:<?php print_custom_field('team_email'); ?>"><?php print_custom_field('team_email'); ?></a></td>
						</tr>
						<?php }?>
						 <?php if (get_custom_field('team_linkedin_profile')){ ?>
						<tr>
							<td class="text-right"><strong>Linkedin:</strong></td>
							<td><a target="_blank" href="<?php print_custom_field('team_linkedin_profile'); ?>" class="linkdin-btn"><i class="fa fa-linkedin"></i></a></td>
						</tr>
						<?php }?>	
					</tbody>
				</table>
</div>
				</div>
				<div id="team-tab" class="medium-7 columns team-content">
					<ul class="nav-tab tabs">
						<li class="active"><a href="#professional_bio" title="Professional Bio">Professional Bio</a></li>
						<!-- <li class=""><a href="#getting_to_know" title="Getting to Know">Getting to Know</a></li> -->
					</ul>
					<div class="tab-content active " id="professional_bio">
						<?php the_content(); ?>	
					</div>
					<div class="tab-content" id="getting_to_know">
						<?php if (get_custom_field('teamgettingtoknow')){ ?>
							<?php print_custom_field('teamgettingtoknow'); ?>
						<?php }?>
					</div>
					
				</div>
				<?php endwhile; // end of the loop. ?>
				<?php /* END: Content */?>
			</div>
            </div>
			<span class="control next hide-for-small"><?php echo lb_print_next_prev_members('NEXT'); ?></span>
		</section>
		<script type="text/javascript" charset="utf-8">
			jQuery(".tabs").on("click","a",function(event) {
	            event.preventDefault();
	            jQuery(this).parent().addClass("active");
	            jQuery(this).parent().siblings().removeClass("active");
	            var tab = jQuery(this).attr("href");
	            jQuery(".tab-content").hide();
	            jQuery(tab).show();
	        });

	        jQuery(".tabs a:eq(0)").click();
		</script>
		<?php wp_footer(); ?>
	</body>
</html>