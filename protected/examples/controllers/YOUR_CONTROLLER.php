<?php

class controller_YOUR_CONTROLLER {
	
	function METHOD($parameter1,$parameter2)
	{
		
		$ajax = CJAX::getInstance();
		
		
		$ajax->update("my_link","Request was made...");
	}
}