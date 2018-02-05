<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chargem extends CI_Model
{

    public  function  getAllCharge()
    {

        $this->db->select('id,deliveryfee,vat');
        $this->db->from('charges');
        $query=$this->db->get();
        return $query->result();

    }



}
