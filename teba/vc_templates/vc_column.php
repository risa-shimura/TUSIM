<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Column $this
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';
//Paralax vars
$parallax_animation= $translate_from_x = $translate_from_y= $translate_from_z = $scale_from_x = $scale_from_y = $scale_from_z = $rotate_from_x= $rotate_from_y= $rotate_from_z= $from_opacity = $translate_to_x= $translate_to_y= $translate_to_z= $scale_to_x= $scale_to_y= $scale_to_z= $rotate_to_x= $rotate_to_y= $rotate_to_z= $to_opacity= $to_easy= $to_delay= $parallax_time= $parallax_offset= $parallax_trigger = $parallax_trigger_number = $parallax_duration = $enable_reverse= '';
$output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script( 'wpb_composer_front_js' );
$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );
$mo_id = uniqid( 'mo-column-' );


$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
	$mo_id,
);
if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = $ca_data_opts = array();
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
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

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if( 'yes' === $parallax_animation ) {
	$parallax_data = $parallax_data_from = $parallax_data_to = $parallax_opts = array();
	$wrapper_attributes[] = 'data-parallax="true"';
	//Data-options-from
	if ( !empty( $translate_from_x ) ) { $parallax_data_from['translateX']      = ( int ) $translate_from_x; }
	if ( !empty( $translate_from_y ) ) { $parallax_data_from['translateY']      = ( int ) $translate_from_y; }
	if ( !empty( $translate_from_z ) ) { $parallax_data_from['translateZ']      = ( int ) $translate_from_z; }
	if ( '1' !== $scale_from_x ) { $parallax_data_from['scaleX']     = ( float ) $scale_from_x; }
	if ( '1' !== $scale_from_y ) { $parallax_data_from['scaleY']     = ( float ) $scale_from_y; }
	if ( '1' !== $scale_from_z ) { $parallax_data_from['scaleZ']     = ( float ) $scale_from_z; }
	if ( !empty( $rotate_from_x ) ) { $parallax_data_from['rotateX'] = ( int ) $rotate_from_x; }
	if ( !empty( $rotate_from_y ) ) { $parallax_data_from['rotateY'] = ( int ) $rotate_from_y; }
	if ( !empty( $rotate_from_z ) ) { $parallax_data_from['rotateZ'] = ( int ) $rotate_from_z; }
	if ( isset( $from_opacity ) && '1' !== $from_opacity ) { $parallax_data_from['opacity']    = ( float ) $from_opacity; }
	//Data-options-to
	if ( !empty( $translate_from_x ) ) { $parallax_data_to['translateX'] = ( int ) $translate_to_x; }
	if ( !empty( $translate_from_y ) ) { $parallax_data_to['translateY'] = ( int ) $translate_to_y; }
	if ( !empty( $translate_from_z ) ) { $parallax_data_to['translateZ'] = ( int ) $translate_to_z; }
	if ( isset( $scale_to_x ) && '1' !== $scale_from_x ) { $parallax_data_to['scaleX'] = ( float ) $scale_to_x; }
	if ( isset( $scale_to_y ) && '1' !== $scale_from_y ) { $parallax_data_to['scaleY'] = ( float ) $scale_to_y; }
	if ( isset( $scale_to_z ) && '1' !== $scale_from_z ) { $parallax_data_to['scaleZ'] = ( float ) $scale_to_z; }
	if ( !empty( $rotate_from_x ) ) { $parallax_data_to['rotateX'] = ( int ) $rotate_to_x; }
	if ( !empty( $rotate_from_y ) ) { $parallax_data_to['rotateY'] = ( int ) $rotate_to_y; }
	if ( !empty( $rotate_from_z ) ) { $parallax_data_to['rotateZ'] = ( int ) $rotate_to_z; }
	if ( isset( $to_opacity ) && '1' !== $from_opacity ) { $parallax_data_to['opacity'] = ( float ) $to_opacity; }
	//Parallax general options
	if ( ! empty( $parallax_from ) ) {
		$parallax_data['from'] = $parallax_from;
	} else {
		$parallax_data['from'] = $parallax_data_from;
	}
	if( ! empty( $parallax_to ) ) {
		$parallax_data['to'] = $parallax_to;
	} else {
		$parallax_data['to'] = $parallax_data_to;
	}
	if( is_array( $parallax_data['from'] ) && ! empty( $parallax_data['from'] ) ) {
		$wrapper_attributes[] = 'data-parallax-from=\'' . wp_json_encode( $parallax_data['from'] ) . '\'';
	}
	elseif( ! empty( $parallax_from ) ) {
		$wrapper_attributes[] = 'data-parallax-from=\'{' . $parallax_from . '}\'';
	}
	if( is_array( $parallax_data['to'] ) && ! empty( $parallax_data['to'] ) ) {

		$wrapper_attributes[] = 'data-parallax-to=\'' . wp_json_encode( $parallax_data['to'] ) . '\'';
	}
	elseif( ! empty( $parallax_to ) ) {
		$wrapper_attributes[] = 'data-parallax-to=\'{' . $parallax_to . '}\'';
	}
	if( ! empty( $parallax_time ) ) { $parallax_opts['time'] = esc_attr( $parallax_time ); }
	if( ! empty( $parallax_duration ) ) { $parallax_opts['duration'] = esc_attr( $parallax_duration ); }
	if ( isset( $to_easy ) ) { $parallax_opts['easing'] = $to_easy; }
	if ( ! empty( $to_delay ) ) { $parallax_opts['delay'] = ( float ) $to_delay; }
	if( ! empty( $parallax_offset ) ) { $parallax_opts['offset'] = esc_attr( $parallax_offset ); }
	if( 'yes' === $enable_reverse ) {
		$parallax_opts['reverse'] = true;
	}
	else {
		$parallax_opts['reverse'] = false;
	}
	if( 'number' !== $parallax_trigger ){
		$parallax_opts['triggerHook'] = esc_attr( $parallax_trigger );
	}
	if( ! empty( $parallax_opts ) ) {
		$wrapper_attributes[] = 'data-parallax-options=\'' . wp_json_encode( $parallax_opts ) .'\'';
	}
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="vc_column-inner">';
$output .= '<div class="wpb_wrapper ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '"  ' . implode( ' ', $ca_data_opts ) . '>';
$output .= '<div class="wpb_wrapper-inner">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo apply_filters( 'mo_vc_column', $output );