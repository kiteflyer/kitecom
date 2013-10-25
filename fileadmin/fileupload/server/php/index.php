<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');


//$place = $_REQUEST['place'];

//$house = '63240788A1F9624EBEA17082B5CD0D88';

if ($_REQUEST['uid'])
$uid = $_REQUEST['uid'];

if ($_REQUEST['cat'])
$cat = $_REQUEST['cat'];

if ($_REQUEST['user'])
$user = $_REQUEST['user'];

if ($_REQUEST['section'])
$section = $_REQUEST['section'];
	
$upload_dir = $user.'/'.$cat.'/'.$uid.'/'.$section.'/';
$upload_url = 'fileadmin/fileupload/server/php/'.$user.'/'.$cat.'/'.$uid.'/'.$section.'/';


if ($section == 'hauptbild'){
	$options = array(
	    'upload_dir' => $upload_dir,
	    'upload_url' => $upload_url,
	    'image_versions' => array(
	        'imageview' => array(
	            'upload_dir' => $upload_dir.'imageview/',
	            'upload_url' => $upload_url.'imageview/',
	            'max_width' => 246,
	            'max_height' => 165,
	            'jpeg_quality' => 100,
				'crop'=>true	            	            
	        ),
	        'listview' => array(
	            'upload_dir' => $upload_dir.'listview/',
	            'upload_url' => $upload_url.'listview/',
	            'max_width' => 100,
	            'max_height' => 100,
	            'jpeg_quality' => 100,	            
				'crop'=>true	            
	        ),	        
	    ),
	    
	    'database' => 'barbatt_kitecom2013',  
		'host' => 'barbatt.mysql.db.internal',  
		'username' => 'barbatt_t3d',  
		'password' => '$more5ekur4All', 
		'cat' => $cat,
		'uid' => $uid,
		'user' => $user,
		'section' => $section,	    	    
		'cat' => $cat,
		'uid' => $uid,
		'user' => $user,
		'section' => $section,	    
	    
	);	
}



if ($section == 'gallery') {
	$options = array(
	    'upload_dir' => $upload_dir,
	    'upload_url' => $upload_url,
	    'image_versions' => array(  
	    ),
	    'database' => 'barbatt_kitecom2013',  
		'host' => 'barbatt.mysql.db.internal',  
		'username' => 'barbatt_t3d',  
		'password' => '$more5ekur4All', 
		'cat' => $cat,
		'uid' => $uid,
		'user' => $user,
		'section' => $section,	    
	);
}


switch ($_SERVER['HTTP_HOST']) {
	case 'kitecom.site':
		$options['database'] = 't3_kitecom_2013';
		$options['host'] = 'localhost';
		$options['username'] = 'root';		
		$options['password'] = 'mysqlroot';		
		break;

}
	

	$upload_handler = new UploadHandler($options);


