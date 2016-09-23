<?php
/**
 * Plugin Name: Custom Upload Directory
 * Plugin URI:  http://www.sujinc.com/
 * Description:
 * Version:     0.0.1
 * Author:      Sujin 수진 Choi
 * Author URI:  http://www.sujinc.com/
 * License:     GPLv2 or later
 * Text Domain: custom-upload-directory
 */

if ( !defined( "ABSPATH" ) ) {
	header( "Status: 403 Forbidden" );
	header( "HTTP/1.1 403 Forbidden" );
	exit();
}

# Definitions
if ( !defined( 'CULDIR_PLUGIN_NAME' ) ) {
	$basename = trim( dirname( plugin_basename( __FILE__ ) ), '/' );
	if ( !is_dir( WP_PLUGIN_DIR . '/' . $basename ) ) {
		$basename = explode( '/', $basename );
		$basename = array_pop( $basename );
	}

	define( 'CULDIR_PLUGIN_NAME', $basename );
}

if ( !defined( "CULDIR_PLUGIN_FILE_NAME" ) )
	define( "CULDIR_PLUGIN_FILE_NAME", basename(__FILE__) );

if ( !defined( "CULDIR_TEXTDOMAIN" ) )
	define( "CULDIR_TEXTDOMAIN", "custom-upload-directory" );

if ( !defined( 'CULDIR_PLUGIN_DIR' ) )
	define( 'CULDIR_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . CULDIR_PLUGIN_NAME . '/' );

if ( !defined( 'CULDIR_TEMPLATE_DIR' ) )
	define( 'CULDIR_TEMPLATE_DIR', CULDIR_PLUGIN_DIR . 'templates/' );

if ( !defined( 'CULDIR_ASSETS_URL' ) )
	define( 'CULDIR_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );

if ( !defined( 'CULDIR_VENDOR_URL' ) )
	define( 'CULDIR_VENDOR_URL', plugin_dir_url( __FILE__ ) . 'vendors/' );

if ( !defined( "CULDIR_VERSION_KEY" ) )
	define( "CULDIR_VERSION_KEY", "CULDIR_version" );

if ( !defined( "CULDIR_VERSION_NUM" ) )
	define( "CULDIR_VERSION_NUM", "0.0.1" );

# 가는거야~!
include_once( CULDIR_PLUGIN_DIR . "/autoload.php");
new CULDIR\Init();
