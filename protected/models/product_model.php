<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * 
 */
class Product_model extends CI_Model
{
    public function get_product_list()
    {

        $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'product' ) . ' WHERE archive = 0 ORDER BY ProductName ASC' );
        return $qry->result();

    }

    public function get_archive_product()
    {

        $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'product' ) . ' WHERE archive = 1 ORDER BY ProductName ASC' );
        return $qry->result();

    }

    public function archive_product( $id = false )
    {
        $ret = 'true';


        $branch_product = getReturnValue( $this->db->dbprefix( 'product' ), 'Quantity', 'ProductId', $id );
        if ( $branch_product > 0 )
        {
            $ret = 'Error Sending product to trash. Make sure this product doesn\'t have any quantity. ';
        } else
        {
            $data = array( 'archive' => '1' );

            $this->db->where( 'ProductId', $id );
            $this->db->update( $this->db->dbprefix( 'product' ), $data );
        }
        echo $ret;

    }

    public function restore_product( $id = false )
    {
        $data = array( 'archive' => '0', );

        $this->db->where( 'ProductId', $id );
        $this->db->update( $this->db->dbprefix( 'product' ), $data );
    }


    public function get_product_byID( $id = false )
    {

        $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'product' ) . ' WHERE `ProductId` = ' . $id );
        return $qry->result();

    }


    public function get_product_line_name( $id = false )
    {
        if ( !$id )
        {
            $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'product_line' ) );
        } else
        {
            $qry = $this->db->query( 'SELECT * FROM ' . $this->db->dbprefix( 'product_line' ) . ' WHERE `ProductLineId` != ' . $id );

        }

        return $qry->result();
    }

    public function count_product()
    {
        $query = $this->db->query( 'SELECT count(ProductId) as total FROM `tbx101_product`' );
        foreach ( $query->result() as $row )
        {
            return $total = $row->total;
        }

    }

    public function save()
    {
        $vat_s = 'N';
        $response = 'true';
        if ( $this->input->post( 'vat' ) > 0 )
        {
            $vat_s = 'V';
        } 
        $data = array(
            'ProductLineId' => $this->input->post( 'ProductLineId' ),
            'ProductName' => $this->input->post( 'ProductName' ),
            'Description' => $this->input->post( 'Description' ),
            // 'ProductPrice' => $this->input->post('ProductPrice'),
            'ProductUnit' => $this->input->post( 'ProductUnit' ),
            'ReorderPoint' => $this->input->post( 'ReorderPoint' ),
            'Ceiling' => $this->input->post( 'Ceiling' ),
            'Flooring' => $this->input->post( 'Flooring' ),
            'vat' => $this->input->post( 'vat' ),
            'vat_s' => $vat_s,
            'expiration_days' => $this->input->post( 'expiry_days' ),
            'Quantity' => '0',
            );
        $this->db->insert( $this->db->dbprefix( 'product' ), $data );

        echo $response;

    }

    public function save_product_package()
    {
        //Save Products Packages
        $last_product_id = getReturnValue( $this->db->dbprefix( 'product' ), 'max(ProductId)' );

        $pline_id = $this->input->post( 'PackageId' );
        for ( $x = 0; $x < sizeof( $pline_id ); $x++ )
        {
            $data = array( 'product_id' => $last_product_id, 'package_id' => $pline_id[$x] );
            $this->db->insert( $this->db->dbprefix( 'product_package' ), $data );
        }

    }

    public function update()
    {
        $vat_s = 'N';
        if ( $this->input->post( 'vat' ) > 0 )
        {
            $vat_s = 'V';
        } 
        $data = array(
            'ProductLineId' => $this->input->post( 'ProductLineId' ),
            'ProductName' => $this->input->post( 'ProductName' ),
            'Description' => $this->input->post( 'Description' ),
            // 'ProductPrice' => $this->input->post('ProductPrice'),
            'ProductUnit' => $this->input->post( 'ProductUnit' ),
            'ReorderPoint' => $this->input->post( 'ReorderPoint' ),
            'Ceiling' => $this->input->post( 'Ceiling' ),
            'Flooring' => $this->input->post( 'Flooring' ),
            'vat' => $this->input->post( 'vat' ),
            'vat_s' => $vat_s,
            'expiration_days' => $this->input->post( 'expiry_days' ) );

        $this->db->where( 'ProductId', $this->input->post( 'ProductId' ) );
        $this->db->update( $this->db->dbprefix( 'product' ), $data );

    }

    public function delete( $id = false )
    {

        $this->db->delete( $this->db->dbprefix( 'product' ), array( 'ProductId' => $id ) );
    }

    public function count_re_order_product( $branch_id = false )
    {
        $query = $this->db->query( 'SELECT COUNT(product_id) as total
                FROM tbx101_branch_product
                INNER JOIN (tbx101_product,tbx101_branch)
                ON (tbx101_branch_product.product_id = tbx101_product.ProductId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id)
                WHERE tbx101_branch_product.branch_id = ' . $branch_id . ' AND tbx101_branch_product.quantity < tbx101_product.ReorderPoint' );
        foreach ( $query->result() as $row )
        {
            return $row->total;
        }

    }

    public function count_back_order_product( $branch_id = false )
    {
        $query = $this->db->query( 'SELECT COUNT(product_id) as total
                FROM tbx101_back_order
                INNER JOIN (tbx101_product,tbx101_branch)
                ON (tbx101_back_order.product_id = tbx101_product.ProductId AND tbx101_back_order.branch_id = tbx101_branch.branch_id)
                WHERE tbx101_back_order.branch_id = ' . $branch_id );
        foreach ( $query->result() as $row )
        {
            return $row->total;
        }

    }

    public function count_damage_product( $branch_id = false )
    {
        $query = $this->db->query( 'SELECT COUNT(product_id) as total
                FROM tbx101_adjustment_products
                INNER JOIN (tbx101_product,tbx101_branch)
                ON (tbx101_adjustment_products.product_id = tbx101_product.ProductId AND tbx101_adjustment_products.branch_id = tbx101_branch.branch_id)
                WHERE tbx101_adjustment_products.branch_id = ' . $branch_id . ' AND adjustment_type=\'Damage\' ' );
        foreach ( $query->result() as $row )
        {
            return $row->total;
        }

    }


    public function stock_in( $branch_id = 0 )
    {
        if ( $branch_id == 0 )
        {
            $query = $this->db->query( 'SELECT CONCAT(DAYNAME(Date),\', \',MONTHNAME(Date),\' \',DAY(Date),\', \',YEAR(Date)) as date_stock,branch_id,DAY(date) as day_stock 
                    FROM tbx101_stock_in
                    GROUP BY branch_id,DAY(date) 
                    ORDER BY DATE(date)' );
            return $query->result();
        } else
        {
            $query = $this->db->query( 'SELECT CONCAT(DAYNAME(Date),\', \',MONTHNAME(Date),\' \',DAY(Date),\', \',YEAR(Date)) as date_stock,branch_id,DAY(date) as day_stock 
                    FROM tbx101_stock_in 
                    WHERE branch_id = ' . $branch_id . '
                    GROUP BY branch_id,DAY(date) 
                    ORDER BY DATE(date)' );
            return $query->result();
        }
    }

    public function stock_monthly( $branch_id = 0 )
    {
        if ( $branch_id == 0 )
        {
            $query = $this->db->query( 'SELECT CONCAT(MONTHNAME(Date),\' \',YEAR(Date)) as date_stock,branch_id,MONTH(date) as day_stock 
                    FROM tbx101_stock_in 
                    GROUP BY branch_id,DAY(date) 
                    ORDER BY MONTH(date)' );
            return $query->result();
        } else
        {
            $query = $this->db->query( 'SELECT CONCAT(MONTHNAME(Date),\' \',YEAR(Date)) as date_stock,branch_id,MONTH(date) as day_stock 
                    FROM tbx101_stock_in 
                    WHERE branch_id = ' . $branch_id . '
                    GROUP BY branch_id,DAY(date) 
                    ORDER BY MONTH(date)' );
            return $query->result();
        }
    }

    public function stock_yearly( $branch_id = 0 )
    {
        if ( $branch_id == 0 )
        {
            $query = $this->db->query( 'SELECT YEAR(date) as date_stock,branch_id,YEAR(date) as day_stock 
                    FROM tbx101_stock_in 
                    GROUP BY branch_id,DAY(date) 
                    ORDER BY YEAR(date)' );
            return $query->result();
        } else
        {
            $query = $this->db->query( 'SELECT YEAR(date),branch_id,YEAR(date) as day_stock 
                    FROM tbx101_stock_in 
                    WHERE branch_id = ' . $branch_id . '
                    GROUP BY branch_id,DAY(date) 
                    ORDER BY YEAR(date)' );
            return $query->result();
        }
    }


    public function count_stock_in_branch( $branch_id = null, $date = null, $date_label = null )
    {
        $ret = '0';

        $query = $this->db->query( 'SELECT SUM(qty_stock_in) as total
                FROM tbx101_stock_in
                WHERE branch_id = ' . $branch_id . ' AND ' . $date_label . ' = ' . $date );
        if ( $query->result() )
        {
            foreach ( $query->result() as $row )
            {
                $ret = $row->total;
            }
        }
        return $ret;
    }

    public function count_stock_out_branch( $branch_id = null, $date = null, $date_label = null )
    {
        $ret = '0';
        $query = $this->db->query( 'SELECT SUM(qty_stock_out) as total
                FROM tbx101_stock_out
                WHERE branch_id = ' . $branch_id . ' AND ' . $date_label . ' = ' . $date );
        if ( $query->result() )
        {
            foreach ( $query->result() as $row )
            {
                $ret = $row->total;
            }
        }

        return $ret;

    }

    public function view_inventory_summary( $branch_id = null, $date = null, $date_label = null )
    {

        $query = $this->db->query( 'SELECT date,SUM(qty_stock_in) as total_stock_in,product_id  FROM tbx101_stock_in
                WHERE branch_id = ' . $branch_id . ' AND ' . $date_label . ' = ' . $date . '
                GROUP BY product_id
                ' );

        return $query->result();
    }

    public function is_by_product( $date_label = null )
    {
        if ( $date_label )
        {
            $query = $this->db->query( 'SELECT CONCAT(DAYNAME(date),\', \',MONTHNAME(date),\' \',DAY(date),\', \',YEAR(date)) as stock_date, MAX(qty_stock_in) as stock_in,
                        product_id,DAY(date) as date_val
                        FROM tbx101_stock_in
                        WHERE product_id = (SELECT MAX(qty_stock_out) FROM tbx101_stock_out)
                        GROUP BY ' . $date_label . '
                        ORDER BY MAX(qty_stock_in) DESC' );

            return $query->result();
        }
    }

    public function is_by_product_monthly( $date_label = null )
    {
        if ( $date_label )
        {
            $query = $this->db->query( 'SELECT CONCAT(MONTHNAME(date),\' \',YEAR(date)) as stock_date, MAX(qty_stock_in) as stock_in,
                        product_id,MONTH(date) as date_val
                        FROM tbx101_stock_in
                        WHERE product_id = (SELECT MAX(qty_stock_out) FROM tbx101_stock_out)
                        GROUP BY ' . $date_label . '
                        ORDER BY MAX(qty_stock_in) DESC' );
            return $query->result();
        }
    }

    public function is_by_product_yearly( $date_label = null )
    {
        if ( $date_label )
        {
            $query = $this->db->query( 'SELECT YEAR(date) as stock_date, MAX(qty_stock_in) as stock_in,
                        product_id,YEAR(date) as date_val
                        FROM tbx101_stock_in
                        WHERE product_id = (SELECT MAX(qty_stock_out) FROM tbx101_stock_out)
                        GROUP BY ' . $date_label . '
                        ORDER BY MAX(qty_stock_in) DESC' );
            return $query->result();
        }
    }

    public function count_stock_out( $product_id = null, $date = null, $date_label = null )
    {
        $ret = 0;
        if ( $product_id )
        {
            $query = $this->db->query( 'SELECT SUM(qty_stock_out) as total_stock_out
                    FROM tbx101_stock_out
                    WHERE product_id = ' . $product_id . '
                    AND ' . $date_label . ' = ' . $date );

            foreach ( $query->result() as $row )
            {
                $ret = $row->total_stock_out;
            }
        }

        return $ret;

    }


}
