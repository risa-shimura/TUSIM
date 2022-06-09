<?php
function teba_video_button_func($atts) {
    extract(shortcode_atts(array(
        'video_link' => '',
		'color' => 'light',
		'position' => 'dir_center',
        'el_class' => ''
    ), $atts));
    $class = array();
	$class[] = 'mo-video-fancybox';
	$class[] = $el_class;
    ob_start(); ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php 
			    if($video_link) echo '<a class="lightbox-video video-button '.esc_attr($color).' '.esc_attr($position).'" href="'.esc_url($video_link).'"><i class="fa fa-play"></i></a>';
			?>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('video_button', 'teba_video_button_func');}