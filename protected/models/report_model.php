<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Report_model extends CI_Model
{

    public function generate_daily($branch_id = null)
    {
        if ($branch_id != 0)
        {
            $qry = $this->db->query('SELECT CONCAT(DAYNAME(Date),\', \',MONTHNAME(Date),\' \',DAY(Date),\', \',YEAR(Date)) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                                FROM tbx101_sale WHERE branch_id = ' . $branch_id . '
                                GROUP BY Sales_date
                                ORDER BY DAY(Date),Sales_date
                                ');
            return $qry->result();
        } else
        {
            $qry = $this->db->query('SELECT CONCAT(DAYNAME(Date),\', \',MONTHNAME(Date),\' \',DAY(Date),\', \',YEAR(Date)) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                                FROM tbx101_sale
                                GROUP BY Sales_date
                                ORDER BY branch_id,DAY(Date)
                                ');
            return $qry->result();
        }

    }

    public function generate_monthly($branch_id = null)
    {
        if ($branch_id != 0)
        {
            $qry = $this->db->query('SELECT CONCAT(MONTHNAME(Date),\' \',YEAR(Date)) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                    FROM tbx101_sale WHERE branch_id = ' . $branch_id . '
                    GROUP BY branch_id,Sales_date
                    ORDER BY MONTHNAME(Date),branch_id');
            return $qry->result();

        } else
        {
            $qry = $this->db->query('SELECT CONCAT(MONTHNAME(Date),\' \',YEAR(Date)) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                    FROM tbx101_sale
                    GROUP BY Sales_date
                    ORDER BY branch_id,MONTHNAME(Date)');
            return $qry->result();

        }
    }

    public function generate_yearly($branch_id = null)
    {
        if ($branch_id != 0)
        {
            $qry = $this->db->query('SELECT YEAR(Date) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                    FROM tbx101_sale WHERE branch_id = ' . $branch_id . '
                    GROUP BY branch_id,Sales_date
                    ORDER BY YEAR(Date),branch_id');
            return $qry->result();

        } else
        {
            $qry = $this->db->query('SELECT YEAR(Date) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                    FROM tbx101_sale
                    GROUP BY Sales_date
                    ORDER BY branch_id,YEAR(Date)');
            return $qry->result();

        }
    }


    public function generate_sp_date($branch_id = 0, $date_from = null, $date_to = null)
    {
        if ($branch_id != 0)
        {
            $qry = $this->db->query('SELECT CONCAT(\'' . $date_from . ' - ' . $date_to . '\') as Sales_date ,SUM(PaidAmount)as sales,branch_id
                    FROM tbx101_sale
                    WHERE branch_id = ' . $branch_id . ' 
                    AND DATE_FORMAT(Date,\'%m/%d/%Y\') BETWEEN \'' . $date_from . '\' AND \'' . $date_to . '\'
                    GROUP BY Sales_date');
            return $qry->result();

        } else
        {
            $qry = $this->db->query('SELECT CONCAT(\'' . $date_from . ' - ' . $date_to . '\') as Sales_date ,SUM(PaidAmount)as sales,branch_id
                    FROM tbx101_sale
                    WHERE DATE_FORMAT(Date,\'%m/%d/%Y\') BETWEEN \'' . $date_from . '\' AND \'' . $date_to . '\'
                    GROUP BY Sales_date');
            return $qry->result();

        }
    }

    public function top_sales()
    {
        $qry = $this->db->query('SELECT SUM(PaidAmount)as sales,branch_name,location    
                    FROM tbx101_sale    
                    JOIN tbx101_branch  
                    ON tbx101_sale.branch_id = tbx101_branch.branch_id  
                    WHERE YEAR(Date) = YEAR(NOW())  
                    GROUP BY tbx101_sale.branch_id  
                    ORDER by SUM(PaidAmount) DESC
                    LIMIT 0,1');
        return $qry->result();

    }

    public function top_sales_month()
    {
        $qry = $this->db->query('SELECT SUM(PaidAmount)as sales,branch_name,location    
                    FROM tbx101_sale    
                    JOIN tbx101_branch  
                    ON tbx101_sale.branch_id = tbx101_branch.branch_id  
                    WHERE MONTH(Date) = MONTH(\''.date('Y-m-d H:i:s').'\')  
                    GROUP BY tbx101_sale.branch_id  
                    ORDER by SUM(PaidAmount) DESC
                    LIMIT 0,1');
        return $qry->result();

    }


    public function top_sales_day()
    {
        $qry = $this->db->query('SELECT SUM(PaidAmount)as sales,branch_name,location    
                    FROM tbx101_sale    
                    JOIN tbx101_branch  
                    ON tbx101_sale.branch_id = tbx101_branch.branch_id  
                    WHERE DAY(Date) = DAY(\''.date('Y-m-d H:i:s').'\')  
                    GROUP BY tbx101_sale.branch_id  
                    ORDER by SUM(PaidAmount) DESC
                    LIMIT 0,1');
        return $qry->result();

    }

    public function chart_rp()
    {

        $qry = $this->db->query('SELECT DAY(Date) as Sales_date ,SUM(PaidAmount)as sales,branch_id
                                FROM tbx101_sale
                                GROUP BY Sales_date
                                ORDER BY branch_id,DAY(Date)
                                ');
        return $qry->result();

    }
    public function last_day()
    {

        $query = $this->db->query('SELECT DATE_FORMAT( LAST_DAY(\''.date('Y-m-d H:i:s').'\'),\'%e\' ) as _day ');
        foreach ($query->result() as $row)
        {
            return $row->_day;
        }
    }
}
