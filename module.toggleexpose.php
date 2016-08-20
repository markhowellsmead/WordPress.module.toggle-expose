<div class="mod row toggle-expose">

<?php

	function output_images($images, $size){

	    function imagetag($image, $size, $n){
		    if($n>2){
				$prefix = 'data-';
				$class = ' class="is-hidden"';
				$button = '';
			}elseif($n === 2){
				$button = '<div class="button-holder"><button class="button button-primary toggle-expose">Expose</button></div>';
			}else{
				$prefix = '';
				$class = '';
				$button = '';
			}
			return sprintf(
				'<figure %1$s %2$sstyle="background-image:url(\'%3$s\')"></figure>%4$s',
				$class,
				$prefix,
				wp_get_attachment_image_url( $image['id'], $size ),
				$button
			);
	    }
	
	    
	    $n = 0;
	    
		foreach($images as $image){
			echo imagetag($image, $size, ++$n);
		}
	}
	
	$images = array_slice(get_sub_field('images'), 0, intval(get_option('posts_per_page')));
	output_images($images, 'post-thumbnail-full');

?></div>
