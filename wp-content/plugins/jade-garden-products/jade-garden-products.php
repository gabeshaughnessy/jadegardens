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

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


/* cache buster */
/* Additional Function to prune the Cache if $post_id is '0' or 'options' */
function f711_clear_custom_cache($post_id) {

    // just execute if the $post_id has either of these Values. Skip on Autosave
    if ( ( $post_id == 0 || $post_id == 'options' ) && !defined( 'DOING_AUTOSAVE' ) ) {

      }

    return $post_id;

}

// Add the new Function to the 'acf/save_post' Hook. I Use Priority 1 in this case, to be sure to execute the Function
add_action('acf/save_post', 'f711_clear_custom_cache', 1);

/* end cache buster */
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
    define( 'ACF__PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
    define( 'ACF__PLUGIN_DIR', plugin_dir_url( __FILE__ ) );
    require_once(ACF__PLUGIN_PATH.'lib/advanced-custom-fields/acf.php');
   
    /* ACF Add-ons */
  

        include_once( ACF__PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-repeater/acf-repeater.php' );
        include_once( ACF__PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-flexible-content/acf-flexible-content.php' );
        include_once( ACF__PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-options-page/acf-options-page.php' ); 
        include_once( ACF__PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-field-date-time-picker/acf-date_time_picker.php' ); 
        include_once( ACF__PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-wordpress-wysiwyg-field/acf-wp_wysiwyg.php' ); 
        include_once( ACF__PLUGIN_PATH.'lib/advanced-custom-fields/add-ons/acf-taxonomy-field.php' );

    if ( ACF_ENVIRONMENT != 'development' ) {
        // If this is staging or production
            // load ACF declarations
            require_once(ACF__PLUGIN_PATH.'lib/advanced-custom-fields/register_fields.php'); 
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
require_once(ACF__PLUGIN_PATH.'lib/custom-post-types/cpt-product.php');

//REGISTER SHORTCODES
/* Include Custom Post Type Declarations */
require_once(ACF__PLUGIN_PATH.'lib/shortcodes/charts.php');

//ENQUEUE JAVASCRIPT AND STYLES
function jg_product_scripts(){
    wp_enqueue_script('chart', ACF__PLUGIN_DIR . 'lib/js/chart.js', array('jquery'), null, false);
}
add_action( 'wp_enqueue_scripts', 'jg_product_scripts' );
?>