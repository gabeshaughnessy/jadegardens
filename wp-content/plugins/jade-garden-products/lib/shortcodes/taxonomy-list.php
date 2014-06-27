<?php
function taxonomy_list_function($atts){
	$return = '';

	global $post;
	$meta = shortcode_atts(array(
			'id'=> $post->ID,
			'taxonomy' => 'product-type'
		), $atts);
	
	$terms = get_terms( $meta['taxonomy']);
	

	if(!empty($terms)){
		$return .= '<ul class="inline-list">';
		foreach ($terms as $term) {
		 	$return .= '<li><a href="'.get_term_link($term).'" title="View Strain">'.$term->name.'</a></li>';
		}
		$return .= 	'</ul>';
		}

	return $return;
}

add_shortcode('taxonomy-list', 'taxonomy_list_function');