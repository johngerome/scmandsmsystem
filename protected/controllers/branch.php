<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Branch extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('branch_model');
        $this->load->model('account_model');
        $this->load->model('product_line_model');
    }


    public function index()
    {
        // set heading
        $this->gtemplate->HeadingTitle(' ');
        if (page_level_access('managed_branch') == true)
        {

            $data['bakeshop_qry'] = $this->branch_model->get_branch();
            $this->gtemplate->load_view('branch/index', $data);
        } else
        {
            $this->gtemplate->load_view('permission_error');
        }


    }


    /**
     * @param String
     * 
     * Param = Name of the Branch (Friendly URL)
     */
    public function add()
    {
        $data['branch_qry'] = $this->branch_model->get_all_branch();
        $data['product_line'] = $this->product_line_model->get_product_line();
        //$data['bakeshop_qry'] = $this->branch_model->get_branch();
        //$data['eggstore_qry'] = $this->branch_model->get_branch('2');
        //$data['qry_cashier'] = $this->account_model->get_user_list_byPosition('1');
        //$data['qry_manager'] = $this->account_model->get_user_list_byPosition('2');


        $this->load->view('views/branch/_add', $data);


    }

    public function edit($id = false)
    {
        $data['branch_qry'] = $this->branch_model->get_all_branch(); //Branch Type
        //$data['bakeshop_qry'] = $this->branch_model->get_branch();
        //$data['eggstore_qry'] = $this->branch_model->get_branch('2');
        //$data['qry_cashier'] = $this->account_model->get_user_list_byPosition('1');
        //$data['qry_manager'] = $this->account_model->get_user_list_byPosition('2');
        $data['product_line'] = $this->product_line_model->get_product_line();
        $data['qry_branch_byID'] = $this->branch_model->get_branch_byID($id);
        //$data['qry_pline'] = $this->branch_model->get_product_line($id);
        //$data['qry_pline_2'] = $this->branch_model->get_product_line_2($id);
        $this->load->view('views/branch/_edit', $data);

    }


    public function check_edit()
    {
        $name = $_REQUEST['name'];
        $table_name = $_REQUEST['tbl'];
        $col_name = $_REQUEST['col_name'];
        $col_id = $_REQUEST['col_id'];
        $id = $_REQUEST['id'];

        $qry = "SELECT * FROM " . $this->db->dbprefix($table_name) . "
                WHERE `$col_name` = '" . $name . "' AND `$col_id` != $id  ";
        //echo $qry;
        if ($_REQUEST['is_ajax'])
        {
            if (IdenticalRecords($qry) == true)
            {
                echo 'true';
            }
        }
    }

    public function check_add()
    {
        $name = $_REQUEST['name'];
        $table_name = $_REQUEST['tbl'];
        $col_name = $_REQUEST['col_name'];

        $qry = "SELECT * FROM " . $this->db->dbprefix($table_name) . "
                WHERE `$col_name` = '" . $name . "' ";

        if ($_REQUEST['is_ajax'])
        {
            if (IdenticalRecords($qry) == true)
            {
                echo 'true';
            }
        }
    }

    public function ajaxBranchName()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix('branch') . "
                WHERE `branch_name` = '" . $validateValue . "' ";


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

    public function ajaxBranchNameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode('-', $validateId);


        $qry = "SELECT * FROM " . $this->db->dbprefix('branch') . "
                WHERE `branch_name` = '" . $validateValue . "' AND `branch_id` != $value[1] ";


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

    public function archive($id = false)
    {
        $this->branch_model->archive($id);
        //echo $id;
    }

    public function restore($id = false)
    {
        $this->branch_model->restore($id);
        //echo $id;
    }
    public function delete($id = false)
    {
        $this->branch_model->delete($id);
        echo 'true';

    }
    public function save()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix('branch') . "
                WHERE `branch_name` = '" . $this->input->post('branch_name') . "' ";

        if (IdenticalRecords($qry) == true)
        {
             echo 'Branch Already Exists!';
        } else
        {
            $this->branch_model->save();
            echo 'true';
        }


    }
    public function trash()
    {
        $data['archive_branch_qry'] = $this->branch_model->get_archive_branch();
        $this->gtemplate->load_view('branch/archive', $data);
    }

    public function update()
    {
        $this->branch_model->update_data();
        echo 'true';
    }
    
    public function check_archive($branch_id = null){
    $branch_has_exists = getReturnValue($this->db->dbprefix('branch_product'),'branch_id','branch_id',$branch_id);
    
    if($branch_has_exists){
        echo ' is currently having a products are you sure you want to send this to trash?';
    }else{ echo 'true'; }
    
    }


}

/**
 * End of File branch.php
 * Location: Administrator/Controllers/
 */
