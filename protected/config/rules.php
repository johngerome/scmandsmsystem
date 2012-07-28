<?php
$config = array(

	'register' => array(
				  array(
						 'field' => 'username',
						 'label' => 'Username',
						 'rules' => 'required|callback_check_username|is_unique[taccount.username]|xss_clean'
					),
				  array(
						 'field' => 'password',
						 'label' => 'Password',
						 'rules' => 'required|matches[password2]|md5|xss_clean'
					),
				  array(
						 'field' => 'password2',
						 'label' => 'Password Confirmation',
						 'rules' => 'required|xss_clean'
					)
				  )
);
