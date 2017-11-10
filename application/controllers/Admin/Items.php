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
            //$textstatus = $this->input->post('textstatus[]');

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

                $itemdata = array(
                    'fkCatagory' => $catId,
                    'itemName' => $itemname,
                    'image' => $itemImage,
                    'description' => $itemDescription,
                    'fkInsertBy' => $userid,
                    'insertDate' => date('Y-m-d H:i:s'),
                    'itemStatus' => $status,
                );
                $itemId= $this->Itemsm->insertItemdata($itemdata);

                if(array_filter($textbox)==null && array_filter($textprice) ==null) {


                    $itemSizedata = array(
                        'fkItemId'=>$itemId,
                        'price' => $price,

                    );

                    $this->data['error'] = $this->Itemsm->insertItemSizedata($itemSizedata);

                }
                else {
                    for ($i = 0; $i < count($textbox); $i++) {

                        $itemSizedata = array(
                            'fkItemId'=>$itemId,
                            'price' => $textprice[$i],
                            'itemSize'=>$textbox[$i],

                        );

                        $this->data['error'] = $this->Itemsm->insertItemSizedata($itemSizedata);

                    }
                }

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Item Added Successfully');
                    redirect('Admin-addItems');

                } else {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin-addItems');

                }


            } else {
                $error = array('error' => $this->upload->display_errors());
                $che = json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Items/addItems';
                    </script>";
                return false;
            }

        }
        else
        {
            redirect('Login');
        }

    }

    public function allItems()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['categoryNameId'] = $this->Categorym->getAllCategoryNameId();
            $this->load->view('Admin/allItems', $this->data);

        }
        else
        {
            redirect('Login');
        }

    }

    public function showItemsTable($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

           // $id=$this->input->post('id');

            $this->data['items'] = $this->Itemsm->getAllItemsByCatId($id);
            $this->load->view('Admin/allItemsByCategory', $this->data);


        }
        else
        {
            redirect('Login');
        }

    }

    public function getItemById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id=$this->input->post('id');
            $this->data['categoryNameId'] = $this->Categorym->getAllCategoryNameId();
            $this->data['iteminfo'] = $this->Itemsm->getItemInfoById($id);
            $this->load->view('Admin/itemInfo', $this->data);

        }
        else
        {
            redirect('Login');
        }

    }

    public function editItem($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $catId=$this->input->post('categoryName');
            $itemName=$this->input->post('itemName');
            $itemDescription=$this->input->post('itemDescription');
            $itemStatus=$this->input->post('itemStatus');

            $itemImage = $_FILES["itemPhoto"]["name"];

            if ($itemImage!=null){

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

                    $itemdata = array(
                        'fkCatagory' => $catId,
                        'itemName' => $itemName,
                        'image' => $itemImage,
                        'description' => $itemDescription,
                        'itemStatus' => $itemStatus,
                    );
                    $items= $this->Itemsm->updateItemdataWithImage($id,$itemdata);

                }


            }
            else{

                $itemdata = array(
                    'fkCatagory' => $catId,
                    'itemName' => $itemName,
                    'description' => $itemDescription,
                    'itemStatus' => $itemStatus,
                );
                $items= $this->Itemsm->updateItemdataWithoutImage($id,$itemdata);

            }

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Item Updated Successfully');
                $this->session->set_flashdata('catData',$catId);
                redirect('Admin-Items');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Items');
            }


        }
        else
        {
            redirect('Login');
        }

    }

    public function deleteItemById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $catId = $this->input->post('catId');
            $this->Itemsm->deleteItemById($id);
            $this->session->set_flashdata('successMessage','Item Updated Successfully');
            $this->session->set_flashdata('catData',$catId);



        }
        else{
            redirect('Login');
        }
    }
}