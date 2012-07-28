<?php

class controller_recursive_ajax {
	
	function call($counter = 0)
	{
		$counter++;
		
		$ajax = ajax();
		
		//update div
		$ajax->update("div_counter","Call# $counter..");
		
		if($counter>=20) {
			$ajax->update("div_counter","$counter recursive AJAX requests were made.");
		} else {
		
			//fire call
			$ajax->call("../ajax.php?recursive_ajax/call/$counter");
		}

	}
	
}