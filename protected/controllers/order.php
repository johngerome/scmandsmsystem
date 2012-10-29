<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'order_model' );
    }

    public function index()
    {

        //$data['qry_order_list'] = $this->order_model->get_order_list();
        $this->gtemplate->load_view( 'notification/index' );
    }

    public function data()
    {


        $data['qry_order_list'] = $this->order_model->get_order_list();
        $this->load->view( 'views/notification/_data', $data );
    
    }
    
    

    public function archive( $order_id = null )
    {
        if ( $order_id ) $this->order_model->archive( $order_id );
        $this->gtemplate->load_view( '404_error' );
    }

    public function restore( $order_id = null )
    {
        if ( $order_id ) $this->order_model->restore( $order_id );
        $this->gtemplate->load_view( '404_error' );
    }

    public function delete( $order_id = null )
    {
        if ( $order_id ) $this->order_model->delete( $order_id );
        $this->gtemplate->load_view( '404_error' );
    }


    public function view( $order_id = false )
    {
        if ( !$order_id )
        {

            $this->gtemplate->load_view( '404_error' );

        } else
        {

            $this->order_model->update_order_state( $order_id );
            $data['archive'] = getReturnValue( $this->db->dbprefix( 'order_msg' ), 'archive', 'order_id', $order_id );


            $data['subject'] = getReturnValue( $this->db->dbprefix( 'order_msg' ), 'subject', 'order_id', $order_id );
            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', getReturnValue( $this->db->dbprefix( 'order' ),
                'branch_id_from', 'order_id', $order_id ) );
            $data['branch_location'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'location', 'branch_id', getReturnValue( $this->db->dbprefix( 'order' ),
                'branch_id_from', 'order_id', $order_id ) );
            $data['date_time_ordered'] = getReturnValue( $this->db->dbprefix( 'order_msg' ), 'date_time', 'order_id', $order_id );
            $data['read_on'] = getReturnValue( $this->db->dbprefix( 'order_msg' ), 'read_on', 'order_id', $order_id );
            $data['read_by'] = getFullReturnValue( 'SELECT * FROM tbx101_order_msg_user_read 
                            JOIN tbx101_account 
                            ON tbx101_account.account_id = tbx101_order_msg_user_read.account_id 
                            WHERE msg_id = ' . getReturnValue( $this->db->dbprefix( 'order_msg' ), 'order_id', 'order_id', $order_id ) );
            $data['ordered_products'] = $this->order_model->view_ordered_products( $order_id );
            $data['type'] = getReturnValue( $this->db->dbprefix( 'order_msg' ), 'type', 'order_id', $order_id );

            $data['order_products'] = $this->order_model->view_ordered_products( $order_id );


            $this->gtemplate->load_view( 'notification/view', $data );
        }
    }

    public function trash()
    {

        $data['qry_order_list'] = $this->order_model->get_order_list_archive();
        $this->gtemplate->load_view( 'notification/archive', $data );
    }
    
    public function count_notification(){
    	$this->load->view('views/notification/count_notification');
    }
    
}
