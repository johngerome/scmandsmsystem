<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();

//call method ajax_request::on_the_fly()  in controllers/ajax_request.php
$ajax->Exec("button1",$ajax->call("../ajax.php?recursive_ajax/call"));
?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
Recursive ajax requests
<br />
<br />
<input type='submit' id='button1' value ='Start recursive requests'/>
<div id='div_counter'></div>
<br />
<br />
<br />
Code used:
<?php
echo $ajax->code("
\$ajax->Exec(\"button1\",\$ajax->call(\"../ajax.php?recursive_ajax/call\"));
");
?>

Controller:
<?php
echo $ajax->code("
class controller_recursive_ajax {
	
	function call(\$counter = 0)
	{
		\$counter++;
		
		\$ajax = ajax();
		
		//update div
		\$ajax->update(\"div_counter\",\"Call# \$counter..\");
		
		if(\$counter>=20) {
			\$ajax->update(\"div_counter\",\"\$counter recursive AJAX requests were made.\");
		} else {
		
		//fire call
			\$ajax->call(\"../ajax.php?recursive_ajax/call/\$counter\");
		}

	}
	
}
");
?>
</body>
</html>
