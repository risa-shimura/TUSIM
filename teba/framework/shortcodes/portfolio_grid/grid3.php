<?php $html.= '
<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).'">
  <div class="masonry-img work-img" style="'.esc_attr($portfolio_grid).'">
   <div class="portfolio-effect3">
	 <div class="wrapper">
	   '.$attachment .'
	   <div class="details">
		   <h5><a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'">'.esc_html($title).'</a></h5>
		   <p>'.esc_attr($term_string).'</p>
		</div> <!-- details --> 
	 </div> <!-- wrapper --> 
	</div>
  </div>
</div>';?>