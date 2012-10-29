<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function get_customer_list()
    {
        $qry = $this->db->query('SELECT * FROM ' . $this->db->dbprefix('customer').' ORDER BY FirstName ASC ');
        return $qry->result();

    }

    public function get_customer_list_byID($id = false)
    {
        $qry = $this->db->query('SELECT * FROM ' . $this->db->dbprefix('customer') . ' WHERE CustomerId = \'' . $id . '\'');
        return $qry->result();

    }


    public function delete($id = false)
    {
        $dir = dirname(BASEPATH) . '/images/customer/' . $id . '/';

        $qry = $this->db->query('SELECT `ProfilePic` FROM ' . $this->db->dbprefix('customer') . ' WHERE `CustomerId` = ' . $id);

        foreach ($qry->result() as $row)
        {
            $ProfilePic = $row->ProfilePic;
        }
        //mkdir(dirname(BASEPATH) . '/images/user/', 0777);
        if (is_file($dir . '/Thumbs.db'))
        {
            unlink($dir . '/Thumbs.db');
        }
        if (is_dir($dir))
        {
            if (is_file($dir . $ProfilePic))
            {
                unlink($dir . $ProfilePic);
                rmdir($dir);
                $this->db->delete($this->db->dbprefix('customer'), array('CustomerId' => $id));
                echo 'true';
            }
        } else
        {
            echo 'Error Deleting Directory';
        }

    }

    public function update_data()
    {
        $ret = 'true';
        $discount = $this->input->post('Discount');
        $current_id = $this->input->post('CustomerId');

    
        $qry = $this->db->query('SELECT ProfilePic FROM ' . $this->db->dbprefix('customer').' WHERE CustomerId = '.$current_id);
        foreach ($qry->result() as $row)
        {
            $profile_pic = $row->ProfilePic;

        }

        //If a User Uploaded a Picture,,,
        if ($this->input->post('ProfilePic') != $profile_pic)
        {

            //If (!file_exists(dirname(BASEPATH) . '/images/customer/' . $current_id))
            // {
            //Move File into Directory
            if (copy(dirname(BASEPATH) . "/images/temp/" . $this->input->post('ProfilePic'), dirname(BASEPATH) . '/images/customer/' . $current_id . '/' . $this->
                input->post('ProfilePic')))
            {
                
                if(is_file(dirname(BASEPATH) . "/images/temp/" . $this->input->post('ProfilePic'))){
                    unlink(dirname(BASEPATH) . "/images/temp/" . $this->input->post('ProfilePic'));
                }
                if(is_file(dirname(BASEPATH) . '/images/customer/' . $current_id . '/' . $profile_pic)){
                     unlink(dirname(BASEPATH) . '/images/customer/' . $current_id . '/' . $profile_pic);
                }
               
            }
        }

        if($discount <= 100){
            
       
        $data = array(
            'ProfilePic' => $this->input->post('ProfilePic'),
            'FirstName' => $this->input->post('FirstName'),
            'LastName' => $this->input->post('LastName'),
            'MiddleName' => $this->input->post('MiddleName'),
            'EmailAddress' => $this->input->post('EmailAddress'),
            'HomeAddress' => $this->input->post('HomeAddress'),
            'CompanyName' => $this->input->post('CompanyName'),
            'ContactNumber' => $this->input->post('ContactNumber'),
            'Discount' => $discount,

            );

        $this->db->where('CustomerId', $this->input->post('CustomerId'));
        $this->db->update($this->db->dbprefix('customer'), $data);
         
         }else{
            $ret = 'Maximum value for Discount is 100';
         }
         
         

        echo $ret;

    }

    public function save()
    {
        $ret = false;
        //$discount = (int)$this->input->post('Discount') / 100;
        $time = time();
        $added_by = getAccountID($this->session->userdata('username'));

        $data = array(
            'ProfilePic' => $this->input->post('ProfilePic'),
            'FirstName' => $this->input->post('FirstName'),
            'LastName' => $this->input->post('LastName'),
            'MiddleName' => $this->input->post('MiddleName'),
            'EmailAddress' => $this->input->post('EmailAddress'),
            'HomeAddress' => $this->input->post('HomeAddress'),
            'CompanyName' => $this->input->post('CompanyName'),
            'ContactNumber' => $this->input->post('ContactNumber'),
            'Discount' => $this->input->post('Discount'),
            'time' => $time,
            'added_by' => $added_by

            );
        $this->db->insert($this->db->dbprefix('customer'), $data);


        //Get Customers ID
        $qry = $this->db->query('SELECT MAX(CustomerId)as id FROM ' . $this->db->dbprefix('customer'));
        foreach ($qry->result() as $row)
        {
            $current_id = $row->id;
        }


        //If a User Uploaded a Picture,,,
        if ($this->input->post('ProfilePic') != 'default_large.png')
        {


            if (!file_exists(dirname(BASEPATH) . '/images/customer/' . $current_id))
            {
                mkdir(dirname(BASEPATH) . '/images/customer/' . $current_id, 0777);

                //Move File into new created Directory
                if (copy(dirname(BASEPATH) . "/images/temp/" . $this->input->post('ProfilePic'), dirname(BASEPATH) . '/images/customer/' . $current_id . '/' . $this->
                    input->post('ProfilePic')))
                {
                    unlink(dirname(BASEPATH) . "/images/temp/" . $this->input->post('ProfilePic'));
                }
                $ret = true;
            } else
            {
                echo 'Error in Creating Directories';
            }

        } else
        {

            if (!file_exists(dirname(BASEPATH) . '/images/customer/' . $current_id))
            {
                mkdir(dirname(BASEPATH) . '/images/customer/' . $current_id, 0777);

                //Move File into new created Directory
                if (copy(dirname(BASEPATH) . "/images/default_large.png", dirname(BASEPATH) . '/images/customer/' . $current_id . '/default_large.png'))
                {
                    $ret = true;
                } else
                {
                    echo 'Error in Creating Directories for Default Profile';
                }
                $ret = true;

            } else
            {
                echo 'Directories Exists for Default Profile';
            }

        }


        return $ret;
    }
}
