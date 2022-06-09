<?php global $teba_options;   global $post;
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
$attachment = get_the_post_thumbnail( $post->ID , 'teba-small');
$src_attachment = get_the_post_thumbnail_url();?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <div class="overlay-post">
	<div class="thumbnail-post" style="background-image:url(<?php echo esc_url($src_attachment) ?>);"></div>
	<div class="overlay"></div>
	<div class="caption">
		<p class="cat-name"><?php echo esc_html($terms[0]->name) ?></p>
		<h3 class="post-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<ul class="meta-post">
			<li class="date"><?php echo get_the_date(); ?></li>
			<li><div class="author"><?php echo get_the_author(); ?></div></li>
		</ul>
		<a class="button btn-txt btn-txt-arrow dark" href="<?php the_permalink() ?>"><span class="button-text"><?php echo esc_html($link_text); ?></span></a>
	</div><!--caption-->
  </div><!--overlay-post-->
</article>