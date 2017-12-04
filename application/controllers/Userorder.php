<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userorder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userorderm');


    }

    public function userOrders($userId)
    {
        $this->data['orders'] = $this->Userorderm->getAllOrders($userId);


            $this->data['ordersItems'] = $this->Userorderm->getAllOrdersItems();
            $this->data['ordersStatus'] = $this->Userorderm->getAllOrdersStatus();
            $this->data['StatusDelivered'] = $this->Userorderm->getOrdersStatusDeliveredId();
            $this->data['pointUsed'] = $this->Userorderm->getUsedPoint();



            $this->load->view('userOrder', $this->data);



    }

}