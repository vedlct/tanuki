<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Ordersm');

    }

    public function index()
    {

    }

    public function allOrders()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['orders'] = $this->Ordersm->getAllOrders();
            $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
            //print_r($this->data['orders']);

            $this->load->view('Admin/allOrders', $this->data);
        }
        else
        {
            redirect('Login');
        }

    }

    public function showOrdersByDate()
    {
        if ($this->session->userdata('userType') == "Admin") {



            //$this->data['orders'] = $this->Ordersm->getAllOrdersByDate($dateFrom,$dateTo);

            //$this->load->view('Admin/allOrders', $this->data);
        }
        else
        {
            redirect('Login');
        }

    }
}