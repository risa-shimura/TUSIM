<?php
function teba_countdown_func($params, $content = null) {
    extract(shortcode_atts(array(
	   'style' => 'style1',
       'date_count_down' => '2019/10/10',
	   'position' => 'text-center',
	   'animation_css' => '',
	   'animation_delay' => '0.1s',
	   'el_class' => '',
    ), $params));
	wp_enqueue_script('teba-countdown', TEBA_URI_PATH . '/assets/js/countdown.min.js');
	$class = array();
	$class[] = $style;
	$class[] = $el_class;
    ob_start(); ?>
    <div class="mo-countdown-clock countdown-wraper clearfix <?php echo esc_attr( $position); ?> <?php echo esc_attr(implode(' ', $class)); ?> <?php echo esc_attr( $animation_css); ?>" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
	  <div class="getting-started" data-count-down="<?php echo esc_js($date_count_down);?>"></div>
    </div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('countdown', 'teba_countdown_func'); }