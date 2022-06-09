<?php 
global $teba_options; 
$media_output = '';
$attachment_ids = array();
$attachment_ids = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
$portfolio_gallery = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
	if(!empty($attachment_ids)) {
		foreach($attachment_ids as $attachment_id ) {
			$image_attributes = wp_get_attachment_image_src($attachment_id, 'full');
			if($image_attributes[0]){
				$media_output .= '<div class="item">
								  <figure class="img-single">
									<img src="'.esc_url($image_attributes[0]).'" alt="'.the_title_attribute('echo=0').'" height="260"/>
								   </figure>
								</div>';
			}
		}
	}
echo '<div class="carousel-post">'.$media_output.'</div>'; ?>