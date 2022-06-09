<?php
/*
Template Name: 404 Template
*/
get_header(); 
global $teba_options;
?>
<div class="main-content"> 
	<div class="page-404">
		<div class="container">
			<div class="text-center">
			    <?php if(isset($teba_options['error-404-title']) !='') { ?> <h1><?php echo esc_html($teba_options['error-404-title']);?></h1>
			    <?php } else{ ?><h1> <?php echo esc_html__( '404 ', 'teba' ); ?></h1> <?php } ?>
                <?php if(isset($teba_options['error-404-subtitle']) !='') { ?><h4><?php echo esc_html($teba_options['error-404-subtitle']);?></h4>
			    <?php } else { ?><h4><?php echo esc_html__( 'Oops! That page can’t be found.', 'teba' ); ?></h4><?php } ?>
                <?php if(isset($teba_options['error-404-content']) !='') { ?><p class="content"><?php echo esc_html($teba_options['error-404-content']);?></p><?php } ?>
		        <?php 
				if(isset($teba_options['error-404-btn']) && $teba_options['error-404-btn']) {
				if(  $teba_options['error-404-btn'] == 'on') { ?>
					 <a href="<?php echo esc_url(home_url('/')); ?>" class="button btn-solid light hr_primary bg_primary bg_hr_light medium radius5 roll"><span class="button-text"><?php if(isset($teba_options['error-404-btn-title']) !='') { echo esc_html($teba_options['error-404-btn-title']); } else{ echo esc_html__( 'Back To Home ', 'teba' ); } ?></span></a>	
			    <?php }
				}?>
			</div><!-- End text-center -->
		</div><!-- End container -->
	</div><!-- End page-404 -->
</div> <!-- End main-content -->   
<a href="#" id="back-to-top" class="progress hide_icon"><div class="arrow-top"></div>
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
    </a>
    <?php wp_footer(); ?>
     </div><!-- wrapper  -->
</body>