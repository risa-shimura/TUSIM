<?php 
	$id = get_the_ID();
	$terms = wp_get_object_terms($id, 'category'); 
?>
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-left-post">
   
    <div class="format-post">
		<?php if (has_post_thumbnail()) { ?>
		<figure> 
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('teba-small');?></a>
			<a class="cat-name" href="<?php echo esc_url(get_term_link($terms[0]->slug, 'category')) ?>"><?php echo esc_html($terms[0]->name); ?></a>
	    </figure>		
		<?php  } else{ ?>
		   <div class="empty_thumbnail"></div>
		<?php  } ?>
	</div>					
	<div class="content-post">
		<ul class="meta-post">
			<li class="date"><?php echo get_the_date(); ?></li>
			<li><div class="author"><?php echo get_the_author(); ?></div></li>
		</ul>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
		<p class="content"><?php echo teba_custom_excerpt($excerpt_lenght); ?></p>
		<a class="button btn-txt btn-txt-arrow dark" href="<?php echo get_the_permalink(); ?>" ><span class="button-text"><?php echo esc_html($link_text); ?></span></a>
	</div>
  </div> 
</article>