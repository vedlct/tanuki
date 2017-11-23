<?php
class Itemsm extends CI_Model {

    public function getAllItem(){

        $this->db->select('id, fkCatagory , itemName, image, description');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }
     public function getAllItemSize(){

         $this->db->select('id, fkItemId , itemSize, price');
         $this->db->from('itemsizes');
         $query = $this->db->get();
         return $query->result();
     }
    public function getAllCategory(){

        $this->db->select('id, name ');
        $this->db->from('catagory');
        $query = $this->db->get();
        return $query->result();
    }
}
?>