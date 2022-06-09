<?php global $teba_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	  <a href="<?php the_permalink() ?>" class="overlay-post">
	    <div class="thumbnail-post">
			<?php the_post_thumbnail('teba-small');?>
			<div class="overlay"></div>
			<p class="cat-name"><?php echo esc_html($terms[0]->name) ?></p>
			<div class="caption">
			    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
			     <ul class="meta-post">
				   <li><div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '30', get_option( 'avatar_default', 'mystery' ), get_the_author(), array( 'class' => 'circle' ) ).' </div>'.get_the_author(); ?></li>
				   <li class="date"><?php echo get_the_date(); ?></li>
				 </ul>
			</div>
	  	</div>
	  </a>
</article>