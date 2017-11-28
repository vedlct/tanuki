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
    public function getItemSizePriceInfoById($id)
    {
        $this->db->select('is.id,is.itemSize,is.price,is.itemsizeStatus');
        $this->db->from('itemsizes is');
        $this->db->where('is.id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateItemdataWithImage($id,$itemdata)
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

            $this->db->where('id',$id);
            $this->db->update('items', $itemdata);
            //return 0;
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

    public function updateItemSizePriceById($id,$data)
    {

        $this->security->xss_clean($data);
        $this->db->where('id',$id);
        $error=$this->db->update('itemsizes', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    public function deleteItemById($id)
    {

        $this->db->where('fkItemId',$id)->delete('itemsizes');
        $this->db->where('id',$id)->delete('items');

    }

    public function deleteItemSizePriceById($id)
    {

        $this->db->where('id',$id)->delete('itemsizes');

    }

    public function insertItemSizePriceByItemId($data)
    {
        $itemId=$data['fkItemId'];

        $this->db->select('id');
        $this->db->where('fkItemId',$itemId);
        $this->db->where('itemSize',"default");
        $query=$this->db->get('itemsizes');
        if (!empty($query->result())){

            foreach ($query->result() as $itemSizes){
                $id=$itemSizes->id;
                $data1=array(
                    'itemSizeStatus'=>'0',
                );
                $this->db->where('id',$id)->update('itemsizes',$data1);
            }
        }

        $error=$this->db->insert('itemsizes', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    public function getAllItemsNameIdByCategory($catId)
    {
        $this->db->select('i.id,i.itemName');
        $this->db->from('items i');
        $this->db->where('i.fkCatagory',$catId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllItemSizesNameIdByItem($itemId)
    {
        $this->db->select('is.id,is.itemSize');
        $this->db->from('itemsizes is');
        $this->db->where('is.fkItemId',$itemId);
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

}