<?php

//Registers the shortcodes to produce charts from the product data

// [chart data="jg_product_composition"]

function chart_func( $atts ) {
    global $post, $chart_id;
   if( !isset($chart_id) ){
		$chart_id = 0;
	}
	else{
		$chart_id++;
	}
		$chart = '';
	    $a = shortcode_atts( array(
	    	'id' => $post->ID,
	    	'other' => false,
	        'field' => 'jg_batch',
	        'width' => '600',
	        'height' => '400',
	        'textcolor' => '#EEE',
	        'annotatecolor' => '#000',
	        'fontsize' => '10',
	        'colorset' => '',
	        'batch' => ''
	        
	    ), $atts );



	   $product_atts = get_field('jg_batch', $a['id']);


		//Chart Markup
	$chart .= '<div class="jg-wrapper">';
	   $chart .= '<canvas id="myChart'.$chart_id.'" width="'.$a['width'].'" height="'.$a['height'].'" style="float:left; margin-right: 20px;"></canvas>';

		$chart .= '<style type="text/css">';
		$chart .= '
			.annotation {
				z-index: 999;
				color: 	'.$a['annotatecolor'].';
				text-shadow : 0 1px 1px rgba(0,0,0,.5);
				font-family: monospace, serif;
			}
		';
		$chart.= '</style>';
	   $chart .= '<script type="text/javascript">';
	   //Chart Javacript
		$data = array();
		$labels = array();
		
		

		
		if($a['colorset'] == 'green'){
			$colorset = array('#297F51','#9FFFCB','#53FFA2','#507F66','#42CC82','#617F38', '#E3FFBC', '#C2FF70', '#697856', '#9BCC59');
		}
		elseif ($a['colorset'] == 'yellow') {
			$colorset = array('#7F7F10', '#FFFF6C', '#FFFE1F', '#5f5f00', '#CCCB19', '#7F6605', '#FFDC57', '#FFCC0B', '#786726', '#CCA309');
		}
		elseif ($a['colorset'] == 'teal') {
			$colorset = array('#287F71', '#9CFFEE', '#50FFE1', '#477870', '#40CCB4', '#1F6F7F', '#8AECFF', '#3DDFFF', '#3E6E78', '#31B2CC');
		}
		elseif ($a['colorset'] == 'red') {
			$colorset = array('#7F1401', '#FF694F', '#FF2803', '#782F22', '#CC2002',  '#7F0035', '#FF4C97', '#FF006B', '#782145', '#CC0055');
		}
		elseif ($a['colorset'] == 'grey') {
			$colorset = array('#111', '#444', '#222', '#555', '#333',  '#777', '#999', '#666', '#bbb', '#888',  '#aaa',  '#ccc', '#ddd', '#eee');
		}
		else {
			$colorset = array('#111', '#444', '#222', '#555', '#333',  '#777', '#999', '#666', '#bbb', '#888',  '#aaa',  '#ccc', '#ddd', '#eee');
		}
		$i = 0;
			

		if($a['batch'] == '') {
			$batch = $product_atts[0];
			$batch = $batch['batch_id'];
			$batch = $batch->name;
		}	
		else {
			$batch = $a['batch'];
		}
		foreach ($product_atts as $value) {
		
			if($batch == $value['batch_id']->name){
						
			if($value['test_results']){
				foreach($value['test_results'] as $item){

						$data[] = $item['amount'];
						$labels[] = $item['chemical'];	

						if(isset($a['colorset']) && $colorset != ''){
							$colors[] = $colorset[$i];

							
						}
						elseif (isset($item['color'])&& !empty($item['color'])){
							$colors[] = $item['color'];		
						}
						else{
							$colors = $a['colorset'];
						}

						$i++;

				}
			}
				
			}
			$i++;
			//add a color for 'other'
			if($a['other'] != false){
							$colors[] = $colorset[$i];
						}		
		}

		$chart .= 'var data'.$chart_id.' = [';
		$i = 0;
		$leftover = 100;
		foreach ($data as $value) {

			$chart .= '{
				value : '.$value.',
				color: "'.$colors[$i].'",
				title: "'.$labels[$i].' : '.$value.'%"
			},';
			if($i <= count($colors)){
				$i++;
			}
			else{
				//reset the colors
				$i = 0;
			}
			$leftover = $leftover - $value;
			

		}

		if($leftover > 0 && $a['other'] != false){
			$chart .= '{
				value : '.$leftover.',
				color: "'.$colors[$i].'", //fix this!
				title: "other : '.$leftover.'%"
			},';
		}
		
		$chart .= '];';
	   
	   //Configure chart options 

	   $chart .= 'var options'.$chart_id.' = { 
			inGraphDataShow : false, 
			inGraphDataAnglePosition : 2,
			inGraphDataRadiusPosition: 3,
			inGraphDataPaddingRadius : 15,
			annotateClassName : "annotation",
			inGraphDataRotate : "inRadiusAxisRotateLabels",
			inGraphDataFontSize : '.$a['fontsize'].',
			inGraphDataFontColor : "'.$a['textcolor'].'",
			inGraphDataAlign : "off-center",
			inGraphDataVAlign : "top",
			graitleSpaceAfter : 40,
			footNoteSpaceBefore : 40,
			inGraphDataTmpl: "<%=v1%>",
			radiusScale : .8,
			segmentShowStroke : false,
			annotateDisplay : true,
			annotateLabel : "<%=v1%>",
			legend: true,
			legendBorders : false,
			legendFontColor : "'.$a['textcolor'].'",

			} ; ';
	   //Get the context of the canvas element we want to select
	   $chart .= 'var ctx'.$chart_id.' = document.getElementById("myChart'.$chart_id.'").getContext("2d");';
	   $chart .= '
	   jQuery(document).ready(function(){
	   	var myNewChart'.$chart_id.' = new Chart(ctx'.$chart_id.').Pie(data'.$chart_id.', options'.$chart_id.');
	   });';

		
	   //Instantiate the chart
	   //$chart .= 'new Chart(ctx).PolarArea(data);';

	   $chart .= '</script>';
	   $chart .='</div>';

	   return $chart;

}
add_shortcode( 'chart', 'chart_func' );