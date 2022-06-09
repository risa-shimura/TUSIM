 <?php if($attachment_image[0]) {
	echo '<div class="thumb-service"><div class="thumb" style="background-image: url('.esc_url($attachment_image[0]).')"></div></div>';  
} ?>	
<div class="title-wrap">
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
				echo '<div class="icon-wrap iconbox-icon-container">'.($svg_icon).'</div><div class="icon-space"></div>';
		}
		else {
			echo '<div class="icon-wrap"><i class="'.esc_attr($iconClass).'"></i></div><div class="icon-space"></div>';
		}
	}
	if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
	if($content_box)echo '<div class="content">'.$content_box.'</div>';
	if($href)echo '<a class="button btn-txt btn-txt-arrow dark" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link_box) .'</span></a>'; 
  ?>
 </div>