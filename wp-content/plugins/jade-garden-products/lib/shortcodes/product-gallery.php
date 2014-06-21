<?php
function product_gallery_shortcode($atts){
	global $post;
	$gallery = '';
	$gallery_meta= shortcode_atts(array(
		'id' => $post->ID,
		), $atts);
	
	$product_images = get_field('jg_product_images',  $gallery_meta['id']);
	
	if(!empty($product_images)){
        if(count($product_images) <= 4){
			$grid = count($product_images);
        }
        elseif(count($product_images) % 6 == 0){
			$grid = 6;
		}
        elseif(count($product_images) % 5 == 0){
			$grid = 5;
		}
		elseif(count($product_images) % 4 == 0){
				$grid = 4;

		}
		elseif(count($product_images) % 3 == 0){
			$grid = 3;
		}
		else {
			$grid = 2;
		}
			
		$gallery .= '<div class="product-gallery"><ul class = "large-block-grid-'.$grid.'">';
		foreach ($product_images as $image) {
		//$gallery .='<pre>'.print_r($image, true).'</pre>';
			$gallery .= '<li><img src="'.$image['gallery_image']['sizes']['block-thumb-'.$grid].'" alt="" width="'.$image['gallery_image']['sizes']['block-thumb-'.$grid.'-width'].'" height="'.$image['gallery_image']['sizes']['block-thumb-'.$grid.'-height'].'" /></li>';
		}
		$gallery .= '</ul></div>';

	}
	return $gallery;

}
add_shortcode('product-gallery', 'product_gallery_shortcode');
?>