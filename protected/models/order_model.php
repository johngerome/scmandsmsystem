<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Order_model extends CI_Model
{
    public function get_order_list()
    {

        $qry = $this->db->query('SELECT * FROM tbx101_order_msg    
                                    JOIN tbx101_order   
                                    ON tbx101_order_msg.order_id = tbx101_order.order_id WHERE archive = 0 ORDER BY state = 0 DESC, read_on DESC, tbx101_order.order_id ASC');
        return $qry->result();

    }
        public function get_order_list_archive()
    {

        $qry = $this->db->query('SELECT * FROM tbx101_order_msg    
                                    JOIN tbx101_order   
                                    ON tbx101_order_msg.order_id = tbx101_order.order_id WHERE archive = 1 ORDER BY state DESC, read_on DESC, tbx101_order.order_id ASC');
        return $qry->result();

    }
    public function get_order_list_unread()
    {

        $qry = $this->db->query('SELECT * FROM tbx101_order_msg    
                                JOIN tbx101_order   
                                ON tbx101_order_msg.order_id = tbx101_order.order_id 
                                WHERE archive = 0
                                AND state = 0 
                                ORDER BY tbx101_order.order_id DESC');
        return $qry->result();

    }
    public function count_unread_notification()
    {
        $qry = $this->db->query('SELECT COUNT(order_id) as count_data FROM tbx101_order_msg
                                WHERE archive = 0 AND state = 0');
        foreach ($qry->result() as $row)
        {
            return $row->count_data;
        }
    }

    public function get_order_subject($id = false)
    {

        $qry = $this->db->query('SELECT * FROM ' . $this->db->dbprefix('order') . ' WHERE `order_id` = ' . $id);
        foreach ($qry->result() as $row)
        {
            return $row->subject;

        }

    }

    public function view_ordered_products($order_id = false)
    {
        $qry = $this->db->query('SELECT * FROM tbx101_order_products
        JOIN tbx101_product ON tbx101_order_products.product_id = tbx101_product.ProductId 
        WHERE order_id = ' . $order_id . '
        ');

        return $qry->result();

    }

    public function update_order_state($order_id = false)
    {
        $date = time();
        $account_id = getAccountID($this->session->userdata('username'));

        if (getReturnValue($this->db->dbprefix('order_msg'), 'state', 'order_id', $order_id) == 0)
        {
            //Update Order Message State
            $data = array(
                'state' => '1',
                'read_on' => $date,
                );

            $this->db->where('order_id', $order_id);
            $this->db->update($this->db->dbprefix('order_msg'), $data);
        }


        $qry = $this->db->query('SELECT * FROM ' . $this->db->dbprefix('order_msg_user_read') . ' WHERE `account_id` = ' . $account_id . ' AND msg_id = ' . $order_id);
        if (!$qry->result())
        {
            $data = array(
                'account_id' => $account_id,
                'msg_id' => $order_id,
                );

            $this->db->insert($this->db->dbprefix('order_msg_user_read'), $data);
        }
    }

    public function archive($order_id = false)
    {

        //Update Order Message State
        $data = array('archive' => '1', );

        $this->db->where('order_id', $order_id);
        $this->db->update($this->db->dbprefix('order_msg'), $data);
        echo 'true';

    }
    
        public function restore($order_id = false)
    {

        //Update Order Message State
        $data = array('archive' => '0', );

        $this->db->where('order_id', $order_id);
        $this->db->update($this->db->dbprefix('order_msg'), $data);
        echo 'true';

    }
    
    public function delete($order_id = false){
        
    	$this->db->delete($this->db->dbprefix('order'), array('order_id' => $order_id));
        $this->db->delete($this->db->dbprefix('order_msg'), array('order_id' => $order_id));
    }

}
