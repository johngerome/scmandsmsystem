<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- [START HEAD] -->
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Gerome" />
<!-- [TITLE] -->
<title><?php echo $this->config->item('site_name') ?> - Administration </title>

</head>
<!-- [END HEAD] -->


<body>
<div id="container">

<div id="headerContainer">
		<div id="topHeader">
        </div>
	</div>

	<div style="min-height: 300px;padding: 100px 0px 0px 0px;">
            <center>
            <br/>
            <?php 
            if(validation_errors() != false)
                echo errorMsg( validation_errors('<b>','</b> ')); 
            ?>
            
            <div id="loginCon">
            <?php include($content.'.php') ?>  
            </div>  
            </center>
    </div>    
    		
<div id="footerContainer">
       <p style="font-size: 10px;">&copy; <?php echo date('Y');?> Gerome</p>
</div>
</body>
</html>