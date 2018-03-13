<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profilem');


    }


    public function index()
    {

        $this->load->view('AuthorizeNet/paymentPage');
    }

    public function insertCreditPay()
    {
        if ($this->session->userdata('loggedin') =="true") {


            $this->load->model('Itemsm');
            $this->load->model('Userorderm');
            // $this->load->model('profilem');

            $cardHolderName = $this->input->post('cardHolderName');
            $cardNumber = $this->input->post('cardNumber');
            $securityCode = $this->input->post('securityCode');
            $expMonth = $this->input->post('expMonth');
            $expYear = $this->input->post('expYear');

            $amount = $this->session->userdata('amount');

            $this->load->library('authorize_net');

            $userType = $this->session->userdata('userType');

            if ($userType=="cus"){
                $user = $this->session->userdata('id');

                $this->data['info'] = $this->profilem->getCustomerInfo($user);

                foreach ($this->data['info'] as $CustomerData) {
                    $Name = $CustomerData->name;
                    $address = $CustomerData->address;
                    $postalCode = $CustomerData->postalCode;
                    $cityName = $CustomerData->cityName;
                    $contactNo = $CustomerData->contactNo;
                    $email = $CustomerData->email;
                }

            }
            elseif($userType=="Admin" || $userType=="wter"){

                $user = $this->session->userdata('memberuserid');

                if (!empty($user)){

                    $this->data['info'] = $this->profilem->getCustomerInfo($user);

                    foreach ($this->data['info'] as $CustomerData) {
                        $Name = $CustomerData->name;
                        $address = $CustomerData->address;
                        $postalCode = $CustomerData->postalCode;
                        $cityName = $CustomerData->cityName;
                        $contactNo = $CustomerData->contactNo;
                        $email = $CustomerData->email;
                    }


                }
                else{

                    $Name = null;
                    $address = null;
                    $postalCode = null;
                    $cityName = null;
                    $contactNo = null;
                    $email = null;

                }
            }






            $ordertype = $this->session->userdata('orderType');
            if ($ordertype=="home" || $ordertype=="take") {

                $this->data['userDeliveryAddress'] = $this->profilem->userDeliveryAddress($user);

                if (!empty($this->data['userDeliveryAddress'])) {

                    foreach ($this->data['userDeliveryAddress'] as $CustomerDeliveryAddress) {

                        $DeliveryAddress = $CustomerDeliveryAddress->address;
                        $DeliveryAddressID = $CustomerDeliveryAddress->id;
                        $DeliveryPostalCode = $CustomerDeliveryAddress->postalCode;
                        $DeliveryCityName = $CustomerDeliveryAddress->cityName;
                        $DeliveryCountry = $CustomerDeliveryAddress->country;
                        $DeliveryContactNo = $CustomerDeliveryAddress->contactNo;

                    }
                }
                else {
                    $DeliveryAddressID = null;
                    $DeliveryAddress = $address;
                    $DeliveryPostalCode = $postalCode;
                    $DeliveryCityName = $cityName;
                    $DeliveryCountry = "US";
                    $DeliveryContactNo = $contactNo;

                }
            }
            else{
                $DeliveryAddressID=null;
                $DeliveryAddress = $address;
                $DeliveryPostalCode = $postalCode;
                $DeliveryCityName = $cityName;
                $DeliveryCountry = "US";
                $DeliveryContactNo = $contactNo;

            }



            $auth_net = array(
                'x_card_num' => $cardNumber,
                'x_exp_date' => $expMonth . "/" . $expYear,
                'x_card_code' => $securityCode,
                'x_description' => 'This is another test transaction',
                'x_amount' => $amount,
                'x_first_name' => $Name,
                //'x_last_name'			=> 'Rumi',
                'x_address' => $address,
                'x_city' => $cityName,
                //'x_state'				=> 'KY',
                'x_zip' => $postalCode,
                'x_country' => 'US',
                'x_phone' => $contactNo,
                'x_email' => $email,
                'x_customer_ip' => $this->input->ip_address(),
//            'x_ship_to_first_name'	=> $this->input->ip_address(),
//            'x_ship_to_last_name'	=> $this->input->ip_address(),
//            'x_ship_to_company'			=> $this->input->ip_address(),
                'x_ship_to_address' => $DeliveryAddress,
                'x_ship_to_city' => $DeliveryCityName,
                'x_ship_to_zip' => $DeliveryPostalCode,
//            'x_ship_to_state'			=> $this->input->ip_address(),
                'x_ship_to_country' => $DeliveryCountry,


            );
            $this->authorize_net->setData($auth_net);

            // Try to AUTH_CAPTURE
            if ($this->authorize_net->authorizeAndCapture()) {

                $paymenttype = "crd";
                $orderdate = date("Y-m-d H:i");
                $ordertype = $this->session->userdata('orderType');
                $re = $this->Itemsm->getorderstatus();
                $orderstatus = $re->id;
                $deliveryfee = $this->session->userdata('deliveryfee');
                $vat = $this->session->userdata('vat');

                if ($userType=="cus"){
                    $user = $this->session->userdata('id');
                    $ordertaker = null;

                    $data = array(
                        'orderType' => $ordertype,
                        'orderDate' => $orderdate,
                        'fkOrderStatus' => $orderstatus,
                        'deliveryfee' => $deliveryfee,
                        'vat' => $vat,
                        'paymentType' => $paymenttype,
                        'fkUserId' => $user,
                        'fkOrderTaker' => $ordertaker,
                        'orderRemarks' => $this->session->userdata('orderRemark'),
                        'deliveryAddressId' => $DeliveryAddressID,
                    );
                }
                elseif($userType=="Admin" || $userType=="wter"){
                    $user = $this->session->userdata('memberuserid');
                    $ordertaker = $this->session->userdata('id');

                    $data = array(
                        'orderType' => $ordertype,
                        'orderDate' => $orderdate,
                        'fkOrderStatus' => $orderstatus,
                        'deliveryfee' => $deliveryfee,
                        'vat' => $vat,
                        'paymentType' => $paymenttype,
                        'fkUserId' => $user,
                        'fkOrderTaker' => $ordertaker,
                        'orderRemarks' => $this->session->userdata('orderRemark'),
                        'deliveryAddressId' => $DeliveryAddressID,
                    );
                }


               // $ordertaker = null;


                $orderId = $this->Itemsm->checkoutInsertForCardPay($data);
                $this->mailInvoice($orderId);
                $this->cart->destroy();

                // echo '<h2>Success!</h2>';
                // echo '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p>';
                // echo '<p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>';

                $this->session->set_flashdata('successMessage', '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p><br><p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>');
                redirect('Items');
            } else {
                echo '<h2>Fail!</h2>';

                $this->session->set_flashdata('errorMessage', '<p>' . $this->authorize_net->getError() . '</p>');
                redirect('OnlinePayment');
                // Get error
                //echo '<p>' . $this->authorize_net->getError() . '</p>';
                // Show debug data
                //$this->authorize_net->debug();
            }
        }


    }
    public function mailInvoice($orderId){
        $this->load->helper(array('email'));
        $this->load->library(array('email'));
        $this->load->model('Userorderm');
        $this->email->set_mailtype("html");
        $this->email->from('tanukiva@host16.registrar-servers.com', 'Tanuki');
        $this->email->to($this->session->userdata('email'),'tanukisupport@teknovisual.com');
        $this->email->subject('New Order');
        $this->data['orders'] = $this->Userorderm->viewOrderInfoByOrderIdForPrint($orderId);
        $this->data['ordersItems'] = $this->Userorderm->getAllOrdersItemsForPrint($orderId);
        $this->data['ordersStatus'] = $this->Userorderm->getAllOrdersStatus();
        $this->data['charge'] = $this->Userorderm->getAllCharge();
        $this->data['pointUsed'] = $this->Userorderm->getUsedPointForOrder($orderId);
        $message = $this->load->view('invoicePdf', $this->data,true);
        $this->email->message($message);
        $this->email->send();
    }

}