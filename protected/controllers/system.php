<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class System extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'system_model' );
        $this->load->model( 'account_model' );
    }

    public function index()
    {
        $data['qry_group'] = $this->account_model->get_client_user_type();
        $data['secret_key'] = $this->system_model->get_system_config( 'secret_key' );
        $data['vat'] = $this->system_model->get_system_config( 'vat' );

        $this->gtemplate->load_view( 'system/index', $data );
    }
    public function load_time_zone()
    {
        $data['timezone'] = $this->system_model->get_system_config( 'time_zone' );
        $data['timezone_key'] = $this->system_model->get_system_config( 'time_zone' );
        $this->load->view( 'views/system/_tz.php', $data );
    }
    public function save()
    {
        $reponse = 'true';
        $data = array( 
        'time_zone' => $this->input->post( 'timezone' ), 
         'vat' => $this->input->post( 'vat' ) 
        );

        $this->db->where( 'id', '0' );
        $this->db->update( $this->db->dbprefix( 'config' ), $data );

        echo $reponse;
    }

}
