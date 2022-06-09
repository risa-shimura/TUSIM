<?php
$media_output = '';
$audio_source_from = get_post_meta(get_the_ID(), 'tb_audio_type', true);
$audio_type = get_post_meta(get_the_ID(), 'tb_post_audio_type', true);
$audio_url = get_post_meta(get_the_ID(), 'tb_post_audio_url', true);
if (has_post_thumbnail()) {
		$media_output = get_the_post_thumbnail(get_the_ID(), 'teba-medium');
} ?>
<figure>
	<?php echo get_the_post_thumbnail(get_the_ID(), 'teba-medium'); ?>
	<div class="audio-post">
		<?php if($audio_source_from == 'soundcloud') { 
			echo '<div class="embed-responsive embed-responsive-16by9">'. get_post_meta(get_the_ID(), 'tb_post_audio_iframe', true). '</div>';
		 } else {
			echo do_shortcode('[audio '.esc_html($audio_type).'="'.esc_url($audio_url).'"][/audio]');
		 } ?>
	</div>
</figure>