<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Promotionsm extends CI_Model
{
    public function insertPromotion(){

    }
    public function getAllItem(){
        $this->db->select('id,itemName');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }

}