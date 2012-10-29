<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Package extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'product_package_model' );
    }

    public function index()
    {
        $data['product_package'] = $this->product_package_model->get_product_package();
        $this->gtemplate->load_view( 'package/index', $data );

    }

    public function add()
    {
        $this->load->view( 'views/package/_add' );
    }

    public function edit( $id = false )
    {
        $data['package'] = $this->product_package_model->get_product_package( $id );
        $this->load->view( 'views/package/_edit', $data );
    }

    public function save()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix( 'package' ) . "
                WHERE `name` = '" . $this->input->post( 'PackageName' ) . "' ";

        if ( IdenticalRecords( $qry ) == true )
        {
            echo 'Package Name Already Exists!';
        } else
        {
            $this->product_package_model->save();
        }

    }
    public function update()
    {
        $qry = "SELECT * FROM " . $this->db->dbprefix( 'package' ) . "
                WHERE `name` = '" . $this->input->post( 'PackageName' ) . "' AND `package_id` != '" . $this->input->post( 'package_id' ) . "' ";


        if ( IdenticalRecords( $qry ) == true )
        {
            echo 'Package Already Exsist!';
        } else
        {
            $this->product_package_model->update();
            echo 'true';
        }
    }


    public function delete( $id = false )
    {
        $this->product_package_model->delete( $id );
    }


    public function check_delete($id = null)
    {
        $response = 'true';
        
        if ( getReturnValue( $this->db->dbprefix( 'product_package' ), 'package_id', 'package_id', $id ) > 0 )
        {
            $response = 'Package cannot be removed as they contain Products. There may currently be Products within the Package which you must delete first!';
        }
        echo $response;
    }
    
    public function ajaxProductPackageName()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'package' ) . "
                WHERE `name` = '" . $validateValue . "' ";


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


    public function ajaxProductPackageNameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode( '-', $validateId );


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'package' ) . "
                WHERE `name` = '" . $validateValue . "' AND `package_id` != $value[1] ";


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
