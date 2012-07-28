<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();

//call method ajax_request::on_the_fly()  in controllers/ajax_request.php
$ajax->call("../ajax.php?controller=ajax_request&function=on_the_fly");
?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Fire Ajax request on load & do other actions</h2>
<div id='container'></div>
<br />
<br />
<div id='container2'></div>
<br />
<br />
<br />
Code used:
<?php 
echo $ajax->code("
\$ajax->call(\"../ajax.php?controller=ajax_request&function=on_the_fly\");
");?>
<br />
<br />
<br />
Controller:
<?php 

echo $ajax->code("
class controller_ajax_request {
	
	function on_the_fly()
	{
		\$ajax = CJAX::getInstance();
		
		\$ajax->update('container','This text was updated through ajax...');
		
		\$ajax->wait(2);
		
		\$ajax->update('container2','This text too...');
		
	}
}
");
?>

</body>
</html>
