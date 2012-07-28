<?php

  class Gtemplate
  {

      var $main_menu = TRUE;
      var $CI;
      var $module;
      var $data = array();
      var $toolbar;
      var $bread_crumb = TRUE;

      public function __construct()
      {
          $this->CI = &get_instance();
          $this->toolbar;
          $this->main_menu;
          $this->module;
          $this->data;
          $this->toolbar;
          $this->bread_crumb;

      }

      public function load_template()
      {
          page_level_access();
          $this->CI->load->view('views/header/header');
          

      }


      public function load_view($module = null, $data = array())
      {
          $this->module = $module;
          $this->data = $data;
          $this->CI->load->view('templates/'.$this->CI->config->item('template_name').
              '/index');


      }


      public function get_content()
      {
            $this->CI->load->view('views/'.$this->module, $this->data);
      }

      public function set_main_menu($param = TRUE)
      {
          if ($param == FALSE)
          {
              $this->main_menu = FALSE;
          }
      }

      public function get_main_menu()
      {
          if ($this->main_menu == TRUE)
          {
              $this->CI->load->view('views/menu/main_menu');
          }
      }

      /**
       * set filename of Toolbar to Show
       * if False toolbar will not shown in that page.
       * 
       * @access public
       * @param  filename of Toolbar to Show
       */
      public function set_toolbar($toolbar = false)
      {
          $this->toolbar = $toolbar;
      }

      /**
       *  get filename of Toolbar to Show
       * 
       *  @return filename of Toolbar to Show
       */

      public function get_toolbar()
      {
          if ($this->toolbar)
          {
              echo '<div id="toolbarContainer">';
              $this->CI->load->view('views/toolbar/'.$this->toolbar);
              echo '</div>';
          }
      }

      /**
       *  Get breadCrumbs
       *  @return boolean Or brradCrumb itself
       */
      public function get_breadCrumbs()
      {
          if ($this->bread_crumb == TRUE)
          {
              echo set_breadcrumb();
          } else
          {
              return false;
          }
      }

      /**
       * Set BreadCrumbs Value
       *  @value True or False
       */
      public function set_breadCrumbs($param)
      {
          $this->bread_crumb = $param;
      }

      /**
       * Set and Get Heading Title
       * @return boolean Or Heading Title that been set
       * if NULL!
       *       set Value 
       * if not! 
       *      Display the Value
       */
      public function HeadingTitle($param = NULL)
      {
          if ($param)
          {
              $this->heading_title = $param;
          } else
          {
              echo $this->heading_title;
          }
      }
      /**
       * 
       */
      function theme_path($param = false)
      {
          $CI = &get_instance();
          return $CI->config->base_url().'templates/'.$CI->config->item('template_name').
              '/'.$param;
      }

  } // End of Class
  /* End of File */
