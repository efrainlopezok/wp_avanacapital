<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
//ACF PLugin
// require get_template_directory() . '/plugins/init.php';
require get_template_directory() . '/plugins/shortcode.php';
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	//$color_scheme  = twentyfifteen_get_color_scheme();
	//$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	/*
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );
	*/

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	//add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom-style',get_stylesheet_directory_uri() . '/css/custom.css',array(),'1.1.7');


	wp_register_script('matchHeight', get_template_directory_uri() . '/js/matchHeight.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('matchHeight'); // Enqueue it!

	// Load the Internet Explorer specific stylesheet.
	//wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	//wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	//wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	//wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	//wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		//wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	//wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	/*
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
	*/

	wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/js/universal-parallax.min.js', '', '' );

	// Graphics
	wp_enqueue_style( 'chart-style', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css',array(),'1.0.0');

	wp_register_script('chart-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js', array(), '1.0.0');
	wp_enqueue_script('chart-bundle'); 
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
//add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/*add thank you message after wordpress comments */
function redirect_after_comment($location){
    $newurl = substr($location, 0, strpos($location, "#comment"));
    return $newurl . '?c=y&comment='. get_comment_ID();

}
add_filter('comment_post_redirect', 'redirect_after_comment');

/**
 * Extend the default WordPress body classes.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfifteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}
	
	if ( !is_front_page() ) {
		$classes[] = 'inner-page';
	}
	
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfifteen_body_classes' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';

function lb_keep_me_logged_in( $expirein ) {
    //return 31556926; // 1 year in seconds
	return 86400; // 24 hours in seconds
}
add_filter( 'auth_cookie_expiration', 'lb_keep_me_logged_in' );

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

function lb_sanitize($string,$type=""){
	$string = str_replace(array('[\', \']'), '', $string);
	$string = preg_replace('/\[.*\]/U', '', $string);
	$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
	if($type=='image'){
		$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '_', $string);
		$string = strtolower($string);
	}
	return (trim($string, '-'));
}

/*
* Strip Content with tags, short codes, script tags,
*/
function lb_strip_tags($cotnent){
	$post_content = strip_shortcodes($cotnent);
	$post_content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $post_content); // Removing <script> tag
	$post_content = strip_tags($post_content);
	
	return $post_content;
}

function lb_truncate($text, $numchars=25){
	$chars = $numchars;
	if ( strlen($text) > $numchars ){
		$text_content = substr($text,0,$numchars);
		return $text_content;
	}else{
		return $text;
	}
}

function lb_convert_date($date, $format = "Y-m-d"){
	list($m, $d, $y) = explode('-', $date);
	return date($format, mktime(0,0,0,$m,$d,$y));
}

function custom_login() { 
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/custom-login.css" />'; 
}
//add_action('login_head', 'custom_login');

function isValidEmail($email) {
	$pattern = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i";
    return preg_match($pattern, $email) ? true : false;
}

function isValidZip($zip) {
	$ZIPREG=array(
		"US"=>"^\d{5}([\-]?\d{4})?$",
		"CA"=>"^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$"
	);
	
	if (preg_match("/".$ZIPREG['US']."/i",$zip) || preg_match("/".$ZIPREG['CA']."/i",$zip)){
		return true;
	}else{
		return false;
	}
}

function isValidPhone($number) {
	$formats = array('###-###-####', '####-###-###', '(###) ###-####', '(###)###-####', '####-####-####', '##-###-####-####', '####-####', '###-###-###', '#####-###-###', '##########');
	$format = trim(preg_replace("[0-9]", "#", $number));
	return (in_array($format, $formats)) ? true : false;
}

function lb_print_errors($errors){
	$msg = '<div class="errors"><ul>';
		foreach($errors as $error){
			$msg .= '<li>'.$error.'</li>';
		}
	$msg .= '</ul></div>';
	echo $msg;
}

function set_html_content_type() {
	return 'text/html';
}

/*--------------------------------------------------------------------------------------------------
	Shortcodes fixer
--------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'shortcode_empty_paragraph_fix' ) ) {
	function shortcode_empty_paragraph_fix($content){   
		$array = array (
				'<p>[' => '[', 
				']</p>' => ']', 
				']<br />' => ']'
			);
	
			$content = strtr($content, $array);
			return $content;
	}
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

/*
* Permalink Shortcode
* Usage [permalink id="49"]
*/
if (!function_exists('do_permalink')) {
	function do_permalink($atts) {
		extract(shortcode_atts(array(
			'id' => 1
		), $atts));
	
		return get_permalink($id);
	}
	add_shortcode('permalink', 'do_permalink');
}
add_filter('widget_text', 'do_shortcode');

/*
* Get Option Shortcode
* Usage [get_option_value key=""]
*/
if (!function_exists('do_get_option_value')) {
	function do_get_option_value($atts) {
		extract(shortcode_atts(array(
			'key' => 1
		), $atts));
	
		return get_option($key);
	}
	add_shortcode('get_option_value', 'do_get_option_value');
}
add_filter('widget_text', 'do_get_option_value');

/*
* Strip Content with tags, short codes, num chars, script tags, urls  
*/
function lb_strip_content($cotnent,$numchars=200){
	$post_content = strip_shortcodes($cotnent);
	$post_content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $post_content); // Removing <script> tag
	$post_content = strip_tags($post_content);
	$post_content = lb_cleaner($post_content); // removing URLS	
	if ( strlen($post_content) > $numchars ){
		$post_content = substr($post_content,0,$numchars);
	}
	$post_content_array = explode(" ",$post_content);
	$post_content = implode(" ",array_slice($post_content_array,0,count($post_content_array)-1));
	return $post_content;
}

/*
* Remove URLs from text
*/
function lb_cleaner($url) {
  $U = explode(' ',$url);

  $W =array();
  foreach ($U as $k => $u) {
    if (stristr($u,'http') || (count(explode('.',$u)) > 1)) {
      unset($U[$k]);
      return lb_cleaner( implode(' ',$U));
    }
  }
  return implode(' ',$U);
}

// Remove version from the style and js files
function lb_remove_css_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'lb_remove_css_ver', 10, 2 );

// Function to get the post/page content based on id
function lb_get_post_content($pid){
	$content_post = get_post($pid);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// Returns the featured images path
function lb_get_featured_image_source($postid, $type='thumbnail'){
	$post_thumbnail_id = get_post_thumbnail_id( $postid );
	$attachment =  wp_get_attachment_image_src( $post_thumbnail_id, $type );
	return $attachment[0];
}

// Returns the upload folder path
function lb_get_upload_directory_uri(){
	$upload_dir = wp_upload_dir();
	return $upload_dir['baseurl'];
}

function lb_get_topmost_parent($post_id){
	$parent_id = get_post($post_id)->post_parent;
	return ($parent_id == 0)?$post_id:lb_get_topmost_parent($parent_id);		
}

function lb_get_parent_id($post_id){
	$parent_id = get_post($post_id)->post_parent;
	return $parent_id;		
}

function lb_get_parent_category_id($catid) {
	while ($catid) {
		$cat = get_category($catid); // get the object for the catid
		$catid = $cat->category_parent; // assign parent ID (if exists) to $catid
		$parent_category = $cat->cat_ID;
	}
	
	return $parent_category;
}

function lb_get_post_parent_category_id(){
	$post_category = get_the_category( $post->ID ); 
	return $post_category[0]->category_parent;
}

// prints next and prev post links for custom post type on single page
function lb_print_next_prev_post_links($orderby='post_date', $order='DESC', $posttype='post', $suffix){
	global $post;
	
	$args = array('posts_per_page'   => '-1', 'orderby' => $orderby, 'order' => $order,	'post_type' => $posttype, 'post_status' => 'publish');
	$c_postlist = get_posts( $args ); 	
	$c_posts = array();
	foreach ($c_postlist as $c_post) {
		$c_posts[] += $c_post->ID;
	}
	$current = array_search($post->ID, $c_posts);
	$prev_post_id = $c_posts[$current-1];
	$next_post_id = $c_posts[$current+1];
	if(!empty($prev_post_id) || !empty($next_post_id)){
	?>
		<div id="post-navigation" >			
			<ul class="medium-block-grid-2">				
				<li class="prev-post">
					<?php if(!empty($prev_post_id)){
							$prev_text = "&laquo; ".get_the_title($prev_post_id);
						?>
						<a href="<?php echo get_permalink($prev_post_id);?>"><?php echo $prev_text; ?></a>
					<?php }?>
				</li>				
				<li class="next-post text-right">
					<?php if(!empty($next_post_id)){
							$next_text = get_the_title($next_post_id)." &raquo;";
						?>
						<a href="<?php echo get_permalink($next_post_id);?>"><?php echo $next_text; ?></a>
					<?php }?>
				</li>
			</ul>
		</div>
	<?php
	} // if
}

// prints next/prev team on light box
function lb_print_next_prev_team($step){
	global $post;
	
	$args = array('orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page'   => '-1', 'post_type' => 'team', 'post_status' => 'publish');
	$c_postlist = get_posts( $args ); 	
	$c_posts = array();
	foreach ($c_postlist as $c_post) {
		$c_posts[] += $c_post->ID;
	}
	$current = array_search($post->ID, $c_posts);
	$prev_post_id = $c_posts[$current-1];
	$next_post_id = $c_posts[$current+1];
	
	if(!empty($prev_post_id) && $step == 'PREV'){
		//$prev_text = "&laquo; ".get_the_title($prev_post_id);
		$prev_text = "&laquo;";
		echo '<a href='.get_permalink($prev_post_id).' class="popup-team-nav prev-team">'.$prev_text.'</a>';
	}
	
	if(!empty($next_post_id) && $step == 'NEXT'){
		//$next_text = get_the_title($next_post_id)." &raquo;";
		$next_text = "&raquo;";
		echo '<a href='.get_permalink($next_post_id).' class="popup-team-nav next-team">'.$next_text.'</a>';
	}
}




// prints next/prev team on light box
function lb_print_next_prev_members($step){
	global $post;
	
	$args = array('orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page'   => '-1', 'post_type' => 'members', 'post_status' => 'publish');
	$c_postlist = get_posts( $args ); 	
	$c_posts = array();
	foreach ($c_postlist as $c_post) {
		$c_posts[] += $c_post->ID;
	}
	$current = array_search($post->ID, $c_posts);
	$prev_post_id = $c_posts[$current-1];
	$next_post_id = $c_posts[$current+1];
	
	if(!empty($prev_post_id) && $step == 'PREV'){
		//$prev_text = "&laquo; ".get_the_title($prev_post_id);
		$prev_text = "&laquo;";
		echo '<a href='.get_permalink($prev_post_id).' class="popup-team-nav prev-team">'.$prev_text.'</a>';
	}
	
	if(!empty($next_post_id) && $step == 'NEXT'){
		//$next_text = get_the_title($next_post_id)." &raquo;";
		$next_text = "&raquo;";
		echo '<a href='.get_permalink($next_post_id).' class="popup-team-nav next-team">'.$next_text.'</a>';
	}
}




//Rich Text Excerpts plugin also add in pages
add_post_type_support('page', 'excerpt');

/**
	Print dropdown options
*/
function print_dropdown_options($init_val, $end_val, $increment, $prefix){
	$increment = (float) $increment;
	for($i=$init_val;$i<=$end_val;$i += $increment){
		echo "<option value=".$i.">".number_format($i,2).$prefix."</option>";
	}	
}

function print_number_dropdown_options($init_val, $end_val, $increment, $prefix){
	for($i=$init_val;$i<=$end_val;$i += $increment){
		echo "<option value=".$i.">".$i.$prefix."</option>";
	}	
}

// Get Gallery Category name/title from gallery
function lb_get_gallery_category_name($cat_id){
                global $wpdb,$table_prefix; 
                $cat_title = $wpdb->get_var("SELECT cat_title FROM ".$table_prefix."gallery_category WHERE id=".$cat_id);
                return $cat_title;
}

// Get Gallery Category desc from gallery
function lb_get_gallery_category_desc($cat_id){
                global $wpdb,$table_prefix; 
                $cat_desc = $wpdb->get_var("SELECT description FROM ".$table_prefix."gallery_category WHERE id=".$cat_id);
                return $cat_desc;
}

// Get Number of Images in Gallery Category
function lb_get_num_gallery_images($cat_id){
                global $wpdb,$table_prefix; 
                $num_images = $wpdb->get_var("SELECT count(id) FROM ".$table_prefix."gallery_images WHERE is_active='Y' AND category_id =".$cat_id);
                return $num_images;
}

// Get Number of Videos in Category
function lb_get_num_videos_in_category($cat_id){
                global $wpdb,$table_prefix; 
                $num_videos = $wpdb->get_var("SELECT count(id) FROM ".$table_prefix."videos WHERE is_active='Y' AND category_id =".$cat_id);
                return $num_videos;
}

/*
* Avana Photo Gallery Shortcode
* Usage - [avana_photogallery album_id=41]
*/
if (!function_exists('avana_shortcode_photogallery')) {
                function avana_shortcode_photogallery( $atts, $content = null ) {
                                extract( shortcode_atts( array(
                                                                'album_id' => '',
                                                                'm_col' => 3,
                                                                'l_col' => 3
                                                                ), $atts ) );
                                
                                $num_items = lb_get_num_gallery_images($album_id);
                                if($album_id && (int) $album_id > 0 && $num_items > 0){
                                                $uploads = wp_upload_dir();
                                                $gallery_folder = $uploads['baseurl']."/lb_gallery/";
                                                global $table_prefix, $wpdb;
                                                $gallery_items = $wpdb->get_results("SELECT image_file,image_title FROM {$table_prefix}gallery_images WHERE is_active='Y' AND category_id={$album_id} ORDER BY sort_order ASC");
                                                $total_items = count($gallery_items);
                                                if($total_items > 0){
                                                                $return_string = '';
                                                                $category_name = lb_get_gallery_category_name($album_id);
                                                                $return_string .= '<section class="section"><div class="row">		<div class="columns medium-12 "><ul class="large-block-grid-'.$l_col.' medium-block-grid-'.$m_col.' small-block-grid-2 popup-gallery avana-gallery">';
                                                                                foreach($gallery_items as $gallery_item){
                                                                                                /*
                                                                                                $title = $gallery_item->image_title;
                                                                                                if(empty($title)){
                                                                                                                $title = $category_name;
                                                                                                }
                                                                                                */                                                                                           
                                                                                                $thumb =  $gallery_folder."thumb_".$gallery_item->image_file;
                                                                                                $link = $gallery_folder.$gallery_item->image_file;
                                                                                                
$return_string .= '<li><a href="'.$link.'" title="'.$gallery_item->image_title.'" class="gthumb" style="Xbackground-image:url('.$thumb.');"><img src="'.$thumb.'" /><p>'.$gallery_item->image_title.'</p></a> </li>';
                                                                } // foreach 
                                                                $return_string .= '</ul></div></div></section>';                                                               
                                                } // $total_items > 0
                                }
                                                                
                                return $return_string;
                } 
                add_shortcode('avana_photogallery', 'avana_shortcode_photogallery');               
}

function resizeImage($mode, $filename, $max_width, $max_height, $newfilename="", $withSampling=true)  {
                   $width = 0;  
                   $height = 0;  
                  
                   $newwidth = 0;  
                   $newheight = 0;  
                  
                   // If no new filename was specified then use the original filename  
                   if($newfilename == ""){  
                                  $newfilename = $filename;   
                   }  
                                  
                   // Get original sizes   
                   list($width, $height) = getimagesize($filename);  
                   if($mode == 'square') {
                                    $newwidth = $max_width; $newheight = $max_height;
                                                if ($width > $height) {
                                                                $width = $height;
                                                                $height = $height;
                                                } else {
                                                                $width = $width;
                                                                $height = $width;
                                                }
                                
                                } else {
                                   $maxratio = $max_width/$max_height; 
                                   if ($width/$height > $maxratio) {
                                                  // We're dealing with max_width  
                                                  if ($width > $max_width) {
                                                                $newwidth = $width * ($max_width / $width);  
                                                                 $newheight = $height * ($max_width / $width);  
                                                  }else {  
                                                                 // No need to resize  
                                                                 $newwidth = $width;  
                                                                 $newheight = $height;  
                                                  }  
                                   }else{  
                                                  // Deal with max_height  
                                                  if ($height > $max_height){  
                                                                 $newwidth = $width * ($max_height / $height);  
                                                                 $newheight = $height * ($max_height / $height);  
                                                  }else{  
                                                                 // No need to resize  
                                                                 $newwidth = $width;  
                                                                 $newheight = $height;  
                                                  }  
                                   }
                                }
                   
                   // Create a new image object   
                   $thumb = imagecreatetruecolor($newwidth, $newheight);   
                   $background = imagecolorallocate($thumb, 0, 0, 0);
                                                // removing the black from the placeholder
                                                imagecolortransparent($thumb, $background);
                                                // turning off alpha blending (to ensure alpha channel information 
                                                // is preserved, rather than removed (blending with the rest of the 
                                                // image in the form of black))
                                                imagealphablending($thumb, false);
                                                // turning on alpha channel information saving (to ensure the full range 
                                                // of transparency is preserved)
                                                imagesavealpha($thumb, true);
                  
                   // Load the original based on it's extension  
                   $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));  
                   if($ext=='jpg' || $ext=='jpeg'){  
                                  $source = imagecreatefromjpeg($filename);   
                   }else if($ext=='gif'){
                                  $source = imagecreatefromgif($filename);   
                   }else if($ext=='png'){
                                  $source = imagecreatefrompng($filename); 
                   }else{  
                                  // Fail because we only do JPG, JPEG, GIF and PNG  
                                  return FALSE;  
                   }  
                                  
                   // Resize the image with sampling if specified  
                   if($withSampling){  
                                  imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);   
                                }else{
                                                //$thumb = ImageCreateTrueColor($newwidth, $newheight);
                                                //$transparent = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
                                                //imagefill($thumb, 0, 0, $transparent);
                                  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);   
                   }  
                                                  
                   // Save the new image   
                   if($ext=='jpg' || $ext=='jpeg')   {  
                                                return imagejpeg($thumb, $newfilename, 85);   
                   }else if($ext=='gif'){  
                                                return imagegif($thumb, $newfilename);   
                   }else if($ext=='png'){  
                                                imagealphablending($thumb, false);
                                                imagesavealpha($thumb, true);
                                                return imagepng($thumb, $newfilename);   
                   }  
}

// Reduces the upload images to quality of 80
add_filter( 'jpeg_quality', create_function( '', 'return 80;' ) );

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


// **************************************
// add custom fields for template page

add_action('add_meta_boxes', 'add_static_content_meta');
function add_static_content_meta()
{
    global $post;

    if(!empty($post))
    {
				$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
				
				//echo $pageTemplate; exit;

        if($pageTemplate == 'template-static-content.php' )
        {
            add_meta_box(
                'static_page_content', // $id
                'Static Page Content', // $title
                'display_static_page_information', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}

function display_static_page_information($post, $box )
{

	$data =  get_post_meta($post->ID, 'static_page_data'); //exit; 
	//print_r($data);

	$form_text 	= $data[0]['static-page-form-text'];
	$form_shortcode 	= $data[0]['static-page-form-shortcode'];
	$support_shortcode 	= $data[0]['static-page-support-shortcode'];

	$top_paragraph = $data[0]['static-top-paragraph'];
	$first_title = $data[0]['static-first-title'];
	$second_paragraph = $data[0]['static-second-paragraph'];
	$second_title = $data[0]['static-second-title'];
	$third_paragraph = $data[0]['static-third-paragraph'];



		echo '
		<style>
			.static-page-admin label {
				width:100%;
				display:inline-block;
				font-weight:bold;
			}
			.static-page-admin input {
				width:100%;
				display:inline-block;
			}

			.static-page-admin textarea {
				width:100%;
				display:inline-block;
			}

		/* 	.static-page-admin p {
				padding-bottom:20px;
				paddig-top:0
			} */

			.static-page-admin input,
			.static-page-admin textarea  {
				margin-bottom:20px;
			}

		</style>

		<div class="rte-wrap-metabox static-page-admin">

			<!-- <div class="top-static">

				<p>
					<label for="static-top-paragraph">Top Paragraph</label>
					<textarea name="static-top-paragraph" id="static-top-paragraph" rows="10">'.esc_attr( $top_paragraph ).'</textarea>
				</p>

				<p>
					<label for="static-first-title">First H2 title</label>
					<input type="text" name="static-first-title" id="static-first-title" value="'.esc_attr( $first_title ).'" />
				</p>

				<p>
					<label for="static-second-paragraph">Second Paragraph</label>
					<textarea name="static-second-paragraph" id="static-second-paragraph" rows="10">'.esc_attr( $second_paragraph ).'</textarea>
				</p>

				<p>
					<label for="static-second-title">Second H2 title</label>
					<input type="text" name="static-second-title" id="static-second-title" value="'.esc_attr( $second_title ).'" />
				</p>

				<p>
					<label for="static-third-paragraph">Third Paragraph</label>
					<textarea name="static-third-paragraph" id="static-third-paragraph" rows="10">'.esc_attr( $third_paragraph ).'</textarea>
				</p>

			</div> -->

			<div class="static"><p>
			This section is to enter content that will be shown in the bottom of the Static Template.
			</p>
				<label for="static-page-form-text">Form Support Text:</label><input type="text" value="'.esc_attr( $form_text ).'" name="static-page-form-text" placeholder="type here content before the bottom form" /><br>
				<label for="static-page-form-shortcode">Form Shortcode:</label><input type="text" value="'.esc_attr( $form_shortcode ).'" name="static-page-form-shortcode" placeholder="Enter here the form Shortcode" /><br>
				<label for="static-page-support-shortcode">Support Shortcode:</label><input type="text" value="'.esc_attr( $support_shortcode ).'" name="static-page-support-shortcode" placeholder="Enter here Bottom support section shortcode" /><br>
			</div>
		</div>';
		

}

add_action( 'save_post', 'static_page_save_meta_box' );

function static_page_save_meta_box( $post_id ){

	// if auto saving skip saving our meta box data
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	//print_r($_POST); exit;
	// check nonce for security

	/* if(!wp_verify_nonce( $_POST['_wp_nonce'], 'ebe_save_meta_box' ) ){
		wp_redirect(admin_url('/'));
		exit;
	} */

	$static_content_page = array();

	$static_content_page['static-page-form-text'] = $_POST['static-page-form-text'] ;
	$static_content_page['static-page-form-shortcode'] = $_POST['static-page-form-shortcode'] ;
	$static_content_page['static-page-support-shortcode'] = $_POST['static-page-support-shortcode'];

	$static_content_page['static-top-paragraph'] = $_POST['static-top-paragraph'];
	$static_content_page['static-first-title'] = $_POST['static-first-title'];
	$static_content_page['static-second-paragraph'] = $_POST['static-second-paragraph'];
	$static_content_page['static-second-title'] = $_POST['static-second-title'];
	$static_content_page['static-third-paragraph'] = $_POST['static-third-paragraph'];

	update_post_meta( $post_id, 'static_page_data', $static_content_page );

}

add_filter( 'body_class','halfhalf_body_class' );
function halfhalf_body_class( $classes ) {
    if ( is_page('avana-renewable-energy')) {
        $classes[] = 'landing-theme';
    }
     
    return $classes;
}
// hide editor in static template.-
/* add_action( 'admin_head', 'hide_editor' );
function hide_editor() {
    $template_file = basename( get_page_template() );
    if($template_file == 'template-static-content.php'){ // template
        remove_post_type_support('page', 'editor');
    }
} */

function mtm_options_page() {
	acf_add_options_page( array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'icon_url'      => 'dashicons-feedback', 
        'position'      => 2,
		'redirect'		=> true // false gives this its own page
	) );  

	acf_add_options_sub_page(array(
	    'page_title'  => 'Logo Settings',
	    'menu_title'  => 'Logo',
	    'parent_slug' => 'theme-general-settings',
	) );

	acf_add_options_sub_page(array(
	    'page_title'  => 'Message COVID19',
	    'menu_title'  => 'Message',
	    'parent_slug' => 'theme-general-settings',
	) );
}
add_action( 'init', 'mtm_options_page' );