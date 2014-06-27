<?php

function product_profile_func( $profile_atts ) {
   
    global $post;
	
    
    $product_meta = shortcode_atts( array(
    	'id' => $post->ID,       
    ), $profile_atts );

    //set up metadata

    $description = get_field('jg_product_description', $product_meta['id']);
   
    
	

   

    $product = '<div class="jg-wrapper">';
		
		//DESCRIPTION
		$product .='<div class="row">';

			//gallery
			$product .= do_shortcode('[product-gallery id='.$product_meta['id'].' style="round"]');
			
			//description
			$product .= do_shortcode('[product-description id='.$product_meta['id'].']');
			
			//effects
			$product .= do_shortcode('[product-effects id='.$product_meta['id'].']');
			
			//usage
			$product .= do_shortcode('[product-uses id='.$product_meta['id'].']');
			
			//batch
			$product .= do_shortcode('[product-batches id='.$product_meta['id'].']');
		
		
		$product .='</div>';//close-row
	
	$product .= '</div>';//close wrapper
	
	return $product;

}
add_shortcode('product-profile', 'product_profile_func');
?>