<?php 
/*

Plugin Name: WordPress Essentials - RDO
Description: WordPress Essentials - RDO
Author: Robin O'List
Version: 1.0.1

*/


include_once( plugin_dir_path( __FILE__ ) . 'updater.php');
// instantiate and initialize the plugin updater class
$updater = new Rdo_Updater( __FILE__ ); 
$updater->set_username( 'savvymarcom' ); 
$updater->set_repository( 'rdo-wp-essentials' ); 
$updater->initialize(); 

if ( ! defined( 'RDOAYN_FILE' ) ) {
    define( 'RDOAYN_FILE', __FILE__ );
}

define( 'RDOAYN_VERSION', '1.01' );

if ( ! defined( 'RDOAYN_PATH' ) ) {
    define( 'RDOAYN_PATH', plugin_dir_path( RDOAYN_FILE ) );
}

if ( ! defined( 'RDOAYN_DIRURL' ) ) {
    define( 'RDOAYN_DIRURL', plugin_dir_url( RDOAYN_FILE ) );
}

if ( ! defined( 'RDOAYN_BASENAME' ) ) {
    define( 'RDOAYN_BASENAME', plugin_basename( RDOAYN_FILE ) );  
}


// Disable XML-RPC RSD link from WordPress Header
remove_action ('wp_head', 'rsd_link');

// Remove WordPress version number
function rdoayn_remove_version() {
	return '';
}
add_filter('the_generator', 'rdoayn_remove_version');

// Remove wlwmanifest link
remove_action( 'wp_head', 'wlwmanifest_link');

// Remove shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// Remove api.w.org relation link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
