<?php
/**
 * Custom Upload Dir
 *
 * @author  Sujin 수진 Choi
 * @package custom-upload-directory
 * @version 0.0.1
 * @website https://www.facebook.com/WP-developer-Sujin-1182629808428000/
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice
 */

if ( !function_exists( 'CULDIR' ) ) {
	function CULDIR() {
		spl_autoload_register( function( $className ) {
			$namespace = 'CULDIR\\';
			if ( stripos( $className, $namespace ) === false ) {
				return;
			}

			$sourceDir = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR;
			$fileName  = str_replace( array( $namespace, '\\' ), array( $sourceDir, DIRECTORY_SEPARATOR ), $className ) . '.php';

			if ( is_readable( $fileName ) ) {
				include $fileName;
			}
		});
	}

	CULDIR();
}