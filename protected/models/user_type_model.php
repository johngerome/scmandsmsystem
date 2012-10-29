<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_type_model extends CI_Model
{

    public function get_user_type_list()
    {
        $sql = $this->db->query('SELECT * FROM `' . $this->db->dbprefix('usertype') . '` WHERE user_type_id != 1  ORDER BY name ASC ');
        return $sql->result();
    }

    public function count_usertype_in_account($usertye_id = false)
    {
        $sql = $this->db->query('SELECT count(account_id)as id FROM `' . $this->db->dbprefix('account') . '` WHERE user_type_id =' . $usertye_id);
        foreach ($sql->result() as $row)
        {
            return $row->id;
        }
    }

    public function page_access($type = false)
    {
        $sql = $this->db->query('SELECT * FROM `' . $this->db->dbprefix('permission') . '` WHERE `parent` = \'' . $type . '\' ORDER BY `description` ');
        return $sql->result();

    }

    public function page_access_edit($usertype_id = false, $permission_id = false)
    {
        $sql = $this->db->query('SELECT * FROM tbx101_user_access
                JOIN tbx101_usertype
                ON tbx101_user_access.user_type_id = tbx101_usertype.user_type_id
                WHERE tbx101_user_access.user_type_id = ' . $usertype_id . ' AND permission_id = ' . $permission_id);

        if ($sql->result())
        {
            return true;
        } else
        {
            return false;
        }

        return 'SELECT * FROM tbx101_user_access
                JOIN tbx101_usertype
                ON tbx101_user_access.user_type_id = tbx101_usertype.user_type_id
                WHERE tbx101_user_access.user_type_id = ' . $usertype_id . ' AND permission_id = ' . $permission_id;

    }


    public function saved()
    {
        $data = array('name' => $this->input->post('name'));
        $this->db->insert('usertype', $data);

        //SERVER SIDE
        $server = $this->user_type_model->page_access('server');
        foreach ($server as $row)
        {

            if ($this->input->post($row->class) == 1)
            {
                $data = array('user_type_id' => getReturnValue($this->db->dbprefix('usertype'), 'MAX(user_type_id)'), 'permission_id' => $row->permission_id);
                $this->db->insert('user_access', $data);
            }
        }
        
        //CLIENT SIDE
        $client = $this->user_type_model->page_access('client');
        foreach ($client as $row)
        {

            if ($this->input->post($row->class) == 1)
            {
                $data = array('user_type_id' => getReturnValue($this->db->dbprefix('usertype'), 'MAX(user_type_id)'), 'permission_id' => $row->permission_id);
                $this->db->insert('user_access', $data);
            }
        }        

    }
    
    public function updated(){
        //DELETE IT FIRST
        $this->db->delete($this->db->dbprefix('user_access'), array('user_type_id' => $this->input->post('user_type_id')));
        
        //THEN SAVE AGAIN
        //INSERT USER ACCESS - SERVER SIDE ONLY
        $server = $this->user_type_model->page_access('server');
        foreach ($server as $row)
        {
            if ($this->input->post($row->class) == 1)
            {
                $data = array('user_type_id' => $this->input->post('user_type_id'), 'permission_id' => $row->permission_id);
                $this->db->insert('user_access', $data);
            }
        }
        
        //CLIENT SIDE
        $client = $this->user_type_model->page_access('client');
        foreach ($client as $row)
        {
            if ($this->input->post($row->class) == 1)
            {
                $data = array('user_type_id' => $this->input->post('user_type_id'), 'permission_id' => $row->permission_id);
                $this->db->insert('user_access', $data);
            }
        }
        
    	
    }

}
