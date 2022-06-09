<?php
function teba_title_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'title' => '',
		'subtitle' => '',
		'position' => 'text-center',
		'content_box' => '',
		'teba_template' => 'title-box-style1',
		// animation
		'enable_split' => '',        
		'split_type' => 'words',          
		'duration' => '1200',
		'start_delay' => '',
		'delay' => '120',
		'easing' => 'easeInQuad',
		'direction' => 'forward',
		'ca_init_values' => '',
		'ca_init_translate_x' => '',
		'ca_init_translate_y' => '',
		'ca_init_translate_z' => '',
		'ca_init_scale_x' => '',
		'ca_init_scale_y' => '',
	    'ca_init_scale_z' => '',
	    'ca_init_rotate_x' => '',
		'ca_init_rotate_y' => '',  
		'ca_init_rotate_z' => '', 
		'ca_init_opacity' => '',
		'ca_animations_values' => '',  
		'ca_an_translate_x' => '', 
		'ca_an_translate_y' => '', 
		'ca_an_translate_z' => '', 
		'ca_an_scale_x' => '', 
		'ca_an_scale_y' => '', 
		'ca_an_scale_z' => '', 
		'ca_an_rotate_x' => '', 
		'ca_an_rotate_y' => '',                  
		'ca_an_rotate_z' => '', 
		'ca_an_opacity' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$template_class = array();
    $template_class[] = 'mo-title-box';
	$template_class[]  = $teba_template;
    ob_start();
	
	    //data-ca-options (animation)
	    $opts = $init_values = $animations_values = $arr = $split_opts = $fit_opts = array();
		$ca_opts['triggerHandler'] = 'inview';
		$ca_opts['animationTarget'] = '.split-inner';
		$ca_opts['duration'] = !empty( $duration ) ? $duration : 700;
		if( !empty( $start_delay ) ) {
			$ca_opts['startDelay'] = $start_delay;
		}
		$ca_opts['delay'] = !empty( $delay ) ? $delay : 100;
		$ca_opts['easing'] = $easing;
		$ca_opts['direction'] = $direction;
	
		//Init values(animation)
		if ( !empty( $ca_init_translate_x ) ) { $init_values['translateX'] = ( int ) $ca_init_translate_x; }
		if ( !empty( $ca_init_translate_y ) ) { $init_values['translateY'] = ( int ) $ca_init_translate_y; }
		if ( !empty( $ca_init_translate_z ) ) { $init_values['translateZ'] = ( int ) $ca_init_translate_z; }
		if ( '1' !== $ca_init_scale_x ) { $init_values['scaleX'] = ( float ) $ca_init_scale_x; }
		if ( '1' !== $ca_init_scale_y ) { $init_values['scaleY'] = ( float ) $ca_init_scale_y; }
		if ( '1' !== $ca_init_scale_z ) { $init_values['scaleZ'] = ( float ) $ca_init_scale_z; }
		if ( !empty( $ca_init_rotate_x ) ) { $init_values['rotateX'] = ( int ) $ca_init_rotate_x; }
		if ( !empty( $ca_init_rotate_y ) ) { $init_values['rotateY'] = ( int ) $ca_init_rotate_y; }
		if ( !empty( $ca_init_rotate_z ) ) { $init_values['rotateZ'] = ( int ) $ca_init_rotate_z; }
		if ( isset( $ca_init_opacity ) && '1' !== $ca_init_opacity ) { $init_values['opacity'] = ( float ) $ca_init_opacity; }

		//Animation values(animation)
		if ( !empty( $ca_init_translate_x ) ) { $animations_values['translateX'] = ( int ) $ca_an_translate_x; }
		if ( !empty( $ca_init_translate_y ) ) { $animations_values['translateY'] = ( int ) $ca_an_translate_y; }
		if ( !empty( $ca_init_translate_z ) ) { $animations_values['translateZ'] = ( int ) $ca_an_translate_z; }
		if ( isset( $ca_an_scale_x ) && '1' !== $ca_init_scale_x ) { $animations_values['scaleX'] = ( float ) $ca_an_scale_x; }
		if ( isset( $ca_an_scale_y ) && '1' !== $ca_init_scale_y ) { $animations_values['scaleY'] = ( float ) $ca_an_scale_y; }
		if ( isset( $ca_an_scale_z ) && '1' !== $ca_init_scale_z ) { $animations_values['scaleZ'] = ( float ) $ca_an_scale_z; }
		if ( !empty( $ca_init_rotate_x ) ) { $animations_values['rotateX'] = ( int ) $ca_an_rotate_x; }
		if ( !empty( $ca_init_rotate_y ) ) { $animations_values['rotateY'] = ( int ) $ca_an_rotate_y; }
		if ( !empty( $ca_init_rotate_z ) ) { $animations_values['rotateZ'] = ( int ) $ca_an_rotate_z; }
		if ( isset( $ca_an_opacity ) && '1' !== $ca_init_opacity ) { $animations_values['opacity']    = ( float ) $ca_an_opacity; }	
	
		$ca_opts['initValues'] = !empty( $init_values ) ? $init_values : array( 'scale' => 1 );
		$ca_opts['animations'] = !empty( $animations_values ) ? $animations_values : array( 'scale' => 1 );
	    $opts[] = 'data-ca-options=\'' . wp_json_encode( $ca_opts ) . '\'';
	    
		$split_opts['type'] = $split_type;
		$opts[] = 'data-split-text="true"';
		$opts[] = 'data-custom-animations="true"';
		$opts[] = 'data-split-options=\'' . wp_json_encode( $split_opts ) . '\'';
		$opts[] = 'data-fittext="true"';
	    $opts[] = 'data-text-rotator="true"';
	
		//$attribute = join( ' ', $opts );
		 if ( !empty ($enable_split )){ $attribute = join( ' ', $opts )  ; }else{ $attribute ="";}
       ?>
       
      <?php echo '<div class="'.esc_attr(implode(' ', $template_class)).'  '.esc_attr($position).'" '. $attribute .' >';
		  if($subtitle) echo '<h5>'.esc_html($subtitle).'</h5>';
		  if($title) echo '<h3>'.esc_html($title).'</h3>';
		  
		  
		  
		if($teba_template == 'title-box-style3' ) {echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="71px" height="11px"> <path fill-rule="evenodd" d="M59.669,10.710 L49.164,3.306 L39.428,10.681 L29.714,3.322 L20.006,10.682 L10.295,3.322 L1.185,10.228 L-0.010,8.578 L10.295,0.765 L20.006,8.125 L29.714,0.765 L39.428,8.125 L49.122,0.781 L59.680,8.223 L69.858,1.192 L70.982,2.895 L59.669,10.710 Z"></path></svg>';}
		                   

		  if($content_box)echo '<div class="content">'.$content_box.'</div>';
      ?> </div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('title_box', 'teba_title_box_func');}