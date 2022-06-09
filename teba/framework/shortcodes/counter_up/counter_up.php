<?php
function teba_counter_up_func($atts) {
    extract(shortcode_atts(array(
		'style' => 'style1',
		'icon' => 'fontawesome',
        'number' => '750',
		'symbol' => '',
        'title' => '',
		'content_box' => '',
        'el_class' => ''
    ), $atts));
	$icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $class = array();
    $class[] = 'counter-number';
    $class[] = $style;
    $class[] = $el_class;
    ob_start(); ?>
   <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
     <?php 
	     if($icon && !empty($iconClass) ) { echo '<i class="'.esc_attr($iconClass).'"></i>'; } 
	     if($number) echo '<h3 class="counter">'.($number).'</h3>';
	     if($symbol) echo '<span class="symbol">'.($symbol).'</span>';
	     if($title) echo '<h6>'.esc_html($title).'</h6>';
	     if($content_box) echo '<div class="content">'.($content_box).'</div>';
     ?>
   </div>
    <?php return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('counter_up', 'teba_counter_up_func'); }