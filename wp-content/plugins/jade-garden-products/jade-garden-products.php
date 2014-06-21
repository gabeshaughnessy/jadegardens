<?php

/**
 * @package jadegardenproducts
 */
/*
Plugin Name: Jade Garden Products
Plugin URI: https://github.com/gabeshaughnessy/jadegardens
Description: make big products
Version: 1.0.0
Author: Gabe Shaughnessy
Author URI: https://github.com/gabeshaughnessy
License: GPLv2 or later
Text Domain: jadegardenproducts
*/
//Safety check - don't call this directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there! I don\'t do anything when called directly.';
    exit;
}

/* DEFINE ENVIRONMENT GLOBAL */
$host = $_SERVER['HTTP_HOST'];
if (stristr($host, 'com') == FALSE){
    define('JG_ENVIRONMENT', "development");
    }
    elseif ((stristr($host, 'staging') !== FALSE)){
        define('JG_ENVIRONMENT', "staging");
        }
        else{
            define('JG_ENVIRONMENT', "production");
            } 

/* Advanced Custom Fields Activiation */
/* ################################################################################# */

    if (JG_ENVIRONMENT != 'development') {
       define('ACF_LITE', true);
    }
    define( 'JG_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
    define( 'JG_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );
   /* Advanced Custom Fields */
    require_once(JG_PLUGIN_PATH.'lib/advanced-custom-fields/acf.php');
        include_once( JG_PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-repeater/acf-repeater.php' );
        include_once( JG_PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-flexible-content/acf-flexible-content.php' );
        include_once( JG_PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-options-page/acf-options-page.php' ); 
        include_once( JG_PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-field-date-time-picker/acf-date_time_picker.php' ); 
        include_once( JG_PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-wordpress-wysiwyg-field/acf-wp_wysiwyg.php' ); 
        include_once( JG_PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-taxonomy-field.php' );

    if ( JG_ENVIRONMENT != 'development' ) {
            require_once(JG_PLUGIN_PATH.'lib/advanced-custom-fields/register_fields.php'); 
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
require_once(JG_PLUGIN_PATH.'lib/custom-post-types/cpt-product.php');

//REGISTER SHORTCODES
/* Include Custom Post Type Declarations */
require_once(JG_PLUGIN_PATH.'lib/shortcodes/charts.php');
require_once(JG_PLUGIN_PATH.'lib/shortcodes/product-profile.php');
require_once(JG_PLUGIN_PATH.'lib/shortcodes/product-gallery.php');
require_once(JG_PLUGIN_PATH.'lib/shortcodes/product-batches.php');
require_once(JG_PLUGIN_PATH.'lib/shortcodes/product-uses.php');
require_once(JG_PLUGIN_PATH.'lib/shortcodes/product-description.php');
require_once(JG_PLUGIN_PATH.'lib/shortcodes/product-effects.php');

//ENQUEUE JAVASCRIPT AND STYLES
function jg_product_scripts(){
    wp_enqueue_script('modernizr', plugins_url( 'lib/bower_components/foundation/js/vendor/modernizr.js' , __FILE__ ), array('jquery'));
    wp_enqueue_script('fast-click', plugins_url( 'lib/bower_components/foundation/js/vendor/fastclick.js' , __FILE__ ), array('jquery'));
    wp_enqueue_script('foundation', plugins_url( 'lib/bower_components/foundation/js/foundation.min.js' , __FILE__ ), array('jquery', 'modernizr'));
    wp_enqueue_script('jquery-ui', plugins_url( 'lib//js/jquery-ui.min.js' , __FILE__ ), array('jquery'));
    wp_enqueue_script('chart', plugins_url( 'lib/js/ChartNew.js' , __FILE__ ), array('jquery'));
    wp_enqueue_style('app', plugins_url( 'lib/css/app.css' , __FILE__ ));
}

add_action( 'wp_enqueue_scripts', 'jg_product_scripts' );
function activate_javascripts(){
    echo '<script type="text/javascript">';
        echo 'jQuery(".tabset").tabs()';
    echo '</script>';
}
add_action('wp_footer', 'activate_javascripts');


//Image size for product galleries 
add_image_size('block-thumb-1', 1200, 1200, true);
add_image_size('block-thumb-2', 600, 600, true);
add_image_size('block-thumb-3', 400, 400, true);
add_image_size('block-thumb-4', 300, 300, true);
add_image_size('block-thumb-5', 240, 240, true);
add_image_size('block-thumb-6', 200, 200, true);


?>