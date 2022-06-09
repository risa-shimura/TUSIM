<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class = $equal_height = $content_placement = $css = $parallax = $parallax_image = $el_id =  $class_fixed ='';
$content_animation ='';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}
if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( '15' !== $atts['gap'] ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

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

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="'.esc_attr( trim( $css_class ) ).'" ' ;

$output .= '<div '.implode( ' ', $wrapper_attributes ).'  '.implode( ' ', $mo_data_opts ).'>';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_output;
echo ''.$output.'';