<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Waiter/Ordersm');


    }

    public function index()
    {

        $this->load->view('Waiter/home');
    }

    public function getAllTodaysOrder()
    {
        $this->data['orders'] = $this->Ordersm->getAllTodaysOrders();
        $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
        $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
        $this->data['pointUsed'] = $this->Ordersm->getUsedPoint();

        $this->load->view('Waiter/todaysOrder',$this->data);

    }
}