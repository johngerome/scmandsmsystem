<?php

class Books extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('books_model');
	}

	/*
	|---------------------------------------
	|
	|---------------------------------------
	*/
	public function index()
	{
		$data['books'] = $this->books_model->get_books();

		$data['pageTitle'] = 'Books';
		$data['pageDescription'] = 'Choose Your books';

		$this->load->view('themes/header', $data);
		$this->load->view('books/index', $data);
		$this->load->view('themes/footer');
	}

	/*
	|---------------------------------------
	|
	|---------------------------------------
	*/
	public function view($book_id)
	{
		$data['books_item'] = $this->books_model->get_books($book_id);

		if(empty($data['books_item'])) {
			show_404();
		}

		$data['pageTitle'] = $data['books_item']['book_name'];

		$this->load->view('themes/header', $data);
		$this->load->view('books/view', $data);
		$this->load->view('themes/footer');

	}


} // End Class
/*
|---------------------------------------
|   End of File
|---------------------------------------
*/
