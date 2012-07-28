<?php

class controller_ajax_request {
	
	function on_the_fly()
	{
		$ajax = CJAX::getInstance();
		
		$ajax->update('container','This text was updated through ajax...');
		
		$ajax->wait(2);
		
		$ajax->update('container2','This text too...');
		
	}
}