<?php
function product_effects_function($atts){
	$return = '';

	global $post;
	$meta = shortcode_atts(array(
			'id'=> $post->ID
		), $atts);
	
	$effects = get_field('jg_product_effects', $meta['id']);
   
	$return .= (!empty($effects) ?  '<div class="effects"><h4>Effects:</h4>'.$effects.'</div>' : '');

	return $return;
}

add_shortcode('product-effects', 'product_effects_function');