<?php
function product_batches_shortcode($atts){
	global $post;
	$return = '';
	$batch_meta= shortcode_atts(array(
		'id' => $post->ID,
		), $atts);
	
	$batches = get_field('jg_batch',$batch_meta['id']);
	
	$i = 0;
	if(count($batches) > 1):
	$return .= '<div class="tabset jg-wrapper"><ul class="tabs" >';
				foreach ($batches as $batch) {
					$batch_id = '';
					$batch_id = $batch['batch_id'];
					if(!empty($batch_id)){
						$batch_id = $batch_id->name;

					}
					$batch_date = $batch['analysis_date'];
					if($i = 0){
						$return .=  '<li class="tab-title active"><a href="#batch'.$batch_id.'">Latest Batch, #'.$batch_id.'</a></li>';
					}
					else{
						$return .=  '<li class="tab-title"><a href="#batch'.$batch_id.'">Batch #'.$batch_id.'</a></li>';
					}
				$i++;
				}
			$return .= '</ul>';
			$i = 0;
		elseif(count($batches) == 1) :
			$batch_id = '';
			$batch_id = $batches[0]['batch_id'];
			if(!empty($batch_id)){
				$batch_id = $batch_id->name;

			}
			$return .= '<h6>Batch #'.$batch_id.'</h6>';
		endif;
				foreach ($batches as $batch) {




					$batch_id = $batch['batch_id'];
					if(!empty($batch_id)){
						$batch_id = $batch_id->name;
					}
					$batch_date = strtotime($batch['analysis_date']);
					$batch_results = $batch['test_results'];
			    	$batch_atts = $batch['batch_attributes'];


					$return .='<div class="content '.($i == 0 ? 'active ' : '').'" id="batch'.$batch_id.'">';
					$return .='<div class="batch-meta">';
					$return .='<h5>'.get_the_title($batch_meta['id']).'</h5>';
					$return .= '<p class="date"><em>'.date('F jS, Y', $batch_date).'</em></p>';
					$return .='</div>';
					$return .= '<div class="row"><div class="large-4 columns">';
					$return .= do_shortcode('[chart batch='.$batch_id.' id='.$batch_meta['id'].' width=280px height=280px textcolor=#333 annotatecolor=#333 colorset=green]');
					$return .= '</div>';
					$return .= '<div class="large-8 columns">';
					
					if(!empty($batch_atts)){
						$return .='<dl class="attribute-list">';
						foreach($batch_atts as $att_set){
							foreach ($att_set as $key => $value) {
								if($key != 'acf_fc_layout' && $key != 'attributes'){  //preconfigured attributes only
									foreach ($value as $attribute) {
										$return .= '<dt>'.$attribute['label'].'</dt><dd>'.$attribute['value'].'</dd>';
									}
								}
								elseif($key == 'attributes'){ //handle additional attributes
								
									foreach ($value as $attribute) {
										$return .= '<dt>'.$attribute['label'].'</dt><dd>'.$attribute['value'].'</dd>';

									}
								}
							}
						}
						$return .='</dl>';
						$return .= '</div></div>';
						$return .='</div>';//close tab
						
					
					}
					$i++;
				}
			$return .= '</div>'; //end of tabset
			
			$return .='</div>';

	return $return;

}
add_shortcode('product-batches', 'product_batches_shortcode');
?>