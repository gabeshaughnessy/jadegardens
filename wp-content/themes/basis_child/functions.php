<?php
/**
 * @package Basis Child
 */

$prefix = 'jg_';

/* DEFINE ENVIRONMENT GLOBAL */
$host = $_SERVER['HTTP_HOST'];
if (stristr($host, 'com') == FALSE){
    define('ACF_ENVIRONMENT', "development");
    }
    elseif ((stristr($host, 'staging') !== FALSE)){
        define('ACF_ENVIRONMENT', "staging");
        }
        else{
            define('ACF_ENVIRONMENT', "production");
            } 

/* Advanced Custom Fields Activiation */
/* ################################################################################# */

    if (ACF_ENVIRONMENT != 'development') {
       define('ACF_LITE', true);
    }

    /* Advanced Custome Fields */
    require_once('lib/advanced-custom-fields/acf.php');
    /* ACF Add-ons */
    include_once( 'lib/advanced-custom-fields/add-ons/acf-repeater/acf-repeater.php' );
    include_once( 'lib/advanced-custom-fields/add-ons/acf-flexible-content/acf-flexible-content.php' );
    include_once( 'lib/advanced-custom-fields/add-ons/acf-options-page/acf-options-page.php' ); 
    include_once( 'lib/advanced-custom-fields/add-ons/acf-field-date-time-picker/acf-date_time_picker.php' ); 

    if ( ACF_ENVIRONMENT != 'development' ) {
        // If this is staging or production
            // load ACF declarations
            require_once('lib/advanced-custom-fields/register_fields.php'); 
        }
        else{            
            add_action( 'admin_menu', 'ACF_acf_menu', 9 );
            function ACF_acf_menu(){
                add_submenu_page( 'edit.php?post_type=acf', __('Custom Fields','acf'), __('Custom Fields','acf'), 'manage_options', 'edit.php?post_type=acf');
                add_submenu_page( 'edit.php?post_type=acf', __('Import ACF','acf'), __('Import ACF','acf'), 'manage_options', 'admin.php?import=wordpress');

                }

    }
/* END of ACF Activation */

/* Include Custom Post Type Declarations */
require_once('lib/custom-post-types/cpt-product.php');

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

