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

    public  function viewOrderInfoByOrderIdForPrint($orderId)
    {

        $this->db->select('o.id ,o.orderType,o.orderDate,o.fkOrderStatus,o.paymentType,o.deliveryfee as deliveryfee,o.vat,o.fkUserId,u.name as userName,u.email,u.address,u.postalCode,u.fkCity,city.name as cityName,u.contactNo as phone');
        $this->db->from('orders o');
        $this->db->where('o.id',$orderId);
        $this->db->join('users u','u.id = o.fkUserId','left');
        $this->db->join('city','city.id = u.fkCity','left');
        $query=$this->db->get();
        return $query->result();
    }
    public  function getAllOrdersItemsForPrint($orderId)
    {
        $this->db->select('os.id,os.fkOrderId,os.fkItemSizeId,os.quantity,os.rate,os.discount,is.itemSize,i.itemName,is.fkItemId,i.description');
        $this->db->from('orderitems os');
        $this->db->where('os.fkOrderId',$orderId);
        $this->db->join('itemsizes is','is.id = os.fkItemSizeId','left');
        $this->db->join('items i','i.id = is.fkItemId','left');
        $query=$this->db->get();
        return $query->result();
    }
    public  function  getAllCharge()
    {

        $this->db->select('id,deliveryfee,vat');
        $this->db->from('charges');
        $query=$this->db->get();
        return $query->result();

    }
    public  function getUsedPointForOrder($orderId)
    {
        $this->db->select('expedPoints');
        $this->db->from('pointdeduct');
        $this->db->where('fkOrderId',$orderId);

        $query=$this->db->get();
        return $query->result();
    }
    public  function getLastDeliveryAddress($deliveryAddressId)
    {
        $this->db->select('address,postalCode,contactNo,country,fkCity,id');
        $this->db->from('userdeliveryaddress');
        $this->db->where('id',$deliveryAddressId);

        $query=$this->db->get();
        return $query->result();
    }
    public  function EditSelectedDeliveryAddress($id,$data)
    {


        $this->db->where('id',$id);
        $this->db->update('userdeliveryaddress', $data);

    }
    public  function getUsedPoint()
    {
        $this->db->select('expedPoints, fkOrderId');
        $this->db->from('pointdeduct');

        $query=$this->db->get();
        return $query->result();
    }

    public function insertNewAddress($phone, $address, $city, $pcode, $userid) {

        $this->db->select(['id']);
        $this->db->from('userdeliveryaddress');
        $this->db->where('userId', $userid);
        $this->db->where('status', "1");
        $query = $this->db->get();
        if (!empty($query->result())) {
            foreach ($query->result() as $userId) {
                $id = $userId->id;
            }
            $data1 = array(
                'status' => "0"
            );

            $data1 = $this->security->xss_clean($data1);
            $this->db->where('id', $id);

            $this->db->update('userdeliveryaddress', $data1);
        }
        $data = array(
            'userId' => $userid,
            'address' => $address,
            'postalCode' => $pcode,
            'contactNo' => $phone,
            'fkCity' => $city,
            'status' => "1",
        );
        $this->db->insert('userdeliveryaddress', $data);
    }


}