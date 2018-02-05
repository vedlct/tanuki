<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Itemsm extends CI_Model
{

 /* waiter*/
    public function getAllItemsNameIdByCategory($catId)
    {
        $this->db->select('i.id,i.itemName');
        $this->db->from('items i');
        $this->db->where('i.fkCatagory',$catId);
        $this->db->where('i.itemStatus',"1");
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllItemSizesNameIdByItem($itemId)
    {
        $this->db->select('is.id,is.itemSize');
        $this->db->from('itemsizes is');
        $this->db->where('is.fkItemId',$itemId);
        $this->db->where('is.itemSizeStatus',"1");
        $query = $this->db->get();
        return $query->result();
    }

    public function getItemPriceByItemSizeId($itemSizeId)
    {
        $this->db->select('is.price');
        $this->db->from('itemsizes is');
        $this->db->where('is.id',$itemSizeId);
        $query = $this->db->get();
        return $query->result();
    }

    /* waiter*/





}