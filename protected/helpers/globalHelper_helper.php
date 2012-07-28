<?php

  if (! defined('BASEPATH')) exit('No direct script access allowed');
  /**
   *  Page access Leveling
   *  NOTE: If the URI level has not been set. the Page access level would be 0
   *  
   *  @copyright 2012
   *  @access public
   *  @return Boolean
   */
  function page_level_access()
  {

      $CI = &get_instance();
      $CI->load->helper('url');


      $uri = uri_string();
      $email_address = $CI->session->userdata('email');
      $tbl_group = $CI->db->dbprefix('group');
      $tbl_access = $CI->db->dbprefix('access');
      $tbl_member = $CI->db->dbprefix('member');

      // Count total Segments
      $uri_array = $CI->uri->total_segments();

      // if less than 2 it is an index
      if ($uri_array < 2)
      {
          // add /index
          $uri .= '/index';
      }

      // Get the page access Level
      $qry = "SELECT `level` FROM `{$tbl_group}` 
                JOIN `{$tbl_access}` 
                ON `{$tbl_group}`.group_id = `{$tbl_access}`.group_id 
                WHERE `uri` = ? ";
      $query = $CI->db->query($qry, array($uri));

      $result = $query->row_array();
      // if the Query Result is null the page Access Level would be set to 0 w/c is for Guest
      if (empty($result['level']))
      {
          $result['level'] = 0;
      }
      $page_group_level = $result['level'];


      // Get the Users Group Level
      $qry = "SELECT `level` FROM `{$tbl_group}`
                JOIN `{$tbl_member}`
                ON `{$tbl_group}`.group_id = `{$tbl_member}`.group_id
                WHERE `email_address` = ? ";
      $query = $CI->db->query($qry, array($email_address));
      $result = $query->row_array();
      // if the Query Result is null it means the user who browse the page is a Guest
      if (empty($result['level']))
      {
          // Assign the user level to 0.
          $result['level'] = 0;
      }
      $user_group_level = $result['level'];


      // First check if the Page Require user Authentication
      // if the page access level is not Equal to 0 it means
      // it Required user authentication.
      // NOTE: the page doesn't redirect it will only show the login page.
      if ($page_group_level != 0)
      {
          // Check if the user has not bein' login
          if (is_loggedin() != true)
          {
              // Display Login Page
              $data['hide_menu'] = true; // hide Main menu
              $CI->gtemplate->set_breadCrumbs(false); // Hide BreadCrumbs

              //$CI->gtemplate->HeadingTitle('a');

              $CI->load->view('views/account/login');

              return false;
          }
      }

      // Check the page level. If the users has rights to view it.
      // if the page access level is Greater than users group level
      // display Error Page.
      if ($page_group_level > $user_group_level)
      { // Disallow Access
          show_error('You don\'t have the Previlages to access this page!');
          exit;
      }

      /*$session = $CI->session->all_userdata();
      foreach ($session as $value => $m) {
      echo $value . '=' . $m . '<br/>';
      }*/
      return true;
  }


  /**
   *  Check if the User is currently Login
   * 
   *  @return Boolean
   *  @access public
   */
  function is_loggedin()
  {
      $CI = &get_instance();
      if ($CI->session->userdata('logged_in') == true)
      {
          return true;
      } else
      {
          return false;
      }
  }

  /**
   * Display Error Message w/ Image.
   * 
   * @return Error Message
   * @param  Error Message
   * @access public
   */
  function errorMsg($msg)
  {
      $CI = &get_instance();
      echo '<br/>';
      echo '<div id="error"><img src="'.$CI->config->base_url().
          'public/images/notice-alert.png" />&nbsp;'.$msg.'</div>';
      echo '<br/>';
  }

  /**
   * Return the server Templates path
   * 
   * @param path
   * @return String
   */
  function serverThemePath($param = null)
  {
      $CI = &get_instance();
      return $CI->config->base_url().'templates/'.$CI->config->item('template_name').
          '/'.$param;
  }


  /* End of File */
  /* Location: server/helper/globalHelper_helper.php */
