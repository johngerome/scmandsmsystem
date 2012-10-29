<?php


	/**
	 *  Load Configuration Using Database
	 */
	function load_config()
	{
	   
		$CI = &get_instance();
        $query = $CI->db->query('SELECT time_zone FROM '.$CI->db->dbprefix('config').' WHERE id = 0');
        
        foreach($query->result() as $config){
            return $config->time_zone;
        }
	    
	}

    date_default_timezone_set(load_config());








