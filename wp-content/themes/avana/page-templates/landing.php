<?php
/**
 * Template Name: Landing
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<!-- BEGIN: hero Section -->

<!-- 
    <div id="YouTubeAutoPlayChSilencio">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/iu8qe-NpduI?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>   -->
<?php
$landing_hero = get_field('landing_hero') ? get_field('landing_hero'):'';
if($landing_hero != ''):
    $landing_hero_title = $landing_hero['landing_hero_title'] ? $landing_hero['landing_hero_title'] : '';
    $landing_hero_description = $landing_hero['landing_hero_description'] ? $landing_hero['landing_hero_description'] : '';
    $landing_hero_video_url = $landing_hero['landing_hero_video_url'] ? $landing_hero['landing_hero_video_url'] : '';
    $video_bg = $landing_hero['landing_video_screenshot'] ? $landing_hero['landing_video_screenshot'] : '';
?>
    <section class="hero-landing">
        <video class="movie-hero" loop muted autoplay playsinline style="background-image: url(<?php echo $video_bg; ?>)">
            <source src="<?php echo $landing_hero_video_url; ?>" type="video/mp4">
        </video>
        <div class="wrap">
            <div class="row">
                <div class="columns medium-12">
                    <h2><?php echo  $landing_hero_title; ?></h2>
                    <h3><?php echo  $landing_hero_description; ?></h3>
                </div>
            </div>
        </div>
    </section>
 <?php 
 endif;
$clean_energy_section = get_field('clean_energy_financing_section') ? get_field('clean_energy_financing_section'):'';
$case_study_section = get_field('case_study_section') ? get_field('case_study_section'):'';
if($clean_energy_section != ''):
    $clean_energy_title = $clean_energy_section['clean_energy_financing_section_title'] ? $clean_energy_section['clean_energy_financing_section_title'] : '';
    $clean_energy_content = $clean_energy_section['clean_energy_financing_section_content'] ? $clean_energy_section['clean_energy_financing_section_content'] : '';
    $clean_energy_image = $clean_energy_section['case_study_section_backgorund_image'] ? $clean_energy_section['case_study_section_backgorund_image'] : '';
?>
    <section class="clean-energy">
        <div class="wrap">
            <h2 class="bold"><?php echo $clean_energy_title;?></h2>
            <div class="row">
            <div class="columns medium-12 param-top content-energy">
                <?php echo $clean_energy_content;?>
            </div>
            <?php
                if($case_study_section != ''):
                    $case_study_sectionData = $case_study_section['case_study_section'] ? $case_study_section['case_study_section'] : '';
                    $case_study_content = $case_study_section['case_study_section_content'] ? $case_study_section['case_study_section_content'] : '';
                    $case_study_button = $case_study_section['case_study_section_button'] ? $case_study_section['case_study_section_button'] : '';
            ?>                
                <div class="columns medium-12">
                    <div class="hr-c"></div>
                    <h4 class="title-decore"><?php echo $case_study_sectionData;?></h4>
                    <?php foreach ($case_study_section['item_case'] as $value): ?>
                        <div class="row content-case">
                            <?php echo $value['content']?>
                        </div>
                        <a class="btn-rose" href="<?php echo $value['buttom']['url'];?>" target="<?php echo $value['buttom']['target'];?>">     <?php echo $value['buttom']['title']; ?></a>
                        <div class="hr-c"></div>
                    <?php endforeach ?>
                </div>
    <?php 
    endif;
    ?>
            </div>
        </div>
        <div class="parallax" data-parallax-image="<?php echo $clean_energy_image; ?>"></div>
    </section>
<?php 
endif;
$services_section = get_field('services_section') ? get_field('services_section'):'';
if($services_section != ''):
    $services_section_title = $services_section['services_section_title'] ? $services_section['services_section_title'] : '';
    $services_section_bgcolor = $services_section['services_section_background_color'] ? $services_section['services_section_background_color'] : '';
    $services_section_services = $services_section['services_section_service'] ? $services_section['services_section_service'] : '';
?>
    <section class="section-reasons" style="background-color: <?php echo $services_section_bgcolor;?>;">
    <div class="hr-c"></div>  
       <div class="wrap">
            
            <h2><?php echo  $services_section_title; ?></h2>
            <div class="content-reasons">
                <?php 
                    foreach($services_section_services as $services_service_data):
                ?>    
                <div class="reason">
                    <div class="img-reason">
                        <img src="<?php echo $services_service_data['services_section_imagen']; ?>" alt="">
                    </div>
                    <h3><?php echo $services_service_data['services_section_title']; ?></h3>
                    <p>
                        <?php echo $services_service_data['services_section_description']; ?>
                    </p>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
            
        </div>
    <div class="hr-c"></div>
    </section>
 <?php 
 endif;
 $financing_section = get_field('financing_section') ? get_field('financing_section'):'';
 if($financing_section != ''):
     $financing_title = $financing_section['financing_section_title'] ? $financing_section['financing_section_title'] : '';
     $financing_bg_image = $financing_section['financing_section_background_image'] ? $financing_section['financing_section_background_image'] : '';
     $financing_lists = $financing_section['financing_section_lists'] ? $financing_section['financing_section_lists'] : '';
 ?>
    <section class="section-capital" >
       <div class="hr-c"></div>
       <div class="wrap">
            
            <h2><?php echo  $financing_title;?></h2>
            <div class="row">
            <?php  
                $countlist = count($financing_lists);
                $contArr = 0;
             foreach($financing_lists as $financing_list): 
                $contArr++;
             ?>
                <div class="columns medium-6">
                    <div class="types-sipport">
                        <h3><?php echo $financing_list['financing_section_title'] ;?></h3>
                        <ul>
                        <?php  foreach($financing_list['financing_section_items'] as $financing_items): ?>
                            <li><?php echo $financing_items['financing_section_text'];?></li>
                        <?php
                            endforeach;
                        ?>
                        </ul>
                        <?php if($contArr != $countlist  && ($contArr) != $countlist-1): ?>        
                            <div class="hr-c"></div>    
                        <?php endif; 
                            
                        ?>                        
                    </div>
                </div>
                <?php
                endforeach;
            ?> 
            </div>
        </div>
        <div class="hr-c"></div>
        <div class="parallax" data-parallax-image="<?php echo $financing_bg_image; ?>"></div>
    </section>
<?php 
 endif;
 $logos_section = get_field('logos_section') ? get_field('logos_section') : '';
if($logos_section != ''):
    $logos_section_logos_background_color = $logos_section['logos_section_logos_background_color'] ? $logos_section['logos_section_logos_background_color'] : '';
    $logos_section_title = $logos_section['logos_section_title'] ? $logos_section['logos_section_title'] : '';
    $logos_section_logos = $logos_section['logos_section_logos'] ? $logos_section['logos_section_logos'] : '';
?>
    <!-- modify dupli -->
    <section class="section-reasons solar" style="background-color:<?php echo $logos_section_logos_background_color; ?>">
    <div class="hr-c"></div>   
        <div class="wrap">
            <h2><?php echo $logos_section_title; ?></h2>
            <div class="content-reasons">
                <?php foreach ($logos_section_logos as $logos_item) : ?>
                    <div class="reason">
                        <div>
                        <img src="<?php echo $logos_item["logos_section_logo"] ?>" alt="">
                        </div>
                        <h3><?php echo $logos_item["logos_section_title"] ?></h3>
                        <ul>
                            <?php foreach ($logos_item['logos_section_elements'] as $logos_li) : ?>
                                <li><strong><?php echo  $logos_li['logos_section_elements_title'];?></strong> <?php echo  $logos_li['logos_section_elements_description'];?></li>
                            <?php endforeach;?>     
                        </ul>
                         
                    </div>
                <?php endforeach;?> 
            </div>
        </div>
        <div class="hr-c"></div>
    </section>
<?php 
endif;
$contact_section = get_field('contact_section') ? get_field('contact_section') : '';
if($contact_section != ''):
    $contact_section_background_image = $contact_section['contact_section_background_image'] ? $contact_section['contact_section_background_image'] : '';
    $contact_section_title = $contact_section['contact_section_title'] ? $contact_section['contact_section_title'] : '';
    $contact_section_description = $contact_section['contact_section_description'] ? $contact_section['contact_section_description'] : '';
    $contact_section_id = $contact_section['contact_section_form_id'] ? $contact_section['contact_section_form_id'] : '';
?>
    <section class="section-contact" >
        <div class="wrap">
            <div class="row">
                <div class="columns medium-6">
                    <h2><?php echo $contact_section_title; ?></h2>
                    <?php echo $contact_section_description; ?>
                </div>
                <div class="columns medium-6">
                    <?php 
                        echo do_shortcode( '[gravityform id='.$contact_section_id.' title=false description=false ajax=true tabindex=49]' );
                    ?>
                </div>
            </div>
        </div>
        <div class="clear-both-sec"></div>
        <div class="parallax" data-parallax-image="<?php echo $contact_section_background_image ?>"></div>
    </section>
    <?php 
 endif;
?>
<!-- END: hero Section -->
<?php get_footer();