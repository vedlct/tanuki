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
    public function getPromoType(){

        $this->db->select('promoType');
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
     public function setDiscount($itemId){

         $this->db->select('promoType, discountAmount');
         $this->db->where('startDate <',date('Y-m-d'));
         $this->db->where('endDate >',date('Y-m-d'));
         $this->db->from('promotions');
         $query = $this->db->get();
         return $query->result();
         foreach ($query->result() as $promotype){
             if (!empty($promotype)){
                 return $query->result();
             }else {
                 $this->db->select('discountAmount');
                 $this->db->where('fkItemId =',$itemId);
                 $this->db->from('promotiondetail');
                 $query1 = $this->db->get();
                 return $query1->result();

             }
         }

     }
}