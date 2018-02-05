<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ordersm extends CI_Model
{

    public  function getAllOrders()
    {

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.deliveryTime,o.vat,o.fkUserId,u.name as userName,us.name as orderTaker');
        $this->db->from('orders o');
        $this->db->where('DATE(o.orderDate) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()');
        $this->db->where('o.orderType',"home");
        $this->db->order_by('o.id', 'DESC');

        $this->db->join('users u','u.id = o.fkUserId','left');
        $this->db->join('users us','us.id = o.fkOrderTaker','left');
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

    public  function getAllOrdersStatus()
    {
        $this->db->select('os.id,os.statusTitle');
        $this->db->from('orderstatus os');
        $this->db->where('os.sequece !=',"0");
        $this->db->order_by('os.sequece', 'ASC');
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

    public  function cancelOrderId()
    {
        $this->db->select('id');
        $this->db->where('sequece',"0");
        $this->db->from('orderstatus');

        $query=$this->db->get();
        return $query->row();


    }
    public  function getUsedPoint()
    {
        $this->db->select('expedPoints, fkOrderId');
        $this->db->from('pointdeduct');

        $query=$this->db->get();
        return $query->result();
    }

    public  function getOrderInformation($orderId)
    {

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,
        ,u.name as userName,us.name as orderTaker, u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email, c.name as cityName');
        $this->db->from('orders o');

        $this->db->join('users u','u.id = o.fkUserId','left');
        $this->db->join('users us','us.id = o.fkOrderTaker','left');
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $this->db->where('o.id',$orderId);
        $query=$this->db->get();
        return $query->result();
    }

    public  function viewOrderInfoByOrderId($orderID)
    {

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.vat,o.deliveryTime,o.fkUserId,u.name as userName,us.name as orderTaker');
        $this->db->from('orders o');
        $this->db->where('o.id',$orderID);
        $this->db->where('o.orderType',"home");
        $this->db->join('users u','u.id = o.fkUserId','left');
        $this->db->join('users us','us.id = o.fkOrderTaker','left');
        $query=$this->db->get();
        return $query->result();
    }

    public  function checkDelivery($orderStatus)
    {
        $this->db->select('statusTitle');
        $this->db->from('orderstatus');
        $this->db->where('id',$orderStatus);
        $query=$this->db->get();
        return $query->result();
    }
    public  function getDeliveredOrderInfo($orderId)
    {
        $this->db->select('orders.id,orders.vat,orders.deliveryfee,orders.fkUserId');
        $this->db->from('orders');
        $this->db->where('orders.id',$orderId);

        $query=$this->db->get();
        return $query->result();
    }
    public  function getDeliveredOrderItemsInfo($orderId)
    {
        $this->db->select('os.id,os.fkItemSizeId,os.quantity,os.rate,os.discount');
        $this->db->from('orderitems os');
        $this->db->where('os.fkOrderId',$orderId);

        $query=$this->db->get();
        return $query->result();
    }

    public  function getUsedPointForParticularOrder($orderId)
    {
        $this->db->select('expedPoints');
        $this->db->from('pointdeduct');
        $this->db->where('fkOrderId',$orderId);

        $query=$this->db->get();
        return $query->result();
    }
    public  function insertdeliveredOrdered($data)
    {
        $this->security->xss_clean($data);

        $error=$this->db->insert('transactionmaster', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $id=$this->db->insert_id();
        }
    }

    public  function insertdeliveredOrderedItemsToTransection($data2)
    {
        $this->security->xss_clean($data2);

        $error=$this->db->insert('transactiondetail', $data2);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }
    public  function insertIntoPointFordeliveredOrdered($data3)
    {
        $this->security->xss_clean($data3);

        $error=$this->db->insert('points', $data3);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return null;
        }
    }
    public  function changeOrderStatus($orderId,$data)
    {
        $this->security->xss_clean($data);
        $this->db->where('id',$orderId);
        $error=$this->db->update('orders', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }



}