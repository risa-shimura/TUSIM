<?php
function teba_textillate_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'in_animate_effect' => 'flash',
		'in_animate_type' 	=> '',
		'out_animate_effect'=> 'flash',
		'out_animate_type'	=> '',
		'initial_delay'		=> 0,
		'auto_start'		=> 1,
		'loop'				=> 1,
		'type'				=> 'char',
		'fontsize'          => '14px',                  
        'lineheight'        => '23px',
		'fontweight'        => '500',
		'textalign'         => 'left',
        'color'             => '#181b31',                  
        'list'              => '',                  
        'list_item'         => '',
	    'el_class'          => '',
    ), $atts));
	wp_enqueue_script('textillate', TEBA_URI_PATH . '/assets/js/textillate.js');
	$class = array();
	$class[] = 'list';
	$class[] = $el_class;
	$lists = array();
    $lists = (array) vc_param_group_parse_atts($list); 
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
    ob_start();?>
    <div class="bs-textillate <?php echo esc_attr(implode(' ', $class));?>">
	  <div class="bs-container" style="font-size:<?php echo esc_attr($fontsize); ?>; font-weight:<?php echo esc_attr($fontweight); ?>; text-align:<?php echo esc_attr($textalign); ?>; line-height:<?php echo esc_attr($lineheight); ?>; color:<?php echo esc_attr($color); ?>">
		<div class="bs-textillate-selector tlt" data-textillate-handle='<?php echo esc_attr( $_tlt_settings ); ?>'>
		     <ul class="texts">
				<?php foreach ($lists as $key => $value){ ?>
				   <?php if( count($list_item) && !empty($value['list_item']) ) { ?><li><?php echo esc_html($value['list_item']); ?></li><?php } ?>
				<?php } ?>
			</ul>
		</div>
	   </div>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('textillate', 'teba_textillate_func');}