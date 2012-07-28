<?php

class controller_post {
	
	
	function post_sample()
	{
		echo '<pre>'.print_r($_POST,1).'</pre>';
	}
}