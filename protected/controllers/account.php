<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Account extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model');
        // CJAX
        $this->load->file(FCPATH.'ajaxfw.php');
        
        
        
	}

	public function index()
	{
        // set heading
	   $this->gtemplate->HeadingTitle($this->lang->line('heading_my_dashboard')); 

       $this->gtemplate->load_view('account/index');
    
	}
    



	/**
	 * member/login
	 * @access Anyone,Member/Registered,Administrator
	 */
	function login()
	{
	   /*=========================================================*/
        /* Load or Initialize Everything Here */
        // Hide Error Division
		$data['error'] = '';
        // Hide Main Menu
		$data['hide_menu'] = true; 
         //  BreadCrumbs
		$this->gtemplate->set_breadCrumbs(false);
        
        
		/* Form Validation */
		$this->form_validation->set_rules('email_address', 'Email Address',
			'valid_email|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]|max_length[12]|xss_clean');
		$this->_email_address = $this->input->post('email_address');
		$this->_password = $this->input->post('password');
        /* End of Loading */
        /*=========================================================*/
        
        
        if($this->account_model->is_logged_in() === true) {
			//if user is currently logged in Show User Dashboard
			redirect('account/dashboard');
		}
		// if the user Enter wrong information back to login page
		if($this->form_validation->run() == false) {
			// Write Login Logs
			$this->logs->write_login(validation_errors());
			// View Login Page
            $this->gtemplate->load_view('account/login');
		}
		else {

			if($this->account_model->login() == true) {
				/* if Registered Go Here.. */
				$this->account_model->set_login_session(); // set Session
                // Write login logs to ok
				$this->logs->write_login('ok');
				//$this->registry->set_user_email($this->input->post('email_address'));
				redirect($this->input->post('return_url'));
			}
			else {
				/* Incorrect Credentials */
               // $this->load->view(load_template(), array('content' => 'account/login','error' => 'Incorrect Email Address or Password'));
                $this->gtemplate->load_view('account/login');
			}
		}
	}


	/**
	 * Logout
	 * @access member/Registered
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}


	/**
	 * My Profile
	 * @access member/Registered
	 */
	public function my_profile()
	{
        // set heading
		$this->gtemplate->HeadingTitle($this->lang->line('heading_my_profile')); 

         $this->gtemplate->load_view('account/my_profile');
         
	}
}


/* End of File */
/* location: application/controllers/account.php */
