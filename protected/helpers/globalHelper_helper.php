<?php

 if (!defined('BASEPATH')) exit('No direct script access allowed');
 /**
  *  @copyright 2012
  *  @author Gerome
  *  @access public
  *  @return Boolean
  */
 function page_level_access($uri = false)
 {


     $CI = &get_instance();
     $CI->load->helper('url');

     // if ($uri == false) {
     //        $uri = uri_string();
     //        $uri_array = $CI->uri->total_segments();
     //        echo $uri_array;
     //        if ($uri_array == 1) {
     //            // add /index
     //            $uri .= '/index';
     //        }
     //    }

     $username = $CI->session->userdata('username');
     $tbl_user_type = $CI->db->dbprefix('usertype');
     $tbl_access = $CI->db->dbprefix('access');
     $tbl_member = $CI->db->dbprefix('account');
     $user_type_id = 0;

     //echo 'Pass'.$CI->encrypt->encode('admin');
     //exit;
     //echo $uri;
     // Check if the user has not bein' login
     if (is_loggedin() != true)
     {
         //if URL is FOrgotPass
         if ($CI->uri->uri_string() != 'account/forgotpass')
         {
             redirect('account/login');
             $return_val = false;
         }

     }

     // Get Users user_type
     $sql = 'SELECT `tbx101_account`.user_type_id ';
     $sql .= 'FROM `tbx101_usertype` ';
     $sql .= 'JOIN `tbx101_account` ';
     $sql .= 'ON `tbx101_usertype`.user_type_id = `tbx101_account`.user_type_id ';
     $sql .= 'WHERE `tbx101_account`.username = ? ';

     $query = $CI->db->query($sql, array($username));
     $result = $query->row_array();

     if (!empty($result['user_type_id']))
     {
         $user_type_id = $result['user_type_id'];
     }

     //Get permission Name base on user_type
     $sql = 'SELECT `tbx101_permission`.name
            FROM `tbx101_permission`
            JOIN `tbx101_user_access`
            ON `tbx101_permission`.permission_id = `tbx101_user_access`.permission_id
            WHERE `tbx101_user_access`.user_type_id = ? ';
     $query = $CI->db->query($sql, array($user_type_id));
     $result = $query->result();
     //echo $sql;

     if ($result)
     {
         foreach ($result as $row)
         {

             if ($uri == $row->name)
             {

                 return true;
             }

         }
     }
     else
     {
         return false;
     }
    
     // Allow all Pages to Super Administrator
     if ($user_type_id == 1)
     {
         return true;
     }
     // View Dashboard to all User type.
     if ($uri == 'managed_dashboard' or $uri == 'managed_profile')
     {
         return true;
     }


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
     }
     else
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
     echo '<div id="error"><img src="' . $CI->config->base_url() .
         'public/images/notice-alert.png" />&nbsp;' . $msg . '</div>';
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
     return $CI->config->base_url() . 'templates/' . $CI->config->item('template_name') . '/' .
         $param;
 }

 /**
  * @param Strin - Query String
  * @return Boolean 
  */
 function IdenticalRecords($param)
 {
     $CI = &get_instance();
     $qry = $CI->db->query($param);
     return $qry->result();
     if ($query->result())
     {
         return true;
     }
     else
     {
         return false;
     }

 }

 function getAccountID($param)
 {
     $CI = &get_instance();
     $qry = $CI->db->query('SELECT `account_id` FROM `tbx101_account` WHERE `username` = \'' .
         $param . '\' ');
     foreach ($qry->result() as $row)
     {
         $id = $row->account_id;
     }
     return $id;


 }

 function getAccountProfile($param)
 {
     $CI = &get_instance();
     $qry = $CI->db->query('SELECT `ProfilePic` FROM `tbx101_account` WHERE `username` = \'' .
         $param . '\' ');
     foreach ($qry->result() as $row)
     {
         $ProfilePic = $row->ProfilePic;
     }
     return $ProfilePic;

 }

 function getReturnValue($table_name = false, $return_value = false, $column_id = false, $equals_column_id = false,
     $sign = '=')
 {
     $CI = &get_instance();
     $ret;
     if ($column_id)
     {
         $qry = $CI->db->query('SELECT ' . $return_value . ' FROM `' . $table_name . '` WHERE `' .
             $column_id . '` ' . $sign . ' ' . $equals_column_id);
         foreach ($qry->result_array() as $row)
         {
             return $row[$return_value];
         }

     }
     else
     {
         $qry = $CI->db->query('SELECT ' . $return_value . ' FROM `' . $table_name);
         foreach ($qry->result_array() as $row)
         {
             return $row[$return_value];
         }
     }

 }

 function getFullReturnValue($query)
 {
     $CI = &get_instance();

     $qry = $CI->db->query($query);
     return $qry->result_array();

 }

 function count_unread_notification()
 {
     $x = 0;
     $CI = &get_instance();
     $qry = $CI->db->query('SELECT COUNT(order_id) as total FROM tbx101_order_msg
                            WHERE state = 0 AND archive = 0
                            ');

     foreach ($qry->result() as $row)
     {
        return $row->total;
     }

 }
 function load_account_profile($account_id = false, $ProfilePic = null)
 {

     if ($ProfilePic)
     {
         return base_url() . 'images/user/' . $account_id . '/' . $ProfilePic;
     }
     else
     {
         return base_url() . 'images/acc_deleted.jpg';
     }

 }

 function load_customer_profile($account_id = false, $ProfilePic = null)
 {

     if ($ProfilePic)
     {
         return base_url() . 'images/customer/' . $account_id . '/' . $ProfilePic;
     }
     else
     {
         return base_url() . 'images/acc_deleted.jpg';
     }

 }


 function contextualTime($small_ts, $large_ts = false)
 {
     if (!$large_ts) $large_ts = time();
     $n = $large_ts - $small_ts;
     if ($n <= 1) return 'less than 1 second ago';
     if ($n < (60)) return $n . ' seconds ago';
     if ($n < (60 * 60))
     {
         $minutes = round($n / 60);
         return 'about ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
     }
     if ($n < (60 * 60 * 16))
     {
         $hours = round($n / (60 * 60));
         return 'about ' . $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
     }
     if ($n < (time() - strtotime('yesterday'))) return 'yesterday';
     if ($n < (60 * 60 * 24))
     {
         $hours = round($n / (60 * 60));
         return 'about ' . $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
     }
     if ($n < (60 * 60 * 24 * 6.5)) return 'about ' . round($n / (60 * 60 * 24)) . ' days ago';
     if ($n < (time() - strtotime('last week'))) return 'last week';
     if (round($n / (60 * 60 * 24 * 7)) == 1) return 'about a week ago';
     if ($n < (60 * 60 * 24 * 7 * 3.5)) return 'about ' . round($n / (60 * 60 * 24 * 7)) .
             ' weeks ago';
     if ($n < (time() - strtotime('last month'))) return 'last month';
     if (round($n / (60 * 60 * 24 * 7 * 4)) == 1) return 'about a month ago';
     if ($n < (60 * 60 * 24 * 7 * 4 * 11.5)) return 'about ' . round($n / (60 * 60 * 24 * 7 * 4)) .
             ' months ago';
     if ($n < (time() - strtotime('last year'))) return 'last year';
     if (round($n / (60 * 60 * 24 * 7 * 52)) == 1) return 'about a year ago';
     if ($n >= (60 * 60 * 24 * 7 * 4 * 12)) return 'about ' . round($n / (60 * 60 * 24 * 7 * 52)) .
             ' years ago';
     return false;
 }

 /* End of File */
 /* Location: server/helper/globalHelper_helper.php */
