<?php


// media JAVASCRIPTS
// Location: /media/<media_name>/js
$media_javascripts = array(
    //'js/jquery-1.7.1.min', 
	//'js/jquery-1.7.1',
    //'js/dragdrop', 
   // 'js/controls', 
   // 'js/scriptaculous',
   //'js/slider', 
   // 'js/form_links', 
   //'js/prototype',
    

    
);






/*===================================================================*/
/* Dont Touch Beyond this Line */

// Load Media Javascripts
// Location: media/
echo "\n";
//if(page_level_access() != true): return false; endif;
   // page_level_access();
  // if(page_level_access() != true): return false; endif;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Supply Chain Management and Sales Monitoring System for JEF Enterprises" />
<meta name="keywords" content="" />
<meta name="author" content="John Gerome Baldonado" />
<!-- [TITLE] -->
<title><?php echo $this->config->item('site_name') ?> - Administration </title>
<?php
/* foreach ($media_javascripts as $scripts) {
	echo '<script type="text/javascript" src="' . $this->config->base_url() .
		'media/' . $scripts . '.js" ></script>';
	echo "\n";
}
*/
?>
