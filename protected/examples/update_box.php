<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();

$ajax->Exec("button1",$ajax->call("../ajax.php?controller=update_content&function=update_box"));
?>
<html>
<head>
<?php echo $ajax->init();?>
<style>
.box {
	position:relative;
	overflow: auto;
	width: 200px;
	height: 200px;
	margin-right:1px;
	background-color: #CEFFCE;
}
</style>
</head>
<body>
<input type='submit' id='button1' value='Update box below with content'>

<div class='box' id='content1'></div>
</body>
</html>
