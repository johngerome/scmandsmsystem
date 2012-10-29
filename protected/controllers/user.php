<?php

 if (!defined('BASEPATH')) exit('No direct script access allowed');
 class User extends CI_Controller
 {
     public function index()
     {
         $this->gtemplate->load_view('user/index');
     }
     public function add()
     {
        $this->gtemplate->load_view('user/add');

     }


 }
// ENd of File