<?php
function teba_image_layers_func($atts, $content = null) {
    extract(shortcode_atts(array(
     	'images_list' => '',                  
        'images_list_item' => '',  
		'offcet_x' => '',
		'offcet_y' => '0',
		'layer_animation' => '',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$class = $el_class;
	$images_lists = array();
    $images_lists = (array) vc_param_group_parse_atts($images_list); 
    ob_start();
	$nth_child = 0;
	$nth_child_step = 1;
	$animate_delay = 0;
	$periodicity = 2;
	 ?>
    <div class="image-layers">
     <?php     
	 foreach ($images_lists as $key => $value) {
		 	 $image = $offset_x_css = $offset_y_css = '';
			if(isset($value['images_list_item']) && !empty($value['images_list_item'])) {
				
				if(isset($value['layer_animation']) && !empty($value['layer_animation'])) {
					$anim_class = esc_attr($value['layer_animation']);
				}
				if(isset($value['el_class']) && !empty($value['el_class'])) {
					$class = esc_attr($value['el_class']);
				}
				$nth_child = $nth_child_step++;
                $nth_child = 'z-index:'.$nth_child_step.'';
			    
				$animate_delay +=2;
				$anim_delay = 'data-wow-delay="0.'. esc_attr($animate_delay) .'s"';
				
				$translate = -100; $translate_step = 100;
				$translate = $translate + $translate_step;
				
				if(!isset($value['offcet_x'])) {
					$value['offcet_x'] = 0;
				}
				if(!isset($value['offcet_y'])) {
					$value['offcet_y'] = 0;
				}
				if($value['offcet_x'] >= 100) {
					$value['offcet_x'] = 100;
				}
				if($value['offcet_x'] <= -100) {
					$value['offcet_x'] = -100;
				}
				if($value['offcet_y'] >= 100) {
					$value['offcet_y'] = 100;
				}
				if($value['offcet_y'] <= -100) {
					$value['offcet_y'] = -100;
				}
				
				if( (isset($fields['offcet_x']) && strcmp($value['offcet_x'], '') != 0) || (isset($value['offcet_y']) && strcmp($value['offcet_y'], '') != 0) ) {
					$offset_x_css = '-webkit-transform: translate('.esc_attr($value['offcet_x']).'%, '.esc_attr($value['offcet_y']).'%); -moz-transform: translate('.esc_attr($value['offcet_x']).'%, '.esc_attr($value['offcet_y']).'%); -o-transform: translate('.esc_attr($value['offcet_x']).'%, '.esc_attr($value['offcet_y']).'%); transform: translate('.esc_attr($value['offcet_x']).'%, '.esc_attr($value['offcet_y']).'%);';
				}
				$image = wp_get_attachment_image_src( $value['images_list_item'] , 'full' , false);
				$title = get_the_title($value['images_list_item']);
				echo '
					<div class="image-layer wow '.$anim_class.'" '.$anim_delay.' style="'.$offset_x_css.' '.$offset_y_css.' '.$nth_child.'">
						<img class="'.$class.'" src="'.esc_url($image[0]).'"  alt="'. esc_attr( $title ) . '"/>
					</div>';
		} 
	}
	?>
    </div>
     <div class="clearfix"></div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('image_layers', 'teba_image_layers_func');}