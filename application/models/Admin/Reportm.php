<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reportm extends CI_Model
{

    public function viewAllReport(){


        $this->db->select('items.itemName ,transactiondetail.fkItemSizeId as titemsizeid, transactionmaster.* , transactiondetail.*');
        $this->db->join('transactiondetail', 'transactionmaster.id = transactiondetail.fkTransId', 'left');
        $this->db->join('itemsizes', 'transactiondetail.fkItemSizeId = itemsizes.id', 'left');
        $this->db->join('items ', 'itemsizes.fkItemId = items.id', 'left');
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }

    public function viewAllItemReport(){


        $this->db->select('items.itemName as itemname, itemsizes.id as itemsizeid, price, itemSize ,   ');
        $this->db->join('items', 'itemsizes.fkItemId = items.id', 'left');
        $this->db->from('itemsizes');
        $query = $this->db->get();
        return $query->result();
    }

}