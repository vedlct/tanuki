<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportm extends CI_Model
{
    public function viewAllReport(){
        $this->db->select('transactionmaster.id as tid,transactionmaster.*, users.name as customer , u.name as waiter , paymentType , orderType, vatTotal, deliveryfee ');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewAllReportBydate($startdate, $enddate){
        $this->db->select('transactionmaster.id as tid,transactionmaster.*, users.name as customer , u.name as waiter , paymentType , orderType ,vatTotal, deliveryfee');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->where('transDate BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"');
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewAllReportByorderid($orderID){
        $this->db->select('transactionmaster.id as tid,transactionmaster.*, users.name as customer , u.name as waiter , paymentType , orderType, fkOrderId, vatTotal, deliveryfee ');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->where('transactionmaster.fkOrderId =', $orderID);
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewAllReportBymemberid($memberID){
        $this->db->select('transactionmaster.id as tid,orders.id as oid,transactionmaster.*, users.name as customer , u.name as waiter , paymentType , orderType ,deliveryfee');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->where('users.memberCardNo =',$memberID);
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewAllReportByemployeeid($employeeID){
        $this->db->select('transactionmaster.id as tid,transactionmaster.*, users.name as customer , u.name as waiter , paymentType , orderType ');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->join('users u', 'orders.fkOrderTaker = u.id ', 'left');
        $this->db->where('u.id =', $employeeID);
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

        $this->db->select('transactionmaster.id as tid, users.name as customer  ,users.id as uid, paymentType , orderType , memberCardNo, COUNT(fkOrderId) as totalorder, COUNT(transactionmaster.fkOrderId)  as totalorder,COUNT(transactiondetail.fkItemSizeId) as totalitem,  SUM((transactiondetail.quantity*transactiondetail.rate)- transactiondetail.discount) as totalammount ');
        $this->db->join('transactiondetail', 'transactiondetail.fkTransId = transactionmaster.id ', 'left');
        $this->db->join('orders', 'orders.id = transactionmaster.fkOrderId ', 'left');
        $this->db->join('users', 'orders.fkUserId = users.id ', 'left');
        $this->db->from('transactionmaster');
        $this->db->where('users.fkUserType=' ,'cus');
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

    public function filterByItemsDate($startdate,$enddate )
    {
        $this->db->select('items.id as itemid , items.itemName as itemname, COUNT(items.itemName) as totalitem');
        $this->db->join('transactionmaster', 'transactionmaster.id  = transactiondetail.fkTransId', 'left');
        $this->db->join('itemsizes', 'itemsizes.id  = transactiondetail.fkItemSizeId', 'left');
        $this->db->join('items', 'items.id = itemsizes.fkItemId  ', 'left');
        $this->db->where('transDate BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"');
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

    public function  getTotalorderCustomer(){

        $this->db->select('COUNT(`fkOrderId`) as totalorder,  users.id as uid ');
        $this->db->join('orders', 'transactionmaster.fkOrderId  = orders.id', 'left');
        $this->db->join('users', 'orders.fkUserId  = users.id', 'left');
        $this->db->from('transactionmaster');
        $this->db->group_by('users.id');
        $this->db->where('fkUserType =' ,'cus');
        $query = $this->db->get();
        return $query->result();
    }
    public function  getTotalorderEmployee(){

        $this->db->select('COUNT(`fkOrderId`) as totalorder,  users.id as uid ');
        $this->db->join('orders', 'transactionmaster.fkOrderId  = orders.id', 'left');
        $this->db->join('users', 'orders.fkOrderTaker  = users.id', 'left');
        $this->db->from('transactionmaster');
        $this->db->group_by('users.id');
        $this->db->where('fkUserType !=' ,'cus');
        $query = $this->db->get();
        return $query->result();
    }

    public function earnPointCount()
    {
        $this->db->select('users.name as username,memberCardNo, users.id as uid,  SUM(earnedPoints) as earnpoint');
        $this->db->join('users', 'users.id = points.fkUserId', 'left');
        $this->db->from('points');
        $this->db->group_by('users.id');
        $this->db->where('fkUserType =' ,'cus');
        $query = $this->db->get();
        return $query->result();

    }

    public function expensePointCount()
    {
        $this->db->select('users.name as username , users.id as uid,  SUM(expedPoints) as expensepoint');
        $this->db->join('users', 'users.id = pointdeduct.fkUserId', 'left');
        $this->db->from('pointdeduct');
        $this->db->group_by('users.id');
        $this->db->where('fkUserType =' ,'cus');
        $query = $this->db->get();
        return $query->result();

    }

    public function totalEaring(){
        $date= date('Y-m-d');
        //$this->db->select('SUM(transactiondetail.quantity) as totalquantity,SUM(transactiondetail.rate) as totalrate,  SUM(transactiondetail.discount) as totaldiscount, vatTotal');
        $this->db->select('transactiondetail.quantity as totalquantity,transactiondetail.rate as totalrate,  transactiondetail.discount as totaldiscount, vatTotal');
        $this->db->join('transactiondetail', 'transactiondetail.fkTransId = transactionmaster.id ', 'left');
        $this->db->from('transactionmaster');
        $this->db->where('transDate =', $date);
        $query = $this->db->get();
        return $query->result();
    }
    public function totalvat(){
        $date= date('Y-m-d');
        $this->db->select(' SUM(vatTotal) as totalvat');
        $this->db->from('transactionmaster');
        $this->db->where('transDate =', $date);
        $query = $this->db->get();
        return $query->result();
    }





}