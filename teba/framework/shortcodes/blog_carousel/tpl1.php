<?php global $teba_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-carousel-post">
	<?php
		$media_output = '';
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
		 echo '<div class="format-post">'.$media_output.'</div>' ?>
   </div>
</article>