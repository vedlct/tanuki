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

    public function find_category($cat_id)

    {
         $this->db->from('catagory');
         $this->db->where('id',$cat_id)
                ->select(['id','name']);
          $query = $this->db->get();

         return $query->result();
    }


      public function update_cat($id, $data)
          {

              $this->db->where('id',$id);
              $this->db->update('catagory',$data);

          }


    public function delete_cat($cat_id)
    {
        $find=$this->db->select(['id','name'])
            ->where('id',$cat_id)
            ->get('catagory');
        return  $find->result();
    }





}