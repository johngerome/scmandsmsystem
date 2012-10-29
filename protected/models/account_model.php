<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * Account model
 */
class Account_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->tbl_account = $this->db->dbprefix( 'account' );
        $this->tbl_position = $this->db->dbprefix( 'usertype' );

    }
    /**
     * Check if the Username and Password is Exists in the database
     * Return TRUE if Exists FALSE if not! *_*
     * 
     * @return Boolean
     * @param String
     */
    function login( $username, $password )
    {

        $sql = 'SELECT * FROM ' . $this->tbl_account . ' WHERE `username` = ?';
        $query = $this->db->query( $sql, array( $username ) );

        if ( $query->num_rows() > 0 )
        {

            foreach ( $query->result() as $row )
            {
                if ( $row->user_type_id )
                {

                    if ( $row->username != $username )
                    {
                        //Write Logs
                        $this->logs->write_login( 'Username Doesn\'t Exists', $username );
                        // see see check_login Line 100 at account.php
                        // Set Error Message
                        $this->gtemplate->set_errorMsg( 'Username Doesn\'t Exists!' );
                        return 'Incorrect Username or Password';

                    } elseif ( $row->username == $username && $row->password != md5( $password ) )
                    {
                        // Write logs
                        $this->logs->write_login( 'Incorrect Password', $username );
                        return 'Incorrect Username or Password';
                        // see check_login Line 100 at account.php
                        //set Error Message
                        //$this->gtemplate->set_errorMsg('Incorrect Password');


                    } elseif ( $row->username == $username && $row->password == md5( $password ) )
                    {
                        // Write Logs
                        //$this->logs->write_login('ok', $username);
                        //$this->set_login_session();
                        $this->update_last_login( $username );
                        return true;


                    }
                } else
                {
                    $this->logs->write_login( 'You dont have enough previllages to access this site!', $username );
                    return 'You dont have enough previllages to access this site!';

                }
            }

        } else
        {
            // Unregistered
            $this->logs->write_login( 'Username and Password Doesn\'t Exists!', $username );
            return 'Incorrect Username or Password';
            // see check_login Line 100 at account.php
            //Set Error Message
            //$this->gtemplate->set_errorMsg('Username and Password Doesn\'t Exists!');

        }
    }


    /**
     *  Set Login Session Data for user
     *  @return Sission Data
     */
    function set_login_session()
    {
        $data = array( 'username' => $this->input->post( 'username' ), 'logged_in' => true );
        $this->session->set_userdata( $data );

    }

    public function update_last_login( $param = false )
    {
        $date = time();
        $data = array( 'lastvisit_date' => $date, );

        $this->db->where( 'username', $param );
        $this->db->update( $this->tbl_account, $data );

    }

    /**
     * ... Not yet Done
     */
    function set_user_online( $param )
    {
        $data = array( 'online' => 1, );

        $this->db->where( 'username', $param );
        $this->db->update( $this->tbl_account, $data );
    }

    /**
     * ... Not yet Done
     */
    function set_user_offline( $param )
    {
        $data = array( 'online' => 0, );

        $this->db->where( 'username', $param );
        $this->db->update( $this->tbl_account, $data );
    }

    /**
     *  Check if the User is Still Login by Checking the Session logged_in
     * 
     *  @return Boolean
     */
    function is_logged_in( $return_url = false )
    {
        if ( $this->session->userdata( 'logged_in' ) == true )
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function count_user()
    {
        $query = $this->db->query( 'SELECT count(account_id) as total FROM `tbx101_account` WHERE account_id != 1' );
        foreach ( $query->result() as $row )
        {
            return $total = $row->total;
        }

    }


    /**
     *  Populate User Accounts
     *  @return Array
     */
    public function get_user_list()
    {
        $qry = $this->db->query( 'SELECT * FROM ' . $this->tbl_account.' ORDER BY first_name ASC' );
        return $qry->result();

    }

    public function get_new_user()
    {
        $qry = $this->db->query( 'SELECT * FROM ' . $this->tbl_account . ' WHERE user_type_id != 1 ORDER BY time DESC LIMIT 0,5' );
        return $qry->result();

    }
    public function get_new_customer()
    {
        $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'customer' ) . ' ORDER BY time DESC LIMIT 0,5' );
        return $qry->result();

    }
    /**
     *  Populate User Accounts BY Position
     *  @return Array
     */
    public function get_user_list_byPosition( $id = false )
    {

        $qry = 'SELECT * FROM tbx101_account
                     WHERE `status` = 0 AND `user_type_id` = ' . $id;

        $sql = $this->db->query( $qry );
        return $sql->result();

    }

    public function get_client_user_type( $user_type_id = null )
    {
        $query = $this->db->query( 'SELECT * FROM tbx101_user_access
                        JOIN tbx101_permission
                        ON tbx101_user_access.permission_id = tbx101_permission.permission_id
                        WHERE parent = \'client\' ' );

        return $query->result();
    }

    /**
     * Get User Position/Group
     * @return Array
     * @param String
     */
    public function get_user_position_byID( $id = false )
    {
        $qry = ' SELECT * ';
        $qry .= ' FROM `tbx101_account` ';
        $qry .= ' JOIN `tbx101_usertype` ';
        $qry .= 'ON tbx101_account.`user_type_id` = tbx101_usertype.`user_type_id` ';
        $qry .= ' WHERE `account_id` = ' . $id . ' ';

        $query = $this->db->query( $qry );
        if ( $query->result() )
        {
            foreach ( $query->result() as $row )
            {
                return $row->name;
            }
        } else
        {
            return 'None';
        }
    }

    /**
     * @param User ID
     * @return String (Branch Name)
     */
    public function get_user_branch_byID( $id = false )
    {
        $qry = 'SELECT branch_name
                FROM `tbx101_branch`
                WHERE `manager` = ' . $id . ' OR `cashier` = ' . $id . '';

        $query = $this->db->query( $qry );
        if ( $query->result() )
        {
            foreach ( $query->result() as $row )
            {
                return $row->branch_name;
            }
        } else
        {
            return 'None';
        }
    }

    /**
     * Populate User Group
     * @return Array
     */
    public function get_user_position( $id = false )
    {
        if ( $id )
        {
            $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'account' ) . ' WHERE `account_id` = ' . $id );

            foreach ( $qry->result() as $row )
            {
                $user_type_id = $row->user_type_id;
            }
            $qry = $this->db->query( 'SELECT * FROM ' . $this->tbl_position . ' WHERE `user_type_id` != ' . $user_type_id );
            return $qry->result();
        } else
        {
            $qry = $this->db->query( 'SELECT * FROM ' . $this->tbl_position . ' WHERE user_type_id != 1 ORDER BY `name`  ' );
            return $qry->result();
        }

    }

    public function delete( $id = false )
    {
        $dir = dirname( BASEPATH ) . '/images/user/' . $id;

        $qry = $this->db->query( 'SELECT `ProfilePic` FROM ' . $this->db->dbprefix( 'account' ) . ' WHERE `account_id` = ' . $id );

        foreach ( $qry->result() as $row )
        {
            $ProfilePic = $row->ProfilePic;
        }
        //mkdir(dirname(BASEPATH) . '/images/user/', 0777);
        //char char lang
        if ( is_file( $dir . '/Thumbs.db' ) )
        {
            unlink( $dir . '/Thumbs.db' );
        }
        if ( is_dir( $dir ) )
        {

            if ( is_file( $dir . '/' . $ProfilePic ) )
            {
                unlink( $dir . '/' . $ProfilePic );
                rmdir( $dir );
                $this->db->delete( $this->db->dbprefix( 'account' ), array( 'account_id' => $id ) );
            }

        } else
        {
            echo 'Error Deleting Directory';
        }

    }
    public function get_usertype_Name( $id = false )
    {
        //Get Account ID
        $qry = $this->db->query( 'SELECT `name` FROM ' . $this->db->dbprefix( 'usertype' ) . ' WHERE `user_type_id` = ' . $id );
        if ( $qry->result() )
        {
            foreach ( $qry->result() as $row )
            {
                $name = $row->name;
            }
        } else
        {
            $name = 'Select User Type...';
        }
        return $name;

    }

    public function get_user_MaxAccountID()
    {
        //Get Account ID
        $qry = $this->db->query( 'SELECT MAX(account_id)as id FROM ' . $this->db->dbprefix( 'account' ) );
        foreach ( $qry->result() as $row )
        {
            $current_id = $row->id;
        }
        $current_id += 1;
        return $current_id;


    }

    public function get_account_list_byID( $id = false )
    {
        $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'account' ) . ' WHERE `account_id` = \'' . $id . '\'' );
        return $qry->result();

    }

    public function save()
    {
        $ret = 'true';
        $date = date( 'Y-m-d H:i:s' );
        $time = time();

        if ( $_POST )
        {
            $name = $this->input->post( 'first_name' ) . $this->input->post( 'middle_name' ) . $this->input->post( 'last_name' );
            $qry = "SELECT Concat(first_name,middle_name,last_name) as name FROM  `tbx101_account` 
                        WHERE Concat(first_name,middle_name,last_name) = '" . $name . "' ";

            $qry_uname = 'SELECT * FROM `' . $this->db->dbprefix( 'account' ) . '` WHERE `username` = \'' . $this->input->post( 'username' ) . '\' ';

            if ( IdenticalRecords( $qry_uname ) == true )
            {
                $ret = 'Username Already Exists';
            }


            if ( IdenticalRecords( $qry ) == true )
            {
                $ret = 'Account Already Exists';
            }

            if ( $ret == 'true' )
            {

                $data = array(
                    'ProfilePic' => $this->input->post( 'ProfilePic' ),
                    'username' => $this->input->post( 'username' ),
                    'password' => md5( $this->input->post( 'password' ) ),
                    'first_name' => $this->input->post( 'first_name' ),
                    'last_name' => $this->input->post( 'last_name' ),
                    'middle_name' => $this->input->post( 'middle_name' ),
                    'email_address' => $this->input->post( 'email_address' ),
                    'home_address' => $this->input->post( 'home_address' ),
                    'contact_number' => $this->input->post( 'contact_number' ),
                    'user_type_id' => $this->input->post( 'user_type' ),
                    'branch_id' => $this->input->post( 'branch_id' ),
                    'register_date' => $date,
                    'time' => $time,
                    );

                $this->db->insert( $this->db->dbprefix( 'account' ), $data );

                //Get Account ID
                $qry = $this->db->query( 'SELECT MAX(account_id)as id FROM ' . $this->db->dbprefix( 'account' ) );
                foreach ( $qry->result() as $row )
                {
                    $current_id = $row->id;
                }


                //If a User Uploaded a Picture,,,
                if ( $this->input->post( 'ProfilePic' ) != 'default_large.png' )
                {


                    if ( !file_exists( dirname( BASEPATH ) . '/images/user/' . $current_id ) )
                    {
                        mkdir( dirname( BASEPATH ) . '/images/user/' . $current_id, 0777 );

                        //Move File into new created Directory
                        if ( copy( dirname( BASEPATH ) . "/images/temp/" . $this->input->post( 'ProfilePic' ), dirname( BASEPATH ) . '/images/user/' . $current_id . '/' . $this->
                            input->post( 'ProfilePic' ) ) )
                        {
                            unlink( dirname( BASEPATH ) . "/images/temp/" . $this->input->post( 'ProfilePic' ) );
                        }
                        $ret = 'true';

                    } else
                    {
                        $ret = 'Error in Creating Directories';
                    }

                } else
                {

                    if ( !file_exists( dirname( BASEPATH ) . '/images/user/' . $current_id ) )
                    {
                        mkdir( dirname( BASEPATH ) . '/images/user/' . $current_id, 0777 );

                        //Move File into new created Directory
                        if ( copy( dirname( BASEPATH ) . "/images/default_large.png", dirname( BASEPATH ) . '/images/user/' . $current_id . '/default_large.png' ) )
                        {

                        } else
                        {

                            $ret = 'Error in Creating Directories for Default Profile';
                        }


                    } else
                    {
                        $ret = 'Directories Exists for Default Profile';
                    }

                }

            }
            echo $ret;
        }

    }


    public function update_data( $myprofile = null )
    {
        $ret = 'true';

        $current_id = $this->input->post( 'account_id' );
        if ( $myprofile )
        {
            $current_password = md5( $this->input->post( 'current_password' ) );

            if ( $current_password != getReturnValue( $this->db->dbprefix( 'account' ), 'password', 'account_id', $current_id ) )
            {
                $ret = 'Incorrect Current Password!';
            }

        }

        $qry = $this->db->query( 'SELECT `ProfilePic` FROM ' . $this->db->dbprefix( 'account' ) . ' WHERE `account_id` = ' . $current_id );
        foreach ( $qry->result() as $row )
        {
            $profile_pic = $row->ProfilePic;

        }

        //If a User Uploaded a Picture,,,
        if ( $this->input->post( 'ProfilePic' ) != $profile_pic )
        {

            //If (!file_exists(dirname(BASEPATH) . '/images/customer/' . $current_id))
            // {
            //Move File into Directory
            if ( copy( dirname( BASEPATH ) . "/images/temp/" . $this->input->post( 'ProfilePic' ), dirname( BASEPATH ) . '/images/user/' . $current_id . '/' . $this->
                input->post( 'ProfilePic' ) ) )
            {
                unlink( dirname( BASEPATH ) . "/images/temp/" . $this->input->post( 'ProfilePic' ) );
                unlink( dirname( BASEPATH ) . '/images/user/' . $current_id . '/' . $profile_pic );
            }
        }

        if ( $this->input->post( 'password' ) != '' && $this->input->post( 'confirm_password' ) != '' )
        {

            $data = array(
                'ProfilePic' => $this->input->post( 'ProfilePic' ),
                'username' => $this->input->post( 'username' ),
                'password' => md5( $this->input->post( 'password' ) ),
                'first_name' => $this->input->post( 'first_name' ),
                'last_name' => $this->input->post( 'last_name' ),
                'middle_name' => $this->input->post( 'middle_name' ),
                'email_address' => $this->input->post( 'email_address' ),
                'home_address' => $this->input->post( 'home_address' ),
                'contact_number' => $this->input->post( 'contact_number' ),
                'branch_id' => $this->input->post( 'branch_id' ),
                'user_type_id' => $this->input->post( 'user_type' ),
                );

        } else
        {
            $data = array(
                'ProfilePic' => $this->input->post( 'ProfilePic' ),
                'username' => $this->input->post( 'username' ),
                'password' => md5( $this->input->post( 'password' ) ),
                'first_name' => $this->input->post( 'first_name' ),
                'last_name' => $this->input->post( 'last_name' ),
                'middle_name' => $this->input->post( 'middle_name' ),
                'email_address' => $this->input->post( 'email_address' ),
                'home_address' => $this->input->post( 'home_address' ),
                'contact_number' => $this->input->post( 'contact_number' ),
                'branch_id' => $this->input->post( 'branch_id' ),
                'user_type_id' => $this->input->post( 'user_type' ),
                );
        }


        $this->db->where( 'account_id', $this->input->post( 'account_id' ) );
        $this->db->update( $this->db->dbprefix( 'account' ), $data );

        if ( $myprofile )
        {
            $this->session->unset_userdata( 'username' );
            $this->session->set_userdata( 'username', $this->input->post( 'username' ) );
        }

        echo $ret;


    }

    public function can_login_to_any( $user_type_id = null )
    {

        $permission_id = getReturnValue( $this->db->dbprefix( 'permission' ), 'permission_id', 'name', 'can_login_to_any_branch' );
        $access = getReturnValue( 'SELECT * FROM ' . $this->db->dbprefix( 'user_access' ) . ' WHERE permission_id = ' . $permission_id . '
                AND user_type_id = ' . $user_type_id . '
                ' );
        if ( $access )
        {
            return true;
        } else
        {
            return false;
        }


    }
}
// End Class ------------
// End Of File ------------
