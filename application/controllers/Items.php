<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Items extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Itemsm');

    }
    public function index()
    {
        $this->load->view('detail_page');
    }
    public function itemShow(){
        $this->data['allitem']= $this->Itemsm->getAllItem();
        $this->data['allitemsize']= $this->Itemsm->getAllItemSize();
        $this->data['allcategory']= $this->Itemsm->getAllCategory();
        $this->data['alldefault']= $this->Itemsm->getDefualtItemSize();
        $this->data['charges'] = $this->Itemsm->getcharges();
        $this->data['avgrating']= $this->Itemsm->ratingavgitemshow();
        $this->load->view('detail_page', $this->data);
    }
    public function insertCart(){
        $id = $this->input->post('id');
        $this->data['item'] = $this->Itemsm->getItem($id);
        foreach ($this->data['item'] as $item){
            $data = array(
                'id' => $item->id,
                'qty' => 1,
                'price' => $item->price,
                'name' => $item->itemName,
                'coupon' => 0,
                'options' => array('Size' => $item->itemSize,'CategoryName'=>$item->categoryName)
            );
            $this->cart->insert($data);
        }
//        $total = $this->cart->total();
//        $disamountpercen = $this->session->userdata('discountpercentage');
//        $disamount= ($total*$disamountpercen)/100;
//        $data = array(
//            'discount' => $disamount,
//        );
//        $this->session->set_userdata($data);
        if ($this->session->userdata('promocode') != null){
            $this->discount($this->session->userdata('promocode'));
        }
    }
    public function insertItemSizeCart(){
        $id = $this->input->post('id');
        $this->data['item'] = $this->Itemsm->getItemSize($id);
        foreach ($this->data['item'] as $itemsize){
            $data = array(
                'id' => $itemsize->id,
                'qty' => 1,
                'price' => $itemsize->price,
                'name' => $itemsize->itemName,
                'coupon' => 0,
                'options' => array('Size' => $itemsize->itemSize,'CategoryName'=>$itemsize->categoryName)
            );
            $this->cart->insert($data);
        }
//        $total = $this->cart->total();
//        $disamountpercen = $this->session->userdata('discountpercentage');
//        $disamount= ($total*$disamountpercen)/100;
//        $data = array(
//            'discount' => $disamount,
//        );
//        $this->session->set_userdata($data);
        if ($this->session->userdata('promocode') != null){
            $this->discount($this->session->userdata('promocode'));
        }
    }
    public function updateCart(){
        $id = $this->input->post('id');
        $amount = $this->input->post('amount');
        $data = array(
            'rowid' => $id,
            'qty' => $amount,
        );
        $this->cart->update($data);
//        $total = $this->cart->total();
//        $disamountpercen = $this->session->userdata('discountpercentage');
//        $disamount= ($total*$disamountpercen)/100;
//        $data = array(
//            'discount' => $disamount,
//        );
//        $this->session->set_userdata($data);
        if ($this->session->userdata('promocode') != null){
            $this->discount($this->session->userdata('promocode'));
        }
    }
    public function cart()
    {
        $userType = $this->session->userdata('userType');

        if ($userType ==""){

            $this->data['charges'] = $this->Itemsm->getcharges();
            $this->data['allCity'] = $this->Itemsm->getAllCity();
            $this->load->view('cartforguest', $this->data);

        }
        else if ($userType =="cus") {
            $userid = $this->session->userdata('id');
            if ($userid == "") {
                $this->data['charges'] = $this->Itemsm->getcharges();
                $this->data['allCity'] = $this->Itemsm->getAllCity();
                $this->load->view('cartforguest', $this->data);
            } else {

                $this->data['userdata'] = $this->Itemsm->getUserdata($userid);
                $this->data['earnpoint'] = $this->Itemsm->getearnPoint($userid);
                $this->data['exensepoint'] = $this->Itemsm->getexpensePoint($userid);
                $this->data['charges'] = $this->Itemsm->getcharges();
                $this->load->view('cart', $this->data);
            }
        }
        else{
            $memberId = $this->session->userdata('memberuserid');
            $this->data['allCity'] = $this->Itemsm->getAllCity();
            $this->data['userdata'] = $this->Itemsm->getUserdata($memberId);
            $this->data['earnpoint'] = $this->Itemsm->getearnPoint($memberId);
            $this->data['exensepoint'] = $this->Itemsm->getexpensePoint($memberId);
            $this->data['charges'] = $this->Itemsm->getcharges();
            $this->load->view('cart', $this->data);

        }
    }
    public function checkCartItems(){

        if (empty($this->cart->contents())){

            echo "0";

        }else{
            echo "1";
        }
    }
    public function payment(){
        $this->data['charges'] = $this->Itemsm->getcharges();
        $this->load->view('cart_2', $this->data);
    }
    public function promocode(){
        $promocoe = $this->input->post('promocode');
        $data = array(
            'promocode' => $promocoe,
        );
        $this->session->set_userdata($data);
        $this->discount($promocoe);
    }
    public function discount($promocoe){
        $this->data['promotype'] = $this->Itemsm->getPromoType($promocoe);
        foreach ($this->data['promotype'] as $pt) {}
        if (!empty($this->data['promotype'])) {
            $promotype = $pt->promoType;
            if ($promotype == 'a') {
                foreach ( $this->cart->contents() as $c){
                    $disamountpercen= $pt->discountAmount;
                    $rowid = $c['rowid'];
                    $subtotal = $c['subtotal'];
                    $dis = ($subtotal * $disamountpercen) / 100;
                    $data = array(
                        'rowid' => $rowid,
                        'coupon' => $dis,
                    );
                    $this->cart->update($data);
                }
                echo $dis;
            } else {
                $this->discountforitem();
            }
        } else {
            echo "00";
        }
    }
    //this function for selected item discout.
    public function discountforitem(){
        foreach ( $this->cart->contents() as $c){
            $itemsizeid = $c['id'];
            $this->data['itemid'] = $this->Itemsm->getItemid($itemsizeid);
            foreach ($this->data['itemid'] as $i){}
            $itemId = $i->id ;
            $rowid = $c['rowid'];
            $subtotal = $c['subtotal'];
            $this->data['promotypepp'] = $this->Itemsm->setDiscountforSelectItem($itemId);
            foreach ($this->data['promotypepp'] as $promo) {
                $discountforitem = $promo->itemdiscount;
                $dis = ($subtotal * $discountforitem) / 100;
                $data = array(
                    'rowid' => $rowid,
                    'coupon' => $dis,
                );
                $this->cart->update($data);
            }
        }
    }
    public function have(){
        $data = array(
            'orderType' => "have",
        );
        $this->session->set_userdata($data);
    }
    public function takeaway(){
        $data = array(
            'orderType' => "take",
        );
        $this->session->set_userdata($data);
    }
    public function homedelivary(){
        $data = array(
            'orderType' => "home",
        );
        $this->session->set_userdata($data);
    }
    public  function Tip(){
        $amount = $this->input->post('tip');

        $data = array(
            'tip' => $amount,
        );
        $this->session->set_userdata($data);
    }
    public function paymentcreditcard(){
        $data = array(
            'paymentMethod' => "credit",
        );
        $this->session->set_userdata($data);
    }
    public function paymentcash(){
        $data = array(
            'paymentMethod' => "cash",
        );
        $this->session->set_userdata($data);
    }
    public function membershipid()
    {
        $memberid = $this->input->post('memberid');
        $this->data['memberid'] = $this->Itemsm->getuserdatabymemberid($memberid);
        if (!empty($this->data['memberid'])) {
            foreach ($this->data['memberid'] as $member) {
                $m = $member->id;
            }
            $data = array(
                'memberuserid' => $m,
            );
            $this->session->set_userdata($data);
            echo "1";
        }else{
            echo "0";
        }
    }
//        $ordertype= $this->session->userdata('orderType');
//        $orderdate= date("Y-m-d H:i");
//        $re = $this->Itemsm->getorderstatus();
//        $orderstatus= $re->id;
//        $deliveryfee=$this->session->userdata('deliverfee');
//        $vat= $this->session->userdata('vat');
//        $paymenttype=$this->session->userdata('paymentMethod');
//        $user=$this->session->userdata('id');
//        $ordertaker = $this->session->userdata('id');
    public function checkoutguest(){
        $this->load->library('form_validation');
        if (!$this->form_validation->run('userRes'))
        {
            $this->data['charges'] = $this->Itemsm->getcharges();
            $this->data['allCity'] = $this->Itemsm->getAllCity();
            $this->load->view('cartforguest',$this->data);
        }
        else {
            $tip =  $this->input->post('tip');

            $data = array(
                'tip' => $tip,
            );
            $this->session->set_userdata($data);

            $this->load->model('loginm');
            $this->load->library('user_agent');
            $name = $this->input->post('Name');
            $address = $this->input->post('address');
            $city = $this->input->post('city');
            $postal = $this->input->post('pcode');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $conPassword = $this->input->post('conPassword');
            $phone = $this->input->post('phone');
            if ($password == $conPassword) {
                $data = array(
                    'name' => $name,
                    'address' => $address,
                    'postalCode' => $postal,
                    'fkCity' => $city,
                    'contactNo' => $phone,
                    'email' => $email,
                    'password' => $conPassword,
                    'userActivationStatus' => '1',
                    'fkUserType' => 'cus',
                );
                $this->data['error'] = $this->loginm->guestRegister($data);
                if (empty($this->data['error'])) {
                    $data1 = array(
                        'sourceIp' => $this->input->ip_address(),
                        'fkUserId' => $this->session->userdata('id'),
                        'browser' => $this->agent->browser()
                    );
                    $data3=array(
                        'address' => $address,
                        'postalCode' => $postal,
                        'fkCity' => $city,
                        'contactNo' => $phone,
                        'country' => "US",
                        'status' => "1",
                        'userId' => $this->session->userdata('id'),

                    );
                    $loginId = $this->loginm->loginInfoForRegisterUser($data1,$data3);
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'id' => $this->session->userdata('id'),
                        'userType' => "cus",
                        'loggedin' => "true",
                        'loginId' => $loginId,
                    );
                    $this->session->set_userdata($data);
                    $ordertype = $this->session->userdata('orderType');
                    $orderdate = date("Y-m-d H:i");
                    $re = $this->Itemsm->getorderstatus();
                    $orderstatus = $re->id;
                    $deliveryfee = $this->session->userdata('deliveryfee');
                    $vat = $this->session->userdata('vat');
                    $user = $this->session->userdata('id');
                    $ordertaker = null;

                    $orderRemark = $this->input->post('orderRemark');
                    $data=array(
                        'orderRemark' => $orderRemark,
                        );
                    $this->session->set_userdata($data);
                    if ($this->session->userdata('paymentMethod') == "cash") {
                        $paymenttype = "cs";

                    $data = array(
                        'orderType' => $ordertype,
                        'orderDate' => $orderdate,
                        'fkOrderStatus' => $orderstatus,
                        'deliveryfee' => $deliveryfee,
                        'tip' =>$tip,
                        'vat' => $vat,
                        'paymentType' => $paymenttype,
                        'fkUserId' => $user,
                        'fkOrderTaker' => $ordertaker,
                        'orderRemarks' => $this->session->userdata('orderRemark'),
                    );
                    $orderId = $this->Itemsm->checkoutInsertForGuest($data);
                    $this->mailInvoice($orderId);
                    $this->cart->destroy();
                    $this->session->unset_userdata('orderType');
                    $this->session->unset_userdata('tip');
                    $this->session->set_flashdata('successMessage', 'CheckOut Successfully');
                    redirect('Items');
                }
                else if($this->session->userdata('paymentMethod')=="credit") {
                        redirect("OnlinePayment");

                }
                } else {
                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Items');
                }
            }
        }
    }
    public function checkout(){

         $tip =  $this->input->post('tip');

        $data = array(
            'tip' => $tip,
        );
        $this->session->set_userdata($data);

        $ordertype = $this->session->userdata('orderType');
        $orderdate = date("Y-m-d H:i");
        $re = $this->Itemsm->getorderstatus();
        $orderstatus = $re->id;
        $deliveryfee = $this->session->userdata('deliveryfee');
        $vat = $this->session->userdata('vat');

        if ($this->session->userdata('paymentMethod')=="cash"){
            $paymenttype = "cs";
        }else if($this->session->userdata('paymentMethod')=="credit") {
            $paymenttype = "crd";
        }



        $ordertaker = $this->session->userdata('id');




        $orderRemark = $this->input->post('orderRemark');
        $data=array(
            'orderRemark' => $orderRemark,
        );
        $this->session->set_userdata($data);

        $userType = $this->session->userdata('userType');

        if ($userType == "cus"){

            $user = $this->session->userdata('id');

            $data = array(
                'orderType' => $ordertype,
                'orderDate' => $orderdate,
                'fkOrderStatus' => $orderstatus,
                'deliveryfee' => $deliveryfee,
                'vat' => $vat,
                'tip' =>$tip,
                'paymentType' => $paymenttype,
                'fkUserId' => $user,
                'fkOrderTaker' => null,
                'orderRemarks' => $this->session->userdata('orderRemark'),
            );
            $orderId=$this->Itemsm->checkoutInsert($data);
            $this->mailInvoice($orderId);

        }else{
            $memberid = $this->session->userdata('memberuserid');
            if (empty($memberid)){
                $userId=null;
                $this->load->library('form_validation');
                if (!$this->form_validation->run('newAddress')) {

                     $this->data['charges'] = $this->Itemsm->getcharges();
                     $this->data['allCity'] = $this->Itemsm->getAllCity();

                    $this->data['earnpoint'] = $this->Itemsm->getearnPoint($memberid);
                    $this->data['exensepoint'] = $this->Itemsm->getexpensePoint($memberid);

                     $this->load->view('cart', $this->data);
                }else {

                    $phone = $this->input->post('phone');
                    $address = $this->input->post('address');
                    $city = $this->input->post('city');
                    $pcode = $this->input->post('pcode');
                    $userid=null;
                    $this->load->model('Userorderm');
                    $addressId=$this->Userorderm->insertNewAddressForCashCheckout($phone, $address, $city, $pcode, $userid);

                }

            }else{
                $userId=$memberid;
            }
            if (empty($addressId))
            {
                $addressId=null;
            }

                $data = array(
                    'orderType' => $ordertype,
                    'orderDate' => $orderdate,
                    'fkOrderStatus' => $orderstatus,
                    'deliveryfee' => $deliveryfee,
                    'vat' => $vat,
                    'tip' =>$tip,
                    'paymentType' => $paymenttype,
                    'fkUserId' => $userId,
                    'fkOrderTaker' => $ordertaker,
                    'deliveryAddressId'=>$addressId,
                    'orderRemarks' => $this->session->userdata('orderRemark'),
                );

            $orderId=$this->Itemsm->checkoutInsert($data);
        }


        $this->cart->destroy();

        $this->session->unset_userdata('memberuserid');
        $this->session->unset_userdata('orderType');
        $this->session->unset_userdata('tip');
        $this->session->set_flashdata('successMessage','CheckOut Successfully');
        redirect('Items');
    }


    public function checkdesert(){

        if (empty($this->cart->contents())){

            echo "2";

        }else{
            $dessertCheck=array();

            foreach ($this->cart->contents() as $c){

                if ($c['options']['CategoryName'] == "DESSERT"){

                    $dessertCheck="There is an Dessert Item";

                }else{

                }
            }
            if ($dessertCheck != null){
                echo "0";
            }
            else{
                echo "1";
            }
        }


    }

    public function orderRemarkForCrd()
    {
        $remarks = $this->input->post('remark');
        $tipAmount = $this->input->post('tip');
        $data = array(
            'orderRemark' => "$remarks",
            'tip' => "$tipAmount",
        );
        $this->session->set_userdata($data);

    }

    public function usepoints()
    {
        $userid = $this->session->userdata('id');
        $this->data['earnpoint'] = $this->Itemsm->getearnPoint($userid);
        $this->data['exensepoint'] = $this->Itemsm->getexpensePoint($userid);
        foreach ($this->data['earnpoint']  as $ep){ $earn = $ep->earnspoint;}
        foreach ($this->data['exensepoint']  as $exp){ $expense = $exp->expenspoint;}
        $totalpoint= $earn-$expense;
        $totalbill= $this->cart->total();
        $totalpointdollar = $totalpoint * .1 ;
        if ($totalpointdollar >= $totalbill){
            $res = $totalpointdollar - $totalbill ;
            $newtotal = $totalpointdollar - $res;
            $data = array(
                'expensepoint' => $newtotal,
            );
            $this->session->set_userdata($data);
        }else {
            $newtotal =  $totalpointdollar ;
            $data = array(
                'expensepoint' => $newtotal,
            );
            $this->session->set_userdata($data);
        }
        echo $newtotal;
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