<?php

define('AJAX_CD','examples/controllers');

//core file, reference..
require_once "../ajax.php";
//initiate CJAX..
$ajax = CJAX::getInstance();


$ajax->Exec("button1",$ajax->call("../ajax.php?controller=change_value&function=text&a=text1&b=|text1|"));
$ajax->Exec("button2",$ajax->call("../ajax.php?controller=change_value&function=check&a=check1&b=|check1|"));

?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Set value from ajax response</h2>
<br />
Change any element value or content through Ajax requests, on the server side..
<br />
<br />
<input type='text' id='text1' value=''> 
<br />
<input type='submit' id='button1' value='Change value'>
<br />
<br />
<br />
<input type='checkbox' id='check1' />
<br />
<input type='submit' id='button2' value='Change value'>
<br />
Code used:
<?php 
echo $ajax->code("
\$ajax->Exec(\"button1\",\$ajax->call(\"../ajax.php?controller=change_value&function=text&a=text1&b=|text1|\"));

\$ajax->Exec(\"button2\",\$ajax->call(\"../ajax.php?controller=change_value&function=check&a=check1&b=|check1|\"));
");?>
Controller:
<?php 
echo $ajax->code("
class controller_change_value {
	
	function text(\$element_id,\$current_value)
	{
		\$ajax = CJAX::getInstance();
		
		\$ajax->value(\$element_id,\"Random number..\".rand(100,1000));
	}
	
	
	function check(\$element_id,\$current_value)
	{
		\$ajax = CJAX::getInstance();
		
		if(\$current_value) {
			\$ajax->value(\$element_id,0);
		} else {
			\$ajax->value(\$element_id,1);
		}
	}
}
");?>
</body>
</html>
