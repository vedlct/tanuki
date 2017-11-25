<?php
class Itemsm extends CI_Model {

    public function getAllItem(){

        $this->db->select('items.id as id, fkCatagory , itemName, image, description, price');
        $this->db->join('itemsizes ', 'itemsizes.fkItemId = items.id ', 'left');
        $this->db->from('items');
        $this->db->group_by('itemsizes.fkItemId');
        $query = $this->db->get();
        return $query->result();
    }
     public function getAllItemSize(){

         $this->db->select('id, fkItemId , itemSize, price');
         $this->db->from('itemsizes');
         $query = $this->db->get();
         return $query->result();
     }
    public function getDefualtItemSize(){

        $this->db->select('id, fkItemId , itemSize, price');
        $this->db->from('itemsizes');
        $this->db->group_by('fkItemId');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllCategory(){

        $this->db->select('id, name ');
        $this->db->from('catagory');
        $query = $this->db->get();
        return $query->result();
    }
    public function getItem($id){

        $this->db->select('items.id as id, itemName,itemSize,  price');
        $this->db->join('itemsizes ', 'itemsizes.fkItemId = items.id ', 'left');
        $this->db->from('items');
        $this->db->where('items.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getItemSize($id){
        $this->db->select('itemsizes.id as id, itemName,itemSize,  price');
        $this->db->join('items ', 'itemsizes.fkItemId = items.id ', 'left');
        $this->db->from('itemsizes');
        $this->db->where('itemsizes.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
?>