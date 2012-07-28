<?php
/** ################################################################################################**   
* Copyright (c)  2008  CJ.   
* Permission is granted to copy, distribute and/or modify this document   
* under the terms of the GNU Free Documentation License, Version 1.2   
* or any later version published by the Free Software Foundation;   
* Provided 'as is' with no warranties, nor shall the autor be responsible for any mis-use of the same.     
* A copy of the license is included in the section entitled 'GNU Free Documentation License'.   
*   
*   CJAX  4.0                $     
*   ajax made easy with cjax                    
*   -- DO NOT REMOVE THIS --                    
*   -- AUTHOR COPYRIGHT MUST REMAIN INTACT -   
*   Written by: CJ Galindo                  
*   Website: https://github.com/cjax/Cjax-Framework                     $      
*   Email: cjxxi@msn.com    
*   Date: 2/12/2007                           $     
*   File Last Changed:  04/29/2012            $     
**####################################################################################################    */   


include 'core/cjax_config.php';
$ajax = CJAX::getInstance();

$headers = array();
if(function_exists('apache_request_headers')) {
	$headers = apache_request_headers();
} else {
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		$headers['X-Requested-With'] = $_SERVER['HTTP_X_REQUESTED_WITH'];
	}
}

if(!empty($headers)) {
	if(!isset($headers['X-Requested-With'])
		|| ($headers['X-Requested-With']!="CJAX FRAMEW0RK 4.0"
		&& $headers['X-Requested-With']!="XMLHttpRequest")) {
			
		if(count(array_keys(debug_backtrace(false))) == 1) {
			exit("Security Error. You cannot access this file directly.");
		}
	} else  if($ajax->loading()) {
		$ajax->clearCache();
		
		//this handles urls format  ?function/action if the requests aren't made directly to ajax.php.
		if(isset($_SERVER['QUERY_STRING']) && $query = $_SERVER['QUERY_STRING']) {
			$packet = explode("/",$query);
			if($packet && count(array_keys($packet)) >= 2 && $packet[0] && $packet[1]) {
				$ajax->loading(false);
				$_REQUEST['controller'] = $packet[0];
				$_REQUEST['function'] = $packet[1];
				$_REQUEST['cjax'] = time();
				unset($packet[0]);
				unset($packet[1]);
				if($packet){
					$params = array('a','b','c','d','e','f');
					do {
						$_REQUEST[current($params)] = current($packet);
					} while(next($packet) && next($params));
				}
				define('CJAX_RESPONSE', 1);
			}
		}
	}
}