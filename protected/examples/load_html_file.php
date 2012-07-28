<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";

$ajax = ajax();

//The simplest way to execute  a call

//load file "resources/html/test.html" into div
$ajax->call("resources/html/test.html","container1");
?>
<html>
<head>
<title>Load html file</title>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Load external HTML file</h2>
<br />

<div id='container1'></div>
<br />
<br />
<br />
Code used:
<?php 
echo $ajax->code("
\$ajax->call(\"resources/html/test.html\",\"container1\");
");?>
</body>
</html>
