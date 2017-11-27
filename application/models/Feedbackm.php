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
        $query = $this->db->get();
        return $query->result();
    }
}