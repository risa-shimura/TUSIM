<div class="img-perspective2" style="background-image: url('<?php echo esc_url($attachment_image[0]); ?>');"></div>
<div class="perspective_overlay"></div>
<div class="perspective-caption">
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
		if($title_box) echo '<h6 class="perspective-title">'.esc_html($title_box).'</h6>'; 
		if($content_box)echo '<div class="content">'.$content_box.'</div>';
		if($href)echo '<a class="button btn-txt btn-txt-arrow light" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link_box) .'</span></a>'; 
	?>
</div>