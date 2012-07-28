<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
$config = array(
    /**
     * Group Access
     * FORMAT:
     * <Controller>
     *      <function> => array (<group name> => <Allow Acces?>)
     * 
     */
     
	'member' => array (
		'index' => array ( 'guest' => TRUE,'member' => TRUE, 'administrator' => TRUE),
	    'dashboard' => array ( 'guest' => FALSE,'member' => TRUE, 'administrator' => TRUE),
        //'Index' => array ( 'guest' => TRUE,'member' => TRUE, 'administrator' => TRUE),         
	
	),
	'pages' => array (
		'home' => array ( 'guest' => TRUE,'member' => TRUE, 'administrator' => TRUE),
	    'about us' => array ( 'guest' => TRUE,'member' => TRUE, 'administrator' => TRUE),
        //'Index' => array ( 'guest' => TRUE,'member' => TRUE, 'administrator' => TRUE),         
	
	),



); /* Array End */
/* End of File */