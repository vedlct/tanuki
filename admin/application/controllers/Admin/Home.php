<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Ordersm');

    }

    public function index()
    {
        
        $this->load->view('Admin/home');
    }
    public function viewHome()
    {

    }
    public function getTodaysOrder()
    {
        $oldOrder = $this->Ordersm->getAllTodaysOrders();
        
        echo $oldOrder;


    }

    public function getAllTodaysOrder()
    {
        $this->data['StatusCancel'] = $this->Ordersm->cancelOrderId();

        $this->data['orders'] = $this->Ordersm->getAllTodaysOrders();
        $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
        $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
        $this->data['pointUsed'] = $this->Ordersm->getUsedPoint();

        $this->load->view('Admin/todaysOrder',$this->data);

    }


}
