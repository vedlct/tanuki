<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Feedbackm extends CI_Model
{
    public function allUserfeedback()
    {
        $this->db->select('u.id as id,u.name as name, f.id as fid, u.fkUserType, f.fkItemId as fkItemId ,f.fkUserId as fkUserId,f.userRating as userRating, f.feedback as feedback , f.feedbackTime as feedbackTime,i.id as Iid,i.itemName  as itemName ');
        $this->db->from('userfeedback f');
        $this->db->join('users u', 'u.id = f.fkUserId', 'left');
        $this->db->join('items i', 'i.id=f.fkItemId', 'left');
        $this->db->where("u.fkUserType =", 'cus');
        $this->db->order_by('f.id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }



    public function allaItems()
    {
        $this->db->select('id,itemName','userRating');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }



    public function allRating(){


        //$this->db->select_avg('userRating');
        $this->db->select('id, AVG(userRating) as userRatings');
        $this->db->from('userfeedback');
        $query = $this->db->get();
        return $query->result();
    }



    public function getitemById($itemid)
    {
        $this->db->where('items.id', $itemid);
        $this->db->select('id,itemName','userRating');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }
    public function feedbackbyitemfeedback(){

        $this->db->select('itemName, ,feedback ,name, feedbackTime, fkUserId,name');
        $this->db->join('items', 'userfeedback.fkItemId = items.id', 'left');
        $this->db->join('users ', 'userfeedback.fkUserId = users.id', 'left');
        $this->db->from('userfeedback');
        $query = $this->db->get();
        return $query->result();
    }

    public function feedbackbyitem($itemid){

        $this->db->select('itemName, ,feedback ,name, feedbackTime, fkUserId,name,userRating');
        $this->db->where('items.id', $itemid);
        $this->db->join('items', 'userfeedback.fkItemId = items.id', 'left');
        $this->db->join('users ', 'userfeedback.fkUserId = users.id', 'left');
        $this->db->from('userfeedback');
        $this->db->order_by('userfeedback.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertFeedback($data)
    {

        $query = $this->db->insert('userfeedback',$data);

    }

    public function ratingavg($itemid){


        //$this->db->select_avg('userRating');
        $this->db->select('id, AVG(userRating) as userRatings');
          $this->db->where('fkItemId',$itemid);
        $this->db->from('userfeedback');
        $query = $this->db->get();
        return $query->result();
    }

}