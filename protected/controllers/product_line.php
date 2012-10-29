<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_line extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_line_model');
    }

    public function index()
    {
        $data['qry_product_line'] = $this->product_line_model->get_product_line();
        $this->gtemplate->load_view('product_line/index', $data);
    }

    public function data()
    {
        $data['qry_product_line'] = $this->product_line_model->get_product_line();
        $this->load->view('views/product_line/data', $data);
    }
    public function add()
    {
        $data['qry_product_line'] = $this->product_line_model->get_product_line();
        $this->load->view('views/product_line/_add', $data);
    }

    public function delete($id = false)
    {
        $this->product_line_model->delete($id);
        echo 'true';
    }

    public function check_delete($id = null)
    {
        if (IdenticalRecords('SELECT * FROM `' . $this->db->dbprefix('product') . '` WHERE `ProductLineId` = ' . $id) == true)
        {
            //Product Line Exists in Products
            echo 'Product Line cannot be removed as they contain Products. There may currently be Products within the Product Line which you must delete first!';
        } else
        {
            echo 'true';
        }
    }

    public function edit($id = false)
    {

        $this->gtemplate->set_id($id);

        $data['qry_product_line_byID'] = $this->product_line_model->get_product_line_byID($id);
        $this->load->view('views/product_line/edit', $data);
    }

    public function ajaxProductLineName()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix('product_line') . "
                WHERE `ProductLineName` = '" . $validateValue . "' ";


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


    public function ajaxProductLineNameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode('-', $validateId);


        $qry = "SELECT * FROM " . $this->db->dbprefix('product_line') . "
                WHERE `ProductLineName` = '" . $validateValue . "' AND `ProductLineId` != $value[1] ";


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

    public function save()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix('product_line') . "
                WHERE `ProductLineName` = '" . $this->input->post('ProductLineName') . "' ";


        if (IdenticalRecords($qry) == true)
        {
            echo 'Product Line Already Exists!';
        } else
        {
            $this->product_line_model->save();
            echo 'true';
        }


    }

    public function update()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix('product_line') . "
                WHERE `ProductLineName` = '" . $this->input->post('ProductLineName') . "' AND `ProductLineId` != " . $this->input->post('id');


        if (IdenticalRecords($qry) == true)
        {
            echo 'Product Line Already Exists!';
        } else
        {
            $this->product_line_model->update_product_line();
            echo 'true';
        }
    }


}
