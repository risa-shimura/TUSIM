<?php
/*
Template Name: Coming Soon Template
*/
?>
<?php get_header('coming-soon'); ?>
	<div class="main-content comingsoon">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
	<a href="#" id="back-to-top" class="progress hide_icon"><div class="arrow-top"></div>
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
    </a>
    <?php wp_footer(); ?>
     </div><!-- wrapper  -->
</body>