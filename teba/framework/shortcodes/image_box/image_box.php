<?php
function teba_image_box($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'teba_template' => 'image-box-style1',
		'image' => '',
		'icon' => 'fontawesome',
		'animation' => '',
		'hover_animation' => '',
		'animation_delay' => '200',
        'title_box' => '',
		'sup_title_box' => '',
		'content_box' => '',
		'txt_link_box' => 'Read More',
		'link_box' => ' ',
		'box_bg_color' => '',
        'el_class' => ''
	), $atts));	
	$template_class = $teba_template ;
	$icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
	$class = array();
	$class[] = 'image-box';
	$class[] = $box_bg_color;
	$class[] = $el_class;
    $class[] = $template_class;
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	//link 
	$link_button = null;
	if ($link_box !== '') { $link_button = vc_build_link($link_box); }
	if ( !empty( $link_button['url'] ) ) {
		$href = $link_button['url'];
	} else{ $href = ''; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
    /* attributes SVG */
	  $attributes = $svg = array();
	  if( !empty( $animation ) ) {
		  $attributes['data-animate-icon'] = true;	
		  if ( !empty( $animation_delay ) ) {
			  $svg['delay'] = $animation_delay;
		  }
		  if( 'yes' === $hover_animation ) {
			  $svg['resetOnHover'] = true;
		  }
	  }
	  if ( !empty( $svg ) ) {
		  $attributes['data-plugin-options'] = wp_json_encode( $svg );
	}
    ob_start(); ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php printf( html_attributes( $attributes ) ); ?>>
       <?php include $template_class.'.php'; ?>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('image_box', 'teba_image_box'); }