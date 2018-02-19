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
    public function addNewDeliveryAddress()
    {

        $this->load->view('newDeliveryAddress');

    }
    public function EditDeliveryAddress()
    {
        $this->load->model('Itemsm');
        $deliveryAddressId = $this->input->post('id');

        $this->data['deliverAddress'] = $this->Userorderm->getLastDeliveryAddress($deliveryAddressId);
        $this->data['allCity'] = $this->Itemsm->getAllCity();

        $this->load->view('EditDeliveryAddress',$this->data);

    }

    public function EditSelectedDeliveryAddress($id)
    {
        $data=array(
            'contactNo'=>$this->input->post('phone'),
            'address'=>$this->input->post('address'),
            'fkCity'=>$this->input->post('city'),
            'postalCode'=>$this->input->post('pcode'),
        );


        $this->data['deliverAddress'] = $this->Userorderm->EditSelectedDeliveryAddress($id,$data);

        redirect('OnlinePayment');

    }

}