<div class="no-results">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( wp_kses_post( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'teba' ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
		<h3 class="lrg center"><?php echo esc_html__( 'Nothing Found', 'teba' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'teba' ); ?></p>
		<?php get_search_form(); 
		 else : ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'teba' ); ?></p>
		<?php get_search_form(); 
	endif; ?>
</div>
