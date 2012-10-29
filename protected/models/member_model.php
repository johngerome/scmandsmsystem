<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Member_model extends CI_Model
{

	public function __construct()
	{
		//$this->load->database();
		$this->tbl_group = $this->db->dbprefix('group');
	}

	/**
	 * Save New Member Data
	 * 
	 */
	public function saveData()
	{
		$temp_data = array('email_address' => $this->input->post('email'),
			'password' => $this->encrypt->encode($this->input->post('password')),
			'first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post
			('last_name'), 'middle_initial' => $this->input->post('middle_initial'),
			'address' => $this->input->post('address'), 'phone_number' => $this->input->post
			('phone_number'), 'cell_number' => $this->input->post('cell_number'),
			'register_date' => date('Y-m-d H:i:s'), 'ip_address' => $this->input->ip_address
			(), 'group_id' => $this->input->post('Group'), 'send_email' => $this->input->post
			('confirmation_email'));
		$this->db->insert($this->db->dbprefix('member'), $temp_data);
	}

	/**
	 * @populate Group ID and Name
	 * 
	 */
	public function get_group()
	{
		$group = array();
		$this->db->select('*');
		$this->db->from($this->tbl_group);
		$this->db->order_by('name', 'DESC');
		$query = $this->db->get();


		foreach ($query->result() as $row) {
			$group[$row->group_id] = $row->name;
		}
		return $group;
	}

	/**
	 * @get Group Name
	 * @return Group Name
	 * @param Group ID
	 */
	public function get_groupName($param)
	{
		$this->db->select('*');
		$query = $this->db->get_where($this->tbl_group, array('group_id' => $param));

		$row = $query->row();
		return $row->name;
	}

} // End Class ------------
// End Of File ------------
