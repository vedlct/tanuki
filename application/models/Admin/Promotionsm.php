<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Promotionsm extends CI_Model
{
    public function insertPromotion($promotiondata)
    {
        $this->security->xss_clean($promotiondata);
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
        $this->db->insert('promotiondetail',$promotionItemdata);
    }


    public function getAllPromotionsByType($type)
    {
        $this->db->where('promoType=', $type);
        $this->db->from('promotions');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPromotionById($promotionId)
    {
        $this->db->from('promotions');
        $this->db->where('id', $promotionId)->select(['id', 'campainTitle', 'promoCode', ' startDate', ' endDate', ' discountAmount ', 'activationStatus']);
        $query = $this->db->get();
        return $query->result();
    }




    public function updatePromotionById($id,$promotiondata)
    {

        $error = $this->db->where('id',$id)->update('promotions', $promotiondata);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }
public function  updatePromotionItemdata($id,$promotionItemdata)
{
    $error= $this->db->where('id',$id)->update('promotiondetail', $promotionItemdata);

    if (empty($error)) {
        return $this->db->error();
    } else {

        return $error = null;
    }

}


    public function getAllPromotionsByTypeForItem()
    {

        $this->db->select('items.itemName as itname , promotiondetail.id as pitemId,promotiondetail.fkPromotionId,promotiondetail.discountAmount');
        $this->db->join('items', 'items.id = promotiondetail.fkItemId', 'left');
        $this->db->from('promotiondetail');
        $query = $this->db->get();
        return $query->result();
    }
    public function deletePromotionById($id)
    {

        $this->db->where('id',$id)->delete('promotions');


    }

    public function insertSelctionItemdata($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('promotiondetail',$data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }


public function PromotionItemGetselectId($id)
{    $this->db->where('promotiondetail.id',$id)->select('items.itemName as itname , promotiondetail.id as pitemId,promotiondetail.fkPromotionId,promotiondetail.discountAmount');
    $this->db->from('promotiondetail');
    $this->db->join('items', 'items.id = promotiondetail.fkItemId', 'left');
    $query = $this->db->get();
    return $query->result();

}
    public function updateSelectionById($id,$data)
    {
        $error = $this->db->where('id',$id)->update('promotiondetail', $data);
        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }

    public function updatefeedbackById($id, $data)
    {
        $error = $this->db->where('id', $id)->update('userfeedback', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }


   public  function deleteSelectedById($id)
   {
       $this->db->where('id',$id)->delete('promotiondetail');
   }



}

