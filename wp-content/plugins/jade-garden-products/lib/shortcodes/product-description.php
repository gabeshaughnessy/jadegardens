<?php
function product_description_function($atts){
	$return = '';

	global $post;
	$meta = shortcode_atts(array(
			'id'=> $post->ID
		), $atts);
	
	$description = get_field('jg_product_description', $meta['id']);

	$return .= (!empty($description) ?  '<div class="description"><h4>Description:</h4>'.$description.'</div>' : '');

	return $return;
}

add_shortcode('product-description', 'product_description_function');