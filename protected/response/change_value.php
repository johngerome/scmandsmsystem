<?php

class controller_change_value {
	
	function text($element_id,$current_value)
	{
		$ajax = CJAX::getInstance();
		
		$ajax->value($element_id,"Random number..".rand(100,1000));
	}
	
	
	function check($element_id,$current_value)
	{
		$ajax = CJAX::getInstance();
		
		if($current_value) {
			$ajax->value($element_id,0);
		} else {
			$ajax->value($element_id,1);
		}
	}
}