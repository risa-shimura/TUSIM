<?php
function motivoweb_blog_func($atts, $content = null) {
     extract(shortcode_atts(array(
	    'tpl' =>  'grid',
		'columns' => '2',
        'category' => '',
		'posts_per_page' => -1,
		'pagination' => '',
		'orderby' => 'none',
		'order' => 'none',
		'link_text' => 'Read More',
        'el_class' => '',
        'excerpt_lenght' => 14,
    ), $atts));
	$class = array();
    $class[] = 'mo-blog-masonry-wrapper clearfix';
    $class[] = $tpl;
    $class[] = $el_class;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$animate_delay = 0;
    $args = array(
		'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'post',
        'post_status' => 'publish',
	);
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $category
				)
		);
    }
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) {
		$class_columns = array();
		switch ($columns) {
			case 1:
				$class_columns[] = 'col-xs-12 col-md-12 col-lg-12 ';
				break;
			case 2:
				$class_columns[] = 'col-xs-12 col-md-6 col-lg-6 ';
				break;
			case 3:
				$class_columns[] = 'col-xs-12 col-md-12 col-lg-4 ';
				break;
			case 4:
				$class_columns[] = 'col-xs-12 col-md-12 col-lg-3 ';
				break;
			default:
				$class_columns[] = 'col-xs-12 col-md-6 col-lg-6 ';
				break;
		}
		
    ?>
    <div class="blog-posts more-posts-wrapper"> 
            <div class="row grid-masonry">
						<div class="posts masonry-posts">
							 <?php $count = 0; while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
							<div class="masonry-post post post-item <?php echo esc_attr(implode(' ', $class_columns)); echo esc_attr(implode(' ', $class)); ?>">
								<?php include $tpl.'.php'; ?>
							</div><!--post-->
							<?php } 
		                $count++; ?>
                        </div>
		      <div class="clearfix"></div>
			<?php echo teba_pagination($wp_query, $pagination); ?>
           </div><!-- end row grid-masonry  -->
         </div><!-- end  more-posts-wrapper -->
       <?php }
     wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('teba_shortcode')) { teba_shortcode('blog', 'motivoweb_blog_func'); }