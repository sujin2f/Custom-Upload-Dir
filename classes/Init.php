<?php
/**
 * Init
 *
 * project    Custom Upload Directory
 * version    0.0.1
 * Author     Sujin 수진 Choi
 * Author URI http://www.sujinc.com/
*/

namespace CULDIR;

if ( !defined( "ABSPATH" ) ) {
	header( "Status: 403 Forbidden" );
	header( "HTTP/1.1 403 Forbidden" );
	exit();
}

class Init {
	public function __construct() {
		include_once( CULDIR_PLUGIN_DIR . 'vendors/wp-express/autoload.php' );

		add_action( 'after_setup_theme', array( $this, 'set_admin_menu' ) );
		add_filter( 'upload_dir',        array( $this, 'set_upload_dir' ) );
	}

	public function set_admin_menu() {
		$admin_menu = new \WE\AdminPage\Options( 'Custom Upload Dir' );

		$admin_menu->version = '0.0.1';
		$admin_menu->setting = 'Before Year and Month';
		$admin_menu->setting = 'After Year and Month';
	}

	public function set_upload_dir( $wp_upload_dir ) {
		$options = get_option( '_custom-upload-dir_', array() );

		if ( !empty( $options[ 'before-year-and-month' ] ) ) {
			$before = explode( '/', $options[ 'before-year-and-month' ] );
			$before = array_filter( $before );

			foreach( $before as $item ) {
				$wp_upload_dir[ 'basedir' ] .= "/$item";
				$wp_upload_dir[ 'baseurl' ] .= "/$item";
			}
		}

		$wp_upload_dir[ 'path' ] = $wp_upload_dir[ 'basedir' ] . $wp_upload_dir[ 'subdir' ];
		$wp_upload_dir[ 'url' ]  = $wp_upload_dir[ 'baseurl' ] . $wp_upload_dir[ 'subdir' ];

		return $wp_upload_dir;
	}
}
