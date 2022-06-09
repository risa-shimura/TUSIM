<?php
$media_output = '';
$video_url = get_post_meta(get_the_ID(), 'tb_post_video_url', true);
$image_attributes =  get_the_post_thumbnail(get_the_ID(), "teba-medium");

if (has_post_thumbnail()) {
	$media_output .= '
    <figure class="img-single">
	  '. $image_attributes .'
	  <figcaption>
		<a class="video-button lightbox-video" href="'.esc_url($video_url).'"><i class="video-icon"></i></a>
	  </figcaption>
	</figure>';
}
else {
	$media_output .= ' 
	<div class="embed-responsive embed-responsive-16by9">
		<iframe id="vimeo-video" src="'.esc_url($video_url).'"></iframe>
	</div>';
}
echo '<div>'.$media_output.'</div>';