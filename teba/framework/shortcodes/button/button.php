<?php
function teba_button_func($atts) {
    extract(shortcode_atts(array(
		'style'           => 'btn-solid',
		'btn_txt_style'   => 'btn-txt-circle',
	    'text'            => 'learn more',
		'link'            => '#',
        'color'           => 'light',
		'hr_color'        => 'hr_light',
	    'bg_color'        => 'bg_primary',
		'hr_bg_color'     => 'bg_hr_primary',
		'outline_color'   => 'outline_grey',
		'outline_hr_color'=> 'outline_hr_grey',
		'radius'          => 'radius5',
		'hr_style'        => 'linear',
        'size'            => 'medium',
        'position'        => 'text-center',
		'icon'            => 'fontawesome',
        'el_class'        => ''
    ), $atts));
    $icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $class = array();
    $class[] = $el_class;
	//link 
	$link_button = null;
    if ($link !== '') { $link_button = vc_build_link($link); }
    if ( !empty( $link_button['url'] ) ) {
        $href = $link_button['url'];
    } else{ $href = '#'; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
    ob_start(); ?>
     <div class="<?php echo esc_attr($position); ?> <?php echo esc_attr(implode(' ', $class));?>">
       <a class="button <?php echo esc_attr($style.' '. $btn_txt_style .' '. $color .' '.$hr_color .' '.$bg_color .' '.$hr_bg_color .' '.$outline_color.' '.$outline_hr_color.' '. $size.' '.$radius .' '.$hr_style);?>"  href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>"><span class="button-text"><?php echo esc_html($text); ?></span>
          <?php if(isset($iconClass) && !empty($iconClass)){ echo '<i class="'.esc_attr($iconClass).'"></i>'; } ?>
          <?php if( $style == 'btn-txt' || $style == 'btn-txt' ){ echo '<span class="button-arrow"><span class="button-icon"><i class="ion-ios-arrow-right"></i></span></span>'; } ?>
        </a> 
	 </div>
    <?php return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('button', 'teba_button_func'); }