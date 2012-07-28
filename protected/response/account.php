<?php

  class controller_Account extends CI_Controller
  {

      public function login($form_fields)
      {
          $ajax = CJAX::getInstance();
          $this->load->model('account_model');
          $ajax->info('Authenticating...', 2);
          $ajax->wait(1);  
          if ($this->account_model->login($form_fields) == true)
          {
              /* if Registered Go Here.. */
              // set Session
              $this->account_model->set_login_session();
              $ajax->success('Success', 5);
              //redirect('member');
              header('location: index.php');
          } else
          {
              /* Incorrect Credentials */
              //Write Logs
              $ajax->warning('Incorrect Email Address or Password', 5);
          }
          //}
      }

      public function test()
      {
          echo 'Hello World';
      }


  }
