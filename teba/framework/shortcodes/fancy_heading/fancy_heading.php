<?php
function teba_fancy_heading_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'title' => '',                  
        'link' => '',
		//style
		'color' => '#181b31',
		'font_size' => '36px',
        'line_height' => '42px',
		'font_weight' => '700',
		'letter_spacing' => '',
		'alignment' => '',
		'text_transform' => '',
		'underline' => '', 
        // rotate
		'enable_txt_rotator' => '',
		'words' => '',
		'word' => '', 
		'in_animate_effect' => 'flash',
		'in_animate_type' 	=> '',
		'out_animate_effect'=> 'flash',
		'out_animate_type'	=> '',
		'initial_delay'		=> 0,
		'auto_start'		=> 1,
		'loop'				=> 1,
		'type'				=> 'char',
		'el_class' => '',
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
	$class = array();
	$class[] = 'fancy_heading';
	$class[] = $el_class;
	
	// rotate
	wp_enqueue_script('teba-textillate', TEBA_URI_PATH . '/assets/js/textillate.js');
    $lists = array();
    $lists = (array) vc_param_group_parse_atts($words); 
	$_tlt_settings = json_encode( array(
		'selector' => '.texts',
		'loop'     => $loop,
		'initialDelay' => $initial_delay,
		'autoStart' => $auto_start,
		'in' => array( 
				'effect' => $in_animate_effect,
				'delayScale' => 1.5,
				'delay' => 50,
				$in_animate_type => true 
			),
		'out' => array(
				'effect' => $out_animate_effect ,
				'delayScale' => 1.5,
				'delay' => 50,
				$out_animate_type => true 
			),
		'type' => $type, // set the type of token to animate (available types: 'char' and 'word')
		) );
    ob_start();
	
	    //style
	    $mo_color  = !empty( $color ) ? 'color:' . esc_attr( $color ) .';' : '';
		$mo_font_size = !empty( $font_size ) ? 'font-size:' . esc_attr( $font_size ) . ';' : '';
	    $mo_line_height  = !empty( $line_height ) ? 'line-height:' . esc_attr( $line_height ) .';' : '';
	    $mo_fancy_alignment = !empty( $alignment ) ? 'text-align:' . esc_attr( $alignment ) .';' : '';
        $mo_text_transform  = !empty( $text_transform ) ? 'text-transform:' . esc_attr( $text_transform ) .';' : '';
	    $mo_letter_spacing = !empty( $letter_spacing ) ? 'letter-spacing:' . esc_attr( $letter_spacing ) . ';' : '';
	    $mo_font_weight = !empty( $font_weight ) ? 'font-weight:' . esc_attr( $font_weight ) . ';' : '';
	    $mo_underline  = !empty( $underline ) ? 'text-decoration:' . esc_attr( $underline ) .';' : '';
		$style_word = !empty( $value['word_color'] ) ? 'style="color:' . esc_attr( $value['word_color'] ) . '"' : '';
	
	    $style_head = 'style="'.$mo_color.' '.$mo_font_size.' '.$mo_line_height.' '.$mo_fancy_alignment.' '.$mo_text_transform.' '.$mo_font_weight.' '.$mo_letter_spacing.' '.$mo_underline.'"' ;
		
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
		if ( !empty ($enable_split )){ $attribute = join( ' ', $opts )  ; }else{ $attribute ="";}
	
		// Link
	    $link = ($link=='||') ? '' : $link;
		$link = vc_build_link( $link );
		$a_link = $link['url'];
	    $a_title = ($link['title'] == '') ? '' : 'title="'.$link['title'].'"';
		$a_target = ($link['target'] == '') ? '' : 'target="'.$link['target'].'"';
        
        echo'<div class="fancy_heading" '.$style_head.'>';
	
        if( $title ) {
			if ( !empty ( $a_link ) ) {
				echo'<h3 '. $attribute .'><a href="'. $a_link .'"  '. $a_target .' '. $a_title .' >'. $title .'</a></h3>';
			}
			else {
				echo '<h3 '.$attribute.'> '.$title.'</h3>';
			}
		} ?>
        
       <?php if( !empty ($enable_txt_rotator ) ) { ?>  
	    <div class="bs-textillate-selector tlt"  data-textillate-handle='<?php echo esc_attr( $_tlt_settings ); ?>'>
		     <ul class="texts">
				<?php foreach ($lists as $key => $value){ ?>
					<?php if( !empty($value['word']) ) { ?>	<li><?php echo esc_html($value['word']); ?></li><?php } ?>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>	
		
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('fancy_heading', 'teba_fancy_heading_func'); }