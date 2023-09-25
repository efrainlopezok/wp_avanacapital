<?php 
// [deals]
function deals_func( $atts ) {
	$cont = 0;
	if( have_rows('deals') ):
        while ( have_rows('deals') ) : the_row();
        	$cont++;
        endwhile;               
    endif;
	$out = "";
    if( have_rows('deals') ):
    	$numColumns = ($cont  == 3 ) ? "colums3" : "columsMore";
    	$numColum = ($cont > 3) ? "3" : "4";
    	
    	$out .= '<div class="cont-deals '.$numColumns.'">';
    	$contRow = 1;
        while ( have_rows('deals') ) : the_row();
    
            $image = get_sub_field('deal_image');
        	$out .= '<div class="columns medium-'.$numColum.' ">';
            $out .= '<div class="sub-cont-deals">';
        	$out .= '<div class="cont-img-deals"><img class="image-alt" src="'.$image['url'].'" alt="'. $image['alt'] .'"></div>';
            $out .= '<span class="label-addon-small">'.get_sub_field('deals_title').'</span>';
            $out .= '<hr>';
            $out .= get_sub_field('content');
            $out .= '</div>';
            $out .= '</div>';
            if ($contRow == 4) {
            	$out .= '<div class="clear-div"></div>';
            	$contRow = 1;
            }
            $contRow ++;
        endwhile;               
    endif;
    $out .= '</div>';
    return $out;
}
add_shortcode( 'deals', 'deals_func' );

// [support]

function support_func( $atts ) {
	$cont = 0;
	if( have_rows('deals_supports') ):
        while ( have_rows('deals_supports') ) : the_row();
        	$cont++;
        endwhile;               
    endif;
	$out = "";
    if( have_rows('deals_supports') ):
    	$numColumns = ($cont  == 3 ) ? "colums3" : "columsMore";
    	$numColum = ($cont > 3) ? "3" : "4";
    	
    	$out .= '<div class="cont-deals cont-support '.$numColumns.'">';
    	$contRow = 1;
        while ( have_rows('deals_supports') ) : the_row();
        	$out .= '<div class="columns medium-'.$numColum.' ">';
        	$out .= '<div class="sub-cont-deals">';
            $out .= '<span class="label-addon-small">'.get_sub_field('deals_title_support').'</span>';
            $out .= '<ul>';
	           	while ( have_rows('content_items') ) : the_row();
	            	$out .= '<li>'.get_sub_field('item').'</li>';
	        	endwhile; 
	        $out .= '</ul>';
            $out .= '</div>';
            $out .= '</div>';
            if ($contRow == 4) {
            	$out .= '<div class="clear-div"></div>';
            	$contRow = 1;
            }
            $contRow ++;
        endwhile;               
    endif;
    $out .= '</div>';
    return $out;
}
add_shortcode( 'support', 'support_func' );

// [post]
function post_func( $atts ) {
$outt = "";
    $outt .= '<section class="section" id="section_post_news">';
        $outt .= '<h2 class="section-title">POSTS</h2>';
        $outt .= '<div class="row">';
            $outt .= '<div class="columns medium-12 medium-centered">';
                global $post;
                $args = array(
                    'post_type' => 'post', 
                    'post_status' => 'publish', 
                    'orderby' => 'DATE',
                    'order' => 'DESC',
                    'posts_per_page'    => 5
                );
                $the_query = new WP_Query( $args );
                if ($the_query->have_posts()) :
                    $outt .= '<ul id="avana_post_slider">';
                        while ($the_query->have_posts()) : $the_query->the_post();
                        $outt .= '<li>';
                            $outt .= '<a href="'.get_the_permalink().'">';
                                $outt .= '<div class="news-date">';
                                    $outt .= '<span>'.get_the_date('d').'</span><br>'.get_the_date('F');
                                $outt .= '</div>';
                                $outt .= '<h3>'.get_the_title().'</h3>';
                                $outt .= '<p class="news-info">';
                                    $outt .= substr(strip_tags($post->post_content), 0, 100).'...';
                                $outt .= '</p>';
                            $outt .= '</a>';
                        $outt .= '</li>';
                        endwhile;
                    $outt .= '</ul>';
                    wp_reset_postdata();
                endif;
            $outt .= '</div>';
        $outt .= '</div>';
    $outt .= '</section>';
    echo "<script type='text/javascript'>jQuery(window).load(function(){
            SITE.initSlider('#avana_post_slider',3);
            });
        </script>";
return $outt;
}
add_shortcode( 'post', 'post_func' );

// [faqs]
function faq_func( $atts ) {
    $bg_class= (is_page(12))?"bg-spanish-white":"";
      
    $args = array( 'post_type' => 'faq', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
    
    ?>
    <section id="section_avana_facts" class="<?php echo $bg_class;?>">
        <div class="row">
            <div class="columns medium-12">
                <ul class="medium-block-grid-5 large-block-grid-5 small-block-grid-2 eq-parent">
                    <?php
                    while ( $loop->have_posts() ) : $loop->the_post();
                        if( have_rows('faq') ):
                            while ( have_rows('faq') ) : the_row();
                                $image = get_sub_field('faq_image');
                                ?>
                                <li class="eq-child">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>">
                                    <h2><?php echo get_sub_field('faq_title'); ?></h2>
                                    <p><?php echo get_sub_field('content'); ?></p>
                                </li>
                            <?php
                            endwhile;               
                        endif;
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}
add_shortcode( 'faqs', 'faq_func' );


// [tableau]
function tableau_func( $atts ) {
    ob_start();
    $out = '';
    ?>
    <section id="section_avana_tableau" class="tableau-avana">
        <div class="row">
            <div class="columns medium-12">
                <div class='tableauPlaceholder' id='viz1533842637160' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Sa&#47;Saledashboard_1&#47;Home&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz' style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Saledashboard_1&#47;Home' /><param name='tabs' value='yes' /><param name='toolbar' value='no' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Sa&#47;Saledashboard_1&#47;Home&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /></object></div><script type='text/javascript'>var divElement = document.getElementById('viz1533842637160');var vizElement = divElement.getElementsByTagName('object')[0];vizElement.style.width='1200px';vizElement.style.height='743px';var scriptElement = document.createElement('script');scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';vizElement.parentNode.insertBefore(scriptElement, vizElement);</script>
            </div>
        </div>
    </section>
    <?php
    $out = ob_get_contents();
	ob_end_clean();
	return $out;
}
add_shortcode( 'tableau', 'tableau_func' );

// Title Partners
function title_func( $atts ) {
    $out = "";
	$atts = shortcode_atts( array(
		'title' => ''
	), $atts, 'title' );
    $out .= "<h2><span>".$atts['title']."</span></h2>"; 
	return $out;
}
add_shortcode( 'title_partners', 'title_func' );


// [message_covid19]
function avan_message_covid19( $atts ) {    
    $message = (get_field( 'message','option')) ? get_field('message','option'): ''; 
    ?>
    <section class="section covid19 bg-spanish-white">
        <div class="row">
            <div class="columns medium-10 medium-centered text-center">
                <?php echo $message['content'] ?>
                <div class="resources-covid">
                <?php foreach ($message['links'] as $link): ?>
                    <a href="<?php echo $link['link_url']['url'] ?>" target="<?php echo $link['link_url']['target'] ?>" class="cta cta-medium"><?php echo $link['link_url']['title'] ?></a>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}
add_shortcode( 'message_covid19', 'avan_message_covid19' );