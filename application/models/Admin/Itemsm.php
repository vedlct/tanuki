<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Itemsm extends CI_Model
{
//    public function getAllItemsByCatId($id)
//    {
//        $this->db->select('i.id,i.fkCatagory,i.itemName,i.itemStatus');
//        $query = $this->db->get('catagory');
//        return $query->result();
//    }

    public function insertItem($itemdata,$itemSizedata)
    {
        $this->db->insert('items', $itemdata);
        $itemId=$this->db->insert_id();

        $data=array(
            'fkItemId'=>$itemId,
        );
        $itemSizedata1 = array_merge($itemSizedata, $data);

        $this->db->insert('itemsizes', $itemSizedata1);
    }
}