<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$class_fixed = $el_class = $full_height = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $mo_bg_overlay = $mo_bg_fixed = '';

$content_animation = $canvas = $row_separator = $color_separator = $bottom_color_separator = $position_separator = $content_color = $content_bg_color = $bottom_color_separator =  $position_separator ='';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

//Custom Animation
$mo_data_opts = array();


if( $content_animation == 'yes') {	
	$opts = $init_values = $animations_values = $arr = array();
	$opts['triggerHandler'] = 'inview';
	$opts['animationTarget'] = '.wpb_column';
	$opts['duration'] = !empty( $mo_duration ) ? $mo_duration : 1200;
	if( !empty( $mo_start_delay ) ) {
		$opts['startDelay'] = $mo_start_delay;
	}
	$opts['delay'] = !empty( $mo_delay ) ? $mo_delay : 100;
	$opts['easing'] = $mo_easing;
	$opts['direction'] = $mo_direction;
	//Init values
	if ( !empty( $mo_init_translate_x ) ) { $init_values['translateX'] = ( int ) $mo_init_translate_x; }
	if ( !empty( $mo_init_translate_y ) ) { $init_values['translateY'] = ( int ) $mo_init_translate_y; }
	if ( !empty( $mo_init_translate_z ) ) { $init_values['translateZ'] = ( int ) $mo_init_translate_z; }
	if ( '1' !== $mo_init_scale_x ) { $init_values['scaleX'] = ( float ) $mo_init_scale_x; }
	if ( '1' !== $mo_init_scale_y ) { $init_values['scaleY'] = ( float ) $mo_init_scale_y; }
	if ( '1' !== $mo_init_scale_z ) { $init_values['scaleZ'] = ( float ) $mo_init_scale_z; }
	if ( !empty( $mo_init_rotate_x ) ) { $init_values['rotateX'] = ( int ) $mo_init_rotate_x; }
	if ( !empty( $mo_init_rotate_y ) ) { $init_values['rotateY'] = ( int ) $mo_init_rotate_y; }
	if ( !empty( $mo_init_rotate_z ) ) { $init_values['rotateZ'] = ( int ) $mo_init_rotate_z; }
	if ( isset( $mo_init_opacity ) && '1' !== $mo_init_opacity ) { $init_values['opacity']    = ( float ) $mo_init_opacity; }
	//Animation values
	if ( !empty( $mo_init_translate_x ) ) { $animations_values['translateX'] = ( int ) $mo_an_translate_x; }
	if ( !empty( $mo_init_translate_y ) ) { $animations_values['translateY'] = ( int ) $mo_an_translate_y; }
	if ( !empty( $mo_init_translate_z ) ) { $animations_values['translateZ'] = ( int ) $mo_an_translate_z; }
	if ( isset( $mo_an_scale_x ) && '1' !== $mo_init_scale_x ) { $animations_values['scaleX'] = ( float ) $mo_an_scale_x; }
	if ( isset( $mo_an_scale_y ) && '1' !== $mo_init_scale_y ) { $animations_values['scaleY'] = ( float ) $mo_an_scale_y; }
	if ( isset( $mo_an_scale_z ) && '1' !== $mo_init_scale_z ) { $animations_values['scaleZ'] = ( float ) $mo_an_scale_z; }
	if ( !empty( $mo_init_rotate_x ) ) { $animations_values['rotateX'] = ( int ) $mo_an_rotate_x; }
	if ( !empty( $mo_init_rotate_y ) ) { $animations_values['rotateY'] = ( int ) $mo_an_rotate_y; }
	if ( !empty( $mo_init_rotate_z ) ) { $animations_values['rotateZ'] = ( int ) $mo_an_rotate_z; }
	if ( isset( $mo_an_opacity ) && '1' !== $mo_init_opacity ) { $animations_values['opacity']    = ( float ) $mo_an_opacity; }	
	$opts['initValues'] = !empty( $init_values ) ? $init_values : array();
	$opts['animations'] = !empty( $animations_values ) ? $animations_values : array();
	$mo_data_opts[] = 'data-custom-animations="true"';
	$mo_data_opts[] = 'data-ca-options=\'' . stripslashes( wp_json_encode( $opts ) ) . '\'';
}

/* Background Overlay */
$style_overlay = '';
if ( ! empty( $mo_bg_overlay ) ) { $style_overlay  = ' background: '.$mo_bg_overlay.';
  background: -webkit-linear-gradient(left, '.$mo_bg_overlay.' 0%, '.$mo_bg_second_overlay.' 100%); 
  background: -moz-linear-gradient(left, '.$mo_bg_overlay.' 0%, '.$mo_bg_second_overlay.' 100%); 
  background: -o-linear-gradient(left, '.$mo_bg_overlay.' 0%, '.$mo_bg_second_overlay.' 100%);
  background: -ms-linear-gradient(left,'.$mo_bg_overlay.' 0%, '.$mo_bg_second_overlay.' 100%);
  background: linear-gradient(to left, '.$mo_bg_overlay.' 0%, '.$mo_bg_second_overlay.' 100%); ';
}

/* Background fixed */
if($mo_bg_fixed) $class_fixed = 'mo-bg-fixed';
wp_enqueue_script( 'wpb_composer_front_js' );
$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$class_fixed,
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}
if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

// build attributes for wrapper
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$class_container = 'no-container';
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width"></div>';
} else {
	$class_container = 'container main-container';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = ' vc_row-o-columns-' . $columns_placement;
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-content-' . $content_placement;
}

/* flex row */
if ( ! empty( $flex_row ) ) {
	$css_classes[] = ' vc_row-flex';
}

/* video parallax */
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

/* img parallax */
if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}
if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

/* Background canvas */
$particles1_add  =  $particles2_add  = $particles_class= '';
if( $canvas =='particles1' ){
	wp_enqueue_script( 'particles1', TEBA_URI_PATH. '/assets/js/particles1.js', array( 'jquery' ), '', true );
}
if( $canvas == 'particles1'){
   $particles1_add = '<div id="particles-js"></div>'; 
   $particles_class = 'particles_row'; 
}
 elseif( $canvas =='particles2'){
   $particles2_add = '<div class="particles2"><span class="shape-one"></span><span class="shape-two"></span><span class="shape-three"></span><span class="shape-four"></span><span class="shape-five"></span></div>'; 
   $particles_class = 'particles_row'; 
}

/* row separator */
/* triangle  round-top round-bottom angled-left angled-right wave  pyramids */
$lg_triangle = $round_top = $curve ='';
if( $row_separator == 'lg_triangle'){
   $row_separator = '<div class="row_style"><svg class="lg-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#fff" width="100%" height="150" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none" style="height:150px; bottom: -120px;"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path></svg></div>'; 
}
elseif( $row_separator == 'round'){
   $row_separator = '
   <div class="row_style"> <svg class="round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z"></path> </svg></div>'; 
}
elseif( $row_separator == 'curve'){
   $row_separator = '<div class="row_style"><svg class="curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path d="M 0 0 c 0 0 0 120 500 50 s 800 -50 500 -50 v 101 h -1000 v -100 z"></path> </svg></div>'; 
}
elseif( $row_separator == 'angled_left'){
   $row_separator = '<div class="row_style"><svg class="angled_left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M0,6V0h1000v50L0,6z"></path></svg></div>'; 
}
elseif( $row_separator == 'angled_right'){
   $row_separator = '<div class="row_style"><svg class="angled_right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M0,6V0h1000v50L0,6z"></path></svg></div>'; 
}
elseif( $row_separator == 'wave'){
   $row_separator = '<div class="row_style"><svg class="wave" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" x="0px" y="0px" viewBox="0 0 1440 149"><path d="m0,54.06187c118.19818,9.64301 197.37493,15.71477 237.53025,18.21526c22.9659,1.4301 43.9256,3.1575 60.11153,3.83798c78.87981,3.31625 155.08061,4.4588 227.62385,1.88042c85.54281,-3.04043 180.25642,-8.19922 242.59375,-16.57343c150.375,-20.20094 300.50006,-40.24059 375.79417,-47.64866c27.83046,-2.73819 48.71532,-4.56444 74.66105,-6.57284c36.37895,-2.816 71.9183,-4.52609 98.99648,-5.52791c27.07819,-1.00183 58.90895,-1.67269 79.22064,-1.67269c13.54113,0 28.03056,0.55756 43.46828,1.67269l0,147.32731l-1440,0l0,-94.93813z"></path></svg></div>'; 
}
elseif( $row_separator == 'waves'){
	 $row_separator = '<div class="row_style"><svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"> <path d="M 1000 280 l 2 -253 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -235 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path><path d="M 1000 261 l 2 -222 c -157 -43 -312 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -153.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 16.61 v 22.39 z"></path><path d="M 1000 296 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path></svg></div>'; 
}else{
	 $row_separator = '';
}

/* row separator color */
$mo_color_separator ='';
if($color_separator) $mo_color_separator = $mo_color_separator;

$mo_bottom_color_separator ='';
if($bottom_color_separator) $mo_bottom_color_separator = $mo_bottom_color_separator;

/* row separator color */
$mo_position_separator ='';
if($position_separator) $mo_position_separator = $mo_position_separator;

$top_bottom_separator ='';
if( $position_separator == 'svg_top_bottom'){
	 $top_bottom_separator = $row_separator;
}
/* css class */
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
/* content bg color */
$mo_content_bg_color ='';
if($content_bg_color) $mo_content_bg_color = $mo_content_bg_color;

/* content text color */
$mo_content_color ='';
if($content_color) $mo_content_color = $mo_content_color;

$wrapper_attributes[] = 'class="'.esc_attr( trim( $css_class ) ).' '.$content_bg_color.' '.$content_color.' '.$color_separator.' '.$bottom_color_separator.'  '.$position_separator.'" ' ;
$output .= '<div '.implode( ' ', $wrapper_attributes ).'  '.implode( ' ', $mo_data_opts ).'>
                 ' .$top_bottom_separator. ' 
				 ' .$particles1_add. '  ' .$particles2_add. '  
				<div class="mo-vc-row-ovelay" style="' .esc_attr($style_overlay). '"></div>
			<div class="'.esc_attr($class_container).'">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';

$output .= $row_separator;

$output .= '</div>';

$output .= $after_output;
echo ''.$output.'';