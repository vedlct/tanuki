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

    public function getItemInfoById($id)
    {
        $this->db->select('i.id,i.image,i.itemName,i.itemStatus,i.fkCatagory as category,i.description');
        $this->db->from('items i');
        $this->db->where('i.id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateItemdata($id,$itemdata)
    {

        $this->db->select('image');
        $this->db->where('id',$id);
        $this->db->from('items');
        $query = $this->db->get();
        foreach ($query->result() as $itemImage){
            $oldImage = $itemImage->image;
        }

        $path   = 'images/itemImages/'.$oldImage;
        if (!file_exists($path)){
            return 0;
        }
        else{
            unlink(FCPATH.$path);
            $this->db->where('id',$id);
            $this->db->update('items', $itemdata);

        }

    }

    public function updateItemdataWithoutImage($id,$itemdata)
    {

      $this->db->where('id',$id);
      $this->db->update('items', $itemdata);

    }

    public function deleteItemById($id)
    {
        $this->db->where('id',$id)->delete('items');
        $this->db->where('fkItemId',$id)->delete('itemsizes');

    }

}