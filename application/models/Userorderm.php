<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Userorderm extends CI_Model
{
    public  function getAllOrders($userId)
    {
        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.vat,o.fkUserId as fkUserId , u.name as userName,u.name as orderTaker');
        $this->db->from('orders o');
        $this->db->join('users u','u.id = o.fkUserId','left');
        $this->db->join('users us','us.id = o.fkOrderTaker','left');
        $this->db->where('fkUserId',$userId);
        $query=$this->db->get();
        return $query->result();
    }

    public  function getAllOrdersItems()
    {
        $this->db->select('os.id,os.fkOrderId,os.fkItemSizeId,os.quantity,os.rate,os.discount');
        $this->db->from('orderitems os');
        $query=$this->db->get();
        return $query->result();
    }

    public  function getOrdersStatusDeliveredId()
    {
        $this->db->select('os.id');
        $this->db->from('orderstatus os');
        $this->db->order_by('os.sequece', 'DESC');
        $this->db->limit(1);
        $query=$this->db->get();
        return $query->row();
    }
    public  function getAllOrdersStatus()
    {
        $this->db->select('os.id,os.statusTitle');
        $this->db->from('orderstatus os');
        $this->db->order_by('os.sequece', 'ASC');
        $query=$this->db->get();
        return $query->result();
    }
//    public  function getAllOrdersItems($userId)
//    {
//        $this->db->select('os.id,os.fkOrderId,os.fkItemSizeId,os.quantity,os.rate,os.discount,o.fkUserId as fkUserId ');
//        $this->db->from('orders o');
//        $this->db->join('orderitems os');
//        $this->db->where('fkUserId',$userId);
//        $query=$this->db->get();
//        return $query->result();
//    }

}