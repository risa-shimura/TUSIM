<?php
global $teba_options;
$video_url = get_post_meta(get_the_ID(), 'tb_post_video_url', true); 
$tb_post_layout = isset($teba_options['tb_post_layout']) ? $teba_options['tb_post_layout'] : '1col'; ?>
<div class="single-header basic">
<?php if ( $tb_post_layout == '1col' ) { ?><div class="container wrapper"> <?php } ?>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content mo-blog">
		<div class="title-wrap">
		    <?php if ( $video_url != '') {  ?>
			   <div class="mo-video-fancybox"><a class="lightbox-video video-button gradient" href="<?php echo esc_url($video_url) ?>"><i class="video-icon"></i></a></div>
	        <?php } ?>
			<h3 class="post-title"><?php the_title(); ?></h3> 
			 <ul class="meta-post">
			    <?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('cat', $teba_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-folder-open-o"></i><?php the_terms( get_the_ID(), 'category' ); ?></li>
				<?php } ?>
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
   </div>
    <?php if ( $tb_post_layout == '1col' ) { ?></div><?php } ?>
</div>