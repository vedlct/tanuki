<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reportm extends CI_Model
{

    public function viewAllReport(){


        $this->db->select('transactionmaster.id as tid,transactionmaster.*, users.name as customer , u.name as waiter ');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }

//    public function viewAllItemReport(){
//
//
//        $this->db->select('items.itemName as itemname, itemsizes.id as itemsizeid, price, itemSize');
//        $this->db->join('items', 'itemsizes.fkItemId = items.id', 'left');
//        $this->db->from('itemsizes');
//        $query = $this->db->get();
//        return $query->result();
//
//    }

    public function viewAllItemReport(){

        $this->db->select('fkTransId, fkItemSizeId , quantity , rate , discount, itemName, itemSize');
        $this->db->join('itemsizes ', 'itemsizes.id = transactiondetail.fkItemSizeId ', 'left');
        $this->db->join('items', 'itemsizes.fkItemId = items.id', 'left');
        $this->db->from('transactiondetail');
        $query = $this->db->get();
        return $query->result();
    }

}