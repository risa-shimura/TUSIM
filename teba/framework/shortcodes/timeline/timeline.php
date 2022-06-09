<?php
function teba_timeline_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'icon' => 'fontawesome',
		'number_step' => '',
		'title' => '',
	    'animation_css' => '',
		'animation_delay' => '0.1s',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
    $icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $class = array();
	$class[] = 'timeline-box';
	$class[] = $el_class;
    ob_start();
    ?> 
   <div class="timeline <?php echo esc_attr($animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
    <div class="timeline-details">
        <?php if($content)echo '<div class="timeline-year">'.esc_html($number_step).'</div>'; ?>
        <div class="timeline-text-content">
            <div class="timeline-title">
                 <?php if($icon && !empty($iconClass)) { echo '<i class="'.esc_attr($iconClass).'"></i>'; } ?>	
                 <?php if($title) echo '<h3>'.esc_html($title).'</h3>';  ?>
            </div>
             <?php if($content) echo '<div class="timeline-text">'.$content.'</div>'; ?>
        </div>
    </div>
 </div>   
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('timeline', 'teba_timeline_func');}