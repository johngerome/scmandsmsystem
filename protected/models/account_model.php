<?php

  if (! defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * 
   */
  class Account_model extends CI_Model
  {

      public function __construct()
      {
          $this->load->database();
          $this->tbl_member = $this->db->dbprefix('member');
      }
      /**
       * Check if the Username and Password is Exists in the database
       * Return TRUE if Exists FALSE if not! *_*
       * 
       * @return Boolean
       */
      function login($form_fields = array())
      {

          $sql = 'SELECT * FROM '.$this->tbl_member.' WHERE email_address = ? ';
          $query = $this->db->query($sql, array($form_fields['email_address']));

          if ($query->num_rows() > 0)
          {

              foreach ($query->result() as $row)
              {
                  $decrypted_password = $this->encrypt->decode($row->password);
                  if ($row->email_address == $form_fields['email_address'] && $decrypted_password ==
                      $form_fields['password'])
                  {
                      $this->logs->write_login('ok'.$result['password'], $form_fields['email_address']);
                      return true;
                  }
                  // Incorrect Credentials
                  $this->logs->write_login('Incorrect Password', $form_fields['email_address']);
                  return false;
              }
          } else
          {
              // Unregistered
              $this->logs->write_login('Incorrect Email Address or Password ', $form_fields['email_address']);
              return false;
          }

      }


      /**
       *  Set Login Session Data for user
       *  @return Sission Data
       */
      function set_login_session()
      {
          $data = array('email' => $this->input->post('email_address'), 'logged_in' => true);
          $this->session->set_userdata($data);

      }

      /**
       * ...
       */
      function set_user_online($param)
      {
          $data = array('online' => 1, );

          $this->db->where('email_address', $param);
          $this->db->update($this->tbl_member, $data);
      }

      /**
       * ...
       */
      function set_user_offline($param)
      {
          $data = array('online' => 0, );

          $this->db->where('email_address', $param);
          $this->db->update($this->tbl_member, $data);
      }

      /**
       *  Check if the User is Still Login by Checking the Session logged_in
       * 
       *  @return Boolean
       */
      function is_logged_in($return_url = false)
      {
          if ($this->session->userdata('logged_in') == true)
          {
              return true;
          } else
          {
              return false;
          }
      }


  } // End Class ------------
  // End Of File ------------
