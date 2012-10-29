<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_type extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_type_model');
    }
    public function index()
    {
        $data['qry_usertype'] = $this->user_type_model->get_user_type_list();
        $this->gtemplate->load_view('user_type/index', $data);

    }


    public function add()
    {
        $data['qry_permission_server'] = $this->user_type_model->page_access('server');
        $data['qry_permission_client'] = $this->user_type_model->page_access('client');

        $this->load->view('views/user_type/_add', $data);
    }

    public function edit($id = false)
    {

        $data['title'] = getReturnValue($this->db->dbprefix('usertype'), 'name', 'user_type_id', $id);
        $data['user_type_id'] = $id;
        $data['qry_permission_server'] = $this->user_type_model->page_access('server');
        $data['qry_permission_client'] = $this->user_type_model->page_access('client');

        $this->load->view('views/user_type/_edit', $data);
    }
    public function save()
    {
        if (IdenticalRecords('SELECT name from tbx101_usertype WHERE name = \'' . $this->input->post('name') . '\'') == true)
        {
            echo 'User type already exists in the database!';
        } else
        {
            $this->user_type_model->saved();
            redirect('user_type/saved');
        }

    }

    public function update()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix('usertype') . "
                WHERE `name` = '" . $this->input->post('name') . "' AND `user_type_id` != " . $this->input->post('user_type_id');

        if (IdenticalRecords($qry) == true)
        {
            echo 'User type already exists in the database!';
        } else
        {
            $this->user_type_model->updated();
            redirect('user_type/updated');
        }
    }

    public function check_update()
    {
        $qry = "SELECT * FROM " . $this->db->dbprefix('usertype') . "
                WHERE `name` = '" . $this->input->post('name') . "' AND `user_type_id` != " . $this->input->post('user_type_id');
                
        if (IdenticalRecords($qry) == true)
        {
            echo 'User type already exists.';
        }
    }

    public function check_add()
    {
        if (IdenticalRecords('SELECT name from tbx101_usertype WHERE name = \'' . $this->input->post('name') . '\'') == true)
        {
            echo 'User type already exists.';
        }
    }

    public function delete($id = false)
    {

        if (getReturnValue($this->db->dbprefix('account'), 'COUNT(account_id)', 'user_type_id', $id) > 0)
        {
            echo 'User type cannot be removed as they contain User Accounts.';
        } else
        {
            $this->db->delete('usertype', array('user_type_id' => $id));
            echo 'true';
        }

    }

    public function ajaxUserTypeName()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix('usertype') . "
                WHERE `name` = '" . $validateValue . "' ";


        if (IdenticalRecords($qry) == true)
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode($arrayToJs); // RETURN ARRAY WITH success
        } else
        {
            for ($x = 0; $x < 1000000; $x++)
            {
                if ($x == 990000)
                {
                    $arrayToJs[1] = true;
                    echo json_encode($arrayToJs); // RETURN ARRAY WITH ERROR
                }
            }
        }
    }

    public function ajaxUserTypeNameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode('-', $validateId);


        $qry = "SELECT * FROM " . $this->db->dbprefix('usertype') . "
                WHERE `name` = '" . $validateValue . "' AND `user_type_id` != $value[1] ";


        if (IdenticalRecords($qry) == true)
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode($arrayToJs); // RETURN ARRAY WITH success
        } else
        {
            for ($x = 0; $x < 1000000; $x++)
            {
                if ($x == 990000)
                {
                    $arrayToJs[1] = true;
                    echo json_encode($arrayToJs); // RETURN ARRAY WITH ERROR
                }
            }
        }
    }


}
// ENd of File
