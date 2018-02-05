<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Waiter/Ordersm');


    }

    public function index()
    {

    }
    public function allOrders()
    {
        if ($this->session->userdata('userType') == "wter") {

            $this->data['orders'] = $this->Ordersm->getAllOrders();
            $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
            $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
            $this->data['StatusDelivered'] = $this->Ordersm->getOrdersStatusDeliveredId();
            $this->data['StatusCancel'] = $this->Ordersm->cancelOrderId();
            $this->data['pointUsed'] = $this->Ordersm->getUsedPoint();


            $this->load->view('Waiter/allOrders', $this->data);

        } else {
            redirect('Login');
        }

    }

    public function orderInfo()
    {
        if ($this->session->userdata('userType') == "wter") {

            $orderId = $this->input->post('id');

            $this->data['orderInformation'] = $this->Ordersm->getOrderInformation($orderId);

            $this->load->view('Waiter/orderInformation', $this->data);

        } else {
            redirect('Login');
        }

    }

    public function searchByOrderId()
    {

        $orderID = $this->input->post('orderid');
        $this->data['orders'] = $this->Ordersm->viewOrderInfoByOrderId($orderID);
        $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
        $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
        $this->data['StatusDelivered'] = $this->Ordersm->getOrdersStatusDeliveredId();

        $this->data['StatusCancel'] = $this->Ordersm->cancelOrderId();
        $this->data['pointUsed'] = $this->Ordersm->getUsedPoint();

        $this->load->view('Waiter/OrderSearchFilterByOrderId', $this->data);
    }

    public function changeOrderStatus($orderId)
    {
        if ($this->session->userdata('userType') == "wter") {

            $orderStatus = $this->input->post('status');
            $delivered = $this->Ordersm->checkDelivery($orderStatus);
            foreach ($delivered as $status) {
                if ($status->statusTitle == "delivered") {
                    $this->data['orderInfo'] = $this->Ordersm->getDeliveredOrderInfo($orderId);
                    $this->data['orderItemsInfo'] = $this->Ordersm->getDeliveredOrderItemsInfo($orderId);
                    $this->data['pointUsedForOrder'] = $this->Ordersm->getUsedPointForParticularOrder($orderId);
                    $totalPoint=0;
                    foreach ($this->data['orderInfo'] as $orderInfo) {
                        $data1 = array(
                            'fkOrderId' => $orderInfo->id,
                            'vatTotal' => $orderInfo->vat,
                            'transDate' => date('Y-m-d'),
                        );
                        $totalPoint=($orderInfo->vat+$orderInfo->deliveryfee);
                        $transectionId = $this->Ordersm->insertdeliveredOrdered($data1);
                        foreach ($this->data['orderItemsInfo'] as $orderedItems) {
                            $data2 = array(
                                'fkTransId' => $transectionId,
                                'fkItemSizeId' => $orderedItems->fkItemSizeId,
                                'quantity' => $orderedItems->quantity,
                                'rate' => $orderedItems->rate,
                                'discount' => $orderedItems->discount,
                            );
                            $this->Ordersm->insertdeliveredOrderedItemsToTransection($data2);
                            foreach ($this->data['pointUsedForOrder'] as $pointUsed){
                                $pointTomoney = ($pointUsed->expedPoints/10);
                            }
                            $totalPoint=($totalPoint+(($orderedItems->quantity*$orderedItems->rate)-$orderedItems->discount)-$pointTomoney);
                        }
                        $data3 = array(
                            'fkTransId' => $transectionId,
                            'fkUserId' => $orderInfo->fkUserId,
                            'earnedPoints' => $totalPoint,
                        );
                        $this->Ordersm->insertIntoPointFordeliveredOrdered($data3);
                    }
                }
//                else {
//                    $data = array(
//                        'fkOrderStatus' => $orderStatus,
//
//
//                    );
//
//                    $this->data['error'] = $this->Ordersm->changeOrderStatus($orderId, $data);
//                }
            }
            $data = array(
                'fkOrderStatus' => $orderStatus,
            );
            $this->data['error'] = $this->Ordersm->changeOrderStatus($orderId, $data);
            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage','Order Updated Successfully');
            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
            }
        } else {
            redirect('Login');
        }
    }

    public function editOrderItems()
    {
        if ($this->session->userdata('userType') == "wter") {

            $itemId = $this->input->post('id');
            $this->data['ordersItem'] = $this->Ordersm->getOrderItemForEdit($itemId);

            $this->load->view('Waiter/orderItemsEdit', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function updateOrderItemById($id)
    {
        if ($this->session->userdata('userType') == "wter") {

            $itemQuantity = $this->input->post('itemQuantity');

            $data = array(
                'quantity' => $itemQuantity,

            );
            $this->data['error'] = $this->Ordersm->updateOrderItemById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Ordered Items Quantity Updated Successfully');

                redirect('Waiter-Orders');

            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Waiter-Orders');
            }
        } else {
            redirect('Login');
        }

    }

    public function NewOrderItems()
    {
        if ($this->session->userdata('userType') == "wter") {

            $this->data['orderId'] = $this->input->post('id');
            $this->load->model('Waiter/Categorym');
            $this->data['categoryInfo'] = $this->Categorym->getAllCategoryNameId();


            $this->load->view('Waiter/addNewOrderItems', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function addNewOrderItems($orderId)
    {
        if ($this->session->userdata('userType') == "wter") {


            $itemSizeId = $this->input->post('itemSizeId');
            $ItemQuantity = $this->input->post('ItemQuantity');
            $ItemRate = $this->input->post('ItemRate');
            $ItemDiscount = $this->input->post('ItemDiscount');

            $data = array(
                'fkOrderId' => $orderId,
                'fkItemSizeId' => $itemSizeId,
                'quantity' => $ItemQuantity,
                'rate' => $ItemRate,
                'discount' => $ItemDiscount,

            );

            $this->data['error'] = $this->Ordersm->addNewOrderItems($data);


            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Item Ordered Successfully');

                redirect('Waiter-Orders');

            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Waiter-Orders');
            }

        } else {
            redirect('Login');
        }

    }
    public function getAllItemsByCategory()
    {
        if ($this->session->userdata('userType') == "wter") {

            $catId = $this->input->post('id');
            $this->load->model('Waiter/Itemsm');
            $this->data['itemInfo'] = $this->Itemsm->getAllItemsNameIdByCategory($catId);

            if (empty($this->data['itemInfo'])) {

                echo "<option value='' selected>Select Item</option>";
            } else {
                echo "<option value='' selected>Select Item</option>";
                foreach ($this->data['itemInfo'] as $items) {
                    echo "<option value='$items->id'>$items->itemName</option>";
                }
            }
        } else {
            redirect('Login');
        }

    }

    public function getAllItemSizesByItem()
    {
        if ($this->session->userdata('userType') == "wter") {

            $itemId = $this->input->post('id');
            $this->load->model('Waiter/Itemsm');
            $this->data['itemSizeInfo'] = $this->Itemsm->getAllItemSizesNameIdByItem($itemId);

            if (empty($this->data['itemSizeInfo'])) {

                echo "<option value='' selected>Select Item Size</option>";
            } else {
                echo "<option value='' selected>Select Item Size</option>";
                foreach ($this->data['itemSizeInfo'] as $itemSize) {
                    echo "<option value='$itemSize->id'>$itemSize->itemSize</option>";
                }
            }
        } else {
            redirect('Login');
        }

    }

    public function getItemPriceByItemSize()
    {
        if ($this->session->userdata('userType') == "wter") {

            $itemSizeId = $this->input->post('id');
            $this->load->model('Waiter/Itemsm');
            $this->data['itemPrice'] = $this->Itemsm->getItemPriceByItemSizeId($itemSizeId);

            if (empty($this->data['itemPrice'])) {

                echo "Please Select an Item Size";
            } else {

                foreach ($this->data['itemPrice'] as $itemPrice) {
                    echo $itemPrice->price;
                }
            }
        } else {
            redirect('Login');
        }

    }

    public function deleteOrderedItemsId()
    {
        if ($this->session->userdata('userType') == "wter") {

            $id = $this->input->post('id');

            $this->Ordersm->deleteOrderItemsById($id);

        } else {
            redirect('Login');
        }
    }
    public function cancelOrder($orderId)
    {
        if ($this->session->userdata('userType') == "wter") {

            $cancelTitle=$this->Ordersm->cancelOrderId();

            $data = array(
                'fkOrderStatus' => $cancelTitle->id,

            );

            $this->data['error'] = $this->Ordersm->changeOrderStatus($orderId, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'order  Cancel Successfully');
                redirect('Waiter-Orders');

            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Waiter-Orders');

            }


        } else {
            redirect('Login');
        }
    }

    public function setDiscount()
    {


        if ($this->session->userdata('userType') == "wter") {

            $itemId = $this->input->post('id');
            $promocode= $this->input->post('promocode');
            $this->data['promotype'] = $this->Ordersm->getPromoType($promocode);

            foreach ($this->data['promotype'] as $pt) {
            }
            $promotype = $pt->promoType;
            $this->data['promotype'] = $this->Ordersm->getPromoType($promocode);
            if ($promotype == 'a') {
                echo $pt->discountAmount;

            } else {
                $this->data['promotypepp'] = $this->Ordersm->setDiscountforSelectItem($itemId);
                foreach ($this->data['promotypepp'] as $promo) {
                    echo $promo->itemdiscount;
                }
            }


        } else {
            redirect('Login');
        }
    }

    public function addDeliveryTime()
    {
        if ($this->session->userdata('userType') == "wter") {

            $time = $this->input->post('time');
            $orderId = $this->input->post('orderId');
            $data=array(
                'deliveryTime'=>$time
            );
            $this->data['error'] = $this->Ordersm->insertDeliveryTime($data,$orderId);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Delivery Time Inserted SuccessFully & mail Successfully');
                $this->mailInvoice($orderId);

            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

            }


        } else {
            redirect('Login');
        }

    }
    public function mailInvoice($orderId){

        $this->load->helper(array('email'));
        $this->load->library(array('email'));

        $this->load->model('Waiter/Chargem');

        $this->data['orders'] = $this->Ordersm->viewOrderInfoByOrderIdForPrint($orderId);
        $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItemsForPrint($orderId);
        $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
        $this->data['charge'] = $this->Chargem->getAllCharge();
        $this->data['pointUsed'] = $this->Ordersm->getUsedPointForOrder($orderId);
        foreach ($this->data['orders'] as $ordermail){
            $email=$ordermail->email;
        }

        $this->email->set_mailtype("html");
        $this->email->from('sakibrahman@host16.registrar-servers.com', 'Tanuki');
        $this->email->to($email);
        $this->email->subject('Subject');




        $message = $this->load->view('Waiter/invoiceMail', $this->data);

        $this->email->message($message);
        $this->email->send();

    }

    public function getTotalOrder()
    {
        if ($this->session->userdata('userType') == "wter") {


            $result = $this->Ordersm->getTotalOrder();

            echo $result;

        } else {

            redirect('Login');
        }

    }


}