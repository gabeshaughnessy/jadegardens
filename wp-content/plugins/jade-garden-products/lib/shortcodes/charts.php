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
    ), $atts );

	

   $product_atts = get_field($a['field'], $a['id']);

	//Chart Markup
   $chart .= '<canvas id="myChart" width="400" height="400" style="float:left; margin-right: 20px;"></canvas>';

	
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
	foreach ($data as $value) {
		$chart .= '{
			value : '.$value.',
			color: "'.$colors[$i].'",
		},';
		if($i <= count($colors)){
			$i++;
		}
		else{
			//reset the colors
			$i = 0;
		}
	}
	$chart .= '];';
   

   //Get the context of the canvas element we want to select
   $chart .= 'var ctx = document.getElementById("myChart").getContext("2d");';
   $chart .= '
   jQuery(document).ready(function(){
   	var myNewChart = new Chart(ctx).PolarArea(data);
   });';

	
   //Instantiate the chart
   //$chart .= 'new Chart(ctx).PolarArea(data);';

   $chart .= '</script>';
   $i = 0;
	foreach ($labels as $value) {
		$chart .= '<div class="chart-key"  style="float: left; display: block; width: 50%;" ><p><div style="display: inline-block; float: left; margin-right: 4px; background:'.$colors[$i].'; width:20px; height:20px;"></div>'.$value.'</p></div>';
		if($i <= count($colors)){
			$i++;
		}
		else{
			//reset the colors
			$i = 0;
		}
	}
  // $chart .= '<pre>'.print_r($labels, true).'</pre>';

   return $chart;


}
add_shortcode( 'chart', 'chart_func' );