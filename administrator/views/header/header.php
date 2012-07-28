<?php


// media JAVASCRIPTS
// Location: /media/<media_name>/js
$media_javascripts = array(
    'js/jquery-1.7.1.min', 
	'js/jquery-1.7.1',
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
echo '<!-- Start GTemplates -->';
echo "\n";

//if(page_level_access() != true): return false; endif;
   // page_level_access();
  // if(page_level_access() != true): return false; endif;
?>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="John Gerome Baldonado" />
<!-- [TITLE] -->
<title><?php echo $this->config->item('site_name') ?> - Administration </title>
<?php
foreach ($media_javascripts as $scripts) {
	echo '<script type="text/javascript" src="' . $this->config->item('public_url') .
		'media/' . $scripts . '.js" ></script>';
	echo "\n";
}
echo '<!-- End of GTemplates -->';

/* End of File */
/* Location: application/views/include/header.inc */
