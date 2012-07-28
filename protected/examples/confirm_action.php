<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();

//displays a confirmation box before executing an ajax call.

$ajax->Exec("button1",$ajax->call("../ajax.php?controller=confirm&function=confirm_action",null,"Are you sure?"));
?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Confirm  before firing ajax request</h2>
<input type='submit' id='button1' value='Click this button to confirm'>
<br />
<br />
<br />
Code Used:
<?php 

echo $ajax->code("
\$ajax->Exec(\"button1\",\$ajax->call(\"../ajax.php?controller=confirm&function=confirm_action\",null,\"Are you sure?\"));
");
?>

</body>
</html>
