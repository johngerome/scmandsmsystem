<?php

define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();

//parameterts use alphabetical characters to pass parameters to the controller function.


//sending parameters to the backend controller is simple. They go in alphabetical order.
//Exampe:  a will be the first paramenter, b the second, 3 the 3rd, and so on..

$parameters['a'] = 'Parameter 1';
$parameters['b'] = 'Parameter 2';
$parameters['c'] = 'Parameter 3';
$parameters['d'] = 'Parameter 4';
$ajax->call("../ajax.php?controller=parameters&function=send_params&".http_build_query($parameters));
?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Ajax send parameters</h2>
<div id='params'></div>
<br />
<br />
Code used:
<?php 
echo $ajax->code("
\$parameters['a'] = 'Parameter 1';
\$parameters['b'] = 'Parameter 2';
\$parameters['c'] = 'Parameter 3';
\$parameters['d'] = 'Parameter 4';
\$ajax->call(\"../ajax.php?controller=parameters&function=send_params&\".http_build_query(\$parameters));
");?>

</body>
</html>
