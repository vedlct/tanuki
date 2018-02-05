<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorym extends CI_Model
{


    public  function getAllCategoryNameId()
    {
        $this->db->select('id,name');
        $this->db->from('catagory');
        $query=$this->db->get();
        return $query->result();
    }



}