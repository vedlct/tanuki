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
                'options' => array('Size' => $item->itemSize)
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
                'options' => array('Size' => $itemsize->itemSize)
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
        $userid = $this->session->userdata('id');
        if ($userid == "") {
            $this->data['charges'] = $this->Itemsm->getcharges();
            $this->load->view('cartforguest', $this->data);
        } else {
            $this->data['userdata'] = $this->Itemsm->getUserdata($userid);
            $this->data['earnpoint'] = $this->Itemsm->getearnPoint($userid);
            $this->data['exensepoint'] = $this->Itemsm->getexpensePoint($userid);
            $this->data['charges'] = $this->Itemsm->getcharges();
            $this->load->view('cart', $this->data);
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

    public function checkout(){

        $ordertype= $this->session->userdata('orderType');
        $orderdate= date("Y-m-d H:i");
        $re = $this->Itemsm->getorderstatus();
        $orderstatus= $re->id;
        $deliveryfee=$this->session->userdata('deliverfee');
        $vat= $this->session->userdata('vat');;
        $paymenttype=$this->session->userdata('paymentMethod');
        $user=$this->session->userdata('id');
        $ordertaker = $this->session->userdata('id');

        $data = array(
            'orderType' => $ordertype ,
            'orderDate' => $orderdate,
            'fkOrderStatus' => $orderstatus,
            'deliveryfee' => $deliveryfee,
            'vat' => $vat,
            'paymentType' => $paymenttype,
            'fkUserId' => $user,
            'fkOrderTaker' => $ordertaker,

        );
        $this->Itemsm->checkoutInsert($data);
        redirect('Items');

    }

    public function usepoints(){

//        $userid = $this->session->userdata('id');
//            $this->data['userdata'] = $this->Itemsm->getUserdata($userid);
//            $this->data['earnpoint'] = $this->Itemsm->getearnPoint($userid);
//        foreach ($this->data['userdata']  as $ep){ $earn = $ep->earnspoint;}
//        foreach ($this->data['earnpoint']  as $exp){ $expense = $exp->expenspoint;}
//        $totalpoint= $earn-$expense;
        $totalbill= $this->cart->total();
       echo $totalbill;

    }


}
