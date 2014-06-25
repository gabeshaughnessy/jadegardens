<?php
function product_archive_function($atts){
	
	$return = '';
	global $post, $wp_query;
	$atts[ 'slugs' ] = explode( ",", $atts[ 'slugs' ] );
	$meta = shortcode_atts(array(
			'id'=> $post->ID,
			'type' => get_post_type($post),
			'slugs' => '',
			'tax' => ''

		), $atts, 'product-archive');
	extract($meta);

if(is_post_type_archive( $type)){
	$archive_query = $wp_query;
}
else {
	$args = array(
		'post_type' => $type,
		);
	if($tax != '' && !empty($slugs)){
	$args['tax_query'] = array(
			array(
				'taxonomy' => $tax,
				'field' => 'slug',
				'terms' => $slugs
			)
		);
	}
	$archive_query = new WP_Query($args);
}
if($archive_query->have_posts()) : 
	$return .= '<div class="jg-wrapper"><ul class="large-block-grid-3 small-block-grid-2">';
	while($archive_query->have_posts()) : 		$archive_query->the_post();
	
	$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$thumbnail =  ($post_thumbnail_id != '' ? wp_get_attachment_image_src( $post_thumbnail_id, 'block-thumb-3') : false);

	if($thumbnail != false){
		$return .= '<li class="product">';
			$return.='<a href="'.get_permalink(get_the_ID()).'" title="View Product">';
			$return .= '<img src="'.$thumbnail[0].'" width="'.$thumbnail[1].'" height="'.$thumbnail[2].'" alt="Product Thumbnail" />';
			$return .= '<h4 class="text-center">'.get_the_title().'</h4>';


			$return.='</a>';

		$return .= '</li>';
	}
	else {
		$return .= '<li>no thumbnail</li>';
	}
endwhile;
	$return .= '</ul></div>';
endif;


	return $return;
}

add_shortcode('product-archive', 'product_archive_function');