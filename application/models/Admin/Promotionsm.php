<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Promotionsm extends CI_Model
{
    public function insertPromotion($promotiondata){

        $this->db->insert('promotions', $promotiondata);
        $promotionId=$this->db->insert_id();
        return $promotionId;

    }

    public function getAllItem(){
        $this->db->select('id,itemName');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertPromotionItemdata($promotionItemdata)
    {

        $this->db->insert('promotiondetail', $promotionItemdata);
    }



}