<?php
$html.='
<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).'">
	<div class="masonry-img portfolio-effect2" style="'.esc_attr($portfolio_grid).'">
	   <div class="img-inner">
	       '.$attachment .'
		    <a href="'.esc_url($full).'"> <div class="icon-arrow"></div></a>
		    <div class="overlay"></div>
		</div>
		<div class="content-block">
		    <a class="portfolio-link '.esc_attr($th_is_lightbox).'" href="'.esc_url($full).'"><h4>'.esc_html($title).'</h4></a>
			<h6 class="read-more">'.esc_attr($term_string).'</h6>
		</div>
	</div>
</div>';