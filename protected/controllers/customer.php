<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');


    }


    public function index()
    {
        $data['qry_customer'] = $this->customer_model->get_customer_list();
        $this->gtemplate->load_view('customer/index', $data);

    }

    public function add()
    {
        // $data['qry_product_line'] = $this->product_line_model->get_product_line();
        $this->load->view('views/customer/_add');
    }

    public function edit($id = false)
    {
        $data['qry_customer'] = $this->customer_model->get_customer_list_byID($id);
        $this->load->view('views/customer/_edit', $data);

    }

    public function update()
    {

        if ($_REQUEST['is_ajax'])
        {
            $this->customer_model->update_data();
           
        } else
        {
            show_404();
        }
    }

    public function check_edit($id = false)
    {
        $name = $this->input->post('FirstName') . $this->input->post('MiddleName') . $this->input->post('LastName');

        $qry = "SELECT Concat(FirstName,MiddleName,LastName) as name FROM  `tbx101_customer` 
                WHERE Concat(FirstName,MiddleName,LastName) = '" . $name . "' AND CustomerId != $id ";

        if ($_REQUEST['is_ajax'])
        {
            if (IdenticalRecords($qry) == true)
            {
                echo 'true';
            } else
            {
                echo $qry . 'User Not Exists';
            }
        }
    }

    public function delete($id = false)
    {
        $this->customer_model->delete($id);
        //echo $id;
    }

    public function check_add()
    {
        $name = $this->input->post('FirstName') . $this->input->post('MiddleName') . $this->input->post('LastName');

        $qry = "SELECT Concat(FirstName,MiddleName,LastName) as name FROM  `tbx101_customer` 
                WHERE Concat(FirstName,MiddleName,LastName) = '" . $name . "' ";

        if ($_REQUEST['is_ajax'])
        {
            if (IdenticalRecords($qry) == true)
            {
                echo 'true';
            }
        }
    }

    public function save()
    {
        if ($_REQUEST['is_ajax'])
        {
            $this->customer_model->save();
            echo 'true';
        } else
        {
            show_404();
        }
    }

    function do_upload()
    {


        $path = "images/temp/";
        $session_id = '1';
        $valid_formats = array(
            "jpg",
            "png",
            "gif",
            "bmp",
            "jpeg",
            "JPG",
            "PNG",
            "GIF",
            "BMP",
            "JPEG");

        //Clean Temp Files Before Uploading..
        delete_files($path);

        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];

            if (strlen($name))
            {
                list($txt, $ext) = explode(".", $name);
                if (in_array($ext, $valid_formats))
                {
                    if ($size < (1024 * 1024)) // Image size max 1 MB
                    {
                        $actual_image_name = time() . $session_id . "." . $ext;
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        if (move_uploaded_file($tmp, $path . $actual_image_name))
                        {
                            //mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
                            echo "<img src='images/temp/" . $actual_image_name . "' width=\"200\" height=\"200\">";


                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $path . $actual_image_name;
                            $config['create_thumb'] = false;
                            $config['maintain_ratio'] = false;
                            $config['width'] = 200;
                            $config['height'] = 200;

                            $this->load->library('image_lib', $config);

                            $this->image_lib->resize();

                            echo "
                           <script type=\"text/javascript\"> 
                           $('#ProfilePic').val('" . $actual_image_name . "');
                           </script>";

                        } else  echo "<div class=\"alertMessage warning SE\">failed</div>";
                    } else  echo "<div class=\"alertMessage warning SE\">Image file size max 1 MB</div>";
                } else  echo "<div class=\"alertMessage warning SE\">Invalid file format..</div>";
            } else  echo "<div class=\"alertMessage warning SE\">Please select image..!</div>";
            exit;
        }
    }

    public function view_profile($id = false)
    {
        $arr = explode('-', $id);

        if ($id)
        {
            if (page_level_access('managed_valued_customer') == true)
            {

                $this->gtemplate->set_id($arr[0]);
                $data['qry_account'] = $this->customer_model->get_customer_list_byID($arr[0]);
                $this->load->view('views/customer/view_profile', $data);
            } else
            {
                $this->gtemplate->load_view('permission_error');
            }
        }
    }

}
