<?php

 if (!defined('BASEPATH')) exit('No direct script access allowed');
 class Account extends CI_Controller
 {
     public function __construct()
     {
         parent::__construct();
         $this->load->model('account_model');

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
         //$data['error'] = '';
         // Hide Main Menu
         //$data['hide_menu'] = true;
         //  BreadCrumbs
         //$this->gtemplate->set_breadCrumbs(false);
        
         /* Form Validation */
         $this->_username = $this->input->post('username');
         $this->_password = $this->input->post('password');
         $this->form_validation->set_rules('username', 'Username',
             'required|xss_clean|callback_check_login[' . $this->_password . ']');
         $this->form_validation->set_rules('password', 'Password',
             'required|min_length[1]|max_length[12]|xss_clean');

         /* End of Loading */
         /*=========================================================*/


         if ($this->account_model->is_logged_in() === TRUE)
         {
             //if user is currently logged in Show User Dashboard
             redirect('account/dashboard');
         }

         //Check Validation..
         if ($this->form_validation->run() == FALSE)
         {
             // if the user Enter wrong information back to login page
             // Write Login Logs
             $this->logs->write_login(validation_errors(' ', ' '), $this->_username);
             // View Login Page
             $this->load->view('views/account/login');
         }
         else
         {

             if ($this->account_model->login($this->_username, $this->_password) == TRUE)
             {
                 /* if Registered Go Here.. */
                 // set Session
                 $this->account_model->set_login_session();
                 // Write login logs to ok
                 $this->logs->write_login('ok',$this->_username);
                 //$this->registry->set_user_email($this->input->post('email_address'));
                 redirect($this->input->post('return_url'));

             }
             else
             {
                 /* Incorrect Credentials */
                 // $this->load->view(load_template(), array('content' => 'account/login','error' => 'Incorrect Email Address or Password'));
                 //$this->form_validation->set_message('check_login', $this->account_model->login($this->_username, $this->_password));
                 $this->load->view('views/account/login');
             }
         }
     }

     /**
      * Check Username and Password
      * @param String
      * @return Boolean
      * 
      * Username = Post
      * Password = Post
      */
     public function check_login($username, $password)
     {
       
         if ($this->account_model->login($username, $password) == FALSE)
         {
             $this->form_validation->set_message('check_login', $this->gtemplate->get_errorMsg());
             return FALSE;
         }
         else
         {
             return TRUE;
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
