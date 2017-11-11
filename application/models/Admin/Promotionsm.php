<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Promotionsm extends CI_Model
{
    public function insertPromotion($promotiondata)
    {

        $this->db->insert('promotions', $promotiondata);
        $promotionId = $this->db->insert_id();
        return $promotionId;

    }

    public function getAllItem()
    {
        $this->db->select('id,itemName');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertPromotionItemdata($promotionItemdata)
    {

        $this->db->insert('promotiondetail', $promotionItemdata);
    }



    public function getAllPromotionsByType($type)
    {

        $this->db->where('promoType=', $type);
        $this->db->from('promotions');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllPromotionsByTypeForItem()
    {

        $this->db->select('items.itemName as itname , promotiondetail.id as pitemId,promotiondetail.fkPromotionId,promotiondetail.discountAmount  ');
        $this->db->join('items', 'items.id = promotiondetail.fkItemId', 'left');
        $this->db->from('promotiondetail');
        $query = $this->db->get();
        return $query->result();
    }
    public function deletePromotionById($id)
    {

        $this->db->where('id',$id)->delete('promotions');


    }


}

