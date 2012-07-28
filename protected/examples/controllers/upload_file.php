<?php

class controller_upload_file {

	
	function send_file($file_names = null)
	{
		$ajax = CJAX::getInstance();
		$dir = realpath(dirname(__file__).'/../'); //directory where the file is uploaded..
		
		//POST FILE
		if($_FILES || $ajax->get('cjax_iframe')) {
			if(!is_writable($dir)) {
				return $ajax->overlayContent("Directory $dir is not writeable.\nPermission denied.<br /> (chmod $dir 777) or make sure the directory exists.");
			}
			
			//$ajax->overlay(null,"<pre>".print_r($_FILES,1));
			//return;
		

			if(empty($_FILES)) {
				return $ajax->overlay("../ajax.php?controller=upload_file&function=error&cjax_dir=examples");
			}
			$file = $_FILES['my_file'];
			if(!$file['name']) {
				exit('error');
			}
			
			$temp = (($file['tmp_name'])?$file['tmp_name']:null);

			$temp = trim($temp,DIRECTORY_SEPARATOR);
			if(@move_uploaded_file($temp,$dir.'/'.$file['name'])) {
				$ajax->success("File uploaded..",10);
			} else {
				$ajax->warning("Could not move file");
			}
		} else if ($ajax->request()) {
			$ajax->process("Uploading file..",1000);
			//Ajax request
			//PRE-POST FILE
			if(!$_REQUEST['my_file']) {
				$ajax->warning("Please select a file");
				$ajax->focus('my_file');
				exit();
			}
			
		}
	}
	
	
	function error()
	{
		
		$upload_max = $ajax->toMB(ini_get('upload_max_filesize'));
		$post_max = $ajax->toMB($pmax = ini_get('post_max_size'));// / 2;
		$max_size = ($upload_max < $post_max) ? $upload_max : $post_max;
		$cause = ($upload_max < $post_max) ? "upload_max_filesize " : "post_max_size ";
		
		echo "Could not upload file. This server limits max upload to {$max_size}MB ($cause in php.ini). ";
		
	}
	
}