<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * 
 */
class Product_package_model extends CI_Model
{
    public function get_products_with_no_package()
    {

        $qry = $this->db->query( 'SELECT * FROM tbx101_product_package GROUP BY product_id' );
        $id = 0;
        $_x = 1;
        $_s = sizeof( $qry->result() );

        foreach ( $qry->result() as $row )
        {
            $id .= $row->product_id;
            if ( $_s != $_x )
            {
                $id .= ',';
            }
            $_x++;
        }

        $qry = $this->db->query( 'SELECT * FROM tbx101_product    
            WHERE ProductId NOT IN (' . $id . ')  ORDER BY ProductName ASC' );

        return $qry->result();

    }


    public function get_product_package( $id = false )
    {
        if ( !$id )
        {
            $qry = $this->db->query( 'SELECT * FROM `' . $this->db->dbprefix( 'package' ) . '` ORDER BY name ' );
            return $qry->result();

        } else
        {
            $qry = $this->db->query( 'SELECT * FROM `' . $this->db->dbprefix( 'package' ) . '` WHERE `package_id` = ' . $id );
            return $qry->result();
        }

    }

    public function get_product_package_edit( $id = false )
    {
        if ( !$id )
        {
            $qry = $this->db->query( 'SELECT * FROM `' . $this->db->dbprefix( 'package' ) . '` WHERE `product_id` != ' . $id );
            return $qry->result();
        } else
        {
            $qry = $this->db->query( 'SELECT * FROM `' . $this->db->dbprefix( 'package' ) . '` WHERE `product_id` != ' . $id );
            return $qry->result();
        }

    }


    public function delete( $id = false )
    {
        $this->db->delete( $this->db->dbprefix( 'package' ), array( 'package_id' => $id ) );
        echo 'true';
    }

    public function delete_package( $id = false )
    {
        $response = 'true';

        //  if (getReturnValue($this->db->dbprefix('product'), 'Quantity', 'ProductId', $id) >= 0)
        // {
        //     $response = 'Can not delete a Package containing a Products.';
        // } else
        // {
        $this->db->delete( $this->db->dbprefix( 'product_package' ), array( 'product_id' => $id ) );
        //}

        echo $response;
    }


    public function save()
    {
        $ret = 'true';
        $x = $this->input->post( 'discount' );
        $discount = $x / 100;
        $data = array(
            'name' => $this->input->post( 'PackageName' ),
            'quantity' => $this->input->post( 'quantity' ),
            'discount' => $discount,
            );
        $this->db->insert( $this->db->dbprefix( 'package' ), $data );
        echo $ret;
    }

    public function save_package()
    {
        $response = 'true';
        $package_id = $this->input->post( 'package_id' );
        $product_id = $this->input->post( 'product_id' );

        if ( $package_id == 'null' and empty( $product_id ) == true )
        {
            $response = 'Please Fill up the required fields';
        } elseif ( empty( $package_id ) == true or $package_id == 'null' )
        {
            $response = 'Select atleast 1 Package.';
        } elseif ( !$this->input->post( 'product_id' ) )
        {
            $response = 'Please Select a Product.';
        } else
        {
            $s_package = sizeof( $this->input->post( 'package_id' ) );
            $package_id = $this->input->post( 'package_id' );

            for ( $x = 0; $x < $s_package; $x++ )
            {

                $data = array(
                    'product_id' => $this->input->post( 'product_id' ),
                    'package_id' => $package_id[$x],
                    );
                $this->db->insert( $this->db->dbprefix( 'product_package' ), $data );
            }
        }

        echo $response;

    }

    public function update_package()
    {
        $response = 'true';

        if ( $this->input->post( 'package_id' ) == 'null' )
        {
            $response = 'Select atleast 1 Package';
        } else
        {

            //Delete 1st
            $this->db->delete( $this->db->dbprefix( 'product_package' ), array( 'product_id' => $this->input->post( 'product_id' ) ) );

            $s_package = sizeof( $this->input->post( 'package_id' ) );
            $package_id = $this->input->post( 'package_id' );

            for ( $x = 0; $x < $s_package; $x++ )
            {

                $data = array(
                    'product_id' => $this->input->post( 'product_id' ),
                    'package_id' => $package_id[$x],
                    );
                $this->db->insert( $this->db->dbprefix( 'product_package' ), $data );
            }
        }

        echo $response;
    }


    public function update()
    {
        $x = $this->input->post( 'discount' );
        $discount = $x / 100;
        $data = array(
            'name' => $this->input->post( 'PackageName' ),
            'quantity' => $this->input->post( 'quantity' ),
            'discount' => $discount,
            );

        $this->db->where( 'package_id', $this->input->post( 'package_id' ) );
        $this->db->update( $this->db->dbprefix( 'package' ), $data );

    }
    //Opposite -
    public function get_products_under_package( $product_id = false )
    {
        $qry = $this->db->query( 'SELECT * FROM tbx101_product_package
        JOIN tbx101_package
        ON tbx101_product_package.package_id = tbx101_package.package_id
        WHERE product_id = ' . $product_id );

        return $qry->result();

    }
    //Opposite -
    public function get_products_under_package2( $product_id = false )
    {
        $qry = $this->db->query( 'SELECT * FROM tbx101_product_package
        JOIN tbx101_package
        ON tbx101_product_package.package_id = tbx101_package.package_id
        WHERE product_id = ' . $product_id );

        $id = 0;
        $_x = 1;
        $_s = sizeof( $qry->result() );

        foreach ( $qry->result() as $row )
        {
            $id .= $row->package_id;
            if ( $_s != $_x )
            {
                $id .= ',';
            }
            $_x++;
        }

        $qry = $this->db->query( 'SELECT * FROM tbx101_package    
            WHERE package_id NOT IN (' . $id . ')' );
        return $qry->result();

    }

    public function get_product_package_quantity_byID( $package_id = false )
    {
        $qry = 'SELECT count(product_id)as product FROM `tbx101_product_package` 
                WHERE `package_id` = ' . $package_id;

        $query = $this->db->query( $qry );
        if ( $query->result() )
        {
            foreach ( $query->result() as $row )
            {
                return $row->product;
            }
        } else
        {
            return '0';
        }
    }

}
