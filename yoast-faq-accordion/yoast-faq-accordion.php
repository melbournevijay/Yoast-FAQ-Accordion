<?php 
/*
Plugin Name: Yoast FAQ Accordion
Plugin URI: https://vjdesign.com.au/faq-accordion-plugin/
Description: FAQs can be displayed as an interactive accordion i.e. collapsible content. The answers can be shown or hidden by clicking on the questions. Important - Ensure that the Yoast SEO plugin is installed and activated.
Version: 1.1
Author: VJ Design
Author URI: https://vjdesign.com.au/
Text Domain: vj
License:     GPL v3

 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

function is_yoast_active() {
    $active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

    foreach ( $active_plugins as $plugin ) {
        if ( strpos( $plugin, 'wp-seo' ) ) {
            return true;
        }
    }

    return false;
}

if(is_yoast_active()) {
    // Let's Initialize Everything
     
    // Define Our Constants
    define('VJ_CORE_CSS',plugins_url( '/', __FILE__ ));
    define('VJ_CORE_JS',plugins_url( '/', __FILE__ ));
    
    // Register CSS
    function vj_register_core_css(){
        wp_enqueue_style('vj-core', VJ_CORE_CSS . 'vj-core.css',null,time(),'all');
    };
    add_action( 'wp_enqueue_scripts', 'vj_register_core_css' );    
    // Register JS/Jquery Ready
    
    function vj_register_core_js(){
    // Register Core Plugin JS	
        wp_enqueue_script('vj-core', VJ_CORE_JS . 'vj-core.js','',time(),true);
    };
    add_action( 'wp_enqueue_scripts', 'vj_register_core_js' );    


} else {
    add_action( 'admin_notices', 'vj_admin_notice__error' );
}


function vj_admin_notice__error() {
    $class = 'notice notice-error';
    $message = __( 'Ensure that Yoast SEO plugin is installed and activated.', 'vj' );
 
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}

