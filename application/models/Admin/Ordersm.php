<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ordersm extends CI_Model
{

    public  function getAllOrders()
    {

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.fkUserId,u.name as userName,u.name as orderTaker');
        $this->db->from('orders o');
        $this->db->where('o.orderDate BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()');
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
        $query=$this->db->get();
        return $query->result();
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

    public  function getOrderItemForEdit($itemId)
    {
        $this->db->select('os.id,os.fkOrderId,os.fkItemSizeId,os.quantity,os.rate,os.discount');
        $this->db->from('orderitems os');
        $this->db->where('os.id',$itemId);

        $query=$this->db->get();
        return $query->result();
    }

    public  function updateOrderItemById($id,$data)
    {
        $this->security->xss_clean($data);
        $this->db->where('id',$id);
        $error=$this->db->update('orderitems', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    public function deleteOrderItemsById($id)
    {
        $this->db->where('id',$id)->delete('orderitems');

    }

    public  function addNewOrderItems($data)
    {
        $this->security->xss_clean($data);

        $error=$this->db->insert('orderitems', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }
    }

    public  function getDeliveredOrderInfo($orderId)
    {
        $this->db->select('orders.id,orders.vat');
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

    public  function checkDelivery($orderStatus)
    {
        $this->db->select('statusTitle');
        $this->db->from('orderstatus');
        $this->db->where('id',$orderStatus);

        $query=$this->db->get();
        return $query->result();
    }


}