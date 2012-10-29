<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Branch_type extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'branch_model' );
        $this->load->model( 'product_line_model' );
    }

    public function index()
    {

        $data['branch_type'] = $this->branch_model->get_all_branch_type_having_product_line();
        $this->gtemplate->load_view( 'branch_type/index', $data );

    }
    public function add()
    {
        $data['product_line'] = $this->product_line_model->get_product_line();
        $this->load->view( 'views/branch_type/_add', $data );
    }

    public function edit( $id = false )
    {
        $data['b_type'] = getReturnValue( $this->db->dbprefix( 'business' ), 'business_title', 'business_id', $id );
        $data['b_id_type'] = $id;
        $data['qry_pline'] = $this->branch_model->get_product_line( $id );
        $data['qry_pline_2'] = $this->branch_model->get_product_line_2( $id );
        $this->load->view( 'views/branch_type/_edit', $data );
    }

    public function delete( $id = false )
    {
        $this->branch_model->delete_type( $id );
        echo 'true';
    }

    public function check_delete( $id = false )
    {
        if ( getReturnValue( $this->db->dbprefix( 'branch' ), 'COUNT(branch_id)', 'business_id', $id ) <= 0 )
        {
            $this->branch_model->delete_type( $id );
            echo 'true';
        } else
        {
            echo 'Branch Type cannot be removed as they contain Branch. There may currently be Branch within the Branch Type which you must delete first';
        }

    }


    public function save()
    {

        if ( IdenticalRecords( 'SELECT * FROM `' . $this->db->dbprefix( 'business' ) . '` WHERE `business_title` =  \'' . $this->input->post( 'business_title' ) .
            '\' ' ) == false )
        {
            $this->branch_model->save_type();
            echo 'true';
        } else
        {
            echo 'false';
        }


    }

    public function update()
    {
        $qry = 'SELECT * FROM `' . $this->db->dbprefix( 'business' ) . '`
                WHERE `business_title` = \'' . $this->input->post( 'business_title' ) . '\' AND `business_id` != ' . $this->input->post( 'business_id' );


        if ( IdenticalRecords( $qry ) == false )
        {
            $this->branch_model->update_data_type();
            echo 'true';
        } else
        {
            echo 'Branch Type Already Exists!';
        }


    }

    public function ajaxBranchTypeName()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'business' ) . "
                WHERE `business_title` = '" . $validateValue . "' ";


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

    public function ajaxBranchTypeNameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode( '-', $validateId );


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'business' ) . "
                WHERE `business_title` = '" . $validateValue . "' AND `business_id` != $value[1] ";


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


}
