<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ordersm extends CI_Model
{

    public  function getAllOrders()
    {
        $data=array
        (
            'orderNotifications'=>'1',
        );

        $this->security->xss_clean($data);
        $error=$this->db->update('orders', $data);

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.vat,o.fkUserId,u.name as userName,u.name as orderTaker');
        $this->db->from('orders o');
        $this->db->where('DATE(o.orderDate) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()');
        $this->db->join('users u','u.id = o.fkUserId','left');
        $this->db->join('users us','us.id = o.fkOrderTaker','left');
        $query=$this->db->get();
        return $query->result();
    }

    public  function viewOrderInfoByOrderId($orderID)
    {

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.fkUserId,u.name as userName,u.name as orderTaker');
        $this->db->from('orders o');
        $this->db->where('o.id',$orderID);
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

    public  function getUnseenOrder()
    {

        $this->db->select('COUNT(id) as totalUnseen');
        $this->db->from('orders');
        $this->db->where('orderNotifications',"0");

        $query=$this->db->get();
        return $query->result();
        
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

    public function getPromoType(){

        $this->db->select('promoType, discountAmount');
        $this->db->where('startDate <',date('Y-m-d'));
        $this->db->where('endDate >',date('Y-m-d'));
        $this->db->from('promotions');
        $query = $this->db->get();
        return $query->result();

    }
    public function setDiscountForAll(){

        $this->db->select('promoType, discountAmount');
        $this->db->where('startDate <',date('Y-m-d'));
        $this->db->where('endDate >',date('Y-m-d'));
        $this->db->where('promoType =','a');
        $this->db->from('promotions');
        $query = $this->db->get();
        return $query->result();

    }
     public function setDiscountforSelectItem($itemId){

         $this->db->select('promotiondetail.discountAmount as itemdiscount');
         $this->db->join('promotiondetail','promotiondetail.fkPromotionId = promotions.id','left');
         $this->db->where('fkItemId =',$itemId);
         $this->db->where('startDate <',date('Y-m-d'));
         $this->db->where('endDate >',date('Y-m-d'));
         $this->db->where('promoType =','s');
         $this->db->from('promotions');
         $this->db->limit(1);
         $query1 = $this->db->get();
         return $query1->result();

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

    public function getTotalOrder()
    {
        $date= date('Y-m-d');
        $this->db->where('DATE(orderDate)',$date);
        $query = $this->db->get('orders');
        return $query->num_rows();

    }

    public  function addNewOrderStatus($data)
    {
        $error=$this->db->insert('orderstatus', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }
public  function getOrderStatusId($status_id)
{
    $this->db->from('orderstatus');
    $this->db->where('id',$status_id)->select(['id','sequece','statusTitle']);
    $query = $this->db->get();
    return $query->result();
}

public function  updateOrderById($id, $data)
{
    $error=$this->db->where('id',$id)->update('orderstatus',$data);

    if (empty($error))
    {
        return $this->db->error();
    }
    else {

        return $error = null;
    }


}
    
    public function getAllOrderstatus()
    {
        $this->db->select('id,sequece,statusTitle');
        $this->db->from('orderstatus');
        $query=$this->db->get();
        return $query->result();
    }
    public  function deleteOrderId($id)
    {
        $this->db->where('id',$id)->delete('orderstatus');
    }

   




}