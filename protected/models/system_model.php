<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class System_model extends CI_Model
{

    public function get_system_config($config = null)
    {
        $qry = $this->db->query('SELECT * FROM '.$this->db->dbprefix('config'));

        foreach($qry->result() as $row){
            return $row->$config;
        }

    }


}
