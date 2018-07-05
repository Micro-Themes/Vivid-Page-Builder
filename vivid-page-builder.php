<?php
/*
Plugin Name: Vivid Page Builder
Plugin URI: https://www.microthemes.ca/vivid-page-builder-for-wordpress
Description: Vivid Page Builder by Micro Themes
Version: 1.0
Author: Micro Themes
Author URI: https://www.microthemes.ca
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

/* Do not access this file directly */
if ( !defined( 'WPINC' ) ) { die; }

/* Constants
------------------------------------------ */

/* Set plugin version constant. */
if ( !defined( 'VIVID_BASE_VERSION' ) ) {
	define( 'VIVID_BASE_VERSION', '1.0' );
}

/* Set constant path to the plugin directory. */
if ( !defined( 'VIVID_BASE_PATH' ) ) {
	define( 'VIVID_BASE_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
}

/* Set the constant path to the plugin directory URI. */
if ( !defined( 'VIVID_BASE_URI' ) ) {
	define( 'VIVID_BASE_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}

if ( !defined( 'VIVID_ASSETS_URL' ) ) {
  define( 'VIVID_ASSETS_URL', VIVID_BASE_URI . 'assets');
}

/* Includes
------------------------------------------ */

/* Functions */
require_once( VIVID_BASE_PATH . 'includes/functions.php' );

/* Page Builder */
if( is_admin() ){
	require_once( VIVID_BASE_PATH . 'includes/page-builder.php' );
}

require_once( VIVID_BASE_PATH . 'includes/front-end.php' );