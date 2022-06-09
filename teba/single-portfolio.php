<?php get_header(); 
global $teba_options;
$tb_portfolio_layout = isset($teba_options['tb_portfolio_layout']) ? $teba_options['tb_portfolio_layout'] : '2cl';
$tb_show_page_title = isset($teba_options['tb_page_show_page_title']) ? $teba_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($teba_options['tb_post_show_breadcrumb']) ? $teba_options['tb_post_show_breadcrumb'] : 1;
$tb_portfolio_show_nav = (int) isset($teba_options['tb_portfolio_show_nav']) ? $teba_options['tb_portfolio_show_nav'] : 1;
$tb_related_portfolio = (int) isset($teba_options['tb_related_portfolio']) ? $teba_options['tb_related_portfolio'] : 1;
$tb_portfolio_full_thumbnail = (int) isset($teba_options['tb_portfolio_full_thumbnail']) ? $teba_options['tb_portfolio_full_thumbnail'] : 1;
?>
<div class="main-content">
  <div class="mo-portfolio-article <?php echo esc_html($tb_portfolio_layout); ?>">
	 <?php while ( have_posts() ) : the_post(); ?>
		  <?php 
		   $single_portfolio_style = 'image';
		   $portfolio_gallery = array();
		   $portfolio_gallery = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
		   if(!empty($portfolio_gallery) ){ $single_portfolio_style = 'gallery';  }
		
	    	// portfolio-full 
		   if ( $tb_portfolio_layout == 'portfolio-full' ) { ?>
	            <div class="container portfolio-full thumb-content">
	                <h3 class="post-title color-main"><?php the_title(); ?></h3> 
	                <div class="meta-wrap">
					  <ul class="meta-post meta-portfolio">
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('date', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
			           <?php } ?>
                       <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('author', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'teba').get_the_author(); ?></li>
			           <?php } ?>
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('cat', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-folder-open-o"></i><?php the_terms( get_the_ID(), 'project-type' ); ?></li>
					   <?php } ?>
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('view', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-bookmark-o"></i> <?php echo teba_get_post_views(get_the_ID()) . esc_html__(' Views', 'teba'); ?></li>
			           <?php } ?>
					   </ul>  
					</div>
					<?php if($tb_portfolio_full_thumbnail ){  get_template_part( 'framework/templates/portfolio/portfolio-' . $single_portfolio_style . '-single'); }?>
		       </div>
		   <?php } ?>
		   
		   <?php // portfolio parallax
		   if ( $tb_portfolio_layout == 'portfolio-parallax' ) { ?>
		   <div class="single-header img_overlay">
			<?php $image_link = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
			<div class="blog-hero" style="background-image: url(<?php echo esc_url($image_link); ?>);" ></div>
			<div class="container wrapper">
			 <div class="title-wrap">
				<h3 class="post-title"><?php the_title(); ?></h3> 
				<div class="meta-wrap">
					  <ul class="meta-post meta-portfolio">
					  <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('date', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
			           <?php } ?>
                       <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('author', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'teba').get_the_author(); ?></li>
			           <?php } ?>
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('cat', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-folder-open-o"></i><?php the_terms( get_the_ID(), 'project-type' ); ?></li>
					   <?php } ?>
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('view', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-bookmark-o"></i> <?php echo teba_get_post_views(get_the_ID()) . esc_html__(' Views', 'teba'); ?></li>
			           <?php } ?>
					   </ul>  
				</div>
		       </div>
			   <div id="content-anchor" class="scroll-to-content smooth-scroll"><a href="#content-anchor"><?php echo esc_html__('Scroll', 'teba') ?><span></span></a></div>
			</div>
		   </div>
	       <?php } ?>
	    
       <div class="container">
          <div class="portfolio-content">
       
	       <?php // portfolio side
		   if ( $tb_portfolio_layout == 'portfolio-side' ) { ?>
		      <div class="portfolio-side col-md-8 thumb-content">
		       <?php get_template_part( 'framework/templates/portfolio/portfolio-' . $single_portfolio_style . '-single'); ?>
		       </div>
		   <?php } ?>
	      
	      <?php
			      if ( $tb_portfolio_layout == 'portfolio-full' )   { $cl_content = 'content-portfolio-full col-xs-12 col-sm-12'; } 
			  elseif ( $tb_portfolio_layout == 'portfolio-parallax'){ $cl_content = 'content-portfolio-parallax col-xs-12 col-sm-12'; } 
	          elseif ( $tb_portfolio_layout == 'portfolio-side' )   { $cl_content = 'content-portfolio-side col-xs-12 col-md-4'; } 
  	       ?>
		 <!-- Start Content -->
		 <div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
		  <article <?php post_class(); ?>>
			<div class="single-post">
			   <?php if ( $tb_portfolio_layout == 'portfolio-side' ) { ?>
				  <h3 class="post-title"><?php the_title(); ?></h3> 
	                <div class="meta-wrap">
					  <ul class="meta-post meta-portfolio">
					  <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('date', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
			           <?php } ?>
                       <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('author', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'teba').get_the_author(); ?></li>
			           <?php } ?>
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('cat', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-folder-open-o"></i><?php the_terms( get_the_ID(), 'project-type' ); ?></li>
					   <?php } ?>
					   <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('view', $teba_options['tb_portfolio_meta_single'])) {  ?>
						<li><i class="fa fa-bookmark-o"></i> <?php echo teba_get_post_views(get_the_ID()) . esc_html__(' Views', 'teba'); ?></li>
			           <?php } ?>
					   </ul>  
				    </div>
			    <?php } ?>
				 <div class="clearfix"></div> 

				 <?php the_content(); 
					 wp_link_pages(array(
						'before'		   => '<div class="page-links">',
						'after'		       => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
				  )); ?>
	         
		         <div class="clearfix"></div> 
		         <div class="row">
		         	<div class="col-md-8 col-xs-12">
					    <?php if (isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('share', $teba_options['tb_portfolio_meta_single'])) {  ?>
							<div class="portfolio_share"><?php echo teba_post_share_buttons(); ?> </div>
					     <?php } ?>
		         	</div>
		         	<div class="col-md-4 col-xs-12">
					    <?php if (function_exists('teba_like') && isset($teba_options['tb_portfolio_meta_single']) && is_array($teba_options['tb_portfolio_meta_single']) && in_array('like', $teba_options['tb_portfolio_meta_single'])) {  ?>
							<div class="blog_like"><?php echo teba_like(); ?></div>
						<?php } ?>
		         	</div>
		         </div>
			    </div>
		     </article>
		</div><!-- End content mo-blog -->
		
	   </div>	<!-- End portfolio-content -->
	    <div class="clearfix"></div> 
	    
	   <?php if($tb_portfolio_show_nav ){ ?>
		   <div class="clearfix"></div>
		   <div class="portfolio-directions <?php if( $tb_portfolio_layout == '1col' ) { ?> portfolio-full <?php } ?>">
			  <?php echo teba_post_directions(); ?>
		   </div>
	   <?php } ?>  	
	   
	   <div class="clearfix"></div> 
	   <?php if($tb_related_portfolio){ ?>
		    <div class="mo-related-portfolio <?php if( $tb_portfolio_layout == '1col' ) { ?> portfolio-full <?php } ?>">   
			<?php
				$taxterms = wp_get_object_terms( get_the_ID(), 'project-type', array('fields' => 'ids') );
				$args = array(
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'posts_per_page' => 3, // you may edit this number
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'project-type',
						'field' => 'id',
						'terms' => $taxterms
					)
				),
				'post__not_in' => array (get_the_ID()),
				);
				$related_items = new WP_Query( $args );
				// loop over query
				if ($related_items->have_posts()) :
				?>
			    <div class="related-posts"> 
					<h3 class="title"><?php esc_html_e('Related Posts','teba'); ?></h3>
					<div class="related-post-inner row">
					<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
					<?php $title=get_the_title();
						  $permalink=get_the_permalink(); global $post; ?>
					  <div class="col-md-4 col-sm-4 col-xs-12">
						<div class="related-post">
							<figure>								   
							   <?php if ( has_post_thumbnail() ) the_post_thumbnail('teba-small'); ?>
							 </figure>
							<div class="content-post">
								<h6><a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?></a></h6>
								<ul class="meta-post"><li><?php the_terms( get_the_ID(), 'project-type'); ?></li> </ul>
							</div>
						</div><!-- related-post  -->
					  </div><!-- col -->
					<?php endwhile; ?> 
					</div><!-- row -->
				</div> <!-- related-posts  -->
				<?php endif;
			    wp_reset_postdata(); ?>
		  </div>
	   <?php } ?>
	   
	 <?php endwhile; ?>
	 </div><!-- End container -->
  </div><!-- End mo-portfolio-article --> 
</div><!-- End main-content -->
<?php get_footer(); ?>