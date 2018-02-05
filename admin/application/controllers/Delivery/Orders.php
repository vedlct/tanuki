<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery/Ordersm');


    }

    public function index()
    {

    }
    public function allOrders()
    {
        if ($this->session->userdata('userType') == "Deli") {

            $this->data['orders'] = $this->Ordersm->getAllOrders();
            $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
            $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
            $this->data['StatusDelivered'] = $this->Ordersm->getOrdersStatusDeliveredId();
            $this->data['StatusCancel'] = $this->Ordersm->cancelOrderId();
            $this->data['pointUsed'] = $this->Ordersm->getUsedPoint();


            $this->load->view('Delivery/allOrders', $this->data);

        } else {
            redirect('Login');
        }

    }

    public function orderInfo()
    {
        if ($this->session->userdata('userType') == "Deli") {

            $orderId = $this->input->post('id');

            $this->data['orderInformation'] = $this->Ordersm->getOrderInformation($orderId);

            $this->load->view('Delivery/orderInformation', $this->data);

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

        $this->load->view('Delivery/OrderSearchFilterByOrderId', $this->data);
    }

    public function changeOrderStatus($orderId)
    {
        if ($this->session->userdata('userType') == "Deli") {

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

    public function getTotalOrder()
    {
        if ($this->session->userdata('userType') == "Deli") {


            $result = $this->Ordersm->getTotalOrder();

            echo $result;

        } else {

            redirect('Login');
        }

    }
}