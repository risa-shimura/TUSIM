<?php
function teba_flip_box_func($atts, $content = null ) {
    extract(shortcode_atts(array(
		'front_side_image' => '',
		'bg_overlay' => 'bg_overlay_dark',
		'data_opacity_bg_overlay' => '0',
		'title' => '',
		'sup_title_box' => '',
		'icon' => 'fontawesome',
		'back_side_image' => '',
		'back_bg_overlay' => 'bg_overlay_dark',
		'back_data_opacity_bg_overlay' => '0',
		'back_title' => '',
		'back_sup_title_box' => '',
		'txt_link' => 'Read More',
		'link' => '',
		'flip_direction' => 'horizontal_to_right',
		'horizontal_align' => 'center',
		'vertical_align' => 'center',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $class = array();
	$class[] = 'flip_box';
	$class[] = $el_class;  
	$attachment_image = wp_get_attachment_image_src($front_side_image, 'full', false); 
	$back_attachment_image = wp_get_attachment_image_src($back_side_image, 'full', false); 
    ob_start(); ?>
		
<div class="image-flip-box" data-flip-direction="<?php echo esc_attr($flip_direction); ?>" data-horizontal-align="<?php echo esc_attr($horizontal_align); ?>" data-vertical-align="<?php echo esc_attr($vertical_align); ?>">
   
    <div class="image-flip-box__front-side <?php echo esc_attr($bg_overlay); ?>" data-is-bg-overlay="true" data-opacity-bg-overlay="<?php echo esc_attr($data_opacity_bg_overlay); ?>" style="background-image:url(<?php echo esc_url($attachment_image[0]); ?>)">
		<div class="image-flip-box__content">
             <?php if ($icon && !empty($iconClass) ) { echo '<div class="icon-wrap"><i class="'.esc_attr($iconClass).'"></i></div>';} ?>
             <?php if($title) echo '<h6>'.esc_html($title).'</h6>'; ?>
             <?php if($sup_title_box) echo '<span class="sup_title">'.esc_html($sup_title_box).'</span>'; ?>
       </div>
    </div>
    
    <div class="image-flip-box__back-side <?php echo esc_attr($back_bg_overlay); ?>" data-is-bg-overlay="true" data-opacity-bg-overlay="<?php echo esc_attr($back_data_opacity_bg_overlay); ?>" style="background-image:url(<?php echo esc_url($back_attachment_image[0]); ?>);">
		<div class="image-flip-box__content">
             <?php if($back_sup_title_box) echo '<span class="sup_title">'.esc_html($back_sup_title_box).'</span>'; ?>
             <?php if($back_title) echo '<h6>'.esc_html($back_title).'</h6>'; ?>
	         <?php if($content)echo '<div class="content">'.$content.'</div>'; ?>
             <?php if($link) echo '<a class="link-btn" href="'. esc_url($link). '">'. esc_html($txt_link) .'</a>';  ?>
        </div>
    </div>
    
 </div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('flip_box', 'teba_flip_box_func');}