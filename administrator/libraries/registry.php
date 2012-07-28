<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Replacement of Global variable w/ Global Functions
 *  @access public
 *  @copyright 2012
 */
Class Registry
{
	/**
	 * HeadingTitle
	 * @access public
	 */
	var $heading_title;
	/**
	 * breadCrumb function
	 * @access private
	 */
	var $bread_crumb;
    /**
     * 
     */
	var $user_email;

	public function __construct()
	{
		$this->heading_title;
		$this->bread_crumb = TRUE;
		$this->user_email;
	}






	/**
	 *  Get User Email Address
	 */
	public function get_user_email()
	{
		return $this->user_email;
	}


	/**
	 * Set User Email Address
	 */
	public function set_user_email($email)
	{
		$this->user_email = $email;
	}

}
/* End of Class */
/* End of File */
/* Location: application/libraries/registry */
