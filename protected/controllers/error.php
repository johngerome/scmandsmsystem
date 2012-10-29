<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Error extends CI_Controller
{

    public function index()
    {
        $this->gtemplate->load_view('404_error');
    }

}
