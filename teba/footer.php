<?php teba_footer();
		global $teba_options;
		if(isset($teba_options["style_selector"])&&$teba_options["style_selector"]) {
			require_once TEBA_ABS_PATH.'/box-style.php';
		} ?>
     </div><!-- wrapper  -->
     <?php wp_footer(); ?>
</body>