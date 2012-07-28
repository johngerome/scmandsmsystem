<?php

define('AJAX_CD','examples/controllers');

//core file, reference..
require_once "../ajax.php";
//initiate CJAX..
$ajax = ajax();

// 1. test field
// 2. URL to be requested.
// 3. Event. onKeyUp event is used.
$ajax->Exec("text1", $ajax->call("../ajax.php?keyup_update/update/|text1|") ,"keyup");

?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Keyup ajax request</h2>
<br />
Basically send an ajax request to the server every time you type something..
<br />
<br />
Type Something... <input type='text' id='text1'>
<br />
<div id='div_response'></div>
</body>
</html>
