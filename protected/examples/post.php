<?php

//define('AJAX_CD','examples/controllers');

require_once "../ajax.php";
$ajax = CJAX::getInstance();


//look inside controller/post.php for code that handles this request.

$params['hello']= 'world';
$params['world']= 'hello!';

$ajax->post = $params;
$ajax->call("../ajax.php?post/post_sample",'div_response');
?>
<html>
<head>
<?php echo $ajax->init();?>
</head>
<body>
<h2>Post variables using POST</h2>
POST:
<div id='div_response'></div>
<br />
code used:
<?php
echo $ajax->code("
\$params['hello']= 'world';
\$params['world']= 'hello!';

\$ajax->post = \$params;
\$ajax->call(\"../ajax.php?post/post_sample\",'div_response');
");
?>
</body>
</html>
