<?php
	
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		
		if($username == 'demo' && $password == 'demo')
		{
			echo 'success';
            session_start();
            $_SESSION['username']= $username;
            $_SESSION['logged_in']= TRUE;
		}
	}
    session_start();
            $_SESSION['username']= $username;
            $_SESSION['logged_in']= TRUE;
    echo $_SESSION['logged_in'];
?>