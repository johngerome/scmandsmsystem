<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();


//timeout 5 seconds
$ajax->wait(5);

//alert after the 5 seconds
$ajax->alert("5 seconds passed before displaying this.");

//update the content on the page
$ajax->update('wait_div','wait 3 more..');

//wait 3 more seconds
$ajax->wait(3);

//display a message in the middle of the screen, in warning format
$ajax->warning("3 more seconds passed before displaying this.");

//wait 2 more seconds
$ajax->wait(2);

//update page content
$ajax->update('wait_div','This was a timeout example..');

?>
<html>
<head>
<title>Timeout...</title>
<?php echo $ajax->init();?>
</head>
<body>
<div id='wait_div'>
Please wait.. (5 seconds )
</div>
</body>
</html>
