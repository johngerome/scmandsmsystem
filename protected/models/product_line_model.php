<?php

 if (!defined('BASEPATH')) exit('No direct script access allowed');

 /**
  * 
  */
 class Product_line_model extends CI_Model
 {

     public function get_product_line()
     {
         $qry = $this->db->query('SELECT * FROM `tbx101_product_line` ORDER BY ProductLineName ASC ');
         return $qry->result();
     }


     /**
      * 
      */
     public function get_product_line_quantity_byID($id = false)
     {
         $qry = 'SELECT count(ProductId)as product FROM `tbx101_product` 
                WHERE `ProductLineId` = ' . $id;
        
         $query = $this->db->query($qry);
         if ($query->result())
         {
             foreach ($query->result() as $row)
             {
                 return $row->product;
             }
         }
         else
         {
             return '0';
         }

     }

     /**
      * 
      */
     public function get_product_line_byID($id = false)
     {

         $qry = $qry = $this->db->query('SELECT * FROM `tbx101_product_line` 
                WHERE `ProductLineId` = ' . $id);
         return $qry->result();


     }

     public function delete($id = False)
     {

         $this->db->delete($this->db->dbprefix('product_line'), array('ProductLineId' => $id));
     }

     public function update_product_line()
     {

         $data = array(
             'ProductLineName' => $this->input->post('ProductLineName'),
             'Description' => $this->input->post('description'),
             );

         $this->db->where('ProductLineId', $this->input->post('id'));
         $this->db->update($this->db->dbprefix('product_line'), $data);

     }

     public function save()
     {
         $data = array(
             'ProductLineName' => $this->input->post('ProductLineName'),
             'Description' => $this->input->post('description'),
             );
         $this->db->insert($this->db->dbprefix('product_line'), $data);
     }

 }
