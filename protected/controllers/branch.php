<?php

 if (!defined('BASEPATH')) exit('No direct script access allowed');
 class Branch extends CI_Controller
 {
     public function __construct()
     {
         parent::__construct();
         //$this->load->model('account_model');
     }


     public function index()
     {
         // set heading
         $this->gtemplate->HeadingTitle(' ');

         $this->gtemplate->load_view('branch/index');
     }

     public function bakery()
     {
         // set heading
         $this->gtemplate->HeadingTitle('<img src="' . base_url('templates/' . $this->config->item
             ('template_name') . '/images/bakery_logo.gif') . '" />');
         $this->gtemplate->set_toolbar('branch_bakery');
         $this->gtemplate->load_view('branch/bakery');
     }

     public function eggstore()
     {
         // set heading
         $this->gtemplate->HeadingTitle('<img src="' . base_url('templates/' . $this->config->item
             ('template_name') . '/images/eggstore_logo.gif') . '" />');
         $this->gtemplate->set_toolbar('eggstore');
         $this->gtemplate->load_view('branch/eggstore');
     }
     /**
      * @param String
      * 
      * Param = Name of the Branch (Friendly URL)
      */
     public function add($param = null)
     {


         if ($param == 'bakery')
         {
             // set heading
             $this->gtemplate->HeadingTitle(' '); // load Toolbar
             //$this->gtemplate->set_toolbar('branch_bakery'); // set heading
             //$this->gtemplate->HeadingTitle('<img src="' . base_url('templates/' . $this->config->item
             //    ('template_name') . '/images/bakery_logo.gif') . '" />');
             $this->gtemplate->load_view('branch/add/bakery');
         } elseif ($param == 'eggstore')
         {
             // set heading
             $this->gtemplate->HeadingTitle(' '); //$this->gtemplate->set_toolbar('branch_bakery');
             // set heading
             //$this->gtemplate->HeadingTitle('<img src="' . base_url('templates/' . $this->config->item
              //   ('template_name') . '/images/eggstore_logo.gif') . '" />');
             $this->gtemplate->load_view('branch/add/eggstore');
         }
         else
         {
             show_error("Page Not Found!");
         }


     }


 }

 /**
  * End of File branch.php
  * Location: Administrator/Controllers/
  */
