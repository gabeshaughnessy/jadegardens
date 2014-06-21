<?php
function product_uses_function($atts){
	$return = '';

	global $post;
	$meta = shortcode_atts(array(
			'id'=> $post->ID
		), $atts);
	$usages = wp_get_post_terms( $meta['id'], 'usage');

	if(!empty($usages)){
					$return .= '<div class="usages"><h4>Recommended For:</h4><ul class="inline-list">';
						foreach ($usages as $use) {
							$return .= '<li>'.$use->name.'</li>';
						}
					$return .= 	'</ul></div>';
				}

	return $return;
}

add_shortcode('product-uses', 'product_uses_function');