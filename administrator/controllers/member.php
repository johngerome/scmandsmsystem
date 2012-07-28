<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('account_model');
		 // CJAX
        $this->load->file(FCPATH.'ajaxfw.php');

	}

	/**
	 * Member Management
	 * 
	 * @page   Member
	 * @access Admin
	 */
	public function index()
	{

		// load Toolbar
		$this->gtemplate->set_toolbar('member_index');
		// set heading
		$this->gtemplate->HeadingTitle($this->lang->line('heading_member_management'));

		//$this->load->view(load_template(), array('content' => 'member/index'));
        $this->gtemplate->load_view('member/index');

	}


	/**
	 * Add new Account
	 * 
	 * @page   member/create
	 * @access Admin
	 */
	public function create()
	{

		// Heading Title
		$this->gtemplate->HeadingTitle($this->lang->line('add_new_account'));
       //$this->gtemplate->load_view('member/create');

		if($this->input->post('member')) {
			// set Rules Rules Validation for Creating Account
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|min_length[3]|xss_clean');
			$this->form_validation->set_rules('password2', 'Password Confirmation',
				'required|matches[password]|max_length[32]|min_length[3]|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|valid_email|is_unique[' .
				$this->db->dbprefix('member') . '.email_address]');
			$this->form_validation->set_rules('first_name', 'First Name',
				'required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
			$this->form_validation->set_rules('middle_initial', 'Middle Initial',
				'alpha|required|exact_length[1]|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('phone_number', 'Phone Number',
				'exact_length[12]|xss_clean');
			$this->form_validation->set_rules('cell_number', 'Cell Number',
				'numeric|exact_length[12]|xss_clean');

			// Check Rules And Validate Form
			if($this->form_validation->run() === false) {
			// If there''s an Error View Page it self.
             $this->gtemplate->load_view('member/create');
			} else {
				// Save New Member Data
				$this->member_model->saveData();
				redirect('member');
			}
		} else {
			//$this->load->view(load_template(), array('content' => 'member/index'));
            $this->gtemplate->load_view('member/create');
		}
	}


	/**
	 *  CHeck if the Phone is Valid
	 *  .. Removed
	 */
	function valid_phone($phone_number)
	{
		if(!is_numeric($phone_number)) {
			$this->form_validation->set_message('phone_number', 'Invalid Phone Number');
		}
	}


	/**
	 * @access Admin
	 */
	public function view()
	{
		echo $this->pagination->create_links();
	}


} // End Class
// End of File
