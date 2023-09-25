<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php 
	if (is_page('avana-renewable-energy')) {
		?> 
			<footer id="footer-landing">
				<div class="img-footer">
				<a href=""><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-footer.png" alt=""></a>
				</div>
				<h3>avanacapital.com</h3>
			</footer>
		 <?php 
	}else{
		?> 
			<footer id="footer">
				<div class="row footer">
					<div class="columns small-6 medium-4">
						<h4>Explore</h4>
						<nav class="footer-nav">
							<?php wp_nav_menu(array('container' => '',  'menu_class' => 'navigation', 'menu' => 'Footer')); ?>		
						</nav>
					</div>
					<div class="columns medium-4 small-6">
						<h4>Follow Us</h4>
						
									<ul class="share-icon">
										<li><a href="https://www.facebook.com/teamavanacapital/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
										<li><a href="https://twitter.com/AvanaCapital" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="https://plus.google.com/107158373904570945582" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="https://www.linkedin.com/company/avana-capital?trk=biz-companies-cym" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
									</ul>
						</div>	
					<div class="columns medium-4 small-12 contact-block">
						<div>
							<img src="<?php echo get_site_url(); ?>/wp-content/uploads/avana-capital_logo_tagline2019_red.png"/>
							<p><img src="<?php echo get_template_directory_uri(); ?>/images/icon/call_icon_red.png" class="footer-icon"/><a href="tel:1-877-850-5130" class="f-b-content">1-877-850-5130</a></p>
							<p><img src="<?php echo get_template_directory_uri(); ?>/images/icon/envelope_icon_red.png" class="footer-icon"/><a href="mailto:avanateam@avanacapital.com" class="f-b-content">avanateam@avanacapital.com</a></p>
							<p><img src="<?php echo get_template_directory_uri(); ?>/images/icon/avana-icon.png" class="footer-icon"/><span class="f-b-content">Preserving Wealth. Creating Growth<sup>&reg;</sup> </span></p>
						</div>
					</div>
				</div> 
				<div class="copyright">
					<div class="row">
						<div class="columns medium-12 p-14x">
							Copyright &copy; <?php echo date('Y'); ?> AVANA Capital. All rights reserved. <br>
							<a href="<?php echo get_permalink(736); ?>">Terms & Conditions</a>  |  <a href="<?php echo get_permalink(738); ?>">Privacy Policy</a>  |  <a href="<?php echo get_permalink(740); ?>">Disclosures</a><br>
							License: California DBO - 603K752 | Arizona CBK - 0921662	
						</div>
					</div>
				</div>
			</footer>
		<?php 
	}
?>

	
	<script>
		jQuery(function() {
			jQuery('.ribbon-wrapper').matchHeight();
		});
		jQuery(function() {
			jQuery('.ribbon-content').matchHeight();
		});
		var ProductIntRates = {
			MT_3 : parseInt("<?php echo get_option('_lb_yc_mp_3m');?>"),
			MT_24 : parseInt("<?php echo get_option('_lb_yc_mp_24m');?>"),
			MT_36 : parseInt("<?php echo get_option('_lb_yc_mp_36m');?>"),
			MT_60 : parseInt("<?php echo get_option('_lb_yc_mp_60m');?>")
		}
	</script>
	<?php wp_footer(); ?>

	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script> 
	<script src="<?php echo get_template_directory_uri(); ?>/js/fastclick.js"></script> 
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/parsley.js"></script>
	
	<?php if(is_page(array(343,422,427))){?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/calculator.js"></script>
	<?php }?>

	<?php if(is_page(44)){?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jPages.js"></script>
	<?php }?>

	<?php if(is_archive() || is_home()){?>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/masonry/4.1.0/masonry.pkgd.min.js"></script>
        <script type="text/javascript">
            $('.blog-list').masonry({
  itemSelector: '.grid-item'
});
</script>
	<?php }?>	
	<script src="<?php echo get_template_directory_uri(); ?>/js/site.js"></script>

</div><!--END: WRAPPER-->
<nav id="mobile_menu" class="hide">
	<?php wp_nav_menu(array('container' => '',  'menu_class' => 'mobile-menu', 'menu' => 'Mobile-Menu')); ?>
</nav>
<a href="#" id="back_to_top" title="Back to Top">Top</a>
</body>
</html>