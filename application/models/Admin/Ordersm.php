<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ordersm extends CI_Model
{
    public  function getAllOrders()
    {
        $this->db->select('o.id,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.delivery fee as deliveryfee,o.fkUserId,oi.fkOrderId,oi.fkItemSizeId,u.name');
        $this->db->from('orders o');
        $this->db->where('o.orderDate BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()');
        $this->db->join('orderitems oi','oi.fkOrderId = o.id','left');

        $this->db->join('users u','u.id = o.fkUserId','left');

        $query=$this->db->get();
        return $query->result();
    }
    public  function getAllOrdersStatus()
    {
        $this->db->select('os.id,os.statusTitle');
        $this->db->from('orderstatus os');
        $query=$this->db->get();
        return $query->result();
    }

}