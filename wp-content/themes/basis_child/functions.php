<?php
/**
 * @package Basis Child
 */

$prefix = 'jg_';


/* FONTS ________________________*?
add_action('wp_head', 'google_fonts');

function google_fonts(){
	$font_link = "<link href='http://fonts.googleapis.com/css?family=Philosopher:400,700|PT+Serif:400,700,400italic|Montserrat:700,400' rel='stylesheet' type='text/css'>";
	echo $font_link;
}

add_action( 'wp_enqueue_scripts', 'bc_enqueue_scripts' );
function bc_enqueue_scripts(){
	wp_deregister_style( 'basis-google-fonts' );

	$fonts = array();
	if ( 'off' !== _x( 'on', 'Arimo font: on or off', 'basis' ) ) {
		$fonts[] = 'Philosopher:400,700|PT+Serif:400,700,400italic|Montserrat:700,400';
	}


	if ( ! empty( $fonts ) ) {
		// Use Google Fonts url style to append fonts
		$fonts = implode( '|', $fonts );

		// Enqueue the fonts
		wp_enqueue_style(
			'basis-google-fonts',
			'//fonts.googleapis.com/css?family=' . $fonts,
			array(),
			BASIS_VERSION
		);

		$style_dependencies[] = 'basis-google-fonts';
	}
}
/* END FONT SETUP */

