<?php
function teba_process_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'number_step' => '',
		'title' => '',
		'link' => '',
		'txt_link' => 'Read More',
		'teba_template' => 'process-box-style1',
		'icon_color' => '',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$template_class = $teba_template;
    $class = array();
	$class[] = 'process-box';
	$class[] = $icon_color;
	$class[] = $el_class;
	$class[] = $template_class;
	//link 
	$link_button = null;
    if ($link !== '') { $link_button = vc_build_link($link); }
	if ( !empty( $link_button['url'] ) ) {
        $href = $link_button['url'];
    } else{ $href = ''; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
    ob_start(); ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		  <div class="process-wrap">
		       <?php if($number_step) echo '<div class="number-step"><h3>'.esc_html($number_step).'</h3></div>'; ?>
			   <?php if($title) echo '<h6>'.esc_html($title).'</h6>'; ?>
			   <?php if($content)echo '<div class="content">'.$content.'</div>';
	              if( $href !== '' && $teba_template == 'process-box-style1' ||  $href !== '' && $teba_template == 'process-box-style3') {
					echo '<a class="button btn-txt btn-txt-arrow dark hr_dark" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link) .'</span></a>';
				   }
                  if( $href !== '' && $teba_template == 'process-box-style2' ) {
					echo '<a class="button btn-txt btn-txt-underlined dark" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link) .'</span></a>';					
				  }
			 ?>
          </div>
		</div>
        <div class="clearfix"></div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('process_box', 'teba_process_box_func');}