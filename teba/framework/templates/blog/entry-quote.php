<?php $quote_content = get_post_meta(get_the_ID(), 'tb_post_quote', true); ?>
<figure>
   <?php echo get_the_post_thumbnail(get_the_ID(), 'teba-medium'); ?>
	<div class="blockquote-post">
	   <blockquote><?php echo esc_html($quote_content); ?></blockquote>
	</div>
</figure>