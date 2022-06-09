<?php
function motivoweb_single_fancy_image_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'image'           =>  '',
		'img_link'        =>  '',
		'label'           =>  '',
		'enable_shadow'   =>  '',
		'enable_roudness' =>  '',
		//Effects
		'enable_reveal'   =>  '',
		'reveal_color'    =>  '',
		'reveal_direction'=>  '',
		'reveal_delay'    =>  '',
		//parallax
		'parallax'         =>  '',
		'translate_from_x' =>  '',
		'translate_from_y' =>  '',
		'translate_from_z' =>  '',
		'scale_from_x'     =>  '',
		'scale_from_y'     =>  '',
		'scale_from_z'     =>  '',
		'rotate_from_x'    =>  '',
		'rotate_from_y'    =>  '',
		'rotate_from_z'    =>  '',
		'from_opacity'     =>  '',
		'translate_to_x'   =>  '',
		'translate_to_y'   =>  '',
		'translate_to_z'   =>  '',
		'scale_to_x'       =>  '',
		'scale_to_y'       =>  '',
		'scale_to_z'       =>  '',
		'rotate_to_x'      =>  '',
		'rotate_to_y'      =>  '',
		'rotate_to_z'      =>  '',
		'to_opacity'       =>  '',
		'to_easy'          =>  'linear',
		'to_delay'         =>  '',
		'parallax_offset'  =>  '',
		'parallax_duration'=>  '',
    ), $atts));
    ob_start();  ?>	
    <?php
	    $opts = array();
	   // reveal
		$reveal = $enable_reveal;
		$reveal_color =	isset( $reveal_color ) ? $reveal_color : '#f0f3f6';
		$reveal_direction = $reveal_direction;
		$reveal_delay = isset( $reveal_delay ) ? $reveal_delay : 0;
        if( $reveal ) {
			$opts[] = 'data-reveal="true"';
			$opts[] = 'data-reveal-options=\'' . wp_json_encode( array( 'direction' => $reveal_direction, 'bgcolor' => $reveal_color, 'delay' => $reveal_delay ) ) . '\'';
		}
	    //parallax
		$wrapper_attributes = $parallax_data = $parallax_data_from = $parallax_data_to = $parallax_opts = array();
		$wrapper_attributes[] = 'data-parallax="true"';
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
	    if ( isset( $to_easy ) ) { $parallax_opts['easing'] = $to_easy; }
        if ( ! empty( $to_delay ) ) { $parallax_opts['delay'] = ( float ) $to_delay; }
	    if( ! empty( $parallax_offset ) ) { $parallax_opts['offset'] = esc_attr( $parallax_offset ); }
	    if( ! empty( $parallax_duration ) ) { $parallax_opts['duration'] = esc_attr( $parallax_duration ); }
		if( ! empty( $parallax_opts ) ) { $wrapper_attributes[] = 'data-parallax-options=\'' . wp_json_encode( $parallax_opts ) .'\'';	}
	     
	    if ( !empty ($parallax )){ 
			$parallax_attribute = implode( ' ', $wrapper_attributes ); 
		}else{ $parallax_attribute =""; }
	  
	    // image
	    $attachment_image = wp_get_attachment_image_src($image, 'full', false); 	
	    $image = '<figure><img src="'.esc_url($attachment_image[0]).'" alt="image" /></figure>';
	    // border radis
	    if( $enable_roudness ) {
			$opts[] = 'data-roundness="'. $enable_roudness . '"';
		}
	    // shadow img
		if( $enable_shadow ) {
			$opts[] = 'data-shadow-style="' . $enable_shadow . '"';
		}
	   	//link 
		$link_button = null;
		if ($img_link !== '') { $link_button = vc_build_link($img_link); }
		if ( !empty( $link_button['url'] ) ) {
			$href = $link_button['url'];
		} else{ $href = '#'; }
		$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
	    ?>
	    <div class="fancy-image mo-img-group-single" <?php if( !empty( $opts ) ) { echo implode( ' ', $opts ); } ?>>
			<div class="mo-img-container-inner" <?php if( !empty( $parallax ) ) { echo implode( ' ', $wrapper_attributes ); } ?> >
			<?php
	           if($img_link) { echo '<a href="'.esc_url($href).' " target="'.esc_attr($target).'" >'; } 
	                echo '<figure><img src="'.esc_url($attachment_image[0]).'" alt="image" /></figure>';  
	                if($label){ echo '<h6>'.esc_html($label).'</h6>'; } 
	           if($img_link){ echo '</a>'; } 
	          ?>	
			</div><!-- /.mo-img-container-inner -->
		</div><!-- /.fancy-image -->
			
    <?php wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('single_fancy_image', 'motivoweb_single_fancy_image_func'); }