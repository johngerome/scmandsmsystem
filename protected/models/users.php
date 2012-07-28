<?php

    class Books_model extends CI_Model {
    
    	public function __construct()
    	{
    		$this->load->database();
    	}
        
   	/*
	|---------------------------------------
	|
	|---------------------------------------
	*/
	public function get_books($slug = FALSE)
	{
    	if ($slug === FALSE)
    	{
    		$query = $this->db->get('tbook');
    		return $query->result_array();
    	}
    	
    	$query = $this->db->get_where('book_id', array('slug' => $slug));
    	return $query->row_array();
	}
    
    
    
}
    




























/*
 * -------------
 * End Of File
 * --------------
 */