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
                'coupon' => "",
                'options' => array('Size' => $item->itemSize)
            );
            $this->cart->insert($data);
        }
        $total = $this->cart->total();
        $disamountpercen = $this->session->userdata('discountpercentage');
        $disamount= ($total*$disamountpercen)/100;
        $data = array(
            'discount' => $disamount,
        );
        $this->session->set_userdata($data);
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
                'coupon' => "",
                'options' => array('Size' => $itemsize->itemSize)
            );
            $this->cart->insert($data);
        }
        $total = $this->cart->total();
        $disamountpercen = $this->session->userdata('discountpercentage');
        $disamount= ($total*$disamountpercen)/100;
        $data = array(
            'discount' => $disamount,
        );
        $this->session->set_userdata($data);

    }
    public function updateCart(){
        $id = $this->input->post('id');
        $amount = $this->input->post('amount');


        $data = array(
            'rowid' => $id,
            'qty' => $amount,

        );
        $this->cart->update($data);

        $total = $this->cart->total();
        $disamountpercen = $this->session->userdata('discountpercentage');
        $disamount= ($total*$disamountpercen)/100;
        $data = array(
            'discount' => $disamount,
        );
        $this->session->set_userdata($data);
    }

    public function cart(){

        $this->load->view('cart');
    }
    public function discount(){
        $promocoe = $this->input->post('promocode');
        $this->data['promotype'] = $this->Itemsm->getPromoType($promocoe);

        foreach ($this->data['promotype'] as $pt) {}


            if (!empty($this->data['promotype'])) {
               // $this->data['promotype'] = $this->Itemsm->getPromoType();
                $promotype = $pt->promoType;
                if ($promotype == 'a') {
                    $disamountpercen= $pt->discountAmount;
                    $total = $this->cart->total();
                    $disamount= ($total*$disamountpercen)/100;
                     //$disamount;
                    $data = array(
                        'discount' => $disamount,
                        'discountpercentage' => $disamountpercen,

                    );

                    $this->session->set_userdata($data);
                    echo $disamount;
                } else {
                    $this->data['promotypepp'] = $this->Itemsm->setDiscountforSelectItem();
                    foreach ($this->data['promotypepp'] as $promo) {
                        echo $promo->itemdiscount;
                    }
                }
            } else {

                echo "00";
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
}
