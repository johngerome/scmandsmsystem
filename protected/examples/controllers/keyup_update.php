<?php

class controller_keyup_update {
	
	function update($text)
	{
		$ajax = ajax();
		
		$ajax->update('div_response', $text);
	}
}