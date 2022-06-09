<?php
global $teba_options;
$media_output = '';
$link = get_post_meta(get_the_ID(), 'tb_post_link', true); ?>
 <div class="single-header img_overlay">
    <?php $image_link = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
    <div class="blog-hero" style="background-image: url(<?php echo esc_url($image_link); ?>);" ></div>
	<div class="container wrapper">
		<div class="title-wrap">
	    	<?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('cat', $teba_options['post-meta-single'])) {  ?>
            	<p class="cat-name"><?php echo the_terms( get_the_ID(), 'category' ); ?></p>
			<?php } ?>
			<h3 class="post-title"><?php the_title(); ?></h3> 
			<ul class="meta-post">
				<?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('author', $teba_options['post-meta-single'])) {  ?>
			    	<li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'teba').get_the_author(); ?></li>
				<?php } ?>
                <?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('date', $teba_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
				<?php } ?>
				<?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('comment', $teba_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); echo esc_html__(' Comment', 'teba'); ?></a></li>  
				<?php } ?>
				<?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('view', $teba_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-bookmark-o"></i> <?php echo teba_get_post_views(get_the_ID()) . esc_html__(' Views', 'teba'); ?></li>
				<?php } ?>
			 </ul> 
	   </div>
	   <div class="container wrapper">
	  <?php if ( $link != ''){ $media_output = '<a class="mo-link" href="'.esc_url($link).'">'.esc_html($link).'</a>'; }
		echo '<div>'.$media_output.'</div>'; ?>
	</div>
	</div>
</div>