<?php

//Registers the shortcodes to produce charts from the product data

// [chart data="jg_product_composition"]
function randomColor(){
	$num = mt_rand ( 0, 0xffffff ); // trust the library, love the library...
	$output = sprintf ( "%06x" , $num ); // muchas smoochas to you, PHP!
	return '#'.$output;
}
function chart_func( $atts ) {
    global $post;
	$chart = '';
    $a = shortcode_atts( array(
    	'id' => $post->ID,
        'field' => 'jg_product_composition',
        'width' => '600',
        'height' => '400'
    ), $atts );

	

   $product_atts = get_field($a['field'], $a['id']);

	//Chart Markup
   $chart .= '<canvas id="myChart" width="'.$a['width'].'" height="'.$a['height'].'" style="float:left; margin-right: 20px;"></canvas>';

	
   $chart .= '<script type="text/javascript">';
   //Chart Javacript
	$data = array();
	$labels = array();
	$colors = array('#D97041','#C7604C','#21323D','#9D9B7F','#7D4F6D','#584A5E', randomColor(), randomColor(),randomColor(),randomColor(),randomColor(),randomColor(),randomColor(),randomColor(),randomColor(),randomColor(),randomColor());
	
	
	foreach ($product_atts as $value) {
		foreach($value as $key => $value){
			if($key == 'amount'){
				$data[] = $value;
			}
			elseif ($key == 'chemical') {
				$labels[] = $value;
			}	
		}
	}
	$chart .= 'var data = [';
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
	if($leftover > 0){
		$chart .= '{
			value : '.$leftover.',
			color: "'.$colors[$i].'",
			title: "Other : '.$leftover.'%"
		},';
	}
	$chart .= '];';
   
   //Configure chart options 
   $chart .= 'var options = { 
		inGraphDataShow : true, 
		inGraphDataAnglePosition : 2,
		inGraphDataRadiusPosition: 3,
		inGraphDataPaddingRadius : 15,
		inGraphDataRotate : "inRadiusAxisRotateLabels",
		inGraphDataFontSize : 10,
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
		legendBorders : false
		} ; ';
   //Get the context of the canvas element we want to select
   $chart .= 'var ctx = document.getElementById("myChart").getContext("2d");';
   $chart .= '
   jQuery(document).ready(function(){
   	var myNewChart = new Chart(ctx).Pie(data, options);
   });';

	
   //Instantiate the chart
   //$chart .= 'new Chart(ctx).PolarArea(data);';

   $chart .= '</script>';
   
  // $chart .= '<pre>'.print_r($labels, true).'</pre>';

   return $chart;


}
add_shortcode( 'chart', 'chart_func' );