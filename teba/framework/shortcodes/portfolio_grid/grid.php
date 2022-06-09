<?php
$html.= '
<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).'">
  <div class="masonry-img work-img" style="'.esc_attr($portfolio_grid).'">
   <div class="portfolio-effect1 '.$image_size.'">
	 
	    <div class="img-inner">
		  <div class="img-portfolio" style="background-image: url('.$src_attachment.')">
			<a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'"></a>	
		  </div>
		</div>
		
		<div class="caption-inner">
			<a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'"><h5>'.esc_html($title).'</h5></a>	
			<p class="term">'.esc_attr($term_string).'</p>
		</div>
	</div>
  </div>
</div>'; ?>