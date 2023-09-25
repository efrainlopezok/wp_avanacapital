<?php
/**
 * Template Name: New Landing
 *
 * @package avana
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();
 ?>
<!-- BEGIN: Home Banner Section -->
<?php 
 $hero = get_field('hero') ? get_field('hero'):'';

 if($hero != ''):
    $logo_hero = $hero['logo_hero'] ? $hero['logo_hero'] : '';
    $subtitle_hero = $hero['subtitle_hero'] ? $hero['subtitle_hero'] : '';
    $title_footer = $hero['title_footer'] ? $hero['title_footer'] : '';
    $image_hero = $hero['image_hero'] ? $hero['image_hero'] : '';

?>
<section class="landing-hero text-center" style="background:url(<?php echo $image_hero; ?>);background-size:cover;">
	<div class="row">
		<a href="<?php echo get_site_url() ?>">
			<img src="<?php echo  $logo_hero; ?>" alt="Avana">
		</a>
		<h3 class="text-center" style="text-align:center;white-space:pre-wrap;"><?php echo $subtitle_hero; ?></h3>
		<h1 class="text-center"><?php echo  $title_footer; ?></h1>
	</div>
</section>
 <?php endif;?>
<?php
$summary = get_field('summary') ? get_field('summary'):'';
if($summary != ''):
    $detailSummary = $summary['detail-summary'] ? $summary['detail-summary'] : '';
    $link_summary = $summary['link_summary'] ? $summary['link_summary'] : '';
	$sub_infomation = $summary['sub_infomation'] ? $summary['sub_infomation'] : '';
	$id_for = $summary['id_for'] ? $summary['id_for'] : '';
	$contact_us = $summary['contact_us'] ? $summary['contact_us'] : '';
	$contact_title = $contact_us['contact_title'] ? $contact_us['contact_title'] : '';
	$contact_information = $contact_us['contact_information'] ? $contact_us['contact_information'] : '';
	$link_about = $contact_us['link_about'] ? $contact_us['link_about'] : '';
?>
<section class="summary-section">
	<div class="row">
		<div class="columns medium-8 ">
			
			<?php 
				echo $detailSummary;
			?>
			<a href="<?php echo $link_summary['url']; ?>" class="btn btn-red"><?php echo $link_summary['title']; ?></a>

			<p>
					<?php echo $sub_infomation ;?>
			</p>
		</div>
		<div class="columns medium-4 ">
			<hr>
			<?php echo do_shortcode('[gravityform id='.$id_for.' title=false description=false ajax=true tabindex=49]') ?>

			<div class="contact-info " >
				<?php echo $contact_information ; ?>
				<a href="<?php echo $link_about['url'];?>" class="btn btn-red-small"><?php echo $link_about['title'];?></a>
			</div>
		</div>
		
	</div>
</section>

<?php endif; ?>

<?php
$map = get_field('map') ? get_field('map'):'';
if($map != ''):
    $background_map = $map['background_map_section'] ? $map['background_map_section'] : '';
    $title_map = $map['title_map'] ? $map['title_map'] : '';
	$map_dsc = $map['map_description'] ? $map['map_description'] : '';
	$map_markers = $map['map_markers'] ? $map['map_markers'] : '';
?>
<section class="map-section" style="height: 900px; background-image:url(<?php echo $background_map; ?>">
	<h2><strong><?php echo $title_map; ?></strong></h2>
	<div class="content-title">
		<p><?php echo $map_dsc; ?></p>
	</div>
	<div id="wrapper_map">
		<img width="920" height="450" src="<?php echo get_stylesheet_directory_uri() ?>/images/map_us.png" alt="World continents"> 
		<div class="wrap-slide-map">
			<?php if($map_markers): ?>
				<?php
				foreach ($map_markers as $item) {
					?>
					<div class="pin pin-down" data-xpos="<?php echo $item['marker_position_x']; ?>" data-ypos="<?php echo $item['marker_position_y']; ?>"> 
						<div class="wrap-item-slide">
						<img src="<?php echo $item['location_image']; ?>" alt="">   
						<div class="content-text">
							<h2><?php echo $item['location_name']; ?></h2> 
							<ul>
								<li><img class="icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/icon/marker.png" alt="Address" > <strong><?php echo $item['location_address']; ?></strong></li>
								<li><img class="icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/icon/manager.png" alt="Jobs"> <strong><?php echo $item['number_of_employees']; ?></strong> </li>
							</ul>
						</div> 
						</div>
					</div>
					<?php
				}
				?>
		<?php endif; ?>
		</div>
	</div>
</section>

<?php endif; ?>

<?php 
$d_i = get_field('diversification_infographic') ? get_field('diversification_infographic'):'';
if($map != ''):
    $geo_div = $d_i['geographic_diversification'] ? $d_i['geographic_diversification'] : '';
    $chart = $d_i['states_chart'] ? $d_i['states_chart'] : '';

	$state_l = array();
	$counter = 0;
	foreach ($chart as $item) {
		$state_l[$item['state_name']] = [];
		$state_l[$item['state_name']]['color'] = $item['color'];
		$state_l[$item['state_name']]['percent'] = $item['percentaje'];
		$state_l[$item['state_name']]['list'] = [];
		foreach ($item['list'] as $key => $val) {
			$state_l[$item['state_name']]['list'][$key]['title'] = $val['item_title'];
			$state_l[$item['state_name']]['list'][$key]['text'] = $val['item_description'];
			$state_l[$item['state_name']]['list'][$key]['img'] = $val['image'];
		}
		$counter++;
	}

	$colors = [];
	$percents = [];
	foreach($state_l as $key => $row) {
		$colors[] = $row['color'];
		$percents[] = (int)$row['percent'];
	}
?>
<section class="infographics">
<div style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/bg-top-right.png)" class="bg-top-right"></div>
	<div style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/bg-top-right.png)" class="bg-top-left"></div>
	<script type="text/javascript">
		var chart1_labels = <?php echo json_encode( array_keys( $state_l ) ); ?>;
		var chart1_colors = <?php echo json_encode( $colors); ?>;
		var chart1_percents = <?php echo json_encode( $percents); ?>;
	</script>
	<div class="row first-section">
		<div class="columns large-5">
			<?php echo $geo_div; ?>
		</div>
		<div class="columns large-7 hide-md-down">
			<div class="doughnut">
			  <div class="doughnut-chart-wrap">
			  	<div class="states-popup" id="states_popup">
					<div class="popup-inner">
					<?php 
					$first_st = true;
					foreach( $state_l as $name => $data ): 
						$class = $first_st? '' : 'hide';
						$first_st = false;
						$state_id = sanitize_title( $name );
					?>
					<div class="wrap-box <?php echo $class; ?>" id="<?php echo $state_id; ?>">
						<div class="item-state">
							<div class="title-section">
								<h3><?php echo $name; ?></h3>
								<div class="number"><?php echo $data['percent'] ?><span>%</span></div>
							</div>
							<?php foreach( $data['list'] as $city): ?>
							<div class="hotel-box">
								<img src="<?php echo $city['img'] ?>" alt="">
								<div class="hotel-content">
									<h6><span class="icon-marker"></span><?php echo $city['title'] ?></h6>
									<p><?php echo $city['text'] ?></p>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>
					</div>
				</div>
				<!-- /. states-popup  -->
			    <canvas id="doughnutChart" width="430" height="430"></canvas>
			  </div>
			  <div id="legend" class="chart-legend"></div>
			</div>
		</div>
		<!-- mobile state hotels 1 -->
		<div class="columns large-6 hide-lg-up states-slider-wrap1">
			<div class="c-items-slider">
				<ul data-state-slider="" class="state-list-slider">
					<?php foreach( $state_l as $state_name => $data ):  ?>
						<?php foreach( $data['list'] as $city): ?>
						<li >
							<div class="item-state alt">
								<div class="hotel-box">
									<img src="<?php echo $city['img'] ?>" alt="">
									<div class="title-section">
										<h3><?php echo $state_name; ?></h3>
										<div class="number"><?php echo $data['percent'] ?><span>%</span></div>
									</div>
									<div class="hotel-content">
										<h6><span class="icon-marker"></span><?php echo $city['title'] ?></h6>
										<p><?php echo $city['text'] ?></p>
									</div>
								</div>
							</div>
						</li>
						<?php endforeach; ?>
					<?php 
					endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<?php 
	// $state_list = [
	// 	'IHG' => [
	// 		'color' => '#f1f1f2',
	// 		'percent'=>27, 
	// 		'list' => [
	// 			['title'=>'Chattanoga, TN',  'img'=>'/uploads/TPS_LAXTH_Exterior_01-1.jpg'],
	// 			['title'=>'Houston, TX 1', 'img'=>'/uploads/TPS_LAXTH_Exterior_01-1.jpg']
	// 		]
	// 	],
	// 	'Marriott' => [
	// 		'color' => '#912136',
	// 		'percent'=>27, 
	// 		'list' => [
	// 			['title'=>'Chattanoga, TN',  'img'=>'/uploads/TPS_LAXTH_Exterior_01-1.jpg'],
	// 			['title'=>'Houston, TX 2', 'img'=>'/uploads/TPS_LAXTH_Exterior_01-1.jpg']
	// 		]
	// 	],
	// 	'Hilton' => [
	// 		'color' => '#797a7d',
	// 		'percent'=>36, 
	// 		'list' => [
	// 			['title'=>'Chattanoga, TN',  'img'=>'/uploads/TPS_LAXTH_Exterior_01-1.jpg'],
	// 			['title'=>'Houston, TX 3', 'img'=>'/uploads/TPS_LAXTH_Exterior_01-1.jpg']
	// 		]
	// 	],
	// ];


	$h_flags_ = array();
	$h_flag = get_field('hotel_flag') ? get_field('hotel_flag'):'';
	$h_flag_desc = $h_flag['holdings_description'] ? $h_flag['holdings_description'] : '';
	$h_flag_states = $h_flag['states'] ? $h_flag['states'] : '';

	foreach ($h_flag_states as $state) {
		$h_flags_[$state['state_name']] = [];
		$h_flags_[$state['state_name']]['color'] = $state['color'];
		$h_flags_[$state['state_name']]['percent'] = $state['percent'];
		$h_flags_[$state['state_name']]['logo'] = $state['logo'];
		$h_flags_[$state['state_name']]['list'] = [];
		foreach ($state['items'] as $key => $item_title) {
			$h_flags_[$state['state_name']]['list'][$key]['title'] = $item_title['item_title'];
			$h_flags_[$state['state_name']]['list'][$key]['img'] = $item_title['item_img'];
		}
	}

	$colors = [];
	$percents = [];
	foreach($h_flags_ as $key => $row) {
		$colors[] = $row['color'];
		$percents[] = $row['percent'];
	}
	?>
	<script type="text/javascript">
		var chart2_labels = <?php echo json_encode( array_keys( $h_flags_ ) ); ?>;
		var chart2_colors = <?php echo json_encode( $colors); ?>;
		var chart2_percents = <?php echo json_encode( $percents); ?>;
	</script>
	<div class="row second-section">
		<div class="columns large-7 chart-column hide-md-down">
			<div class="doughnut-chart-wrap">
				<div class="states-popup" id="states_popup_2">
					<div class="popup-inner">
					<?php 
						$first_st = true;
						foreach( $h_flags_ as $name => $data ): 
							$class = $first_st? '' : 'hide';
							$first_st = false;
							$state_id = sanitize_title( $name );
						?>
						<div class="item-state <?php echo $class; ?>" id="<?php echo $state_id; ?>">
							<div class="title-section">
							<img src="<?php echo $data['logo']['url'] ?>" alt="">
								<div class="number"><?php echo $data['percent'] ?><span>%</span></div>
							</div>
							<?php foreach( $data['list'] as $city): ?>
							<div class="hotel-box">
								<img src="<?php echo  $city['img'] ?>" alt="">
								<div class="hotel-content">
									<h6><span class="icon-marker"></span><?php echo $city['title'] ?></h6>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- /. states_popup_2 -->
				<canvas id="hotels_chart_2" width="430" height="430"></canvas>
			</div>
		</div>
		<div class="columns large-5">
			<?php echo $h_flag_desc; ?>
		</div>
		<!-- mobile state hotels 1 -->
		<div class="columns large-6 hide-lg-up states-slider-wrap1">
			<div class="c-items-slider">
				<ul data-state-slider="" class="state-list-slider">
					<?php foreach( $h_flags_ as $state_name => $data ):  ?>
						<li>
							<div class="item-state">
								<div class="title-section">
								<img src="<?php echo $data['logo']['url'] ?>" alt="">
									<div class="number"><?php echo $data['percent'] ?><span>%</span></div>
								</div>

								<?php foreach( $data['list'] as $city): ?>
								<div class="hotel-box">
									<img src="<?php echo $city['img'] ?>" alt="">
									<div class="hotel-content">
										<h6><span class="icon-marker"></span><?php echo $city['title'] ?></h6>
										<p><?php echo $city['text'] ?></p>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</li>
					<?php 
					endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/bg-top-right.png)" class="bg-bottom-center"></div>
</section>

<?php endif; ?>

<?php
	$footer = get_field('footer') ? get_field('footer'):'';

	if($footer != ''):
		$title_footer = $footer['title_footer'] ? $footer['title_footer'] : '';
		$detail_footer = $footer['detail_footer'] ? $footer['detail_footer'] : '';
		$link_contact = $footer['link_contact'] ? $footer['link_contact'] : '';
?>
		<section class="footer-red">
			<div class="foot-wrap">
				<a href="<?php echo get_site_url(); ?>">
					<img src="<?php echo get_site_url();  ?>/wp-content/themes/avana/images/logo_preserving_wealth.png" alt="">
				</a>
				<h2>
					<?php echo $title_footer; ?>
				</h2>
				<a href="<?php echo $link_contact['url'];?>" class="btn btn-white"><?php echo $link_contact['title'];?></a>
				<?php echo $detail_footer;?>
			</div>
		</section>
<?php endif; ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/mychart.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/noframework.waypoints.min.js"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bonhon.js"></script>


<?php get_footer();