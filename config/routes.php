<?php

define('SITE_ROOT',str_replace('\\', '/', dirname(dirname(__FILE__))));
define('VIRTUAL_LOCATION',array_pop(explode('/', SITE_ROOT)));


 // $requires = array(
 // 	'DX_FILE_PATH' => array('session'),
 // 	'DX_DIR_PATH' => array()
 // 	);

 // $requires['DX_FILE_PATH'] =array('session'); 
 // foreach ($requires as $key => $path) {
 // 	require_once($GLOBALS[$key][$path]);	
 // }


$GLOBALS['DX_DIR_PATH'] = array(
    // 'site_root' => str_replace('\\', '/', dirname(dirname(__FILE__))),
    // 'virtual_location' => array_pop(explode('/', SITE_ROOT))  // virtual project root relative to server root

	);

$GLOBALS['DX_FILE_PATH'] = array(
	'default_page' => VIRTUAL_LOCATION . '/index.php',
	'session' => VIRTUAL_LOCATION . '/helper/session.php',
	);

$GLOBALS['DX_CSS'] = array(
	'bricks' => VIRTUAL_LOCATION . 'assets\css\vendor'
	);


// define(DX_JS, [

// 	]);








