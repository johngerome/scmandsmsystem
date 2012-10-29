<?php

if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/**
 * Product
 * 
 * @package gsystem
 * @author 
 * @copyright 2012
 * @version $Id$
 * @access public
 */
class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'product_model' );
        $this->load->model( 'product_line_model' );
        $this->load->model( 'branch_model' );
        $this->load->model( 'product_package_model' );

    }

    public function index()
    {
        $data['qry_product'] = $this->product_model->get_product_list();
        $this->gtemplate->load_view( 'product/index', $data );
    }
    public function pricing_scheme()
    {
        $data['qry_product'] = $this->product_model->get_product_list();
        $this->gtemplate->load_view( 'product/pricing_scheme', $data );
    }
    public function add()
    {
        $data['package'] = $this->product_package_model->get_product_package();
        $data['qry_product_line'] = $this->product_model->get_product_line_name();
        $this->load->view( 'views/product/_add', $data );

    }

    public function archive( $product_id = null )
    {
        $this->product_model->archive_product( $product_id );
    }

    public function restore( $product_id = null )
    {
        $this->product_model->restore_product( $product_id );
    }

    public function trash()
    {

        $data['qry_product'] = $this->product_model->get_archive_product();
        $this->gtemplate->load_view( 'product/trash', $data );

    }

    public function edit( $id = false )
    {
        $product_line_id = getReturnValue( $this->db->dbprefix( 'product' ), 'ProductLineId', 'ProductId', $id );

        //$data['package'] = $this->product_package_model->get_product_package2($id);
        $data['qry_product_line'] = $this->product_model->get_product_line_name( $product_line_id );
        $data['qry_product'] = $this->product_model->get_product_byID( $id );


        $this->load->view( 'views/product/_edit', $data );

    }

    public function edit_pricing_scheme( $id = false )
    {
        $product_line_id = getReturnValue( $this->db->dbprefix( 'product' ), 'ProductLineId', 'ProductId', $id );
        $data['qry_product_line'] = $this->product_model->get_product_line_name( $product_line_id );
        $data['qry_product'] = $this->product_model->get_product_byID( $id );
        $this->load->view( 'views/product/_pricing_scheme_edit', $data );
    }

    public function update_price()
    {
        $response = 'true';


        $new_price = sprintf( "%01.2f", $this->input->post( 'new_price' ) );

        if ( $new_price <= 0 )
        {
            $response = 'New Price should not be less than to 0';
        }

        if ( $new_price == null )
        {
            $response = 'Please Input New Price';
        }

        if ( $response == 'true' )
        {
            //Update New Price
            $data = array( 'ProductPrice' => $new_price );
            $this->db->where( 'ProductId', $this->input->post( 'ProductId' ) );
            $this->db->update( $this->db->dbprefix( 'product' ), $data );
        }


        echo $response;
    }

    public function ajaxProductName()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];

        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'product' ) . "
                WHERE `ProductName` = '" . $validateValue . "' ";


        if ( IdenticalRecords( $qry ) == true )
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode( $arrayToJs ); // RETURN ARRAY WITH success
        } else
        {
            for ( $x = 0; $x < 1000000; $x++ )
            {
                if ( $x == 990000 )
                {
                    $arrayToJs[1] = true;
                    echo json_encode( $arrayToJs ); // RETURN ARRAY WITH ERROR
                }
            }
        }
    }

    public function ajaxProductNameEdit()
    {

        /* RECEIVE VALUE */
        $validateValue = $_GET['fieldValue'];
        $validateId = $_GET['fieldId'];


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $value = explode( '-', $validateId );


        $qry = "SELECT * FROM " . $this->db->dbprefix( 'product' ) . "
                WHERE `ProductName` = '" . $validateValue . "' AND `ProductId` != $value[1] ";


        if ( IdenticalRecords( $qry ) == true )
        {
            $arrayToJs[1] = false; // RETURN TRUE
            echo json_encode( $arrayToJs ); // RETURN ARRAY WITH success
        } else
        {
            for ( $x = 0; $x < 1000000; $x++ )
            {
                if ( $x == 990000 )
                {
                    $arrayToJs[1] = true;
                    echo json_encode( $arrayToJs ); // RETURN ARRAY WITH ERROR
                }
            }
        }
    }


    public function save()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix( 'product' ) . "
                WHERE `ProductName` = '" . $this->input->post( 'ProductName' ) . "' ";

        if ( IdenticalRecords( $qry ) == true )
        {
            echo 'Product Name Already Exists';
        } else
        {
            $this->product_model->save();
        }
    }

    public function update()
    {

        $qry = "SELECT * FROM " . $this->db->dbprefix( 'product' ) . "
                WHERE `ProductName` = '" . $this->input->post( 'ProductName' ) . "' AND `ProductId` != '" . $this->input->post( 'ProductId' ) . "' ";

        if ( IdenticalRecords( $qry ) == true )
        {
            echo 'false';
        } else
        {
            $this->product_model->update();
            echo 'true';
        }
    }

    public function delete( $id = false )
    {
        $this->product_model->delete( $id );
        echo 'true';
    }

    public function check_delete( $id = null )
    {
        if ( getReturnValue( $this->db->dbprefix( 'product' ), 'Quantity', 'ProductId', $id ) <= 0 )
        {
            echo 'true';
        } else
        {
            echo '<font color="red">' . getReturnValue( $this->db->dbprefix( 'product' ), 'ProductName', 'ProductId', $id ) .
                '</font> cannot be removed as they contain Quantity.';
        }
    }

    public function stock_in()
    {
        $data['qry_product'] = $this->product_model->get_product_list();
        $this->gtemplate->load_view( 'product/stock_in', $data );

    }

    public function stock_in_product( $id = false )
    {
        $product_line_id = getReturnValue( $this->db->dbprefix( 'product' ), 'ProductLineId', 'ProductId', $id );

        $data['qry_product_line'] = $this->product_model->get_product_line_name( $product_line_id );
        $data['qry_product'] = $this->product_model->get_product_byID( $id );


        $this->load->view( 'views/product/_stock_in', $data );

    }

    public function update_stock()
    {
        $response = 'true';


        //Get the Old Quantity
        $old_quantity = getReturnValue( $this->db->dbprefix( 'product' ), 'Quantity', 'ProductId', $this->input->post( 'ProductId' ) );
        //Get the added Quantity
        $new_quantity = $this->input->post( 'Quantity' );
        //Sum it Up!
        $final_quantity = $old_quantity + $new_quantity;

        if ( $new_quantity <= 0 )
        {
            $response = 'Invalid Quantity to Stock In';
        }

        if ( $new_quantity == null )
        {
            $response = 'Please Input Quantity to Stock In';
        }

        if ( $response == 'true' )
        {
            //Update New Quantity
            $data = array( 'Quantity' => $final_quantity );
            $this->db->where( 'ProductId', $this->input->post( 'ProductId' ) );
            $this->db->update( $this->db->dbprefix( 'product' ), $data );
        }


        echo $response;

    }


    //Product Availability
    public function availability()
    {
        $data['branch_qry'] = $this->branch_model->get_branch();
        $this->gtemplate->load_view( 'product/product_availability', $data );
    }
    //Product Re-Order List
    public function re_order_list()
    {
        $data['branch_qry'] = $this->branch_model->get_branch();
        $this->gtemplate->load_view( 'product/re_order_list', $data );

    }

    public function damage_products()
    {
        $data['branch_qry'] = $this->branch_model->get_branch();
        $this->gtemplate->load_view( 'product/damage_product', $data );
    }

    //back_order_list
    public function back_order_list()
    {
        $data['branch_qry'] = $this->branch_model->get_branch();
        $this->gtemplate->load_view( 'product/back_order', $data );
    }
    //Inventory Summary
    public function inventory_summary()
    {
        $data['branch_qry'] = $this->branch_model->get_branch();
        $this->gtemplate->load_view( 'product/inventory_summary', $data );
    }

    public function product_avail( $branch_id = false )
    {

        if ( $branch_id )
        {
            $query = $this->db->query( 'SELECT tbx101_product.ProductId as ProductId,branch_name,ProductName,tbx101_product.Description,ProductLineName,ProductPrice,tbx101_branch_product.quantity as quantity_left
        FROM tbx101_branch_product
        INNER JOIN (tbx101_product,tbx101_product_line,tbx101_branch)
        ON (tbx101_branch_product.product_id = ProductId AND tbx101_product.ProductLineId = tbx101_product_line.ProductLineId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id)
        WHERE tbx101_branch.branch_id = ' . $branch_id . ' AND tbx101_branch.archive = 0
        ' );

            $branch_name = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $data['product'] = $query->result();
            $data['branch_name'] = $branch_name;
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/_product_avail', $data );

        } else
        {

            $query = $this->db->query( 'SELECT tbx101_branch_product.branch_id,tbx101_branch.branch_name
            FROM tbx101_branch_product
            INNER JOIN (tbx101_product,tbx101_branch)
            ON (tbx101_branch_product.product_id = tbx101_product.ProductId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id)
            WHERE tbx101_branch.archive = 0
            GROUP by branch_name' );

            $data['product'] = $query->result();
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/_product_avail_all', $data );

        }


    }

    public function view( $branch_id = false, $type = false )
    {
        if ( $type == 'available-products' )
        {
            $data['product'] = getFullReturnValue( 'SELECT * 
            FROM tbx101_branch_product 
            INNER JOIN (tbx101_product,tbx101_branch) 
            ON (tbx101_branch_product.product_id = tbx101_product.ProductId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id) 
            WHERE tbx101_branch_product.branch_id = ' . $branch_id );

            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $this->gtemplate->load_view( 'product/view_product', $data );

        } elseif ( $type == 're-order-products' )
        {

            $data['product'] = getFullReturnValue( 'SELECT * 
            FROM tbx101_branch_product 
            INNER JOIN (tbx101_product,tbx101_branch) 
            ON (tbx101_branch_product.product_id = tbx101_product.ProductId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id) 
            WHERE tbx101_branch_product.branch_id = ' . $branch_id . ' AND tbx101_branch_product.quantity <= ReorderPoint ' );

            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $this->gtemplate->load_view( 'product/view_re_order_prod', $data );

        } elseif ( $type == 'back-order-products' )
        {
            $data['product'] = getFullReturnValue( 'SELECT * 
            FROM tbx101_back_order 
            INNER JOIN (tbx101_product,tbx101_branch) 
            ON (tbx101_back_order.product_id = tbx101_product.ProductId AND tbx101_back_order.branch_id = tbx101_branch.branch_id) 
            WHERE tbx101_back_order.branch_id = ' . $branch_id );

            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $this->gtemplate->load_view( 'product/view_back_order', $data );

        } elseif ( $type == 'damage-products' )
        {
            $data['product'] = getFullReturnValue( 'SELECT * 
            FROM tbx101_adjustment_products 
            INNER JOIN (tbx101_product,tbx101_branch) 
            ON (tbx101_adjustment_products.product_id = tbx101_product.ProductId AND tbx101_adjustment_products.branch_id = tbx101_branch.branch_id) 
            WHERE tbx101_adjustment_products.branch_id = ' . $branch_id . '
            AND adjustment_type=\'Damage\'
            ' );

            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $this->gtemplate->load_view( 'product/view_damage_product', $data );
        } else
        {
            $this->gtemplate->load_view( '404_error' );
        }


    }


    public function re_order_list_data( $branch_id = false )
    {

        if ( $branch_id )
        {
            $query = $this->db->query( 'SELECT tbx101_product.ProductId as ProductId,branch_name,ProductName,tbx101_product.Description,ProductLineName,ProductPrice,tbx101_branch_product.quantity as quantity_left
                FROM tbx101_branch_product
                INNER JOIN (tbx101_product,tbx101_product_line,tbx101_branch)
                ON (tbx101_branch_product.product_id = ProductId AND tbx101_product.ProductLineId = tbx101_product_line.ProductLineId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id)
                WHERE tbx101_branch.branch_id = ' . $branch_id .
                ' AND tbx101_branch_product.quantity <= tbx101_product.ReorderPoint AND tbx101_branch.archive = 0
                ORDER BY tbx101_product.ProductId
        ' );
            $branch_name = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $data['product'] = $query->result();
            $data['branch_name'] = $branch_name;
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/_re_order_list_data', $data );

        } else
        {
            $query = $this->db->query( 'SELECT tbx101_branch_product.branch_id,tbx101_branch.branch_name
                FROM tbx101_branch_product
                INNER JOIN (tbx101_product,tbx101_branch)
                ON (tbx101_branch_product.product_id = tbx101_product.ProductId AND tbx101_branch_product.branch_id = tbx101_branch.branch_id)
                WHERE tbx101_branch.archive = 0
                group by branch_name' );

            $data['product'] = $query->result();
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/re_order_list_all', $data );


        }

    }

    public function back_order_data( $branch_id = false )
    {
        if ( $branch_id )
        {

            $query = $this->db->query( 'SELECT tbx101_product.ProductId,tbx101_product_line.ProductLineName,tbx101_product.ProductName,tbx101_product.Description,tbx101_back_order.quantity
                    FROM tbx101_back_order
                    JOIN (tbx101_product,tbx101_branch,tbx101_product_line)
                    ON (tbx101_back_order.product_id = tbx101_product.ProductId
                    AND tbx101_back_order.branch_id = tbx101_branch.branch_id
                    AND tbx101_product_line.ProductLineId = tbx101_product.ProductLineId)
                    WHERE tbx101_back_order.branch_id = ' . $branch_id . ' AND tbx101_branch.archive = 0
                    ' );


            $data['product'] = $query->result();
            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/back_order_list', $data );
        } else
        {

            $query = $this->db->query( 'SELECT tbx101_branch.branch_id,tbx101_branch.branch_name
                    FROM tbx101_back_order
                    JOIN (tbx101_product,tbx101_branch)
                    ON (tbx101_back_order.product_id = tbx101_product.ProductId
                    AND tbx101_back_order.branch_id = tbx101_branch.branch_id)
                    WHERE tbx101_branch.archive = 0
                    ' );
            $data['product'] = $query->result();
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/back_order_all', $data );
        }

    }

    public function prod_damage_data( $branch_id = false )
    {

        if ( $branch_id )
        {
            $query = $this->db->query( 'SELECT *
                FROM tbx101_adjustment_products
                JOIN (tbx101_product,tbx101_branch,tbx101_product_line)
                ON (tbx101_adjustment_products.product_id = tbx101_product.ProductId
                AND tbx101_adjustment_products.branch_id = tbx101_branch.branch_id
                AND tbx101_product_line.ProductLineId = tbx101_product.ProductLineId)
                WHERE tbx101_adjustment_products.branch_id = ' . $branch_id . ' AND tbx101_branch.archive = 0
                AND tbx101_adjustment_products.adjustment_type = \'Damage\'
                GROUP BY tbx101_adjustment_products.branch_id
                ORDER BY tbx101_branch.branch_name ASC' );


            $data['product'] = $query->result();
            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/prod_damage_list', $data );

        } else
        {

            $query = $this->db->query( 'SELECT tbx101_branch.branch_id,tbx101_branch.branch_name
                    FROM tbx101_adjustment_products
                    JOIN (tbx101_product,tbx101_branch)
                    ON (tbx101_adjustment_products.product_id = tbx101_product.ProductId
                    AND tbx101_adjustment_products.branch_id = tbx101_branch.branch_id)
                    WHERE tbx101_adjustment_products.adjustment_type = \'Damage\' AND tbx101_branch.archive = 0
                    GROUP BY tbx101_adjustment_products.branch_id
                    ORDER BY tbx101_branch.branch_name ASC' );
            $data['product'] = $query->result();
            $data['branch_qry'] = $this->branch_model->get_branch();
            $this->load->view( 'views/product/prod_damage_all', $data );

        }


    }

    public function inventory_summary_data( $branch_id = 0, $date = 0 )
    {
        if ( $date == 0 )
        {
            $data['stocks'] = $this->product_model->stock_in( $branch_id );
            $_date_label = 'DAY(date)';
        } elseif ( $date == 1 )
        {
            $data['stocks'] = $this->product_model->stock_monthly( $branch_id );
            $_date_label = 'MONTH(date)';
        } elseif ( $date == 2 )
        {
            $_date_label = 'YEAR(date)';
            $data['stocks'] = $this->product_model->stock_yearly( $branch_id );
        }

        $data['date'] = $date;
        $data['date_label'] = $_date_label;
        $data['branch_name'] = '';
        $data['branch_id'] = $branch_id;
        $data['branch_qry'] = $this->branch_model->get_branch( $branch_id );

        if ( $branch_id )
        {
            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $this->load->view( 'views/product/inventory_summary_list', $data );
        } else
        {
            $this->load->view( 'views/product/inventory_summary_list', $data );
        }
    }

    public function view_inventory_summary( $branch_id = null, $date = null, $date_label = 0 )
    {

        if ( $branch_id )
        {
            if ( $date_label == 0 )
            {
                $date_label = 'DAY(date)';
            } elseif ( $date_label == 1 )
            {
                $date_label = 'MONTH(date)';
            } elseif ( $date_label == 2 )
            {
                $date_label = 'YEAR(date)';
            }

            $data['date_label'] = $date_label;
            $data['branch_id'] = $branch_id;
            $data['date'] = $date;
            $data['stocks'] = $this->product_model->view_inventory_summary( $branch_id, $date, $date_label );
            $data['branch_name'] = getReturnValue( $this->db->dbprefix( 'branch' ), 'branch_name', 'branch_id', $branch_id );
            $this->gtemplate->load_view( 'product/view_inventory_summary', $data );
        }

    }


    public function is_product( $date = 0 )
    {
        if ( $date == 0 )
        {
            $date_label = 'DAY(date)';
            $data['is_product'] = $this->product_model->is_by_product( $date_label );
        } elseif ( $date == 1 )
        {
            $date_label = 'MONTH(date)';
            $data['is_product'] = $this->product_model->is_by_product_monthly( $date_label );
        } elseif ( $date == 2 )
        {
            $date_label = 'YEAR(date)';
            $data['is_product'] = $this->product_model->is_by_product_yearly( $date_label );
        }

        $data['date'] = $date;
        $data['date_label'] = $date_label;
        $this->load->view( 'views/product/is_product.php', $data );
    }


    public function expire()
    {

        $this->gtemplate->load_view( 'product/expire_product' );

    }

}
