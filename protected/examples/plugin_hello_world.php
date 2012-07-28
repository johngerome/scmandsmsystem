<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();



$ajax->hello_world('this file is cjax/plugins/hello_world.js',' - you can pass unlimited parameters!');

?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<br />

<br/>
<br>

<br/>
<?php
echo $ajax->dialog("
Loads hello_world.js (cjax/plugins/hello_world.js). 

","Creating Javascript plugins for cjax");
?>

PHP Code used to call plugin:
<?php 
echo $ajax->code("\$ajax->hello_world('this file is cjax/plugins/hello_world.js',' - you can pass unlimited parameters!');");
?>

<br />
This is what hello_world.js looks like:
<?php 
echo $ajax->jsCode(
"
//cjax/plugins/hello_world.js
function hello_world(a,b,c)
{
	alert('HELLO_WORLD PLUGIN --   '+a+'  '+b+'  '+c);
}");
?>
</body>
</html>
