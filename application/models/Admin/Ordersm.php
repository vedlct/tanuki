<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ordersm extends CI_Model
{
    public  function getAllOrders()
    {
        $this->db->select('o.id,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.fkUserId,oi.fkItemSizeId,oi.quantity,oi.rate,oi.discount,is.id,is.itemSize,is.price,u.name,u.memberCardNo,u.contactNo,u.email');
        $this->db->from('orders o');
        $this->db->join('orderitems oi','oi.fkOrderId = o.id','left');
        $this->db->join('itemsizes is','is.id = oi.fkItemSizeId','left');
        $this->db->join('users u','u.id = o.fkUserId','left');

        $query=$this->db->get();
        return $query->result();
    }
}