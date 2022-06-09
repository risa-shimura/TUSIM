<?php
function getCSSAnimation($css_animation) {
    $output = '';
    if ($css_animation != '') {
        wp_enqueue_script('waypoints');
        $output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
    }
    return $output;
}
/* [html_attributes description] (SVG icon animate) */
 function html_attributes( $attributes = array(), $prefix = '' ) {
	if ( empty( $attributes ) ) {
		return false;
	}
	$options = false;
	if( isset( $attributes['data-plugin-options'] ) ) {
		$options = $attributes['data-plugin-options'];
		unset( $attributes['data-plugin-options'] );
	}
	$out = '';
	foreach ( $attributes as $key => $value ) {
		if( ! $value ) {
			continue;
		}
		$key = $prefix . $key;
		if( true === $value ) {
			$value = 'true';
		}
		$out .= sprintf( ' %s="%s"', esc_html( $key ), esc_attr( $value ) );
	}
	if( $options ) {
		$out .= sprintf( ' data-plugin-options=\'%s\'', $options );
	}
	return $out;
}
?>