<?php get_header(); 
global $teba_options;
$tb_post_layout = isset($teba_options['tb_post_layout']) ? $teba_options['tb_post_layout'] : '1col';
$tb_post_header_layout = isset($teba_options['tb_post_header_layout']) ? $teba_options['tb_post_header_layout'] : 'basic';
$tb_show_page_title = isset($teba_options['tb_page_show_page_title']) ? $teba_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($teba_options['tb_post_show_breadcrumb']) ? $teba_options['tb_post_show_breadcrumb'] : 1;
$tb_post_show_nav = (int) isset($teba_options['tb_post_show_nav'])? $teba_options['tb_post_show_nav']: 1;
$tb_post_show_author = (int) isset($teba_options['tb_post_show_author']) ? $teba_options['tb_post_show_author'] : 1;
$tb_related_post = (int) isset($teba_options['tb_related_post']) ? $teba_options['tb_related_post'] : 1;
$tb_post_show_comment = (int) isset($teba_options['tb_post_show_comment']) ? $teba_options['tb_post_show_comment']: 1; 
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';
?>
<div class="main-content">
	<div class="mo-media <?php echo get_post_format(); ?>">
	 <?php while ( have_posts() ) : the_post(); ?>
    
	    <?php if ( $tb_post_header_layout == 'img_overlay' ) { get_template_part( 'framework/templates/blog_single/entry', get_post_format());  } ?>
	    <?php if ( $tb_post_layout == '1col' ) { 
	       if ( $tb_post_header_layout == 'basic' ) { get_template_part( 'framework/templates/blog_single_basic/entry', get_post_format());  } 
        } ?>
	    <div class="container mo-blog-article">
		 <?php if ( is_active_sidebar('teba-main-sidebar') || is_active_sidebar('teba-left-sidebar') || is_active_sidebar('teba-right-sidebar') ) {
		  if ( $tb_post_layout == '2cl' || $tb_post_layout == '2cr' ){
			  $cl_content = 'with-sidebar';
		   }
		 } ?>
		<!-- Start Left Sidebar -->
		<?php if ( $tb_post_layout == '2cl' ) { ?>
	       <?php if ( $tb_post_header_layout == 'basic' ) {?><div class="basic-sidebar"><?php }?>
		   <?php if (is_active_sidebar('teba-left-sidebar')) { ?><div class="sidebar sidebar-left"><?php dynamic_sidebar('teba-left-sidebar'); ?></div>
		   <?php }elseif(is_active_sidebar('teba-main-sidebar')){?><div class="sidebar sidebar-left"><?php dynamic_sidebar('teba-main-sidebar');?></div><?php }?>
		   <?php if ( $tb_post_header_layout == 'basic' ) {?></div><?php }?>
		<?php } ?>
		<!-- End Left Sidebar -->
				
		<!-- Start Content -->
		<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
		 <?php if ( $tb_post_layout == '2cl' || $tb_post_layout == '2cr'  ) { ?> 
		   <?php if ( $tb_post_header_layout == 'basic' ) { get_template_part( 'framework/templates/blog_single_basic/entry', get_post_format()); } ?>
		  <?php } ?>
			  <article <?php post_class(); ?>>
				<div class="mo-post-item">
				<div class="single-post entry-content">
				   <div class="sticky-buttons">
				    <?php if (function_exists('teba_post_share_buttons') && isset($teba_options['post_share'])) { 
	                  if (is_array($teba_options['post_share'])) {
						 if ( in_array('sticky', $teba_options['post_share'], true)) {
							 ?> <div class="share-title"><i class="fa fa-share-alt"></i></div> <?php
							echo teba_post_share_buttons();
						 }
					   }
                    } ?>
				    </div>
					<?php the_content(); 
					 wp_link_pages(array(
						'before'		   => '<div class="page-links">',
						'after'		       => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
					)); ?>
					<div class="clearfix"></div> 
					
					<div class="row">
					   <div class="col-md-6 col-xs-12">
                         <?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('tag', $teba_options['post-meta-single'])) {  ?>
							<div class="tags"> <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?></div> 
						 <?php } ?>
					   </div>
					   <div class="col-md-6 col-xs-12">
                         <?php if (isset($teba_options['post-meta-single']) && is_array($teba_options['post-meta-single']) && in_array('like', $teba_options['post-meta-single'])) {  ?>
							<div class="blog_like"><?php if( function_exists('teba_like') ) teba_like(); ?> </div>
					     <?php } ?>
                    
					       <?php if (function_exists('teba_post_share_buttons') && isset($teba_options['post_share'])) { 
							  if (is_array($teba_options['post_share'])) {
								 if ( in_array('basic', $teba_options['post_share'], true)) {
									echo teba_post_share_buttons();
								 }
							   }
						   } ?>
					   </div>
					</div>
			      </div>
			    </div>
			  </article>

			  <div class="clearfix"></div>
			  <?php if ( function_exists('teba_post_author_bio') && $tb_post_show_author ) { teba_post_author_bio(); } ?>
			  
			  <?php if ( $tb_post_show_nav ){ ?>
			   <div class="clearfix"></div>
			   <div class="single-directions"><?php teba_post_directions();?></div> 
	         <?php } ?>
	         
			  <div class="clearfix"></div>
			  <?php if ( $tb_related_post ) { teba_related_post(); }  ?>
			  
			 <?php if ( (comments_open() && $tb_post_show_comment) || (get_comments_number() && $tb_post_show_comment) ) { ?>
			     <div class="clearfix"></div>
				 <div class="single-comments">
					<?php comments_template(); ?>
				 </div>
			 <?php }?>
		</div><!-- End content mo-blog -->
        
		<!-- Start Right Sidebar -->
		  <?php if ( $tb_post_layout == '2cr' ) { ?>
	        <?php if ( $tb_post_header_layout == 'basic' ) {?><div class="basic-sidebar"><?php }?>
            <?php if (is_active_sidebar('teba-right-sidebar')) { ?><div class="sidebar sidebar-right"><?php dynamic_sidebar('teba-right-sidebar'); ?></div>
		    <?php } elseif(is_active_sidebar('teba-main-sidebar')){?><div class="sidebar sidebar-right"><?php dynamic_sidebar('teba-main-sidebar');?></div><?php } ?>
		    <?php if ( $tb_post_header_layout == 'basic' ) {?></div><?php }?>
		 <?php } ?>
	    <!-- End Right Sidebar -->
	 <?php endwhile; ?>
			 
    </div><!-- End container -->
  </div><!-- End mo-media -->
</div><!-- End main-content -->
<?php get_footer(); ?>