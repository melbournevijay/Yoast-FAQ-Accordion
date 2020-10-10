<?php 
/*
*
*	***** Yoast FAQ Accordion *****
*
*	This file initializes all YFA Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('YFA_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('YFA_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('YFA_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('YFA_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function yfa_register_core_css(){
wp_enqueue_style('yfa-core', YFA_CORE_CSS . 'yfa-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'yfa_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function yfa_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('yfa-core', YFA_CORE_JS . 'yfa-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'yfa_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( YFA_CORE_INC . 'yfa-core-functions.php' ) ) {
	require_once YFA_CORE_INC . 'yfa-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( YFA_CORE_INC . 'yfa-ajax-request.php' ) ) {
	require_once YFA_CORE_INC . 'yfa-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( YFA_CORE_INC . 'yfa-shortcodes.php' ) ) {
	require_once YFA_CORE_INC . 'yfa-shortcodes.php';
}