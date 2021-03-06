<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Ordersm');
        $this->load->model('Admin/Itemsm');
        $this->load->model('Admin/Categorym');
        $this->load->model('Admin/Userm');
        $this->load->model('Admin/Promotionsm');

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
            $this->data['StatusDelivered'] = $this->Ordersm->getOrdersStatusDeliveredId();
            $this->data['pointUsed'] = $this->Ordersm->getUsedPoint();

            //print_r($this->data['orders']);


            $this->load->view('Admin/allOrders', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function changeOrderStatus($orderId)
    {
        if ($this->session->userdata('userType') == "Admin") {


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

                $this->session->set_flashdata('successMessage', 'Order Updated Successfully');


            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

            }


        } else {
            redirect('Login');
        }

    }

    public function editOrderItems()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $itemId = $this->input->post('id');
            $this->data['ordersItem'] = $this->Ordersm->getOrderItemForEdit($itemId);

            $this->load->view('Admin/orderItemsEdit', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function getTotalOrderSeen()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['unseenOrder'] = $this->Ordersm->getUnseenOrder();
            foreach ($this->data['unseenOrder'] as $unseen){
                $newUnseen=$unseen->totalUnseen;
            }

            echo $newUnseen;
        } else {
            redirect('Login');
        }

    }

    public function updateOrderItemById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $itemQuantity = $this->input->post('itemQuantity');

            $data = array(
                'quantity' => $itemQuantity,

            );
            $this->data['error'] = $this->Ordersm->updateOrderItemById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Ordered Items Quantity Updated Successfully');

                redirect('Admin-Orders');

            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Orders');
            }
        } else {
            redirect('Login');
        }

    }

    public function deleteOrderedItemsId()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');

            $this->Ordersm->deleteOrderItemsById($id);

        } else {
            redirect('Login');
        }
    }

    public function NewOrderItems()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['orderId'] = $this->input->post('id');
            $this->data['categoryInfo'] = $this->Categorym->getAllCategoryNameId();


            $this->load->view('Admin/addNewOrderItems', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function addNewOrderItems($orderId)
    {
        if ($this->session->userdata('userType') == "Admin") {


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

                redirect('Admin-Orders');

            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Orders');
            }

        } else {
            redirect('Login');
        }

    }

    public function getAllItemsByCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $catId = $this->input->post('id');

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
        if ($this->session->userdata('userType') == "Admin") {

            $itemId = $this->input->post('id');
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
        if ($this->session->userdata('userType') == "Admin") {

            $itemSizeId = $this->input->post('id');
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

    public function showAllInfo()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $userId = $this->input->post('id');
            $this->data['userInfo'] = $this->Userm->getAllInfoUser($userId);

            $this->load->view('Admin/userInfoForOder', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function setDiscount()
    {


        if ($this->session->userdata('userType') == "Admin") {

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

    ////////////////////////////////////// daily order  info //////////////////////////////////////////////////////
    public function getTotalOrder()
    {
        if ($this->session->userdata('userType') == "Admin") {


            $result = $this->Ordersm->getTotalOrder();

            echo $result;

        } else {

            redirect('Login');
        }

    }


    public function ordereStatus()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['orderestatus'] = $this->Ordersm->getAllOrderstatus();
            $this->load->view('Admin/orderStatus', $this->data);
        } else {
            redirect('Login');
        }


    }


    public function addNewOrderStatus()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $this->load->view('Admin/addNewOrderStatus');
        } else {
            redirect('Login');
        }

    }


    public function insertNewOrderStatus()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $sequence = $this->input->post('sequence');
            $statusTitle = $this->input->post('statusTitle');
            $data = array
            (

                'sequece' => $sequence,
                'statusTitle' => $statusTitle,

            );

            $this->data['error'] = $this->Ordersm->addNewOrderStatus($data);


            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'OrderStatus add  Successfully');

                redirect('Admin-ordersStatus');

            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-ordersStatus');
            }

        } else {
            redirect('Login');
        }
    }

    public function getOredrById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $status_id = $this->input->post('id');
            $data['orderstatusinfo'] = $this->Ordersm->getOrderStatusId($status_id);
            $this->load->view('Admin/updateOrderstatus', $data);

        } else {
            redirect('Login');
        }
    }


    public function updateOrderStatus($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data = array(
                'sequece' => $this->input->post('sequence'),
                'statusTitle' => $this->input->post('statusTitle')


            );

            $this->data['error'] = $this->Ordersm->updateOrderById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Update order  Status Successfully');
                redirect('Admin-ordersStatus');

            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-ordersStatus');

            }

        } else {
            redirect('login');
        }
    }


    public function searchByOrderId()
    {

        $orderID = $this->input->post('orderid');
        $this->data['orders'] = $this->Ordersm->viewOrderInfoByOrderId($orderID);
        $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
        $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
        $this->data['StatusDelivered'] = $this->Ordersm->getOrdersStatusDeliveredId();

        $this->load->view('Admin/OrderSearchFilterByOrderId', $this->data);
    }


    public function deleteOrderId()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Ordersm->deleteOrderId($id);

        } else {
            redirect('Login');
        }
    }


}








