<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();

$ajax->Exec("button1",$ajax->call("../ajax.php?click_ajax_request/click_button/Hello!"));
?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Simple ajax request binded to a button</h2>
<input type='button' id='button1' value='Click this button to make an ajax request'>
<br />
<br />
<br />
<br />
Code Used:
<?php
echo $ajax->code("
\$ajax->Exec(\"button1\",\$ajax->call(\"../ajax.php?click_ajax_request/click_button/Hello!\"));
");
?>
</body>
</html>
