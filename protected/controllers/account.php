<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'account_model' );
        $this->load->model( 'branch_model' );
        $this->load->model( 'product_model' );
        $this->load->model( 'order_model' );
        $this->load->model( 'report_model' );

    }

    public function index()
    {
        // set heading
        //$this->gtemplate->HeadingTitle($this->lang->line('heading_my_dashboard'));
        if ( page_level_access( 'managed_account' ) == true )
        {
            $data['qry_user_account'] = $this->account_model->get_user_list();
            $this->gtemplate->load_view( 'account/index', $data );
        } else
        {
            $this->gtemplate->load_view( 'permission_error' );
        }
    }

    public function dashboard()
    {
        //if (page_level_access('managed_dashboard') == true)
        //{
        $data['reports'] = $this->report_model->chart_rp();
        $data['user_account'] = $this->account_model->get_new_user();
        $data['customer'] = $this->account_model->get_new_customer();
        $data['qry_order_list'] = $this->order_model->get_order_list_unread();
        $this->gtemplate->load_view( 'account/dashboard', $data );
        //} else
        // {
        //     $this->gtemplate->load_view('permission_error');
        //}

    }

    public function forgotpass()
    {

        $this->load->view( 'views/account/forgotpass' );

    }

    public function do_forgotpass()
    {

        $sql = 'SELECT * FROM tbx101_account WHERE `username` = \'' . $this->input->post( 'user_login' ) . '\' OR email_address = \'' . $this->input->post( 'user_login' ) .
            '\' ';
        if ( IdenticalRecords( $sql ) == false )
        {
            echo 'Incorrect Username or Email Address';
        } else
        {
            //Send Email
            $this->load->library( 'email' );

            $this->email->from( 'your@example.com', 'Your Name' );
            $this->email->to( 'someone@example.com' );
            $this->email->cc( 'another@another-example.com' );
            $this->email->bcc( 'them@their-example.com' );

            $this->email->subject( 'Email Test' );
            $this->email->message( 'Testing the email class.' );

            $this->email->send();

            echo $this->email->print_debugger();
        }


    }

    /**
     * 
     */
    public function view( $id = false )
    {
        $arr = explode( '-', $id );

        if ( $id )
        {
            if ( page_level_access( 'managed_profile' ) == true )
            {

                $this->gtemplate->set_id( $arr[0] );
                $data['qry_account'] = $this->account_model->get_account_list_byID( $arr[0] );
                $data['qry_group'] = $this->account_model->get_user_position( $arr[0] );
                $this->gtemplate->load_view( 'account/view', $data );
            } else
            {
                $this->gtemplate->load_view( 'permission_error' );
            }
        }
    }

    public function view_profile( $id = false )
    {
        $arr = explode( '-', $id );

        if ( $id )
        {
            if ( page_level_access( 'managed_profile' ) == true )
            {

                $this->gtemplate->set_id( $arr[0] );
                $data['qry_account'] = $this->account_model->get_account_list_byID( $arr[0] );
                $data['qry_group'] = $this->account_model->get_user_position( $arr[0] );
                $this->load->view( 'views/account/view_profile', $data );
            } else
            {
                $this->gtemplate->load_view( 'permission_error' );
            }
        }
    }

    /**
     * member/login
     * @access Anyone,Member/Registered,Administrator
     */
    function login()
    {


        if ( $this->account_model->is_logged_in() === true )
        {
            //if user is currently logged in Show User Dashboard
            redirect( 'account/dashboard' );
        }
        if ( isset( $_REQUEST['is_ajax'] ) == true )
        {
            $is_ajax = $_REQUEST['is_ajax'];
            if ( isset( $is_ajax ) && $is_ajax )
            {
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];

                if ( $this->account_model->login( $username, $password ) == true )
                {
                    echo $this->account_model->login( $username, $password );

                }
            }
        } else
        {
            $this->load->view( 'views/account/login' );
        }

    }


    public function do_login( $username = false )
    {

        /* if Registered Go Here.. */
        // set Session
        $data = array( 'username' => $username, 'logged_in' => true );
        $this->session->set_userdata( $data );
        // Write login logs to ok
        $this->logs->write_login( 'ok', $username );
        redirect( '' );
    }

    /**
     * Check Username and Password
     * @param String
     * @return Boolean
     * 
     * Username = Post
     * Password = Post
     */
    public function check_login( $username, $password )
    {

        if ( $this->account_model->login( $username, $password ) == false )
        {
            $this->form_validation->set_message( 'check_login', $this->gtemplate->get_errorMsg() );
            return false;
        } else
        {
            return true;
        }
    }

    /**
     * Logout
     * @access member/Registered
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect( '' );
    }


    /**
     * My Profile
     * @access member/Registered
     * @para User ID
     */
    public function my_profile( $id = false )
    {
        // set heading
        //$this->gtemplate->HeadingTitle($this->lang->line('heading_my_profile'));
        $this->gtemplate->load_view( 'account/my_profile' );
    }


    /**
     *  Add User Page
     * 
     */
    public function add()
    {
        if ( page_level_access( 'managed_account' ) == false )
        {
            $this->gtemplate->load_view( 'permission_error' );
        }

        $data['qry_group'] = $this->account_model->get_user_position();
        $data['qry_branch'] = $this->branch_model->get_branch();
        // $data['qry_max_account_id'] = $this->account_model->get_user_MaxAccountID();
        $this->load->view( 'views/account/_add', $data );
    }

    public function edit( $id = false )
    {
        $branch_id = getReturnValue( $this->db->dbprefix( 'account' ), 'branch_id', 'account_id', $id );

        $this->gtemplate->set_id( $id );
        $data['qry_account'] = $this->account_model->get_account_list_byID( $id );
        $data['qry_group'] = $this->account_model->get_user_position( $id );
        $data['qry_branch'] = $this->branch_model->get_branch( $branch_id );
        $this->load->view( 'views/account/_edit', $data );

    }

    public function save()
    {
        $this->account_model->save();
    }


    public function update( $myprofile = null )
    {
        if ( !$myprofile )
        {

            $this->account_model->update_data();
            // echo 'true';

        } else
        {
            $this->account_model->update_data( $myprofile );

        }
    }

    public function delete( $id = false )
    {
        $this->account_model->delete( $id );
        echo 'true';

    }
    public function check_add()
    {
        $response = 'true';


        if ( $_REQUEST['is_ajax'] )
        {
            $name = $this->input->post( 'first_name' ) . $this->input->post( 'middle_name' ) . $this->input->post( 'last_name' );

            $qry = "SELECT Concat(first_name,middle_name,last_name) as name FROM  `tbx101_account` 
                WHERE Concat(first_name,middle_name,last_name) = '" . $name . "' ";
                
            if ( IdenticalRecords( $qry ) == true )
            {
                $response = 'Account Already Exsits';
            }
        }
        echo $response;
    }

    public function check_edit( $id = false )
    {
        $name = $this->input->post( 'first_name' ) . $this->input->post( 'middle_name' ) . $this->input->post( 'last_name' );

        $qry = "SELECT Concat(first_name,middle_name,last_name) as name FROM  `tbx101_account` 
                WHERE Concat(first_name,middle_name,last_name) = '" . $name . "' AND `account_id` != $id ";

        if ( $_REQUEST['is_ajax'] )
        {
            if ( IdenticalRecords( $qry ) == true )
            {
                echo 'true';
            } else
            {
                echo $qry . 'User Not Exists';
            }
        }
    }

    public function ajaxUsername()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'account' ) . "
                WHERE `username` = '" . $validateValue . "' ";


        if ( IdenticalRecords( $qry ) == true )
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode( $arrayToJs ); // RETURN ARRAY WITH success
        } else
        {
            for ( $x = 0; $x < 1000000; $x++ )
            {
                if ( $x == 990000 )
                {
                    $arrayToJs[1] = true;
                    echo json_encode( $arrayToJs ); // RETURN ARRAY WITH ERROR
                }
            }
        }
    }


    public function ajaxUsernameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode( '-', $validateId );


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'account' ) . "
                WHERE `username` = '" . $validateValue . "' AND `account_id` != $value[1] ";


        if ( IdenticalRecords( $qry ) == true )
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode( $arrayToJs ); // RETURN ARRAY WITH success
        } else
        {
            for ( $x = 0; $x < 1000000; $x++ )
            {
                if ( $x == 990000 )
                {
                    $arrayToJs[1] = true;
                    echo json_encode( $arrayToJs ); // RETURN ARRAY WITH ERROR
                }
            }
        }
    }
    public function ajaxPasswordCheck()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        if ( !$validateValue )
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode( $arrayToJs ); // RETURN ARRAY WITH success
        } else
        {
            for ( $x = 0; $x < 1000000; $x++ )
            {
                if ( $x == 990000 )
                {
                    $arrayToJs[1] = true;
                    echo json_encode( $arrayToJs ); // RETURN ARRAY WITH ERROR
                }
            }
        }

    }
    function do_upload()
    {


        $path = "images/temp/";
        $session_id = '1';
        $valid_formats = array(
            "jpg",
            "png",
            "gif",
            "bmp",
            "jpeg",
            "JPG",
            "PNG",
            "GIF",
            "BMP",
            "JPEG" );

        //Clean Temp Files Before Uploading..
        delete_files( $path );

        if ( isset( $_POST ) and $_SERVER['REQUEST_METHOD'] == "POST" )
        {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];

            if ( strlen( $name ) )
            {
                list( $txt, $ext ) = explode( ".", $name );
                if ( in_array( $ext, $valid_formats ) )
                {
                    if ( $size < ( 1024 * 1024 ) ) // Image size max 1 MB
                    {
                        $actual_image_name = time() . $session_id . "." . $ext;
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        if ( move_uploaded_file( $tmp, $path . $actual_image_name ) )
                        {
                            //mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
                            echo "<img src='" . base_url() . "images/temp/" . $actual_image_name . "' width=\"200\" height=\"200\">";


                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $path . $actual_image_name;
                            $config['create_thumb'] = false;
                            $config['maintain_ratio'] = false;
                            $config['width'] = 200;
                            $config['height'] = 200;

                            $this->load->library( 'image_lib', $config );

                            $this->image_lib->resize();

                            echo "
                           <script type=\"text/javascript\"> 
                           $('#ProfilePic').val('" . $actual_image_name . "');
                           </script>";

                        } else  echo "<div class=\"alertMessage warning SE\">failed</div>";
                    } else  echo "<div class=\"alertMessage warning SE\">Image file size max 1 MB</div>";
                } else  echo "<div class=\"alertMessage warning SE\">Invalid file format..</div>";
            } else  echo "<div class=\"alertMessage warning SE\">Please select image..!</div>";
            exit;
        }
    }


}

/* End of File */
/* location: application/controllers/account.php */
