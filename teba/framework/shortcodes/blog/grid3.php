<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="grid-post-simple">
    <div class="thumbnail-post"><?php the_post_thumbnail('teba-lg-height');?></div>
    <div class="content-post">
		      <p class="cat-name"><?php echo the_terms( get_the_ID(), 'category' ); ?></p>
					<h3 class="post-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="content"><?php echo teba_custom_excerpt($excerpt_lenght); ?></p>
					<a class="button btn-txt btn-txt-arrow dark" href="<?php echo get_the_permalink(); ?>" ><span class="button-text"><?php echo esc_html($link_text); ?></span></a>
    </div>
  </div>
</article>