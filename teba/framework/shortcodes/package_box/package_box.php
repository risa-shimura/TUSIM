<?php
function teba_package_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
	    "style" => 'style1',
		'image' => ' ',
		"title" => '',
		"price" => '$99',
		"period" => '/ month',
		"content_package" => '',
		"button_label" => 'Order Now',
		"button_url" => '',
		"pricing_best" => '',
		"pricing_best_label" => '',
		"el_class" => '',
    ), $atts));
	$content_package = wpb_js_remove_wpautop($content_package, true);
    $class = array();
	$class[] = 'pricing-item';
	$class[] = $style;
	$class[] = $el_class;
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	
	//link 
	$link_button = null;
	if ($button_url !== '') { $link_button = vc_build_link($button_url); }
	if ( !empty( $link_button['url'] ) ) {
		$href = $link_button['url'];
	} else{ $href = ''; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];

    ob_start();
    ?> 
	<div class="<?php echo esc_attr(implode(' ', $class)); echo esc_html($pricing_best);?>">
		 <?php if($pricing_best_label) echo '<span class="pricing-best-label">'.esc_html($pricing_best_label).'</span>'; ?>
	     <div class="pricing-title">
	     	 <?php if($attachment_image) echo '<div class="content-img"><span class="package-img" style="background-image: url('.$attachment_image[0].')"></span></div> '; ?>
		     <?php if($title) echo '<h3>'.esc_html($title).'</h3>'; ?>
	     </div>
		 <div class="pricing"> 
			 <?php if($price) echo '<span class="pricing-currency">'.esc_html($price).'</span>'; 
			 if($period) echo '<span class="pricing-period">'.esc_html($period).'</span>'; ?>
		 </div>
         <div class="content">
           <?php if($content_package) echo _($content_package); ?>
         </div>
		 <?php if($href !== ''){ echo '<a class="button btn-border primary hr_light bg_hr_primary outline_primary outline_hr_primary radius5 roll" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($button_label) .'</span></a>';} ?>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('Package_box', 'teba_package_box_func');}