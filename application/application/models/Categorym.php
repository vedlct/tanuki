<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorym extends CI_Model{


    public function cateinsert($data)

    {
        $this->db->insert('catagory',$data);

        return $this->db->insert_id();
    }



    public  function get_all_catagory()

    {
        $this->db->from('catagory');
        $query=$this->db->get();
        return $query->result();
    }

    public function cat_update($where, $data)
    {
        $this->db->update('catagory', $data, $where);
        return $this->db->affected_rows();
    }






}