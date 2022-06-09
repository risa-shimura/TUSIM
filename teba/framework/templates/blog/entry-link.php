<?php
$media_output = '';
$link = get_post_meta(get_the_ID(), 'tb_post_link', true);
?>
<figure>
	<?php echo get_the_post_thumbnail(get_the_ID(), 'teba-medium');
	if($link) { ?>
		<a class="mo-link" href="<?php echo esc_url($link); ?>"><?php echo esc_html($link); ?></a>
	<?php } ?>
</figure>