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

        $this->load->model('Itemsm');
        $this->load->model('Userorderm');
       // $this->load->model('profilem');

        $cardHolderName = $this->input->post('cardHolderName');
        $cardNumber = $this->input->post('cardNumber');
        $securityCode = $this->input->post('securityCode');
        $expMonth = $this->input->post('expMonth');
        $expYear = $this->input->post('expYear');
        $user = $this->session->userdata('id');


        $this->data['info']=$this->profilem->getCustomerInfo($user);

        foreach ($this->data['info'] as $CustomerData){
            $Name=$CustomerData->name;
            $address=$CustomerData->address;
            $postalCode=$CustomerData->postalCode;
            $cityName=$CustomerData->cityName;
            $contactNo=$CustomerData->contactNo;
            $email=$CustomerData->email;
        }
        $amount = $this->session->userdata('amount');

        $this->load->library('authorize_net');

        $auth_net = array(
            'x_card_num'			=> $cardNumber,
            'x_exp_date'			=> $expMonth."/".$expYear,
            'x_card_code'			=> $securityCode,
            'x_description'			=> 'This is another test transaction',
            'x_amount'				=> $amount,
            'x_first_name'			=> $Name,
            //'x_last_name'			=> 'Rumi',
            'x_address'				=> $address,
            'x_city'				=> $cityName,
            //'x_state'				=> 'KY',
            'x_zip'					=> $postalCode,
            'x_country'				=> 'US',
            'x_phone'				=> $contactNo,
            'x_email'				=> $email,
            'x_customer_ip'			=> $this->input->ip_address(),
        );
        $this->authorize_net->setData($auth_net);

        // Try to AUTH_CAPTURE
        if( $this->authorize_net->authorizeAndCapture())
        {
            $paymenttype = "crd";
            $orderdate = date("Y-m-d H:i");
            $ordertype = $this->session->userdata('orderType');
            $re = $this->Itemsm->getorderstatus();
            $orderstatus = $re->id;
            $deliveryfee = $this->session->userdata('deliveryfee');
            $vat = $this->session->userdata('vat');
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
            );
            $orderId = $this->Itemsm->checkoutInsertForGuest($data);
            $this->mailInvoice($orderId);
            $this->cart->destroy();

           // echo '<h2>Success!</h2>';
           // echo '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p>';
           // echo '<p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>';

            $this->session->set_flashdata('successMessage', '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p><br><p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>');
            redirect('Items');
        }
        else
        {
            echo '<h2>Fail!</h2>';

            $this->session->set_flashdata('errorMessage','<p>' . $this->authorize_net->getError() . '</p>');
            redirect('Items');
            // Get error
           //echo '<p>' . $this->authorize_net->getError() . '</p>';
            // Show debug data
            //$this->authorize_net->debug();
        }

        //$this->load->view('AuthorizeNet/paymentPage');
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