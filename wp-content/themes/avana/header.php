<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta name="google-site-verification" content="Xs1WIsgqcH75LHt4My7APYXEQTtM5syZClsDHbfM3yM" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<link rel="icon" type="image/png" href="/favicon.png">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link href="<?php echo get_template_directory_uri(); ?>/css/grid.css" rel="stylesheet">
    <!-- <link href="<?php //echo get_template_directory_uri(); ?>/css/ritu.css" rel="stylesheet"> -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="https://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
	<![endif]-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<?php wp_head(); ?>
	<script>
	 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	 ga('create', 'UA-42012502-1', 'avanacapital.com');
	 ga('send', 'pageview');
	</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFNG8BR');</script>
<!-- End Google Tag Manager -->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '273733376439984'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=273733376439984&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
	
<!-- activeDemand code-->
	<script src='https://static.activedemand.com/accounts/965053be-12254608-08675fd7/load.js' type='text/javascript' async defer ></script>
<!-- End activeDemand code-->

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WFNG8BR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper"><!--BEGIN: WRAPPER-->
    <?php 
        /*  if (is_page('avana-renewable-energy')) {
        ?> 
            <header class="heder-landing">
                <div class="wrap">
                    <div class="img-logo-l">
                        <a href="">
                            <img src="<?php echo get_stylesheet_directory_uri()?>/images/logo-avana.png" alt="">
                        </a>
                    </div>
                </div>
            </header>
        <?php 
        }else { */

        ?> 
        <header id="header"><!--BEGIN: HEADER-->
            <div class="row">
                <div class="medium-12 column header">   
                    <div id="logo" class="logo header-left">
                    <a href="#mobile_menu" class="menu-icon show-for-small"><span></span></a>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php 
                            $logo_white = get_field( 'logo_white','option' ) ? get_field( 'logo_white','option' ) : ''; 
                            if ($logo_white['url'] !='') {
                                $logo_white = $logo_white['url'];
                            }else{
                                $logo_white = get_site_url().'/wp-content/themes/avana/images/logo.png';
                            }

                            $logo_red = get_field( 'logo_red','option' ) ? get_field( 'logo_red','option' ) : '';
                            if ($logo_red['url'] !='') {
                                $logo_red = $logo_red['url'];
                            }else{
                                $logo_red = get_site_url().'/wp-content/themes/avana/images/logo_red.png';
                            }

                             $logo_icon_red = get_field( 'logo_icon_red','option' ) ? get_field( 'logo_icon_red','option' ) : '';
                            if ($logo_icon_red['url'] !='') {
                                $logo_icon_red = $logo_icon_red['url'];
                            }else{
                                $logo_icon_red = get_site_url().'/wp-content/themes/avana/images/logo_icon_red.png';
                            }
                            
                            ?>

                            <img data-image-red="<?php echo $logo_red; ?>" data-image-white="<?php echo $logo_white; ?>" class="large-logo" id="logo_big" src="<?php echo $logo_white ?>" />

                            <img class="large-logo" id="logo_icon" src="<?php echo $logo_icon_red ?>" /> 

                            <img data-image-red="<?php echo $logo_red; ?>" data-image-white="<?php echo $logo_white; ?>" class="show-for-small-only" id="logo_small" src="<?php echo $logo_white ?>" />
                        </a>
                    </div>
                    <div class="search-and-nav  header-right">
                    
                        <!-- <a class="search-toggal"><img src="<?php //echo get_template_directory_uri(); ?>/images/search_icon.png"></a> -->                  
                        <div>
                        <p class="phone-no">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon/call_icon.png"><strong>Call:</strong> 1-877-850-5130</p>
                        
                        <!-- <div class="search-field"> 
                            <i class="fa fa-search"></i>
                            <form role="search" method="get" class="search-form" action="<?php// echo get_option('home');?>" name="frmSearchSite">
                                <input type="search" class="search-field" placeholder="Search..." value="<?php //echo $_GET['s'];?>" name="s" title="Search for:">
                            </form> 
                        </div> -->

                        </div>
                        <nav id="navigation" class="hide-for-small-only"><!--BEGIN: Navigation-->
                            <?php wp_nav_menu(array('container' => '',  'menu_class' => 'menu', 'menu' => 'TNB')); ?>
                        </nav><!--END: Navigation-->
                    </div>
                </div>
            </div>
        </header><!--END: Header-->
            <?php 
            
        /* }*/
    ?>