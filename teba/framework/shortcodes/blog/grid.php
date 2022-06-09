<?php global $teba_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-mid-post">
	<?php
		$media_output = '';
		$format = get_post_format() ? get_post_format() : 'standard';
		switch ($format) {
				
			case 'gallery':
				$media_output = '';
				$attachment_ids = array();
				$attachment_ids = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
				if(!empty($attachment_ids)) {
					$date = time() . '_' . uniqid(true);
					$media_output .= '<div id="carousel-generic'.esc_attr($date).'" class="carousel-post dots-nav-primary" >';
					foreach($attachment_ids as $attachment_id ) {
						$image_attributes = wp_get_attachment_image_src($attachment_id, 'teba-small');
						if($image_attributes[0]){
							$media_output .= '<div class="item">
											  <figure>
												<img src="'.esc_url($image_attributes[0]).'" alt="'.the_title_attribute('echo=0').'" height="260"/>
											   </figure>
											</div>';
						}
					}
					$media_output .= '</div>';
					$media_output .= '
					<div class="content-post">
						<ul class="meta-post">
							<li class="date">'.get_the_date().'</li>
							<li><div class="author">'.get_the_author().'</div></li>
						</ul>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
						<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
					</div>';
				 }
			break;
				
			case 'video':
				$media_output = '';
				$video_url = get_post_meta(get_the_ID(), 'tb_post_video_url', true);
				if (has_post_thumbnail()) {
					$media_output .= '
					<figure>
					  '.get_the_post_thumbnail(get_the_ID(), "teba-small").'
					   <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
					  <figcaption>
						 <a class="video-button lightbox-video" href="'.esc_url($video_url).'"><i class="video-icon"></i></a>
						 <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
					  </figcaption>
					</figure>';	
					$media_output .= '
					<div class="content-post">
						<ul class="meta-post">
							<li class="date">'.get_the_date().'</li>
							<li><div class="author">'.get_the_author().'</div></li>
						</ul>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
						<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
					</div>';
				}
				else {
					$media_output .= ' 
					<div class="embed-responsive embed-responsive-16by9">
						<iframe id="vimeo-video" src="'.esc_url($video_url).'"></iframe>
					</div>';
					$media_output .= '
					<div class="content-post">
						<ul class="meta-post">
							<li class="date">'.get_the_date().'</li>
							<li><div class="author">'.get_the_author().'</div></li>
						</ul>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
						<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
					</div>';	
				}
			break;
				
			case 'quote':
				$media_output = '';
				$quote_content = get_post_meta(get_the_ID(), 'tb_post_quote', true);
				if($quote_content) {
					$media_output .= '
					<figure>
					    <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "teba-small").'</a>
					    <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
						<div class="blockquote-post">
						   <blockquote>'.esc_html($quote_content).'</blockquote>
						</div>
					</figure>';
					$media_output .= '
					<div class="content-post">
						<ul class="meta-post">
							<li class="date">'.get_the_date().'</li>
							<li><div class="author">'.get_the_author().'</div></li>
						</ul>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
						<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
					</div>';
				}
			break;
				
			case 'audio':
				$media_output = '';
				$audio_source_from = get_post_meta(get_the_ID(), 'tb_audio_type', true);
				$audio_type = get_post_meta(get_the_ID(), 'tb_post_audio_type', true);
				$audio_url = get_post_meta(get_the_ID(), 'tb_post_audio_url', true);
				
				if($audio_source_from == 'soundcloud') {
					if (has_post_thumbnail()) {
					$media_output = '
						<figure>
						   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "teba-small").'</a>
						   <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
						   <div class="audio-post">
							  <div class="embed-responsive embed-responsive-16by9">'. get_post_meta(get_the_ID(), 'tb_post_audio_iframe', true).'</div> 
						   </div>
						</figure>';			
					} else{
						$media_output .= '<div class="empty_thumbnail"></div>';
					}
					$media_output .= '
					<div class="content-post">
						<ul class="meta-post">
							<li class="date">'.get_the_date().'</li>
							<li><div class="author">'.get_the_author().'</div></li>
						</ul>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
						<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
					</div>';	
				} else {
					$media_output .= '<figure><a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "teba-small").'</a> <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>';
					if($audio_url) {
					   $media_output .= '<div class="audio-post">'. do_shortcode('[audio '.esc_html($audio_type).'="'.esc_url($audio_url).'"][/audio]') .'</div>';
					}
					$media_output .= '</figure>';
					$media_output .= '
					<div class="content-post">
						<ul class="meta-post">
							<li class="date">'.get_the_date().'</li>
							<li><div class="author">'.get_the_author().'</div></li>
						</ul>
						<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
						<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
						<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
					</div>';				
				} 
			break;
				
			case 'link':
				$media_output = '';
				$link = get_post_meta(get_the_ID(), 'tb_post_link', true);
				$media_output .= '
				<figure>
				   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "teba-small").'</a>
				   <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>';		
                   if($link) { $media_output .= '<a class="mo-link" href="'.esc_url($link).'">'.esc_html($link).'</a>'; }
				$media_output .= '</figure>';		
				$media_output .= '
				<div class="content-post">
				    <ul class="meta-post">
						<li class="date">'.get_the_date().'</li>
						<li><div class="author">'.get_the_author().'</div></li>
					</ul>
					<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
					<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
					<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
				</div>';						
			break;
				
			default:
				if (has_post_thumbnail()) {
				$media_output = '
					<figure>
					   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "teba-small").'</a>
					   <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
					</figure>';			
				} else{
					$media_output .= '<div class="empty_thumbnail"></div>';
				}
				$media_output .= '
				<div class="content-post">
				    <ul class="meta-post">
						<li class="date">'.get_the_date().'</li>
						<li><div class="author">'.get_the_author().'</div></li>
					</ul>
					<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
					<p>'. teba_custom_excerpt($excerpt_lenght) .'</p>
					<a class="button btn-txt btn-txt-arrow dark" href="'.get_the_permalink().'" ><span class="button-text">'. esc_html($link_text) .'</span></a>
				</div>';					
				break;
		}
		echo '<div class="format-post">'.$media_output.'</div>'?>
   </div>
</article>