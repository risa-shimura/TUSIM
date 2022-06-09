<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="grid-post-simple">
    <div class="thumbnail-post"><?php the_post_thumbnail('teba-lg-height');?></div>
    <div class="content-post">
		<p class="cat-name"><?php echo the_terms( get_the_ID(), 'category' ); ?></p>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="content"><?php echo teba_custom_excerpt($excerpt_lenght); ?></p>
        <ul class="meta-post">
		   <li><div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '30', get_option( 'avatar_default', 'mystery' ), get_the_author(), array( 'class' => 'circle' ) ); ?> </div><?php echo get_the_author(); ?></li>
		   <li class="date"><?php echo get_the_date(); ?></li>
		 </ul>
    </div>
  </div>
</article>