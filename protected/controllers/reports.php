<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('product_line_model');
        $this->load->model('branch_model');
        $this->load->model('report_model');

    }
    public function index()
    {
         $date['top_sales'] = $this->report_model->top_sales();
         $date['top_sales_month'] = $this->report_model->top_sales_month();
         $date['top_sales_day'] = $this->report_model->top_sales_day();
        $this->gtemplate->load_view('reports/index',$date);
    }
    
    public function report($branch_id = 0, $date = 0)
    {
        $date_from = $this->input->post('datefrom');
        $date_to = $this->input->post('dateto');
        
        if ($date == 0){
            $data_name = 'Daily';
            $data['reports'] = $this->report_model->generate_daily($branch_id);
        }
        if ($date == 1){ 
            $data_name = 'Monthly';
            $data['reports'] = $this->report_model->generate_monthly($branch_id);
        }
        if ($date == 2){
            $data_name = 'Yearly';
            $data['reports'] = $this->report_model->generate_yearly($branch_id);
        }
        if ($date == 3){
            $data_name = 'Specify Date';
            $data['reports'] = $this->report_model->generate_sp_date($branch_id,$date_from,$date_to);
        }
        
        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;
        $data['date'] = $date;
        $data['date_name'] = $data_name;
        $data['branch_id'] = $branch_id;
        $data['branch_qry'] = $this->branch_model->get_branch();
       
        $this->load->view('views/reports/_report_by_branch', $data);

    }

}
