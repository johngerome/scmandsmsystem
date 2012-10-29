<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Branch_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param ID
     */
    public function get_branch($id = false)
    {
        if (!$id)
        {
            $sql = 'SELECT * ';
            $sql .= 'FROM `tbx101_branch` ';
            $sql .= 'JOIN `tbx101_business` ';
            $sql .= 'ON tbx101_branch.`business_id` = tbx101_business.`business_id` 
                  WHERE tbx101_branch.archive = 0 ORDER BY tbx101_branch.`branch_name` ASC ';

            $query = $this->db->query($sql);
            return $query->result();
        } else
        {
            $sql = 'SELECT * ';
            $sql .= 'FROM `tbx101_branch` ';
            $sql .= 'JOIN `tbx101_business` ';
            $sql .= 'ON tbx101_branch.`business_id` = tbx101_business.`business_id` 
                  WHERE `archive` = 0 AND tbx101_branch.branch_id != ' . $id;

            $query = $this->db->query($sql);
            return $query->result();

        }


    }
    public function get_all_branch()
    {
        $sql = 'SELECT * FROM `tbx101_business` ';

        $query = $this->db->query($sql);
        return $query->result();

    }
    
    

    public function get_all_branch_type_having_product_line()
    {
        $query = $this->db->query('SELECT *
                FROM tbx101_branch_product_line
                JOIN (tbx101_product_line,tbx101_business)
                ON tbx101_branch_product_line.ProductLineId = tbx101_product_line.ProductLineId
                AND tbx101_branch_product_line.branch_type_id = tbx101_business.business_id
                GROUP BY tbx101_business.business_id ORDER BY tbx101_business.business_id ASC
                ');
        return $query->result();
    }

    public function get_archive_branch()
    {
        $sql = 'SELECT * ';
        $sql .= 'FROM `tbx101_branch` ';
        $sql .= 'JOIN `tbx101_business` ';
        $sql .= 'ON tbx101_branch.`business_id` = tbx101_business.`business_id` 
                  WHERE `archive` = 1';

        $query = $this->db->query($sql);
        return $query->result();

    }

    public function get_branch_byID($id = false)
    {

        $sql = 'SELECT * ';
        $sql .= 'FROM `tbx101_branch` ';
        $sql .= 'JOIN `tbx101_business` ';
        $sql .= 'ON tbx101_branch.`business_id` = tbx101_business.`business_id` 
                  WHERE `archive` = 0 AND `branch_id` = ' . $id;

        $query = $this->db->query($sql);
        return $query->result();

    }

    public function count_branch()
    {
        $query = $this->db->query('SELECT count(branch_id) as total FROM `tbx101_branch` WHERE archive = 0');
        foreach ($query->result() as $row)
        {
            return $total = $row->total;
        }

    }

    public function get_product_line($branch_id = false, $symbol = '=')
    {
        if ($branch_id)
        {
            $query = $this->db->query('SELECT tbx101_product_line.ProductLineId,tbx101_product_line.ProductLineName FROM tbx101_branch_product_line
                            JOIN (tbx101_product_line)
                            ON tbx101_branch_product_line.ProductLineId =tbx101_product_line.ProductLineId
                            WHERE tbx101_branch_product_line.branch_type_id ' . $symbol . ' ' . $branch_id .
                ' GROUP BY tbx101_product_line.ProductLineName ORDER BY tbx101_product_line.ProductLineName ASC');

            return $query->result();
        }

    }
    public function get_product_line_2($branch_id = false)
    {
        $id = '';
        $qry = $this->db->query('SELECT * FROM tbx101_branch_product_line WHERE branch_type_id = ' . $branch_id);

        $_x = 1;
        $_s = sizeof($qry->result());

        foreach ($qry->result() as $row)
        {
            $id .= $row->ProductLineId;
            if ($_s != $_x)
            {
                $id .= ',';
            }
            $_x++;
        }

        $qry = $this->db->query('SELECT *
                                 FROM tbx101_product_line
                                 WHERE ProductLineId
                            NOT IN (' . $id . ') ORDER BY ProductLineName ASC ');

        return $qry->result();

    }

    public function get_product_line_under_branch_type($branch_type_id = false)
    {
        $qry = $this->db->query('SELECT * FROM tbx101_branch_product_line
        JOIN tbx101_product_line
        ON tbx101_branch_product_line.ProductLineId = tbx101_product_line.ProductLineId
        WHERE branch_type_id = ' . $branch_type_id);

        return $qry->result();

    }

    /**
     *  @param Branch ID
     */
    public function get_branch_manager($id = false)
    {

        $sql = 'SELECT * FROM `tbx101_branch`
                JOIN tbx101_account
                ON manager = account_id
                WHERE branch_id = ' . $id;

        $query = $this->db->query($sql);


        if ($query->result())
        {
            foreach ($query->result() as $row)
            {
                return $return_val = $row->first_name . ' ' . $row->last_name;
            }
        } else
        {
            return 'None';
        }
    }


    public function get_branch_manager_account_id($id = false)
    {

        $sql = 'SELECT * FROM `tbx101_branch`
                JOIN tbx101_account
                ON manager = account_id
                WHERE branch_id = ' . $id;

        $query = $this->db->query($sql);


        if ($query->result())
        {
            foreach ($query->result() as $row)
            {
                return $return_val = $row->account_id;
            }
        } else
        {
            return 'None';
        }
    }

    /**
     *  @param Branch ID
     */
    public function get_branch_cashier($id = false)
    {

        $sql = 'SELECT * FROM `tbx101_branch`
                JOIN `tbx101_account`
                ON `cashier` = `account_id`
                WHERE `branch_id` = ' . $id;

        $query = $this->db->query($sql);

        if ($query->result())
        {
            foreach ($query->result() as $row)
            {
                return $return_val = $row->first_name . ' ' . $row->last_name;
            }
        } else
        {
            return 'None';

        }
    }

    public function get_branch_cashier_account_id($id = false)
    {

        $sql = 'SELECT * FROM `tbx101_branch`
                JOIN `tbx101_account`
                ON `cashier` = `account_id`
                WHERE `branch_id` = ' . $id;

        $query = $this->db->query($sql);

        if ($query->result())
        {
            foreach ($query->result() as $row)
            {
                return $return_val = $row->account_id;
            }
        } else
        {
            return 'NONE';

        }
    }

    public function archive($id = false)
    {


        $data = array('archive' => '1');

        $this->db->where('branch_id', $id);
        $this->db->update($this->db->dbprefix('branch'), $data);
    }

    public function restore($id = false)
    {
        $data = array('archive' => '0', );

        $this->db->where('branch_id', $id);
        $this->db->update($this->db->dbprefix('branch'), $data);
    }

    public function delete($id = false)
    {


        //--------------------
        //Update User Accounts
        //---------------------
        //--------------------
        /**
         *          //Cashier
         *          $qry = $this->db->query('SELECT `cashier` FROM `tbx101_branch` WHERE `branch_id` = ' . $id);
         *          echo 'SELECT `cashier` FROM `tbx101_branch` WHERE `branch_id` = ' . $id;
         *          foreach ($qry->result() as $row)
         *          {
         *              $cashier_id = $row->cashier;
         *          }
         *          $data = array('status' => '0', );
         *          $this->db->where('account_id', $cashier_id);
         *          $this->db->update($this->db->dbprefix('account'), $data);
         *          //-------------------------

         *          //--------------------
         *          //Manager
         *          $qry = $this->db->query('SELECT `manager` FROM `tbx101_branch` WHERE `branch_id` = ' . $id);
         *          foreach ($qry->result() as $row)
         *          {
         *              $manager_id = $row->manager;
         *          }
         *          $data = array('status' => '0', );
         *          $this->db->where('account_id', $manager_id);
         *          $this->db->update($this->db->dbprefix('account'), $data);
         */
        //-------------------------


        $this->db->delete($this->db->dbprefix('branch'), array('branch_id' => $id));

    }

    public function delete_type($id = false)
    {
        $this->db->delete($this->db->dbprefix('business'), array('business_id' => $id));
    }

    public function save_type()
    {
        $data = array('business_title' => $this->input->post('business_title'));
        $this->db->insert($this->db->dbprefix('business'), $data);

        //Save Branch Product Line
        $last_business_id = getReturnValue($this->db->dbprefix('business'), 'max(business_id)');

        $pline_id = $this->input->post('ProductLineId');
        for ($x = 0; $x < sizeof($pline_id); $x++)
        {
            $data = array('branch_type_id' => $last_business_id, 'ProductLineId' => $pline_id[$x]);
            $this->db->insert($this->db->dbprefix('branch_product_line'), $data);
        }

    }

    public function save()
    {

        //Save Branch
        $data = array(
            'branch_name' => $this->input->post('branch_name'),
            'location' => $this->input->post('branch_location'),
            'business_id' => $this->input->post('branch_type'),
            );
        $this->db->insert($this->db->dbprefix('branch'), $data);

    }

    public function update_data()
    {
        //Update Branch Info First
        $data = array(
            'branch_name' => $this->input->post('branch_name'),
            'business_id' => $this->input->post('business_id'),
            'location' => $this->input->post('branch_location'),
            );
        $this->db->where('branch_id', $this->input->post('branch_id'));
        $this->db->update($this->db->dbprefix('branch'), $data);

        /**
         *                 //Then Dele All Product Line under branch_id
         *         $branch_id = $this->input->post('branch_id');
         *         $this->db->delete($this->db->dbprefix('branch_product_line'), array('branch_id' => $branch_id));


         *         //Then Save Product Line in branch_product_line
         *         $pline_id = $this->input->post('ProductLineId');
         *         if ($pline_id)
         *         {
         *             for ($x = 0; $x < sizeof($pline_id); $x++)
         *             {
         *                 $data = array('branch_id' => $branch_id, 'ProductLineId' => $pline_id[$x]);
         *                 $this->db->insert($this->db->dbprefix('branch_product_line'), $data);
         *             }
         *         }
         */

    }

    public function update_data_type()
    {

        $data = array('business_title' => $this->input->post('business_title'), );
        $this->db->where('business_id', $this->input->post('business_id'));
        $this->db->update($this->db->dbprefix('business'), $data);


        $branch_type_id = $this->input->post('business_id');
        $this->db->delete($this->db->dbprefix('branch_product_line'), array('branch_type_id' => $branch_type_id));
        
        //Then Save Product Line in branch_product_line
        $pline_id = $this->input->post('ProductLineId');
        if ($pline_id)
        {
            for ($x = 0; $x < sizeof($pline_id); $x++)
            {
                $data = array('branch_type_id' => $branch_type_id, 'ProductLineId' => $pline_id[$x]);
                $this->db->insert($this->db->dbprefix('branch_product_line'), $data);
            }
        }

    }


}

/* End File: */
