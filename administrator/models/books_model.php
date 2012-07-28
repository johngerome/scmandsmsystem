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
	public function get_books($book_id = FALSE)
	{
    	if ($book_id === FALSE)
    	{
    		$query = $this->db->get('tbook');
    		return $query->result_array();
    	}
    	
    	$query = $this->db->get_where('tbook', array('book_id' => $book_id));
    	return $query->row_array();
	}
    
    
    
}
    




























/*
 * -------------
 * End Of File
 * --------------
 */