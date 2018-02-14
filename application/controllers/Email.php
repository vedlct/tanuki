<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }


    public function index()
    {

    }
    public function userEmailToResturant()
    {
        $email=$this->input->post('email');
        $name=$this->input->post('name');
        $details=$this->input->post('details');

        $this->load->helper(array('email'));
        $this->load->library(array('email'));
        //$this->load->model('Userorderm');
        $this->email->set_mailtype("html");
        $this->email->from($email, $name);
        $this->email->to("mujtaba.rumi1@gmail.com");
        $this->email->subject('Customer Inquery');
//        $this->data['orders'] = $this->Userorderm->viewOrderInfoByOrderIdForPrint($orderId);
//        $this->data['ordersItems'] = $this->Userorderm->getAllOrdersItemsForPrint($orderId);
//        $this->data['ordersStatus'] = $this->Userorderm->getAllOrdersStatus();
//        $this->data['charge'] = $this->Userorderm->getAllCharge();
//        $this->data['pointUsed'] = $this->Userorderm->getUsedPointForOrder($orderId);
//        $message = $this->load->view('invoicePdf', $this->data , true);
        $this->email->message($details);
        $this->email->send();

    }
}
