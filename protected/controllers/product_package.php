<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_package extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_package_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        $qry = $this->db->query('SELECT *
            FROM tbx101_product_package
            INNER JOIN (tbx101_package,tbx101_product)
            ON (tbx101_product_package.package_id = tbx101_package.package_id AND tbx101_product_package.product_id = tbx101_product.ProductId)
           GROUP BY product_id  ORDER BY tbx101_product.ProductName ASC ');

        $data['product_package'] = $qry->result();
        $this->gtemplate->load_view('product_package/index', $data);
    }

    public function add()
    {
        $data['product'] = $this->product_package_model->get_products_with_no_package();
        $data['package'] = $this->product_package_model->get_product_package();
        $this->load->view('views/product_package/_add', $data);
    }

    public function edit($id = false)
    {

        $data['product_name'] = getReturnValue($this->db->dbprefix('product'), 'ProductName', 'ProductId', $id);
        $data['id'] = $id;
        $data['product'] = $this->product_package_model->get_products_with_no_package();
        //Current Package
        $data['package'] = $this->product_package_model->get_products_under_package($id);
        //Other Package Exept ...
        $data['package2'] = $this->product_package_model->get_products_under_package2($id);
        $this->load->view('views/product_package/_edit', $data);

    }
    public function save()
    {
        $this->product_package_model->save_package();
    }

    public function update()
    {
        $this->product_package_model->update_package();
    }
    
    public function delete($id = false){
        
        $this->product_package_model->delete_package($id);
    }
    
   

}
