<?php

class controller_update_content  {

	function update_box()
	{
		
		$ajax = CJAX::getInstance();
		
		$text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
		
		$ajax->update('content1',$text);
	}
	
	function update()
	{
		$ajax = CJAX ::getInstance();
		$i = 0;
		while($i != 5 ){
			$i++;
			
			$ajax->update("content$i","Updated");
			
		}
		
	}
	
	function update_boxes()
	{
		$ajax = CJAX ::getInstance();
		$ajax->update("box1"," Time is: <br />".$ajax->date(time(),"detail"));
		$ajax->update("box2"," IP is: <br />".$_SERVER['REMOTE_ADDR']);
		$ajax->update("box3"," Server is: <br />".$_SERVER['SERVER_SOFTWARE']);
		$ajax->update("box4"," Agent: <br />".$_SERVER['HTTP_USER_AGENT']);
		$ajax->update("box5"," Php version: <br />".phpversion());
		
		
		$ajax->wait(5);
		$ajax->alert("hello,  this is a test from the server");
		
		$ajax->wait(2);
		$ajax->call("test.html","box3");
		$ajax->wait(3);
		$ajax->call("test.html","box4");
		$ajax->wait(4);
		$ajax->call("test.html","box5");
		
		$ajax->wait(2);
		
		
		$ajax->wait(4);
		
		
		
		
				
		$ajax->message($ajax->format->message('test message... will dissappear in 2 seconds'),5);
		
		
		
	}
	
}