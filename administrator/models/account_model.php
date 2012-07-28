<?php

 if (!defined('BASEPATH')) exit('No direct script access allowed');

 /**
  * Account model
  */
 class Account_model extends CI_Model
 {

     public function __construct()
     {
         $this->load->database();
         $this->tbl_account = $this->db->dbprefix('account');
     }
     /**
      * Check if the Username and Password is Exists in the database
      * Return TRUE if Exists FALSE if not! *_*
      * 
      * @return Boolean
      * @param String
      */
     function login($username, $password)
     {

         $sql = 'SELECT * FROM ' . $this->tbl_account . ' WHERE `username` = ? ';
         $query = $this->db->query($sql, array($username));

         if ($query->num_rows() > 0)
         {

             foreach ($query->result() as $row)
             {
                 $decrypted_password = $this->encrypt->decode($row->password);
                 if ($row->username != $username)
                 {
                     //Write Logs
                     //$this->logs->write_login('Username Doesn\'t Exists', $username);
                     // see see check_login Line 100 at account.php
                     // Set Error Message
                     $this->gtemplate->set_errorMsg('Username Doesn\'t Exists!');
                     return FALSE;
                 } elseif ($row->username == $username && $decrypted_password != $password)
                 {
                     // Write logs
                     //$this->logs->write_login('Incorrect Password', $username);
                     // see check_login Line 100 at account.php
                     //set Error Message
                     $this->gtemplate->set_errorMsg('Incorrect Password');
                     return FALSE;

                 } elseif ($row->username == $username && $decrypted_password == $password)
                 {
                     // Write Logs
                     //$this->logs->write_login('ok', $username);
                     //$this->set_login_session();
                     return TRUE;
                 }
             }
         }
         else
         {
             // Unregistered
             //$this->logs->write_login('Username and Password Doesn\'t Exists!', $username);
             // see check_login Line 100 at account.php
             //Set Error Message
             $this->gtemplate->set_errorMsg('Username and Password Doesn\'t Exists!');
             return FALSE;

         }
     }


     /**
      *  Set Login Session Data for user
      *  @return Sission Data
      */
     function set_login_session()
     {
         $data = array('username' => $this->input->post('username'), 'logged_in' => TRUE);
         $this->session->set_userdata($data);

     }

     /**
      * ... Not yet Done
      */
     function set_user_online($param)
     {
         $data = array('online' => 1, );

         $this->db->where('username', $param);
         $this->db->update($this->tbl_account, $data);
     }

     /**
      * ... Not yet Done
      */
     function set_user_offline($param)
     {
         $data = array('online' => 0, );

         $this->db->where('username', $param);
         $this->db->update($this->tbl_account, $data);
     }

     /**
      *  Check if the User is Still Login by Checking the Session logged_in
      * 
      *  @return Boolean
      */
     function is_logged_in($return_url = FALSE)
     {
         if ($this->session->userdata('logged_in') == TRUE)
         {
             return TRUE;
         }
         else
         {
             return FALSE;
         }
     }


 } // End Class ------------
 // End Of File ------------
