<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reportm extends CI_Model
{

    public function viewAllReport(){


        $this->db->join('transactiondetail', 'transactiondetail.fkTransId = transactionmaster.id', 'left');
        $this->db->join('transactiondetail', 'transactiondetail.fkTransId = transactionmaster.id', 'left');
        $this->db->from('transactionmaster');
        $query = $this->db->get();
        return $query->result();
    }

}