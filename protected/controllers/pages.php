<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller
{

	public function view($page = 'home')
	{
		if(!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
			show_404();
		}
		$data['pageTitle'] = $page;
		$data['pageDescription'] = ucfirst('Welcome Home');
		if($page == 'login') {
			$data['hide_menu'] = TRUE;
		}
		$this->load->view('header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('footer', $data);
	}


	public function about_us()
	{

	}
}
