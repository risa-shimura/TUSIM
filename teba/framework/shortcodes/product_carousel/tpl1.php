<?php global $product; 
/* set on sale html */
$sale = '';
if ( $product->is_on_sale() ) {
	$sale = '<span class="onsale">' . esc_html__( 'Sale!', 'teba' ) . '</span>';
}

/* set price html */
$price_html = $product->get_price_html();
?>
<article <?php post_class(); ?>>
	<div class="mo-thumb">
		<?php 
			echo '<div>'.$sale.'</div>' ;
			if ( has_post_thumbnail() ) the_post_thumbnail('full');
		?>
		<ul class="mo-action">
             <?php $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
             <li><a class="lightbox-gallery" href="<?php echo esc_url($full); ?>"><i class="fa fa-search"></i></a></li>
		</ul>
	</div>
	<div class="mo-content">
		<h3 class="mo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if ($price_html) echo '<div class="mo-price"><span>'.$price_html.'</span></div>'; ?>
	</div>
</article>