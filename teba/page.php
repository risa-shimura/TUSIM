<?php get_header(); 
global $teba_options;
$tb_show_page_title = isset($teba_options['tb_page_show_page_title']) ? $teba_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($teba_options['tb_page_show_page_breadcrumb']) ? $teba_options['tb_page_show_page_breadcrumb'] : 1;
$tb_show_page_comment = (int) isset($teba_options['page_comment']) ?  $teba_options['page_comment']: 1; ?>
<div class="main-content">
	<?php if(class_exists('Vc_Manager')) { ?>
	    <?php teba_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); ?>
		<?php while ( have_posts() ) : the_post(); ?>
		  <?php the_content(); 
		   # Post content navigation ----------
			$args = array(
				'before'         => '<div class="page-links clearfix">',
				'after'          => '</div>',
				'link_before'    => '<span>',
				'link_after'     => '</span>',
				'next_or_number' => 'next_and_number',
			);
			wp_link_pages( $args );
	     endwhile; // end of the loop. ?>
	<?php } else { ?>
    <div class="internal-content">
        <div class="container">
           <div class="entry-header"><h1><?php single_post_title(); ?></h1> </div><!-- .entry-header -->
            <div class="content-page">
              <?php while ( have_posts() ) : the_post();
				    the_content(); 
                    wp_link_pages(array(
						'before'		   => '<div class="page-links">',
						'after'		       => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
					));  ?>
                    <div style="clear: both;"></div>
					<?php if ( (comments_open() && $tb_show_page_comment) || (get_comments_number() && $tb_show_page_comment) ) comments_template(); 
			  endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>
	<?php } ?>
</div>    
<?php get_footer(); ?>