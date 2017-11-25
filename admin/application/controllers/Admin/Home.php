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
        
        //$this->load->view('Admin/TodaysOrder',$this->data);

    }

    public function getAllTodaysOrder()
    {
        $this->data['orders'] = $this->Ordersm->getAllOrders();
        $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItems();
        $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
        $this->data['StatusDelivered'] = $this->Ordersm->getOrdersStatusDeliveredId();

        $this->load->view('Admin/todaysOrder',$this->data);

    }


}
