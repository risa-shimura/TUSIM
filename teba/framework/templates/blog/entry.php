<?php
	$media_output = '';
	if (has_post_thumbnail()) {
		$media_output = get_the_post_thumbnail(get_the_ID(), 'teba-medium');
	}
    echo '<figure class="img-single"> <div class="mo-media">'.$media_output.'</div></figure>';
?>