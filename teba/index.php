<?php get_header(); 
global $teba_options;
$tb_blog_layout = isset($teba_options['tb_blog_layout']) ? $teba_options['tb_blog_layout'] : '2cr';
$tb_show_page_title = isset($teba_options['tb_page_show_page_title']) ? $teba_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($teba_options['tb_page_show_page_breadcrumb']) ? $teba_options['tb_page_show_page_breadcrumb'] : 1;
$tb_archive_title_bar = (int) isset($teba_options['tb_archive_title_bar'])? $teba_options['tb_archive_title_bar']: 0;
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';
?>
<div class="main-content">
    <?php if ( $tb_archive_title_bar ){ 
	  teba_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); 
   } else { ?>
	 <div class="no-pagetitle">
	  	 <div class="mo-blog-archive container">
	  	   <h2 class="mo-page_title color-main"><?php echo teba_page_title(); ?></h2> 
        </div>
	  </div>
   <?php } ?>
	 <div class="single-content">
	   <div class="mo-blog-archive container">
             <div class="row">
				<?php if ( is_active_sidebar('teba-main-sidebar') || is_active_sidebar('teba-left-sidebar') || is_active_sidebar('teba-right-sidebar') ) {
				  if ( $tb_blog_layout == '2cl' || $tb_blog_layout == '2cr' ){
					  $cl_content = 'with-sidebar';
				   }
				 } ?>
				
               <!-- Start Left Sidebar -->
				<?php if ( $tb_blog_layout == '2cl' ) { ?>
				   <?php if (is_active_sidebar('teba-left-sidebar')) { ?><div class="sidebar sidebar-left"><?php dynamic_sidebar('teba-left-sidebar'); ?></div>
                   <?php }elseif(is_active_sidebar('teba-main-sidebar')){?><div class="sidebar sidebar-left"><?php dynamic_sidebar('teba-main-sidebar');?></div><?php }?>
				<?php } ?>
				<!-- End Left Sidebar -->
               
                 <!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
				   <div class="posts grid-posts">
					<?php
					if( have_posts() ) {
						while ( have_posts() ) : the_post();?>
						 <div class="grid-post col-xs-12 col-sm-12">  
						      <div <?php post_class(); ?>> 
						      <div class="post-content"> 
							       <div class="content-post">
									    <ul class="meta-post">
											<li class="date"><?php echo get_the_date(); ?></li>
											<li><div class="author"><?php the_author(); ?></div></li>
										</ul>
 										<h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p>
										<a class="button btn-txt btn-txt-arrow dark" href="<?php the_permalink(); ?>" ><span class="button-text"><?php echo esc_html__( 'Read More', 'teba' ); ?></span></a>
									 </div>
								</div>
							  </div>
							</div>
						<?php endwhile; 
					    } else {
							get_template_part( 'framework/templates/entry', 'none');
						} ?>
		                </div><!-- posts -->
		                 <div class="clearfix"></div>
					     <?php teba_paging_nav(); ?>
				   </div>
				<!-- End Content -->
				
             <!-- Start Right Sidebar -->
			 <?php if ( $tb_blog_layout == '2cr' ) { ?>
			   <?php if (is_active_sidebar('teba-right-sidebar')) { ?><div class="sidebar sidebar-right"><?php dynamic_sidebar('teba-right-sidebar'); ?></div>
			   <?php }elseif(is_active_sidebar('teba-main-sidebar')){?><div class="sidebar sidebar-right"><?php dynamic_sidebar('teba-main-sidebar');?></div><?php }?>
			 <?php } ?>
			 <!-- End Right Sidebar -->
          </div> <!-- End row  -->
       </div> <!-- End container -->
   </div> <!-- End single-content -->
</div> <!-- End main-content -->
<?php get_footer(); ?>