<?php
/**
 * X-elFinder module for XCL
 * @package    XelFinder
 * @version    XCL 2.3.1
 * @author     Naoki Sawada (aka Nao-pon) <https://github.com/nao-pon>
 * @copyright  (c) 2005-2022 Author
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

define( 'XELFINDER_CACHE_TTL', 86400 );
define( 'XELFINDER_UNIX_TIME', ( isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time() ) );

$mytrustdirname = basename( __DIR__ );
$mytrustdirpath = __DIR__;

// fork each pages

// For XCL 2.2 Cool URI
if ( isset( $_GET['requested_data_name'] ) ) {
	$_GET['page'] = $_GET['requested_data_name'];
}
if ( isset( $_GET['requested_action_name'] ) && $_GET['requested_data_id'] ) {
	if ( 'tmb' === $_GET['page'] ) {
		$_GET['s']    = $_GET['requested_data_id'];
		$_GET['file'] = $_GET['requested_action_name'];
	} else {
		$_GET['file'] = $_GET['requested_data_id'];
	}
} else {
	if ( isset( $_GET['requested_data_id'] ) ) {
		$_GET['file'] = $_GET['requested_data_id'];
	}
}

$page = preg_replace( '/[^a-zA-Z0-9_-]/', '', @$_GET['page'] );

if ( '' === $page && ! empty( $_SERVER['PATH_INFO'] ) ) {
	$path_info = trim( $_SERVER['PATH_INFO'], '/' );
	[ $page ] = explode( '/', $path_info );
}
if ( $page && file_exists( "$mytrustdirpath/main/$page.php" ) ) {
	include "$mytrustdirpath/main/$page.php";
} else {
	// initialize language manager
	$langmanpath = XOOPS_TRUST_PATH . '/libs/altsys/class/D3LanguageManager.class.php';
	if ( ! file_exists( $langmanpath ) ) {
		die( 'install the latest altsys' );
	}
	require_once( $langmanpath );
	$langman = D3LanguageManager::getInstance();
	$langman->read( 'main.php', $mydirname, $mytrustdirname );
	include "$mytrustdirpath/main/index.php";
}
