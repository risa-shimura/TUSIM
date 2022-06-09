<?php 
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	if($attachment_image[0]) { echo '
	<div class="thumb-service">
		<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr($title_box).'"/>
	</div>';
} ?>
<div class="title-wrap">
  <div class="caption">
  <?php 
    if( $icon === 'animated' ) {
		$anim_icon = isset($atts[$icon_name]) ? esc_attr( $atts[$icon_name] ) : 'animated-arrows_anticlockwise';
		$svg  = str_replace( 'animated-', '', $anim_icon );		
		$svg_src = TEBA_URI_PATH . '/assets/fonts/svg/' . $svg . '.svg';
	}
		if ($icon && !empty($iconClass) ) {		
		if( 'animated' === $icon ) {
				$filetype = wp_check_filetype( $svg_src );
				$request  = wp_remote_get( $svg_src );
				$response = wp_remote_retrieve_body( $request );
				$svg_icon = $response;
				echo '<div class="icon-wrap iconbox-icon-container">'.($svg_icon).'</div>';
		}
		else {
			echo '<div class="icon-wrap"><i class="'.esc_attr($iconClass).'"></i></div>';
		}
	}
	if($sup_title_box) echo '<p class="sup-title">'.esc_html($sup_title_box).'</p>';
	if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
	if($content_box)echo '<div class="content">'.$content_box.'</div>';
	if($href)echo '<a class="button btn-txt btn-txt-arrow light" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link_box) .'</span></a>'; 
  ?>
  </div>
</div>