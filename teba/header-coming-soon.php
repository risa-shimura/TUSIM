<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
<head>
    <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php global $teba_options;
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
<?php $page_loader = (isset($teba_options["page_loader"])&&$teba_options["page_loader"])?$teba_options["page_loader"]: false;
	if($page_loader){ ?>
		<div id="loading">
			<div class="loading-wrap"> 
			    <p class="loader_txt"><?php echo esc_html__( 'loading...', 'teba' ); ?>  </p>
				<span class="dots">.</span> <span class="dots">.</span> <span class="dots">.</span> <span class="dots">.</span> <span class="dots">.</span> <span class="dots">.</span>
			</div>
		</div>
	<?php } ?>
<?php teba_cursor(); ?>