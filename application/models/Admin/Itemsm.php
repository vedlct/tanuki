<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Itemsm extends CI_Model
{
    public function getAllItemsByCatId($id)
    {
        $this->db->select('i.id,i.image,i.itemName,i.itemStatus');
        $this->db->from('items i');
        $this->db->where('i.fkCatagory',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertItemSizedata($itemSizedata)
    {

        $this->db->insert('itemsizes', $itemSizedata);
    }

    public function insertItemdata($itemdata)
    {
        $this->db->insert('items', $itemdata);
        $itemId=$this->db->insert_id();
        return $itemId;


    }
}