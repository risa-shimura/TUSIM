<?php
/* ----------------------------------------------*
   excerpt
/* ----------------------------------------------*/
if(!function_exists('teba_excerpt_length')) {
	/*
	 * Custom excerpt length
	 */
	function teba_excerpt_length( $length ) {
		return 30;
	}
}

if(!function_exists('teba_posts_link_attributes_1')) {
	/*
	 * post link attribute
	 */
	function teba_posts_link_attributes_1() {
		return 'class="older"';
	}
}

if(!function_exists('teba_posts_link_attributes_2')) {
	/*
	 * post link attribute
	 */
	function teba_posts_link_attributes_2() {
		return 'class="newer"';
	}
}
/*-----------------------------------------------*
  POST DIRECTION
/*-----------------------------------------------*/
if ( ! function_exists( 'teba_post_directions' ) ) :
    function teba_post_directions( ) {
	global $wp_query, $post;
	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous )
			return;
	}
	$nav_class = ( is_single() ) ? 'post-directions' : 'post-directions navigation-paging';	?>
	<nav class="<?php echo esc_attr($nav_class); ?>">
		<?php if ( is_single() ) : // navigation links for single posts 
        $prev_post = get_previous_post();
        $next_post = get_next_post(); 
	    $prev_post_link = $next_post_link = $next_post_title = $prev_post_title = $url_prev = $url_next = false; ?>
            <div class="post-paginations">
               <?php 
			   if(!empty($prev_post) && is_object($prev_post)) {
				    $prev_post_link = get_permalink($prev_post->ID);
				    $prev_post_title = get_the_title($prev_post->ID);
				    $url_prev = wp_get_attachment_url( get_post_thumbnail_id($prev_post->ID),'teba-small'); 
			   }
               $prev_post_link != '' ? '' : 'empty';
		       if(!empty($prev_post_link)) :
					echo ' <div class="post-pagi prev"><a href="'. esc_url($prev_post_link) .'">';
		                echo '<div class="pagi_nav"><span class="arrow"></span> <span class="nav_dir">'. esc_html__( 'PREVIOUS POST', 'teba' ) .'</span></div>';
				        echo '<div class="pagi_details">';
		                   if(!empty($url_prev)){ echo '<img src="'.esc_url($url_prev).'" alt="'.esc_attr__('image','teba').'"/>'; }
				        echo '<h3>'. esc_html($prev_post_title) .'</h3></div>';
				     echo '</a></div>';
				endif; ?>
               <?php 
			   if ( is_singular('portfolio') ) {
				  $homeLink = 'https://webzandappz.de/projekte/';
				} else { 
				  $homeLink = esc_url( home_url('/')); 
				}
               echo '<a href="'.$homeLink .'" class="pagi-icon-grid"><div class="icon"></div></a>'; ?>
                
                <?php if(!empty($next_post) && is_object($next_post)) {
					$next_post_link = get_permalink($next_post->ID);
					$next_post_title = get_the_title($next_post->ID);
				    $url_next  = wp_get_attachment_url( get_post_thumbnail_id($next_post->ID),'teba-small'); 
				}  
	            $next_post_link != '' ? '' : 'empty';
				if(!empty($next_post_link)) :
					echo '<div class="post-pagi next"><a href="'. esc_url($next_post_link) .'">';
		                echo '<div class="pagi_nav"><span class="arrow"></span> <span class="nav_dir">'. esc_html__( 'NEXT POST', 'teba' ) .'</span></div>';
		                echo '<div class="pagi_details">';
		                   if(!empty($url_next)){ echo '<img src="'.esc_url($url_next).'" alt="'.esc_attr__('image','teba').'"/>'; }
				        echo '<h3>'. esc_html($next_post_title) .'</h3></div>';
					echo '</a></div>';
				endif; ?>
            </div><!-- post-paginations -->
        <?php endif; ?>
	</nav>
	<?php
} endif;
/*-----------------------------------------------*
  Related Post
/*-----------------------------------------------*/
function teba_related_post() {
    global $post;
    $posttags = get_the_category($post->ID);
    if(empty($posttags)) return ;
    $tags = array();
    foreach ($posttags as $tag) {
        $tags[] = $tag->term_id;
    }
	$wp_query = new WP_Query(array(
		'posts_per_page'=> 3,
		'post_tyle' => 'post',
		'post__not_in' => array($post->ID),
		'post_status'=> 'publish', 
		'category__in'=>$tags
	));
	if(isset($wp_query->posts) && count($wp_query->posts) > 0) { ?> 
       <div class="clearfix"></div>
        <div class="related-posts"> 
           <h3 class="title"><?php esc_html_e('Related Posts','teba'); ?></h3>
           <div class="related-post-inner row">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="related-post">
                 <div class="grid-mid-post">
					<div class="format-post">
						<figure>
						   <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail("teba-small"); ?></a>
						   <?php $id = get_the_ID(); $terms = wp_get_object_terms($id, 'category'); ?>
						   <a class="cat-name" href="<?php echo esc_url(get_term_link($terms[0]->slug, 'category')); ?>"><?php echo esc_html($terms[0]->name); ?></a>
						</figure>
					<div class="content-post">
						<h6><a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?></a></h6>
					</div>
				  </div> 
				</div>
            </div><!-- related-post  -->
          </div><!-- col -->
        <?php endwhile; ?> 
        </div><!-- row -->
       </div> <!-- related-posts  -->
      <?php
    }
    wp_reset_postdata();
}
/*-----------------------------------------------*
  Post gallery
/*-----------------------------------------------*/
if (!function_exists('teba_grab_ids_from_gallery')) {
    function teba_grab_ids_from_gallery() {
        global $post;
        $gallery = teba_get_shortcode_from_content('gallery');
        $object = new stdClass();
        $object->columns = '3';
        $object->link = 'post';
        $object->ids = array();
        if ($gallery) {
            $object = teba_extra_shortcode('gallery', $gallery, $object);
        }
        return $object;
    }
}
/*-----------------------------------------------*
  Custom comment list
/*-----------------------------------------------*/
function teba_custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? 'mo-comment-item clearfix' : 'mo-comment-item parent clearfix' ) ?> id="comment-<?php comment_ID() ?>">
<div class="comment-body">
    <div class="avatar">
       <?php echo get_avatar( $comment , $size = '80' ); ?>
    </div>
    <div class="comment">
        <div class="mo-name"><?php echo '<h6>'.get_comment_author( get_comment_ID() ).'</h6><div class="date">'.get_comment_date().'</div>'; ?></div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'teba' ); ?></em>
    <?php endif; ?>
    <?php comment_text(); ?>
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div><!-- comment -->
</div><!-- comment-body -->
<?php
}