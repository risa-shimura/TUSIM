<?php
$html.= '
<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).'">
  <div class="masonry-img work-img" style="'.esc_attr($portfolio_grid).'">
    <div class="portfolio-effect4 '.$image_size.'">
	   <a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'">
			<div class="img-inner"><div class="img-perspective" style="background-image: url('.$src_attachment.')"></div></div>
			<div class="overlay-inner"></div>
			<div class="perspective-caption">
				<h5>'.esc_html($title).'</h5>
				<p class="term">'.esc_attr($term_string).'</p>
			</div>
	   </a>
	</div>
  </div>
</div>'; ?>