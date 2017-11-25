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

    }
    public function updateCart(){
        $id = $this->input->post('id');
        $amount = $this->input->post('amount');


        $data = array(
            'rowid' => $id,
            'qty' => $amount,

        );
        $this->cart->update($data);
    }

}
