<?php
class Itemsm extends CI_Model {

    public function getAllItem(){

        $this->db->select('items.id as id, fkCatagory , itemName, image, description, price');
        $this->db->join('itemsizes ', 'itemsizes.fkItemId = items.id ', 'left');
        $this->db->from('items');
        $this->db->group_by('itemsizes.fkItemId');
        $query = $this->db->get();
        return $query->result();
    }
     public function getAllItemSize(){

         $this->db->select('id, fkItemId , itemSize, price, itemsizeStatus');
         $this->db->from('itemsizes');
         $this->db->where('itemSizeStatus', "1");
         $query = $this->db->get();
         return $query->result();
     }
    public function getDefualtItemSize(){

        $this->db->select('id, fkItemId , itemSize, price, itemsizeStatus');
        $this->db->from('itemsizes');
        $this->db->group_by('fkItemId');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllCategory(){

        $this->db->select('id, name ');
        $this->db->from('catagory');
        $query = $this->db->get();
        return $query->result();
    }
    public function getItem($id){

        $this->db->select('itemsizes.id as id, itemName,itemSize,  price');
        $this->db->join('itemsizes ', 'itemsizes.fkItemId = items.id ', 'left');
        $this->db->from('items');
        $this->db->where('items.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getItemSize($id){
        $this->db->select('itemsizes.id as id, itemName,itemSize,  price');
        $this->db->join('items ', 'itemsizes.fkItemId = items.id ', 'left');
        $this->db->from('itemsizes');
        $this->db->where('itemsizes.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getcharges(){
        $this->db->select('deliveryfee, vat ');
        $this->db->from('charges');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllCity(){
        $this->db->select('id, name ');
        $this->db->from('city');
        $query = $this->db->get();
        return $query->result();
    }
    public function getPromoType($promocoe){

        $this->db->select('promoType, discountAmount');
        $this->db->where('startDate <=',date('Y-m-d'));
        $this->db->where('endDate >=',date('Y-m-d'));
        $this->db->where('promoCode', $promocoe);
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
    public function getUserdata($userid){
        $this->db->select('name, address , postalCode, fkCity, memberCardNo , contactNo , email, password');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        return $query->result();
    }

    public function getItemid($itemsizeid){
        $this->db->select('itemsizes.fkItemId as id');
        $this->db->from('itemsizes');
        $this->db->where('itemsizes.id', $itemsizeid);
        $query = $this->db->get();
        return $query->result();
    }

    public function getorderstatus(){
        $this->db->select('id');
        $this->db->from('orderstatus');
        $this->db->order_by('sequece', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
    public function checkoutInsert($data){


        $this->db->insert('orders', $data);

        $orderid = $this->db->insert_id();
        foreach ($this->cart->contents() as $c){

            $data2 = array(

                'fkOrderId' => $orderid,
                'fkItemSizeId' => $c['id'],
                'quantity' => $c['qty'],
                'rate' => $c['price'],
                'discount' => $c['coupon'],


            );
            $this->db->insert('orderitems', $data2);
        }
        if ($this->session->userdata('orderType') != null && $this->session->userdata('expensepoint') !=null ){
        $data3 = array(
            'fkOrderId' => $orderid,
            'fkUserId' => $this->session->userdata('id'),
            'expedPoints' => $this->session->userdata('expensepoint')
        );
            $this->db->insert('pointdeduct', $data3);
        }
        return $orderid;

    }
    public function checkoutInsertForGuest($data){


        $this->db->insert('orders', $data);

        $orderid = $this->db->insert_id();
        foreach ($this->cart->contents() as $c){

            $data2 = array(

                'fkOrderId' => $orderid,
                'fkItemSizeId' => $c['id'],
                'quantity' => $c['qty'],
                'rate' => $c['price'],
                'discount' => $c['coupon'],


            );
            $this->db->insert('orderitems', $data2);

        }
        return $orderid;
    }
    public function getearnPoint($userid){
        $this->db->select('SUM(`earnedPoints`) as earnspoint ');
        $this->db->from('points');
        $this->db->where('fkUserId', $userid);
        $query = $this->db->get();
        return $query->result();
    }
    public function getexpensePoint($userid){
        $this->db->select('SUM(`expedPoints`) as expenspoint');
        $this->db->from('pointdeduct');
        $this->db->where('fkUserId', $userid);
        $query = $this->db->get();
        return $query->result();
    }

    public function getuserdatabymemberid($memberid){
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('memberCardNo', $memberid);
        $query = $this->db->get();
        return $query->result();
    }

}
?>