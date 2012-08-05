<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class Logs
{

	var $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}


	/**
	 * Write Login Log to Database
	 * @param status
	 */
	public function write_login($param = false,$username = false)
	{
		$query = $this->CI->db->get($this->CI->db->dbprefix('account'));

		if(!empty($param)) {
			$data = array('username' => $username,
				'datetime' => date('Y-m-d H:i:s'), 'ip_address' => $this->CI->input->ip_address
				(), 'status' => $param);
			$this->CI->db->insert($this->CI->db->dbprefix('logs_login'), $data);
		}
	}


}
/* End of File */
/* Location: application/libraries/logs.php */
