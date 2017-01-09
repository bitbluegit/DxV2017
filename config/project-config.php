<?php 


$GLOBALS['DX'] = array(
	'session_name' => 'DxV2017.01'
	);

//  Database Config 
$GLOBALS['DX_DB'] = array(
	'host' => 'localhost',
	'user' => 'root',
	'pwd'  => '',
	'db_name' => 'test',
	'db_persistent' => false
	);


//  Database Config 
$GLOBALS['DX_ERROR'] = array(
	'error_type' => E_ALL
	);


//  DX_ERROR Config 
$GLOBALS['DX_ERROR'] = array(
	'error_type' => E_ALL
	);


//  DATETIME Config 
$GLOBALS['DX_DATETIME'] = array(
	'timezone' => 'Asia/Kolkata',
		'date_format' => 'd/m/Y', // [d: 01-31] [m: 01-12] [y: YYYY(2017)]
		'date_time_format'=>  'd/m/Y h:i:s A', //  26-02-2017 10:20:07 AM ,[h: 01-12] [i: 00-59] [s: 00-59] [A: AM or PM ] [a: am or pm ]
		'db_date_format' => 'Y-m-d',
		'db_date_time_format' => 'Y-m-d H:i:s' //  26-02-2017 21:20:07  ,  [H: 00-23] 
		);

$GLOBALS['MEDIUM'] = array( 'English','Hindi','Marathi');

$GLOBALS['STD'] = array( 'nursery','junior.kg','senior.kg','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth','Mr.dextro' );