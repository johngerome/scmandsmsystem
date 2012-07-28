<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class Global_Configuration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('account_model');
		// BreadCrumb
		$this->registry->set_breadCrumbs(true);

	}

	public function index()
	{

		// set heading
		$this->registry->HeadingTitle($this->lang->line('global_configuration'));
        
        // Set Content
        $data['content'] = 'global_configuration/index';
 	    //$this->load->view('index',$data);
        $this->gtemplate->load_view('index');
	}

	public function site()
	{

		// load Toolbar
		$this->gtemplate->set_toolbar('global_configuration_index');
		// set heading
		$this->registry->HeadingTitle($this->lang->line('global_configuration') .
			' : [' . $this->lang->line('site') . ']');
            
	//	$this->load->view('index',$data);
         $this->gtemplate->load_view('global_configuration/site');
	}

	public function system()
	{

		// load Toolbar
		$this->gtemplate->set_toolbar('global_configuration_system');
		// set heading
		$this->registry->HeadingTitle($this->lang->line('global_configuration') .
			' : [' . $this->lang->line('system') . ']');
            
        $this->gtemplate->load_view('global_configuration/system');
	}

}
/* End of File */
/* Location: application/controllers/global_configuration.php */
