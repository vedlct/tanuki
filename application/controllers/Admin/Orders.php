<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Ordersm');
        $this->load->model('Admin/Itemsm');
        $this->load->model('Admin/Categorym');

    }

    public function index()
    {

    }

    public function allOrders()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['orders'] = $this->Ordersm->getAllOrders();

            $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
            $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
           // print_r($this->data['orders']);


            $this->load->view('Admin/allOrders', $this->data);
        }
        else
        {
            redirect('Login');
        }

    }

    public function changeOrderStatus($orderId)
    {
        if ($this->session->userdata('userType') == "Admin") {


            $orderStatus=$this->input->post('status');

            $data = array(
                'fkOrderStatus' => $orderStatus,


            );

            $this->data['error'] = $this->Ordersm->changeOrderStatus($orderId,$data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Order Updated Successfully');
               // $this->session->set_flashdata('catData',$catId);

            } else {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');

            }


        }
        else
        {
            redirect('Login');
        }

    }

    public function editOrderItems()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $itemId=$this->input->post('id');
            $this->data['ordersItem'] = $this->Ordersm->getOrderItemForEdit($itemId);

            $this->load->view('Admin/orderItemsEdit', $this->data);
        }
        else
        {
            redirect('Login');
        }

    }

    public function updateOrderItemById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $itemQuantity=$this->input->post('itemQuantity');

            $data = array(
                'quantity' => $itemQuantity,

            );
            $this->data['error'] = $this->Ordersm->updateOrderItemById($id,$data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Ordered Items Quantity Updated Successfully');

                redirect('Admin-Orders');

            } else {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Orders');
            }
        }
        else
        {
            redirect('Login');
        }

    }

    public function deleteOrderedItemsId()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');

            $this->Ordersm->deleteOrderItemsById($id);

        }
        else{
            redirect('Login');
        }
    }

    public function NewOrderItems()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['orderId']=$this->input->post('id');
            $this->data['categoryInfo'] = $this->Categorym->getAllCategoryNameId();
//            $this->data['categoryInfo'] = $this->Categorym->getAllItemsNameIdByCategory($id);
          //  $this->data['allItems'] = $this->Ordersm->getOrderItemForEdit($itemId);


            $this->load->view('Admin/addNewOrderItems',$this->data);
        }
        else{
            redirect('Login');
        }

    }

    public function getAllItemsByCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $catId=$this->input->post('id');

            $this->data['itemInfo'] = $this->Itemsm->getAllItemsNameIdByCategory($catId);

            if (empty($this->data['itemInfo'])) {

                echo "<option value='' selected>Select Item</option>";
            }else{
                echo "<option value='' selected>Select Item</option>";
                foreach ($this->data['itemInfo'] as $items) {
                    echo "<option value='$items->id'>$items->itemName</option>";
                }
            }
        }
        else{
            redirect('Login');
        }

    }

    public function getAllItemSizesByItem()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $itemId=$this->input->post('id');
            $this->data['itemSizeInfo'] = $this->Itemsm->getAllItemSizesNameIdByItem($itemId);

            if (empty($this->data['itemSizeInfo'])) {

                echo "<option value='' selected>Select Item Size</option>";
            }else{
                echo "<option value='' selected>Select Item Size</option>";
                foreach ($this->data['itemSizeInfo'] as $itemSize) {
                    echo "<option value='$itemSize->id'>$itemSize->itemSize</option>";
                }
            }
        }
        else{
            redirect('Login');
        }

    }

    public function getItemPriceByItemSize()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $itemSizeId=$this->input->post('id');
            $this->data['itemPrice'] = $this->Itemsm->getItemPriceByItemSizeId($itemSizeId);

            if (empty($this->data['itemPrice'])) {

                echo "Please Select an Item Size";
            }else{

                foreach ($this->data['itemPrice'] as $itemPrice) {
                    echo $itemPrice->price;
                }
            }
        }
        else{
            redirect('Login');
        }

    }
}