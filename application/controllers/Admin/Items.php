<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Itemsm');
        $this->load->model('Admin/Categorym');

    }

    public function addItems()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['categoryNameId'] = $this->Categorym->getAllCategoryNameId();
            $this->load->view('Admin/addItems', $this->data);

        }
        else
        {
            redirect('Login');
        }

    }

    public function insertItem()
    {
        if ($this->session->userdata('userType') == "Admin") {


            $catId=$this->input->post('categoryName');
            $itemname=$this->input->post('itemname');
            $itemDescription=$this->input->post('itemDescription');
            $userid=$this->session->userdata('id');

            $itemImage = $_FILES["itemPhoto"]["name"];

            $price  = $this->input->post('itemPrice');
            $status  = $this->input->post('itemStatus');

            $textbox = $this->input->post('textbox[]');
            $textprice = $this->input->post('textprice[]');
            $textstatus = $this->input->post('textstatus[]');

            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/itemImages/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024*4",
                'overwrite' => TRUE,
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,
            );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('itemPhoto')) {
                // if something need after image upload

                if(array_filter($textbox)==null && array_filter($textprice) ==null && array_filter($textstatus)==null) {

                    $itemdata = array(
                        'fkCatagory' => $catId,
                        'itemName' => $itemname,
                        'image' => $itemImage,
                        'description' => $itemDescription,
                        'fkInsertBy' => $userid,
                        'insertDate' => date('Y-m-d H:i:s'),
                        'itemStatus' => $status,
                    );
                    $itemSizedata = array(
                        'price' => $price,

                    );

                    $this->data['error'] = $this->Itemsm->insertItem($itemdata,$itemSizedata);

                }
                else {
                    for ($i = 0; $i < count($textbox); $i++) {

                        $itemdata = array(
                            'fkCatagory' => $catId,
                            'itemName' => $itemname,
                            'image' => $itemImage,
                            'description' => $itemDescription,
                            'fkInsertBy' => $userid,
                            'insertDate' => date('Y-m-d H:i:s'),
                            'itemStatus' => $textstatus[$i],
                        );
                        $itemSizedata = array(
                            'price' => $textprice[$i],
                            'itemSize'=>$textbox[$i],

                        );

                        $this->data['error'] = $this->Itemsm->insertItem($itemdata,$itemSizedata);

                    }
                }

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Item Added Successfully');
                    redirect('Admin-Category');

                } else {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin-Category');

                }

            } else {

                return false;
            }

        }
        else
        {
            redirect('Login');
        }

    }

//    public function allItems()
//    {
//        if ($this->session->userdata('userType') == "Admin") {
//
//            $this->data['categoryNameId'] = $this->Categorym->getAllCategoryNameId();
//            $this->load->view('Admin/allItems', $this->data);
//
//        }
//        else
//        {
//            redirect('Login');
//        }
//
//    }

//    public function showItemsTable()
//    {
//        if ($this->session->userdata('userType') == "Admin") {
//
//            $id=$this->input->post('id');
//
//            $this->data['items'] = $this->Categorym->getAllItemsByCatId($id);
//            $this->load->view('Admin/allItems', $this->data);
//
//        }
//        else
//        {
//            redirect('Login');
//        }
//
//    }
}