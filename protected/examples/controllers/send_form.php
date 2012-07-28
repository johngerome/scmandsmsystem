<?php

class controller_send_form {
	
	function submit_form($form_fields)
	{
		$ajax = ajax();
		
		$ajax->alert("Server Says....\n\nFields submitted: \n".print_r($form_fields,1));
	}
}