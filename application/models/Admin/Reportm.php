<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportm extends CI_Model
{
    public function viewAllReport(){
        $this->db->select('transactionmaster.id as tid,transactionmaster.*, users.name as customer , u.name as waiter , paymentType , orderType ');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewAllItemReport(){
        $this->db->select('fkTransId, fkItemSizeId , quantity , rate , discount, itemName, itemSize');
        $this->db->join('itemsizes ', 'itemsizes.id = transactiondetail.fkItemSizeId ', 'left');
        $this->db->join('items', 'itemsizes.fkItemId = items.id', 'left');
        $this->db->from('transactiondetail');
        $query = $this->db->get();
        return $query->result();
    }
    public function filterByCustomer(){

        $this->db->select('transactionmaster.id as tid, users.name as customer  , paymentType , orderType , memberCardNo, COUNT(fkOrderId) as totalorder, COUNT(transactionmaster.fkOrderId)  as totalorder,COUNT(transactiondetail.fkItemSizeId) as totalitem,  SUM((transactiondetail.quantity*transactiondetail.rate)- transactiondetail.discount) as totalammount ');
        $this->db->join('transactiondetail', 'transactiondetail.fkTransId = transactionmaster.id ', 'left');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->from('transactionmaster');
        $this->db->where('fkUserType=' ,'cus');
        $this->db->group_by('users.name');
        $query = $this->db->get();
        return $query->result();
    }

    public function filterByEmployee(){

        $this->db->select('users.id as uid, users.name as employee  , paymentType , orderType , memberCardNo, COUNT(transactionmaster.fkOrderId)  as totalorder,COUNT(transactiondetail.fkItemSizeId) as totalitem,  SUM((transactiondetail.quantity*transactiondetail.rate)- transactiondetail.discount) as totalammount  ');
        $this->db->join('transactiondetail', 'transactiondetail.fkTransId = transactionmaster.id ', 'left');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkOrderTaker = users.id ', 'left');
        $this->db->from('transactionmaster');
        $this->db->where('fkUserType !=' ,'cus');
        $this->db->where('orderType =' ,'have');
        $this->db->group_by('users.name');
        $query = $this->db->get();
        return $query->result();
    }


    public function filterByItems()
    {
        $this->db->select('items.id as itemid , items.itemName as itemname, COUNT(items.itemName) as totalitem');
        $this->db->join('itemsizes', 'itemsizes.id  = transactiondetail.fkItemSizeId', 'left');
        $this->db->join('items', 'items.id = itemsizes.fkItemId  ', 'left');
        $this->db->from('transactiondetail');
        $this->db->group_by('items.id');
        $query = $this->db->get();
        return $query->result();

    }

    public function filterByItemsSize()
    {
        $this->db->select('COUNT(fkItemSizeId) as totalsize, itemsizes.fkItemId as itemid, itemsizes.itemSize as itemsize');
        $this->db->join('itemsizes', 'itemsizes.id  = transactiondetail.fkItemSizeId', 'left');
        $this->db->from('transactiondetail');
        $this->db->group_by('fkItemSizeId');
        $query = $this->db->get();
        return $query->result();

    }

    public function pointcount()
    {

    }


}